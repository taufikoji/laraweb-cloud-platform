<?php

namespace Database\Factories;

use App\Enums\ProductStatus;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    public function definition(): array { $name = fake()->words(3, true); return ['name' => $name, 'slug' => Str::slug($name), 'code' => fake()->unique()->lexify('???'), 'current_version' => '1.0.0', 'status' => ProductStatus::Active]; }
}
