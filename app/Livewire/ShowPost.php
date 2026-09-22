<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class ShowPost extends Component
{
    public Post $post;

    public function mount(string $slug): void
    {
        $this->post = Post::query()
            ->published()
            ->forLocale()
            ->with(['category', 'tags', 'author'])
            ->where('slug', $slug)
            ->firstOrFail();
    }

    public function related(): Collection
    {
        $tagIds = $this->post->tags->pluck('id')->all();

        return Post::query()
            ->published()
            ->forLocale()
            ->with(['category'])
            ->whereKeyNot($this->post->getKey())
            ->withCount(['tags as shared_tags_count' => fn ($query) => $query->whereIn('post_tags.id', $tagIds)])
            ->orderByDesc('shared_tags_count')
            ->orderByRaw('CASE WHEN category_id = ? THEN 0 ELSE 1 END', [$this->post->category_id])
            ->orderByDesc('published_at')
            ->limit(3)
            ->get();
    }

    public function render()
    {
        $description = $this->post->meta_description ?? $this->post->excerpt(30);

        $translation = $this->post->translation();

        return view('livewire.show-post', [
            'related' => $this->related(),
        ])
            ->layout('layouts.public', [
                'seo' => [
                    'title' => __('layout.meta.posts.show.title', ['post' => $this->post->title]),
                    'description' => $description,
                    'og_title' => $this->post->title,
                    'og_description' => $description,
                    'og_image' => $this->post->coverImageUrl(),
                    'og_type' => 'article',
                    'locale' => $this->post->locale,
                    'translation_url' => $translation
                        ? route('posts.show', ['locale' => $translation->locale, 'slug' => $translation->slug])
                        : null,
                    'json_ld' => [
                        '@context' => 'https://schema.org',
                        '@type' => 'BlogPosting',
                        'headline' => $this->post->title,
                        'description' => $description,
                        'datePublished' => $this->post->published_at?->toIso8601String(),
                        'dateModified' => $this->post->updated_at?->toIso8601String(),
                        'image' => $this->post->coverImageUrl(),
                        'author' => [
                            '@type' => 'Person',
                            'name' => $this->post->author?->name ?? config('app.name'),
                        ],
                        'publisher' => [
                            '@type' => 'Organization',
                            'name' => config('app.name'),
                            'logo' => [
                                '@type' => 'ImageObject',
                                'url' => asset('assets/images/Logo_Landscape.webp'),
                            ],
                        ],
                    ],
                ],
            ]);
    }
}
