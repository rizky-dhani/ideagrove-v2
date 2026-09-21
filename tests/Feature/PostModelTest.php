<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\PostCategory;
use App\Models\PostTag;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class PostModelTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_post_generates_slug_from_title(): void
    {
        $post = Post::factory()->create(['title' => 'A Slow Studio Practice']);

        $this->assertSame('a-slow-studio-practice', $post->slug);
    }

    public function test_post_slug_is_unique_on_clash(): void
    {
        $first = Post::factory()->create(['title' => 'Same Title']);
        $second = Post::factory()->create(['title' => 'Same Title']);

        $this->assertSame('same-title', $first->slug);
        $this->assertSame('same-title-2', $second->slug);
    }

    public function test_published_scope_excludes_drafts(): void
    {
        $draft = Post::factory()->draft()->create();
        $published = Post::factory()->create();

        $ids = Post::published()->pluck('id');

        $this->assertFalse($ids->contains($draft->id));
        $this->assertTrue($ids->contains($published->id));
    }

    public function test_published_scope_excludes_future_scheduled(): void
    {
        $scheduled = Post::factory()->scheduled()->create();

        $this->assertFalse(Post::published()->pluck('id')->contains($scheduled->id));
        $this->assertTrue(Post::scheduled()->pluck('id')->contains($scheduled->id));
    }

    public function test_published_scope_includes_published_post_without_date(): void
    {
        $post = Post::factory()->create(['status' => Post::STATUS_PUBLISHED, 'published_at' => null]);

        $this->assertTrue(Post::published()->pluck('id')->contains($post->id));
    }

    public function test_scheduled_scope_excludes_post_dated_now(): void
    {
        $post = Post::factory()->create(['status' => Post::STATUS_PUBLISHED, 'published_at' => now()]);

        $this->assertFalse(Post::scheduled()->pluck('id')->contains($post->id));
        $this->assertTrue(Post::published()->pluck('id')->contains($post->id));
    }

    public function test_reading_time_returns_minimum_one(): void
    {
        $post = Post::factory()->create(['body' => '<p></p>']);

        $this->assertSame(1, $post->readingTime());
    }

    public function test_reading_time_counts_words(): void
    {
        $post = Post::factory()->create(['body' => '<p>'.str_repeat('word ', 400).'</p>']);

        $this->assertSame(2, $post->readingTime());
    }

    public function test_excerpt_falls_back_to_body(): void
    {
        $post = Post::factory()->create(['excerpt' => null, 'body' => '<p>One two three four five</p>']);

        $this->assertSame('One two three four five', $post->excerpt());
    }

    public function test_post_has_category_and_tags(): void
    {
        $category = PostCategory::factory()->create(['name' => 'Craft']);
        $tag = PostTag::factory()->create(['name' => 'Process']);
        $post = Post::factory()->create(['category_id' => $category->id]);
        $post->tags()->attach($tag->id);

        $this->assertSame('Craft', $post->fresh()->category->name);
        $this->assertSame('Process', $post->fresh()->tags->first()->name);
    }

    public function test_deleting_category_keeps_its_posts(): void
    {
        $category = PostCategory::factory()->create();
        $post = Post::factory()->create(['category_id' => $category->id]);

        $category->delete();

        $this->assertModelExists($post);
        $this->assertNull($post->fresh()->category_id);
    }
}
