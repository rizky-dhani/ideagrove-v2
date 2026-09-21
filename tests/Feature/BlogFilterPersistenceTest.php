<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class BlogFilterPersistenceTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_pagination_links_preserve_category_filter(): void
    {
        $category = PostCategory::factory()->create(['name' => 'Craft', 'slug' => 'craft']);

        Post::factory()->count(12)->create(['category_id' => $category->id]);
        Post::factory()->count(3)->create();

        $html = $this->get('/en/blog?category=craft')->assertOk()->getContent();

        $this->assertStringContainsString('page=2', $html);
        $this->assertMatchesRegularExpression('/href="[^"]*category=craft[^"]*page=2/', $html);
    }

    public function test_pagination_links_preserve_search_query(): void
    {
        Post::factory()->count(12)->create(['title' => 'Needle Post']);

        $html = $this->get('/en/blog?q=Needle')->assertOk()->getContent();

        $this->assertMatchesRegularExpression('/href="[^"]*q=Needle[^"]*page=2/', $html);
    }

    public function test_detail_page_category_is_a_link_to_filtered_index(): void
    {
        $category = PostCategory::factory()->create(['name' => 'Craft', 'slug' => 'craft']);
        $post = Post::factory()->create(['category_id' => $category->id]);

        $html = $this->get("/en/blog/{$post->slug}")->assertOk()->getContent();

        $this->assertStringContainsString('category=craft', $html);
    }
}
