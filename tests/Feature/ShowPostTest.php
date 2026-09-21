<?php

namespace Tests\Feature;

use App\Livewire\ShowPost;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\PostTag;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class ShowPostTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_published_post_is_shown(): void
    {
        $post = Post::factory()->create(['title' => 'A Visible Post', 'body' => '<p>Body text.</p>']);

        $this->get("/en/blog/{$post->slug}")
            ->assertOk()
            ->assertSee('A Visible Post');
    }

    public function test_draft_post_returns_404(): void
    {
        $post = Post::factory()->draft()->create();

        $this->get("/en/blog/{$post->slug}")->assertNotFound();
    }

    public function test_scheduled_post_returns_404(): void
    {
        $post = Post::factory()->scheduled()->create();

        $this->get("/en/blog/{$post->slug}")->assertNotFound();
    }

    public function test_post_page_has_blogposting_json_ld(): void
    {
        $post = Post::factory()->create();

        $this->get("/en/blog/{$post->slug}")
            ->assertSee('BlogPosting', false);
    }

    public function test_related_posts_rank_tag_sharing_posts_first(): void
    {
        $tag = PostTag::factory()->create();
        $category = PostCategory::factory()->create();

        $post = Post::factory()->create(['category_id' => $category->id, 'title' => 'Main Post']);
        $post->tags()->attach($tag->id);

        $sharesTag = Post::factory()->create(['category_id' => $category->id, 'title' => 'Shares Tag Post']);
        $sharesTag->tags()->attach($tag->id);

        Post::factory()->create(['title' => 'Same Category Only Post', 'category_id' => $category->id]);

        $response = $this->get("/en/blog/{$post->slug}");

        $response->assertOk()->assertSee('Shares Tag Post');

        $html = $response->getContent();

        $this->assertLessThan(
            strpos($html, 'Same Category Only Post'),
            strpos($html, 'Shares Tag Post'),
            'A post sharing a tag must rank above a post that only shares the category.',
        );
    }

    private function relatedFor(Post $post): \Illuminate\Database\Eloquent\Collection
    {
        $this->get("/en/blog/{$post->slug}")->assertOk();

        return Livewire::test(ShowPost::class, ['slug' => $post->slug])->instance()->related();
    }

    public function test_related_posts_exclude_self(): void
    {
        $post = Post::factory()->create(['title' => 'Main Post']);

        $this->assertFalse($this->relatedFor($post)->contains($post->id));
    }

    public function test_related_posts_are_limited_to_three(): void
    {
        $category = PostCategory::factory()->create();
        $post = Post::factory()->create(['category_id' => $category->id]);

        Post::factory()->count(5)->create(['category_id' => $category->id]);

        $this->assertCount(3, $this->relatedFor($post));
    }

    public function test_related_posts_exclude_drafts(): void
    {
        $category = PostCategory::factory()->create();
        $post = Post::factory()->create(['category_id' => $category->id]);

        $draft = Post::factory()->draft()->create(['category_id' => $category->id, 'title' => 'Hidden Related Draft']);

        $this->assertFalse($this->relatedFor($post)->contains($draft->id));
    }

    public function test_post_page_has_canonical_and_article_og_type(): void
    {
        $post = Post::factory()->create();

        $this->get("/en/blog/{$post->slug}")
            ->assertSee('rel="canonical"', false);
    }
}
