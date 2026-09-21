<?php

namespace Tests\Feature\Filament\Resources;

use App\Filament\Resources\PostCategories\PostCategoryResource;
use App\Filament\Resources\PostCategories\Pages\CreatePostCategory;
use App\Filament\Resources\PostCategories\Pages\EditPostCategory;
use App\Filament\Resources\PostTags\PostTagResource;
use App\Filament\Resources\PostTags\Pages\CreatePostTag;
use App\Models\PostCategory;
use App\Models\PostTag;
use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class PostTaxonomyResourceTest extends TestCase
{
    use LazilyRefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(User::factory()->create());
    }

    public function test_can_list_categories(): void
    {
        PostCategory::factory()->count(3)->create();

        $this->get(PostCategoryResource::getUrl('index'))->assertOk();
    }

    public function test_can_create_a_category(): void
    {
        Livewire::test(CreatePostCategory::class)
            ->fillForm(['name' => 'Craft'])
            ->call('create')
            ->assertHasNoFormErrors();

        $this->assertDatabaseHas('post_categories', ['name' => 'Craft', 'slug' => 'craft']);
    }

    public function test_can_edit_a_category(): void
    {
        $category = PostCategory::factory()->create();

        Livewire::test(EditPostCategory::class, ['record' => $category->slug])
            ->fillForm(['name' => 'Renamed'])
            ->call('save')
            ->assertHasNoFormErrors();

        $this->assertSame('Renamed', $category->fresh()->name);
    }

    public function test_category_name_is_required(): void
    {
        Livewire::test(CreatePostCategory::class)
            ->fillForm(['name' => null])
            ->call('create')
            ->assertHasFormErrors(['name' => 'required']);
    }

    public function test_can_list_tags(): void
    {
        PostTag::factory()->count(3)->create();

        $this->get(PostTagResource::getUrl('index'))->assertOk();
    }

    public function test_can_create_a_tag(): void
    {
        Livewire::test(CreatePostTag::class)
            ->fillForm(['name' => 'Process'])
            ->call('create')
            ->assertHasNoFormErrors();

        $this->assertDatabaseHas('post_tags', ['name' => 'Process', 'slug' => 'process']);
    }

    public function test_tag_name_is_required(): void
    {
        Livewire::test(CreatePostTag::class)
            ->fillForm(['name' => null])
            ->call('create')
            ->assertHasFormErrors(['name' => 'required']);
    }
}
