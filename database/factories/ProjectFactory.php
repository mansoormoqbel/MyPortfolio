<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description'   => $this->faker->paragraph(),
            'category'      => $this->faker->randomElement(['Web', 'Mobile', 'Desktop', 'API']),
            'live_url'      => $this->faker->url(),
            'thumbnail'     => 'thumbnails/' . $this->faker->image('public/storage/thumbnails', 640, 480, null, false),
            'is_published'  => $this->faker->boolean(80), // 80% chance true
        ];
    }
}
