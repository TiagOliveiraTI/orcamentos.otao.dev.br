<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Budget>
 */
class BudgetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'request_id' => fake()->numberBetween(1,10),
            'total_amount' => fake('pt_BR')->randomFloat(2, 10, 100),
            'details' => fake('pt_BR')->text()
        ];
    }
}
