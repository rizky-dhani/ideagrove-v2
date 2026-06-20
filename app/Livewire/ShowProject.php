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
        return view('livewire.show-project')
            ->layout('layouts.public', [
                'meta' => implode("\n", [
                    '<title>'.__('layout.meta.project.title', ['project' => $this->project->name]).'</title>',
                    '<meta name="description" content="'.e(str($this->project->description)->limit(160)).'">',
                    '<meta property="og:title" content="'.e($this->project->name).'">',
                    '<meta property="og:description" content="'.e(str($this->project->description)->limit(160)).'">',
                    $this->project->image
                        ? '<meta property="og:image" content="'.e($this->project->imageUrl()).'">'
                        : '',
                ]),
            ]);
    }
}
