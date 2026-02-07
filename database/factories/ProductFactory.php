<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'details' => fake()->sentence(),
            'sku' => Str::random(10),
            'stock' => rand(1, 20),
            'price' => rand(20.00, 5000.00),
            'image' => 'product_photo/nophoto.jpg',
            'category_id' => rand(1, 4)
        ];
    }
}

/// 	