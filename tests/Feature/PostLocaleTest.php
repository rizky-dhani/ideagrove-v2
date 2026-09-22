<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class PostLocaleTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_index_shows_only_current_locale_posts(): void
    {
        Post::factory()->create(['title' => 'English Post Title', 'locale' => 'en']);
        Post::factory()->create(['title' => 'Judul Tulisan Indonesia', 'locale' => 'id']);

        $this->get('/en/blog')
            ->assertSee('English Post Title')
            ->assertDontSee('Judul Tulisan Indonesia');

        $this->get('/id/blog')
            ->assertSee('Judul Tulisan Indonesia')
            ->assertDontSee('English Post Title');
    }

    public function test_detail_page_hides_post_from_other_locale(): void
    {
        $post = Post::factory()->create(['title' => 'English Only', 'locale' => 'en']);

        $this->get('/id/blog/'.$post->slug)->assertNotFound();
        $this->get('/en/blog/'.$post->slug)->assertOk();
    }

    public function test_same_slug_can_exist_in_both_locales(): void
    {
        Post::factory()->create(['title' => 'Cost Guide', 'slug' => 'cost-guide', 'locale' => 'en']);
        Post::factory()->create(['title' => 'Panduan Biaya', 'slug' => 'cost-guide', 'locale' => 'id']);

        $this->get('/en/blog/cost-guide')->assertSee('Cost Guide');
        $this->get('/id/blog/cost-guide')->assertSee('Panduan Biaya');
    }

    public function test_slug_autogeneration_is_unique_per_locale(): void
    {
        $en = Post::factory()->create(['title' => 'Same Title', 'locale' => 'en']);
        $id = Post::factory()->create(['title' => 'Same Title', 'locale' => 'id']);

        $this->assertSame('same-title', $en->slug);
        $this->assertSame('same-title', $id->slug);
    }

    public function test_slug_clash_within_locale_still_suffixed(): void
    {
        Post::factory()->create(['title' => 'Same Title', 'locale' => 'en']);
        $second = Post::factory()->create(['title' => 'Same Title', 'locale' => 'en']);

        $this->assertSame('same-title-2', $second->slug);
    }

    public function test_locale_defaults_to_app_locale(): void
    {
        $post = Post::factory()->create(['title' => 'Default Locale Post']);

        $this->assertSame('en', $post->locale);
    }

    public function test_related_posts_are_locale_scoped(): void
    {
        $category = PostCategory::factory()->create();

        $post = Post::factory()->create([
            'title' => 'Main English Post',
            'locale' => 'en',
            'category_id' => $category->id,
        ]);

        Post::factory()->create([
            'title' => 'Related English',
            'locale' => 'en',
            'category_id' => $category->id,
        ]);

        Post::factory()->create([
            'title' => 'Related Indonesian',
            'locale' => 'id',
            'category_id' => $category->id,
        ]);

        $this->get('/en/blog/'.$post->slug)
            ->assertSee('Related English')
            ->assertDontSee('Related Indonesian');
    }

    public function test_sitemap_lists_each_post_under_its_own_locale_only(): void
    {
        Post::factory()->create(['title' => 'EN Sitemap Post', 'slug' => 'en-sitemap-post', 'locale' => 'en']);
        Post::factory()->create(['title' => 'ID Sitemap Post', 'slug' => 'id-sitemap-post', 'locale' => 'id']);

        $response = $this->get('/sitemap.xml')->assertOk();

        $body = $response->getContent();

        $this->assertStringContainsString('/en/blog/en-sitemap-post', $body);
        $this->assertStringContainsString('/id/blog/id-sitemap-post', $body);
        $this->assertStringNotContainsString('/id/blog/en-sitemap-post', $body);
        $this->assertStringNotContainsString('/en/blog/id-sitemap-post', $body);
    }

    public function test_translation_key_links_locale_variants_for_hreflang(): void
    {
        Post::factory()->create([
            'title' => 'English Cost Guide',
            'slug' => 'cost-guide',
            'locale' => 'en',
            'translation_key' => 'cost-guide-2026',
        ]);

        Post::factory()->create([
            'title' => 'Panduan Biaya',
            'slug' => 'panduan-biaya',
            'locale' => 'id',
            'translation_key' => 'cost-guide-2026',
        ]);

        $this->get('/en/blog/cost-guide')
            ->assertSee(url('/id/blog/panduan-biaya'), false)
            ->assertSee('hreflang="id"', false);

        $this->get('/id/blog/panduan-biaya')
            ->assertSee(url('/en/blog/cost-guide'), false);
    }

    public function test_untranslated_post_points_hreflang_at_itself(): void
    {
        $post = Post::factory()->create([
            'title' => 'Solo Post',
            'slug' => 'solo-post',
            'locale' => 'en',
        ]);

        $this->get('/en/blog/'.$post->slug)
            ->assertSee(url('/en/blog/solo-post'), false);
    }
}
