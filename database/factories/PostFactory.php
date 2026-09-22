<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\PostCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->unique()->sentence(4),
            'locale' => 'en',
            'excerpt' => $this->faker->sentence(),
            'body' => '<p>'.$this->faker->paragraph().'</p>',
            'status' => Post::STATUS_PUBLISHED,
            'published_at' => now()->subDay(),
            'is_featured' => false,
            'author_id' => User::factory(),
            'category_id' => PostCategory::factory(),
        ];
    }

    public function draft(): static
    {
        return $this->state(fn (): array => [
            'status' => Post::STATUS_DRAFT,
            'published_at' => null,
        ]);
    }

    public function scheduled(): static
    {
        return $this->state(fn (): array => [
            'status' => Post::STATUS_PUBLISHED,
            'published_at' => now()->addWeek(),
        ]);
    }

    public function locale(string $locale): static
    {
        return $this->state(fn (): array => ['locale' => $locale]);
    }
}
