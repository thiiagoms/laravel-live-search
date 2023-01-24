<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $categories = ['Food', 'Cleaning'];

        return [
            'name' => fake()->name(),
            'category' => $categories[array_rand($categories, 1)],
            'price' => fake()->numberBetween(1, 100)
        ];
    }
}
