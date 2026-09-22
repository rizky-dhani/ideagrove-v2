# Blog: design spec

Date: 2026-06-25
Status: approved design, awaiting implementation plan
Scope: public blog pages plus Filament admin resources for The Idea Grove Studio site.

## Purpose

Add a blog to the site: public index and detail pages under the existing
locale-prefixed routes, and Filament resources so the studio can write and manage
posts, categories, and tags from the admin panel.

Single-language posts. Each post row carries a `locale`, so a post is written in
one language and served under that language's URL only. Two rows (one `en`, one
`id`) share a `translation_key` when they are translations of each other, which is
what drives `hreflang`. Chrome and UI labels still come from the lang files.

> Amended 2026-09-22: originally one row served both locales with an untranslated
> body. That produced duplicate-content URLs and no real `hreflang`, which defeats
> the point of a search-intent post. See "Locale model" below.

## Locale model

| column | type | notes |
| --- | --- | --- |
| `locale` | string(5), default `en`, indexed | The language this post is written in. Its URL lives under this locale. |
| `translation_key` | string, nullable, indexed | Shared by the `en` and `id` rows that are translations of each other. |

- Slug uniqueness is per locale (`unique(['locale', 'slug'])`), not global. Two posts
  may share a slug across locales, and auto-suffixing only counts clashes inside
  the same locale.
- `Post::forLocale()` scopes a query to the active (or given) locale.
- `Post::translation()` returns the published post in the other locale sharing the
  same `translation_key`, or null.
- Blog index, post detail, related posts, and the sitemap are all locale-scoped.
- A post without a `translation_key` still renders; its `hreflang` alternates point
  at itself rather than at a nonexistent sibling.

## Non-goals

- No machine translation. A translated post is written, not generated.
- No revisions. Post history is `updated_at` only.
- No RSS feed.
- No comments.
- No media library beyond the single cover image per post.

## Data model

Four tables, named by Eloquent convention: `posts`, `post_categories`, `post_tags`, `post_post_tag`.

### `post_categories`

| column | type | notes |
| --- | --- | --- |
| `id` | id | |
| `name` | string | |
| `slug` | string, unique, nullable | auto from name, `-2` suffix on clash |
| `description` | text, nullable | |
| `timestamps` | | |

### `post_tags`

| column | type | notes |
| --- | --- | --- |
| `id` | id | |
| `name` | string | |
| `slug` | string, unique, nullable | auto from name |
| `timestamps` | | |

### `posts`

| column | type | notes |
| --- | --- | --- |
| `id` | id | |
| `title` | string | |
| `slug` | string, unique, nullable | auto from title, `-2` suffix on clash (same pattern as `Project`) |
| `excerpt` | text, nullable | falls back to first 40 words of body |
| `body` | longText | HTML from Filament RichEditor |
| `cover_image` | string, nullable | `storage/posts`, 5 MB, slug-based filename |
| `category_id` | FK `post_categories`, nullable | `nullOnDelete`; one category per post |
| `author_id` | FK `users`, nullable | `nullOnDelete` |
| `status` | string | `draft` \| `published`, default `draft` |
| `published_at` | timestamp, nullable | future date plus `published` status means scheduled |
| `is_featured` | boolean | default false |
| `meta_description` | text, nullable | |
| `timestamps` | | |

### `post_post_tag`

`post_id` FK cascade on delete, `tag_id` FK cascade on delete, composite unique on
the pair.

### Relations

- `Post::category()` belongsTo `PostCategory`
- `Post::author()` belongsTo `User`
- `Post::tags()` belongsToMany `PostTag` via `post_post_tag`
- `PostCategory::posts()` hasMany
- `PostTag::posts()` belongsToMany

### Scopes

- `Post::published()` — `status = 'published'` and `published_at <= now()`
- `Post::scheduled()` — `status = 'published'` and `published_at > now()`

### Derived, not stored

- `readingTime()` — words in body divided by 200, minimum 1
- `excerpt()` — stored excerpt, else first 40 words of the body
- `coverImageUrl()` — `asset('storage/'.$cover_image)`, null when absent

### Related posts

Computed at render, no table. Posts sharing the most tags first, then posts in the
same category, exclude self, `published()` only, limit 3.

## Filament admin

Three resources following the newer Filament 5 layout convention already used by
`SocialLinkResource`: `Schemas/` form class plus `Tables/` table class, referenced
from the resource.

### `PostResource` (icon `heroicon-o-newspaper`)

Form:

- `title` — required, live
- `slug` — nullable, placeholder auto-from-title
- `excerpt` — Textarea, nullable
- `body` — RichEditor, required
- `cover_image` — FileUpload to `posts` disk, 5 MB, slug-based filename (mirrors
  `ProjectResource`)
- `category_id` — Select relationship, nullable
- `tags` — Select multiple relationship, `createOptionForm` inline
- `author_id` — Select relationship, default `auth()->id()`
- `status` — Select draft/published, required, default draft
- `published_at` — DateTimePicker, nullable, helper text noting future date means
  scheduled
- `is_featured` — Toggle
- `meta_description` — Textarea, 500

Table: cover thumbnail, `title` searchable, category, tag badges, author name,
status badge (draft gray, published green, scheduled amber when `published_at` is in
the future), `published_at`, `is_featured` toggle, `created_at`.

Filters: status, category, tags, featured.

Row actions: Edit, Delete. Bulk: Publish, Unpublish, Delete.

### `PostCategoryResource`

Name, slug, description. Table: name, slug, `posts_count`. Deleting a category
orphans its posts (`nullOnDelete`), it does not delete them.

### `PostTagResource`

Name, slug. Table: name, slug, `posts_count`.

### Policies

`PostPolicy`, `PostCategoryPolicy`, `PostTagPolicy` mirroring `ProjectPolicy` (all
abilities true, matching the current convention).

## Public frontend

Routes added inside the existing `{locale}` group in `routes/web.php`:

- `GET /blog` → `App\Livewire\PostsPage`, name `posts.index`
- `GET /blog/{slug}` → `App\Livewire\ShowPost`, name `posts.show`

No category or tag archive routes. Filtering happens on the index via query string
(`?category=`, `?tag=`, `?q=`), the same `queryString()` pattern as `WorkPage`.

### `PostsPage`

Livewire component with `WithPagination`. Hero, controls bar (category select, tag
select, search, sort latest/oldest), card grid with cover, category label, title,
excerpt, date, reading time. Empty state with no fabricated content. `perPage` 9.

### `ShowPost`

Resolves with the published scope plus the active locale so draft, future-scheduled,
and other-locale slugs 404: `Post::published()->forLocale()->where('slug', $slug)->firstOrFail()`,
no implicit route binding.
Renders cover, title, meta row (author, date, reading time), category and tag links
back to the filtered index, body in the `.post-body` container, related posts, and a
back-to-blog link. Related posts are locale-scoped.

### SEO

Both components pass a `seo` array to `layouts.public`. `ShowPost` adds
`BlogPosting` JSON-LD (headline, datePublished, author, image, publisher) and
`og:type` `article`. It also passes `locale` and, when a translated sibling exists,
`translation_url`, which the layout uses to emit a correct `hreflang` pair. A post
with no sibling points both alternates at its own canonical URL.

Long-form body styling lives in `resources/css/app.css` under `.post-body`
(headings, lists, quotes, code, scrollable tables, and a `.post-callout` block).
The Tailwind typography plugin is not installed, so these rules are written by hand
against the existing design tokens.

Styling uses existing tokens only (`brand`, `cream`, `charcoal`, `warm-gray`,
`peach`, `font-serif` display, `font-mono` uppercase tracking labels). No new
colors.

## Integration

- Nav: Blog link in desktop nav, mobile nav, and footer, using `posts.index` and
  `request()->routeIs('posts.*')` for the active state.
- Lang: new `lang/{en,id}/posts.php` (hero, controls, card labels, show page,
  related, empty state). `lang/{en,id}/layout.php` gains `nav.blog` and
  `meta.posts.index` / `meta.posts.show`.
- Sitemap: blog index per locale, plus every `published()` post once, under its own
  locale URL, with hreflang alternates only when a translated sibling exists.
- Factories: `PostFactory`, `PostCategoryFactory`, `PostTagFactory`.
- Seeder: 3 categories, about 8 tags, about 6 posts in studio voice. No invented
  statistics, testimonials, or clients.
- Tests: `PostsPageTest` (published listed, draft hidden, scheduled hidden, filter by
  category and tag), `ShowPostTest` (published 200, draft 404, scheduled 404, related
  posts), `Filament/Resources/PostResourceTest` (list, create, edit, validate,
  delete), plus a sitemap assertion for the blog URLs.

## Constraints inherited from the project

- No em dash in any UI string or lang file.
- No fabricated statistics, testimonials, team members, or clients.
- No emoji as decoration.
- Every nav item points at a section that exists.
- Every interactive element has a real behaviour or is removed.
- WCAG AA contrast on all text.
- Content in studio voice: plain and specific, never "AI-powered" or
  "revolutionary".
