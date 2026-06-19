<?php

namespace App\Models;

use Database\Factories\ProjectFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'client_name', 'description', 'image', 'web_url'])]
class Project extends Model
{
    /** @use HasFactory<ProjectFactory> */
    use HasFactory;

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

    public function excerpt(int $words = 50): string
    {
        return str($this->description)->words($words);
    }
}
