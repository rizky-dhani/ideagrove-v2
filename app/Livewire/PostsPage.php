<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\PostCategory;
use App\Models\PostTag;
use Livewire\Component;
use Livewire\WithPagination;

class PostsPage extends Component
{
    use WithPagination;

    public string $sort = 'latest';

    public ?string $category = null;

    public ?string $tag = null;

    public string $q = '';

    public int $perPage = 9;

    protected function queryString(): array
    {
        return [
            'sort' => ['except' => 'latest'],
            'category' => ['except' => ''],
            'tag' => ['except' => ''],
            'q' => ['except' => ''],
        ];
    }

    public function updatingSort(): void
    {
        $this->resetPage();
    }

    public function updatingCategory(): void
    {
        $this->resetPage();
    }

    public function updatingTag(): void
    {
        $this->resetPage();
    }

    public function updatingQ(): void
    {
        $this->resetPage();
    }

    public function render()
    {
        $posts = Post::query()
            ->published()
            ->forLocale()
            ->with(['category', 'tags', 'author'])
            ->when($this->category, fn ($query) => $query->whereHas(
                'category',
                fn ($q) => $q->where('slug', $this->category)
            ))
            ->when($this->tag, fn ($query) => $query->whereHas(
                'tags',
                fn ($q) => $q->where('slug', $this->tag)
            ))
            ->when($this->q !== '', fn ($query) => $query->where(
                fn ($q) => $q->where('title', 'like', '%'.$this->q.'%')
                    ->orWhere('body', 'like', '%'.$this->q.'%')
            ))
            ->when(
                $this->sort === 'oldest',
                fn ($query) => $query->orderBy('published_at'),
                fn ($query) => $query->orderByDesc('published_at')
            )
            ->paginate($this->perPage)
            ->withQueryString();

        return view('livewire.posts-page', [
            'posts' => $posts,
            'categories' => PostCategory::orderBy('name')->get(),
            'tags' => PostTag::orderBy('name')->get(),
        ])
            ->layout('layouts.public', [
                'seo' => [
                    'title' => __('layout.meta.posts.index.title'),
                    'description' => __('layout.meta.posts.index.description'),
                    'og_image' => asset('assets/images/Logo_Landscape.webp'),
                ],
                'prevUrl' => $posts->previousPageUrl(),
                'nextUrl' => $posts->nextPageUrl(),
            ]);
    }
}
