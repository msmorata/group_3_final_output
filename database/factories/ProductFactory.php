<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'product_id' => fake()->unique()->numberBetween(100, 10000), 
            'product_name' => fake()->word() . ' ' . fake()->word(),
            'product_price' => fake()->randomFloat(2, 5, 500),
            'category_id' => fake()->numberBetween(1, 3)
        ];
    }
}