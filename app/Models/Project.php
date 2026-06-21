<?php

namespace App\Models;

use Database\Factories\ProjectFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

#[Fillable(['name', 'slug', 'client_name', 'description', 'meta_description', 'image', 'web_url'])]
class Project extends Model
{
    /** @use HasFactory<ProjectFactory> */
    use HasFactory;

    protected static function booted(): void
    {
        static::creating(function (Project $project) {
            if (! $project->slug) {
                $project->slug = Str::slug($project->name);
            }

            $slug = $project->slug;
            $n = 1;
            while (static::withoutGlobalScopes()->where('slug', $project->slug)->exists()) {
                $project->slug = $slug.'-'.(++$n);
            }
        });
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    protected function casts(): array
    {
        return [
            'description' => 'string',
        ];
    }

    public function imageUrl(): ?string
    {
        return $this->image
            ? asset('storage/'.$this->image)
            : null;
    }

    public function seoImageUrl(): ?string
    {
        return $this->image ? url('storage/'.$this->image) : null;
    }

    public function excerpt(int $words = 50): string
    {
        return str($this->description)->words($words);
    }
}
