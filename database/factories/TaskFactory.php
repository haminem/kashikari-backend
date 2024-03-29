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
    public function definition()
    {
        return [
            'friend_id' => $this->faker->numberBetween(1, 10),
            'title' => $this->faker->title,
            'description' => $this->faker->text,
            'point' => $this->faker->numberBetween(1, 1000),
            'deadline' => $this->faker->date,
            'status' => $this->faker->randomElement(['suggest','progress','done']),
            'sale' => $this->faker->boolean,
        ];
    }
}
