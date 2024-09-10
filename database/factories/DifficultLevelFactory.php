<?php

namespace Database\Factories;

use App\Enums\Level;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DifficultLevel>
 */
class DifficultLevelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'level' => fake()->randomElement(Level::cases()),
            'additional_cost' => fake('pt_BR')->randomFloat(2, 10, 100),
        ];
    }
}
