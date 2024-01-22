<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{

    public function definition(): array
    {
        return [
            'title' => fake()->title(),
            'description' => Str::random(25),
            'cover_url' => fake()->imageUrl(),
            'price' => 1000.55,
            'quantity' => null
        ];
    }
}
