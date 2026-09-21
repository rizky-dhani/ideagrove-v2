<?php

namespace App\Models;

use Database\Factories\PostFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

#[Fillable([
    'title', 'slug', 'excerpt', 'body', 'cover_image', 'category_id',
    'author_id', 'status', 'published_at', 'is_featured', 'meta_description',
])]
class Post extends Model
{
    /** @use HasFactory<PostFactory> */
    use HasFactory;

    public const STATUS_DRAFT = 'draft';

    public const STATUS_PUBLISHED = 'published';

    protected static function booted(): void
    {
        static::creating(function (Post $post) {
            if (! $post->slug) {
                $post->slug = Str::slug($post->title);
            }

            $slug = $post->slug;
            $n = 1;
            while (static::where('slug', $post->slug)->exists()) {
                $post->slug = $slug.'-'.(++$n);
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
            'published_at' => 'datetime',
            'is_featured' => 'boolean',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(PostCategory::class, 'post_category_id');
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(PostTag::class);
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query
            ->where('status', self::STATUS_PUBLISHED)
            ->where(fn (Builder $q) => $q->whereNull('published_at')->orWhere('published_at', '<=', now()));
    }

    public function scopeScheduled(Builder $query): Builder
    {
        return $query
            ->where('status', self::STATUS_PUBLISHED)
            ->where('published_at', '>', now());
    }

    public function isScheduled(): bool
    {
        return $this->status === self::STATUS_PUBLISHED
            && $this->published_at !== null
            && $this->published_at->isFuture();
    }

    public function readingTime(): int
    {
        $words = str_word_count(strip_tags((string) $this->body));

        return max(1, (int) ceil($words / 200));
    }

    public function excerpt(int $words = 40): string
    {
        return $this->excerpt
            ?: (string) str(strip_tags((string) $this->body))->words($words);
    }

    public function coverImageUrl(): ?string
    {
        return $this->cover_image ? asset('storage/'.$this->cover_image) : null;
    }
}
