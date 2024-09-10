<?php

namespace Database\Factories;

use App\Enums\RequestStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Request>
 */
class RequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'service_type_id' => fake()->numberBetween(1,10),
            'difficult_level_id' => fake()->numberBetween(1,3),
            'user_id' => 1,
            'client_id' => fake()->numberBetween(1,10),
            'details' => fake('pt_BR')->text(),
            'request_status' => fake()->randomElement(RequestStatus::cases()),
        ];
    }
}
