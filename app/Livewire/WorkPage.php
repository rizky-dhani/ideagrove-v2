<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class WorkPage extends Component
{
    use WithPagination;

    public string $sort = 'latest';

    public string $layout = 'grid';

    public int $perPage = 12;

    protected function queryString(): array
    {
        return [
            'sort' => ['except' => 'latest'],
            'layout' => ['except' => 'grid'],
            'perPage' => ['except' => 12],
        ];
    }

    public function updatingSort(): void
    {
        $this->resetPage();
    }

    public function updatingPerPage(): void
    {
        $this->resetPage();
    }

    public function render()
    {
        $projects = Project::query()
            ->when($this->sort === 'name_asc', fn ($q) => $q->orderBy('name', 'asc'))
            ->when($this->sort === 'name_desc', fn ($q) => $q->orderBy('name', 'desc'))
            ->when($this->sort === 'latest', fn ($q) => $q->orderBy('created_at', 'desc'))
            ->when($this->sort === 'oldest', fn ($q) => $q->orderBy('created_at', 'asc'))
            ->paginate($this->perPage);

        return view('livewire.work-page', [
            'projects' => $projects,
        ])
            ->layout('layouts.public', [
                'seo' => [
                    'title' => __('layout.meta.work.title'),
                    'description' => __('layout.meta.work.description'),
                    'og_image' => asset('assets/images/Logo_Landscape.webp'),
                ],
            ]);
    }
}
