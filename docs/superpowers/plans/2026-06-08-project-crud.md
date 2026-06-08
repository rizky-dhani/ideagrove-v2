# Project CRUD Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Add CRUD management for projects in the Filament admin panel with name, client_name, and description fields.

**Architecture:** Edit the pending migration to add columns, update the Project model, generate and customize a Filament resource, and add a resource test.

**Tech Stack:** Laravel 13, Filament v5, PHPUnit

---

### Task 1: Update Migration

**Files:**
- Modify: `database/migrations/2026_06_08_024310_create_projects_table.php`

- [ ] **Step 1: Add columns to the migration**

Edit the `create_projects_table` migration to add `name`, `client_name`, and `description` columns:

```php
Schema::create('projects', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('client_name');
    $table->text('description')->nullable();
    $table->timestamps();
});
```

- [ ] **Step 2: Run the migration**

Run: `php artisan migrate`
Expected: Migration ran successfully, projects table created.

- [ ] **Step 3: Verify the table**

Run: `php artisan db:show --table=projects`
Expected: Shows columns: id, name, client_name, description, created_at, updated_at.

- [ ] **Step 4: Commit**

```bash
git add database/migrations/2026_06_08_024310_create_projects_table.php
git commit -m "feat: add name, client_name, description to projects table"
```

---

### Task 2: Update Project Model

**Files:**
- Modify: `app/Models/Project.php`

- [ ] **Step 1: Add fillable attributes and optional casts**

Edit `app/Models/Project.php`:

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'client_name',
        'description',
    ];
}
```

- [ ] **Step 2: Commit**

```bash
git add app/Models/Project.php
git commit -m "feat: add fillable attributes to Project model"
```

---

### Task 3: Generate and Customize Filament Resource

**Files:**
- Create: `app/Filament/Resources/ProjectResource.php`
- Create: `app/Filament/Resources/ProjectResource/Pages/ListProjects.php`
- Create: `app/Filament/Resources/ProjectResource/Pages/CreateProject.php`
- Create: `app/Filament/Resources/ProjectResource/Pages/EditProject.php`

- [ ] **Step 1: Generate the resource**

Run: `php artisan make:filament-resource Project --no-interaction`
Expected: Resource and pages created under `app/Filament/Resources/ProjectResource/`.

- [ ] **Step 2: Customize the resource form and table**

Edit `app/Filament/Resources/ProjectResource.php`:

```php
<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Models\Project;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Support\Icons\Heroicon;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('client_name')
                    ->required()
                    ->maxLength(255),
                Textarea::make('description')
                    ->nullable()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('client_name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('description')
                    ->limit(50)
                    ->toggleable(),
                TextColumn::make('created_at')
                    ->date()
                    ->sortable()
                    ->toggleable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
```

- [ ] **Step 3: Commit**

```bash
git add app/Filament/Resources/
git commit -m "feat: add Filament ProjectResource with CRUD"
```

---

### Task 4: Write Resource Test

**Files:**
- Create: `tests/Feature/Filament/Resources/ProjectResourceTest.php`

- [ ] **Step 1: Create the test file**

Run: `php artisan make:test Filament/Resources/ProjectResourceTest --stub=resource --phpunit --no-interaction` or create manually:

```php
<?php

namespace Tests\Feature\Filament\Resources;

use App\Filament\Resources\ProjectResource;
use App\Models\Project;
use App\Models\User;
use Filament\Actions\DeleteAction;
use Filament\Actions\Testing\TestAction;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
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

        livewire(ProjectResource\Pages\CreateProject::class)
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

        livewire(ProjectResource\Pages\EditProject::class, ['record' => $project->id])
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
        livewire(ProjectResource\Pages\CreateProject::class)
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

        livewire(ProjectResource\Pages\ListProjects::class)
            ->callAction(TestAction::make('delete')->table($project));

        $this->assertModelMissing($project);
    }
}
```

- [ ] **Step 2: Create Project factory**

Edit `database/factories/ProjectFactory.php` (create if not exists):

```php
<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    protected $model = Project::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->words(3, true),
            'client_name' => $this->faker->company(),
            'description' => $this->faker->paragraph(),
        ];
    }
}
```

- [ ] **Step 3: Run the test to verify it passes**

Run: `php artisan test --compact tests/Feature/Filament/Resources/ProjectResourceTest.php`
Expected: All tests pass.

- [ ] **Step 4: Commit**

```bash
git add tests/Feature/Filament/Resources/ProjectResourceTest.php database/factories/ProjectFactory.php
git commit -m "test: add Project CRUD resource tests"
```
