<?php

namespace Tests\Feature;

use App\Models\Project;
use Tests\TestCase;

class SeoSmokeTest extends TestCase
{
    public function test_home_page_has_canonical_and_hreflang(): void
    {
        $response = $this->get('/en');

        $response->assertStatus(200);
        $response->assertSee('rel="canonical"', false);
        $response->assertSee('hreflang="en"', false);
        $response->assertSee('hreflang="id"', false);
        $response->assertSee('hreflang="x-default"', false);
    }

    public function test_home_page_has_og_tags(): void
    {
        $response = $this->get('/en');

        $response->assertStatus(200);
        $response->assertSee('og:title', false);
        $response->assertSee('og:description', false);
        $response->assertSee('og:type', false);
        $response->assertSee('og:url', false);
        $response->assertSee('og:site_name', false);
    }

    public function test_home_page_has_json_ld(): void
    {
        $response = $this->get('/en');

        $response->assertStatus(200);
        $response->assertSee('application/ld+json', false);
        $response->assertSee('Organization', false);
    }

    public function test_project_page_has_canonical_and_og_image(): void
    {
        $project = Project::factory()->create(['image' => 'projects/test.jpg']);

        $response = $this->get("/en/work/{$project->slug}");

        $response->assertStatus(200);
        $response->assertSee('rel="canonical"', false);
        $response->assertSee('og:image', false);
    }

    public function test_sitemap_returns_xml(): void
    {
        Project::factory()->count(2)->create();

        $response = $this->get('/sitemap.xml');

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/xml');
        $response->assertSee('urlset', false);
        $response->assertSee('hreflang', false);
    }

    public function test_404_page_returns_404(): void
    {
        $response = $this->get('/nonexistent-page');

        $response->assertStatus(404);
        $response->assertSee('404', false);
    }

    public function test_home_page_has_title_and_description(): void
    {
        $response = $this->get('/en');

        $response->assertStatus(200);
        $response->assertSee('<title>', false);
        $response->assertSee('meta name="description"', false);
    }
}
