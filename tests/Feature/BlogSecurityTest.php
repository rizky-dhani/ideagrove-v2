<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class BlogSecurityTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_post_body_is_sanitized_against_script_injection(): void
    {
        $post = Post::factory()->create([
            'body' => '<p>Safe copy.</p><script>alert(1)</script>',
        ]);

        $html = $this->get("/en/blog/{$post->slug}")->assertOk()->getContent();

        $this->assertStringNotContainsString('<script>alert(1)</script>', $html);
        $this->assertStringContainsString('Safe copy.', $html);
    }

    public function test_post_body_is_sanitized_against_event_handlers(): void
    {
        $post = Post::factory()->create([
            'body' => '<img src=x onerror="alert(1)"><p>Body</p>',
        ]);

        $html = $this->get("/en/blog/{$post->slug}")->assertOk()->getContent();

        $this->assertStringNotContainsString('onerror', $html);
    }

    public function test_post_body_is_sanitized_against_javascript_urls(): void
    {
        $post = Post::factory()->create([
            'body' => '<a href="javascript:alert(1)">click</a>',
        ]);

        $html = $this->get("/en/blog/{$post->slug}")->assertOk()->getContent();

        $this->assertStringNotContainsString('javascript:', $html);
    }

    public function test_json_ld_cannot_break_out_of_script_tag(): void
    {
        $post = Post::factory()->create([
            'title' => 'x</script><script>alert(1)</script>',
        ]);

        $html = $this->get("/en/blog/{$post->slug}")->assertOk()->getContent();

        $this->assertStringNotContainsString('</script><script>alert(1)</script>', $html);
        $this->assertStringNotContainsString('<script>alert(1)</script>', $html);
    }

    public function test_json_ld_still_contains_blogposting(): void
    {
        $post = Post::factory()->create();

        $this->get("/en/blog/{$post->slug}")->assertOk()->assertSee('BlogPosting', false);
    }
}
