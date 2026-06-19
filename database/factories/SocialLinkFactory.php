<?php

namespace Database\Factories;

use App\Models\SocialLink;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<SocialLink>
 */
class SocialLinkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'platform' => fake()->randomElement(['Instagram', 'Dribbble', 'GitHub', 'LinkedIn', 'Twitter']),
            'url' => fake()->url(),
            'icon' => 'phosphor-'.fake()->randomElement(['instagram', 'dribbble', 'github', 'linkedin', 'x']).'-logo',
            'sort_order' => fake()->numberBetween(0, 10),
        ];
    }
}
