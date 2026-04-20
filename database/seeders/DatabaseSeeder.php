<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Sale;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Product::factory(200)->create();
        Sale::factory(800)->create();
    }
}