<?php

namespace App\Livewire;

use App\Models\Project;
use Illuminate\Http\Exceptions\HttpResponseException;
use Livewire\Component;

class ShowProject extends Component
{
    public Project $project;

    public function mount(Project $project): void
    {
        // Serve static file for projects with local web_url
        if ($project->web_url && str_starts_with($project->web_url, '/')) {
            throw new HttpResponseException(redirect($project->web_url));
        }

        $this->project = $project;
    }

    public function render()
    {
        if (! isset($this->project)) {
            return view('components.empty');
        }

        $description = $this->project->meta_description ?? str($this->project->description)->limit(160);

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
