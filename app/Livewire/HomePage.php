<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\Project;
use Livewire\Component;

class HomePage extends Component
{
    public function with(): array
    {
        return [
            'projects' => Project::query()
                ->orderBy('created_at', 'desc')
                ->take(6)
                ->get(),
            'posts' => Post::query()
                ->published()
                ->forLocale()
                ->with('category')
                ->orderByDesc('published_at')
                ->take(6)
                ->get(),
        ];
    }

    public function render()
    {
        return view('livewire.home-page')
            ->layout('layouts.public', [
                'seo' => [
                    'title' => __('layout.meta.home.title'),
                    'description' => __('layout.meta.home.description'),
                ],
            ]);
    }
}
