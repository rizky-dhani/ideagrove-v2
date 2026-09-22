<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class HomePageBlogTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_home_page_shows_published_posts(): void
    {
        Post::factory()->create(['title' => 'Homepage Visible Post']);

        $this->get('/en')->assertSee('Homepage Visible Post');
    }

    public function test_home_page_hides_drafts(): void
    {
        Post::factory()->draft()->create(['title' => 'Homepage Hidden Draft']);

        $this->get('/en')->assertDontSee('Homepage Hidden Draft');
    }

    public function test_home_page_hides_scheduled_posts(): void
    {
        Post::factory()->scheduled()->create(['title' => 'Homepage Hidden Scheduled']);

        $this->get('/en')->assertDontSee('Homepage Hidden Scheduled');
    }

    public function test_home_page_caps_the_grid_at_six_posts(): void
    {
        Post::factory()->count(7)->create(['title' => 'Filler post title']);

        $post = Post::factory()->create([
            'title' => 'Oldest Post Title',
            'published_at' => now()->subYear(),
        ]);

        $this->get('/en')->assertDontSee($post->title);
    }

    public function test_home_page_only_shows_posts_for_the_active_locale(): void
    {
        Post::factory()->locale('id')->create(['title' => 'Indonesian Only Post']);

        $this->get('/en')->assertDontSee('Indonesian Only Post');
        $this->get('/id')->assertSee('Indonesian Only Post');
    }

    public function test_home_page_blog_grid_shows_the_post_category(): void
    {
        $category = PostCategory::factory()->create(['name' => 'Craft Notes']);
        Post::factory()->create(['title' => 'Categorised Post', 'category_id' => $category->id]);

        $this->get('/en')->assertSee('Craft Notes');
    }

    public function test_home_page_blog_cta_links_to_the_blog_index(): void
    {
        $this->get('/en')->assertSee(route('posts.index', ['locale' => 'en']), false);
    }

    public function test_home_page_blog_section_renders_an_empty_state(): void
    {
        $this->get('/en')
            ->assertOk()
            ->assertSee(__('home.blog.empty'));
    }
}
