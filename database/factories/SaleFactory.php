<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SaleFactory extends Factory
{
    public function definition(): array
    {
        return [
            'sales_id' => fake()->unique()->numberBetween(100, 10000),
            'product_id' => \App\Models\Product::inRandomOrder()->first()->product_id ?? \App\Models\Product::factory(),
            'total_sales' => fake()->randomFloat(2, 100, 5000),
            'monthly_sales' => fake()->randomFloat(2, 50, 1000),
            'average_sales' => fake()->randomFloat(2, 10, 100),
        ];
    }
}