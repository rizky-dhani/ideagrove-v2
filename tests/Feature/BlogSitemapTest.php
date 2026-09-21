<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class BlogSitemapTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_sitemap_lists_blog_index(): void
    {
        $this->get('/sitemap.xml')
            ->assertOk()
            ->assertSee('/en/blog', false)
            ->assertSee('/id/blog', false);
    }

    public function test_sitemap_lists_published_posts_only(): void
    {
        $published = Post::factory()->create(['slug' => 'visible-post']);
        $draft = Post::factory()->draft()->create(['slug' => 'hidden-draft']);

        $response = $this->get('/sitemap.xml');

        $response->assertSee('/en/blog/visible-post', false);
        $response->assertDontSee('hidden-draft', false);
    }
}
