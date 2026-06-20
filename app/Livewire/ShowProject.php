<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;

class ShowProject extends Component
{
    public Project $project;

    public function mount(Project $project): void
    {
        $this->project = $project;
    }

    public function render()
    {
        $description = str($this->project->description)->limit(160);

        return view('livewire.show-project')
            ->layout('layouts.public', [
                'seo' => [
                    'title' => __('layout.meta.project.title', ['project' => $this->project->name]),
                    'description' => $description,
                    'og_title' => $this->project->name,
                    'og_description' => $description,
                    'og_image' => $this->project->seoImageUrl(),
                ],
            ]);
    }
}
