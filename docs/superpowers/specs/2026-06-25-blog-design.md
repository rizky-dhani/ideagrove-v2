# Blog: design spec

Date: 2026-06-25
Status: approved design, awaiting implementation plan
Scope: public blog pages plus Filament admin resources for The Idea Grove Studio site.

## Purpose

Add a blog to the site: public index and detail pages under the existing
locale-prefixed routes, and Filament resources so the studio can write and manage
posts, categories, and tags from the admin panel.

Single-language posts. One post row serves both `/en/blog/{slug}` and
`/id/blog/{slug}`. The body is not translated; only the surrounding chrome and UI
labels come from the lang files.

## Non-goals

- No per-locale post translations. One body, both locales.
- No revisions. Post history is `updated_at` only.
- No RSS feed.
- No comments.
- No media library beyond the single cover image per post.

## Data model

Four tables. Prefix is `posts_*` for the taxonomy tables, `posts` for the post.

### `posts_categories`

| column | type | notes |
| --- | --- | --- |
| `id` | id | |
| `name` | string | |
| `slug` | string, unique, nullable | auto from name, `-2` suffix on clash |
| `description` | text, nullable | |
| `timestamps` | | |

### `posts_tags`

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
| `posts_category_id` | FK `posts_categories`, nullable | `nullOnDelete`; one category per post |
| `author_id` | FK `users`, nullable | `nullOnDelete` |
| `status` | string | `draft` \| `published`, default `draft` |
| `published_at` | timestamp, nullable | future date plus `published` status means scheduled |
| `is_featured` | boolean | default false |
| `meta_description` | text, nullable | |
| `timestamps` | | |

### `posts_tags_pivot`

`post_id` FK cascade on delete, `tag_id` FK cascade on delete, composite unique on
the pair.

### Relations

- `Post::category()` belongsTo `PostCategory`
- `Post::author()` belongsTo `User`
- `Post::tags()` belongsToMany `PostTag` via `posts_tags_pivot`
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
- `posts_category_id` — Select relationship, nullable
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

Resolves with the published scope so draft and future-scheduled slugs 404:
`Post::published()->where('slug', $slug)->firstOrFail()`, no implicit route binding.
Renders cover, title, meta row (author, date, reading time), category and tag links
back to the filtered index, body in a prose container, related posts, and a
back-to-blog link.

### SEO

Both components pass a `seo` array to `layouts.public`. `ShowPost` adds
`BlogPosting` JSON-LD (headline, datePublished, author, image, publisher) and
`og:type` `article`.

Styling uses existing tokens only (`brand`, `cream`, `charcoal`, `warm-gray`,
`peach`, `font-serif` display, `font-mono` uppercase tracking labels). No new
colors.

## Integration

- Nav: Blog link in desktop nav, mobile nav, and footer, using `posts.index` and
  `request()->routeIs('posts.*')` for the active state.
- Lang: new `lang/{en,id}/posts.php` (hero, controls, card labels, show page,
  related, empty state). `lang/{en,id}/layout.php` gains `nav.blog` and
  `meta.posts.index` / `meta.posts.show`.
- Sitemap: blog index per locale, plus every `published()` post per locale with
  hreflang alternates.
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
