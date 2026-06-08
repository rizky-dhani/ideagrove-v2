<?php

namespace Tests\Feature\Filament\Resources;

use App\Filament\Resources\ProjectResource;
use App\Models\Project;
use App\Models\User;
use Filament\Actions\Testing\TestAction;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class ProjectResourceTest extends TestCase
{
    use LazilyRefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(User::factory()->create());
    }

    public function test_can_list_projects(): void
    {
        $projects = Project::factory()->count(3)->create();

        $this->get(ProjectResource::getUrl('index'))
            ->assertOk();
    }

    public function test_can_create_a_project(): void
    {
        $data = Project::factory()->make();

        Livewire::test(ProjectResource\Pages\CreateProject::class)
            ->fillForm([
                'name' => $data->name,
                'client_name' => $data->client_name,
                'description' => $data->description,
            ])
            ->call('create')
            ->assertNotified()
            ->assertHasNoFormErrors()
            ->assertRedirect();

        $this->assertDatabaseHas(Project::class, [
            'name' => $data->name,
            'client_name' => $data->client_name,
            'description' => $data->description,
        ]);
    }

    public function test_can_edit_a_project(): void
    {
        $project = Project::factory()->create();

        Livewire::test(ProjectResource\Pages\EditProject::class, ['record' => $project->id])
            ->fillForm([
                'name' => 'Updated Name',
                'client_name' => 'Updated Client',
            ])
            ->call('save')
            ->assertNotified()
            ->assertHasNoFormErrors();

        $project->refresh();

        $this->assertEquals('Updated Name', $project->name);
        $this->assertEquals('Updated Client', $project->client_name);
    }

    public function test_validates_required_fields(): void
    {
        Livewire::test(ProjectResource\Pages\CreateProject::class)
            ->fillForm([
                'name' => null,
                'client_name' => null,
            ])
            ->call('create')
            ->assertHasFormErrors([
                'name' => 'required',
                'client_name' => 'required',
            ]);
    }

    public function test_can_delete_a_project(): void
    {
        $project = Project::factory()->create();

        Livewire::test(ProjectResource\Pages\ListProjects::class)
            ->callAction(TestAction::make('delete')->table($project));

        $this->assertModelMissing($project);
    }
}
