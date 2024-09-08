<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fund>
 */
class FundFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->unique()->lastName();
        $ref = strtoupper(substr($name, 0, 3));
        return [
            'ref' => $ref,
            'name' => $name,
            'description' => fake()->paragraph(),
            'status' => fake()->randomElement(['archive', 'officiel', 'en cours', 'don', 'en attente']),
            'updated_at' => fake()->dateTimeThisYear(),
        ];
    }
}
