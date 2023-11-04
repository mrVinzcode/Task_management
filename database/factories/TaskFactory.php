<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->realText($maxNbChars = 50, $indexSize = 2),
            'description'=> $this->faker->realText($maxNbChars = 50, $indexSize = 2),
            'completed' => $this->faker->boolean(),
        ];
    }
}
