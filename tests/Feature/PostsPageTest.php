<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\PostCategory;
use App\Models\PostTag;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class PostsPageTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_blog_index_returns_ok(): void
    {
        $this->get('/en/blog')->assertOk();
    }

    public function test_published_posts_are_listed(): void
    {
        $post = Post::factory()->create(['title' => 'Visible Post Title']);

        $this->get('/en/blog')->assertSee('Visible Post Title');
    }

    public function test_drafts_are_hidden(): void
    {
        $post = Post::factory()->draft()->create(['title' => 'Hidden Draft Title']);

        $this->get('/en/blog')->assertDontSee('Hidden Draft Title');
    }

    public function test_scheduled_posts_are_hidden(): void
    {
        $post = Post::factory()->scheduled()->create(['title' => 'Hidden Scheduled Title']);

        $this->get('/en/blog')->assertDontSee('Hidden Scheduled Title');
    }

    public function test_can_filter_by_category(): void
    {
        $category = PostCategory::factory()->create(['name' => 'Craft', 'slug' => 'craft']);
        $inCategory = Post::factory()->create(['title' => 'In Craft', 'category_id' => $category->id]);
        $other = Post::factory()->create(['title' => 'Outside Craft']);

        $this->get('/en/blog?category=craft')
            ->assertSee('In Craft')
            ->assertDontSee('Outside Craft');
    }

    public function test_can_filter_by_tag(): void
    {
        $tag = PostTag::factory()->create(['name' => 'Process', 'slug' => 'process']);
        $tagged = Post::factory()->create(['title' => 'Tagged Post']);
        $tagged->tags()->attach($tag->id);
        $other = Post::factory()->create(['title' => 'Untagged Post']);

        $this->get('/en/blog?tag=process')
            ->assertSee('Tagged Post')
            ->assertDontSee('Untagged Post');
    }

    public function test_can_search_by_title(): void
    {
        Post::factory()->create(['title' => 'Searchable Needle Post']);
        Post::factory()->create(['title' => 'Unrelated Haystack']);

        $this->get('/en/blog?q=Needle')
            ->assertSee('Searchable Needle Post')
            ->assertDontSee('Unrelated Haystack');
    }

    public function test_blog_index_has_canonical(): void
    {
        $this->get('/en/blog')->assertSee('rel="canonical"', false);
    }
}
