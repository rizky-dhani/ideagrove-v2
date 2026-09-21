<?php

namespace App\Models;

use Database\Factories\PostTagFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

#[Fillable(['name', 'slug'])]
class PostTag extends Model
{
    /** @use HasFactory<PostTagFactory> */
    use HasFactory;

    protected static function booted(): void
    {
        static::creating(function (PostTag $tag) {
            if (! $tag->slug) {
                $tag->slug = Str::slug($tag->name);
            }

            $slug = $tag->slug;
            $n = 1;
            while (static::where('slug', $tag->slug)->exists()) {
                $tag->slug = $slug.'-'.(++$n);
            }
        });
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }
}
