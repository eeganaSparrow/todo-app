<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Todolist>
 */
class TodolistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'content' => $this->faker->realText(30),
            'expiration_time' => '2024/03/29 17:00',
            'completion_flag' => false,
            'completion_time' => '2024/03/29 17:00',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
