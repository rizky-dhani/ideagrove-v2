<?php

namespace Tests\Feature\Filament\Resources;

use App\Filament\Resources\Posts\Pages\CreatePost;
use App\Filament\Resources\Posts\Pages\EditPost;
use App\Filament\Resources\Posts\Pages\ListPosts;
use App\Filament\Resources\Posts\PostResource;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\PostTag;
use App\Models\User;
use Filament\Actions\Testing\TestAction;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class PostResourceTest extends TestCase
{
    use LazilyRefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(User::factory()->create());
    }

    public function test_can_list_posts(): void
    {
        Post::factory()->count(3)->create();

        $this->get(PostResource::getUrl('index'))->assertOk();
    }

    public function test_can_create_a_post(): void
    {
        $category = PostCategory::factory()->create();
        $tag = PostTag::factory()->create();

        Livewire::test(CreatePost::class)
            ->fillForm([
                'title' => 'A Slow Studio Practice',
                'body' => '<p>Content here.</p>',
                'category_id' => $category->id,
                'tags' => [$tag->id],
                'status' => Post::STATUS_PUBLISHED,
                'published_at' => now()->toDateTimeString(),
            ])
            ->call('create')
            ->assertHasNoFormErrors();

        $post = Post::where('slug', 'a-slow-studio-practice')->first();

        $this->assertNotNull($post);
        $this->assertSame($category->id, $post->category_id);
        $this->assertTrue($post->tags->contains($tag->id));
    }

    public function test_can_edit_a_post(): void
    {
        $post = Post::factory()->create();

        Livewire::test(EditPost::class, ['record' => $post->slug])
            ->fillForm(['title' => 'Updated Title'])
            ->call('save')
            ->assertHasNoFormErrors();

        $this->assertSame('Updated Title', $post->fresh()->title);
    }

    public function test_title_and_body_are_required(): void
    {
        Livewire::test(CreatePost::class)
            ->fillForm(['title' => null, 'body' => null])
            ->call('create')
            ->assertHasFormErrors([
                'title' => 'required',
                'body' => 'The body field is required.',
            ]);
    }

    public function test_can_delete_a_post(): void
    {
        $post = Post::factory()->create();

        Livewire::test(ListPosts::class)
            ->callAction(TestAction::make('delete')->table($post));

        $this->assertModelMissing($post);
    }
}
