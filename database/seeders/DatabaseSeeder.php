<?php

namespace Database\Seeders;

use App\Models\SocialLink;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call(ProjectSeeder::class);

        SocialLink::factory()->createMany([
            ['platform' => 'Instagram', 'url' => 'https://instagram.com/ideagrove', 'icon' => 'phosphor-instagram-logo', 'sort_order' => 1],
            ['platform' => 'Dribbble', 'url' => 'https://dribbble.com/ideagrove', 'icon' => 'phosphor-dribbble-logo', 'sort_order' => 2],
            ['platform' => 'GitHub', 'url' => 'https://github.com/ideagrove', 'icon' => 'phosphor-github-logo', 'sort_order' => 3],
        ]);
    }
}
