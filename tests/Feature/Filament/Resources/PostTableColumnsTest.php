<?php

namespace Tests\Feature\Filament\Resources;

use App\Filament\Resources\Posts\Pages\ListPosts;
use App\Filament\Resources\Posts\PostResource;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\User;
use Filament\Tables\Table;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class PostTableColumnsTest extends TestCase
{
    use LazilyRefreshDatabase;

    /** @return array<string> */
    private function columnNames(): array
    {
        $table = PostResource::table(Table::make(Livewire::test(ListPosts::class)->instance()));

        return array_map(
            fn ($column): string => $column->getName(),
            $table->getColumns(),
        );
    }

    public function test_table_has_a_tags_column(): void
    {
        $this->actingAs(User::factory()->create());

        $this->assertContains('tags.name', $this->columnNames());
    }

    public function test_table_has_an_author_column(): void
    {
        $this->actingAs(User::factory()->create());

        $this->assertContains('author.name', $this->columnNames());
    }

    public function test_tags_column_renders_tag_names(): void
    {
        $tag = PostTag::factory()->create(['name' => 'Distinctive Tag Name']);
        $post = Post::factory()->create();
        $post->tags()->attach($tag->id);

        $this->actingAs(User::factory()->create());

        $this->get(PostResource::getUrl('index'))
            ->assertOk()
            ->assertSee('Distinctive Tag Name');
    }

    public function test_author_column_renders_author_name(): void
    {
        $this->actingAs(User::factory()->create(['name' => 'Studio Author']));

        Post::factory()->create();

        $this->get(PostResource::getUrl('index'))
            ->assertOk()
            ->assertSee('Studio Author');
    }
}
