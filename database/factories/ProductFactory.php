<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product' => $this->faker->name(),
            'product_code' => $this->faker->swiftBicNumber(),
            'price' => 1234566,
        ];
    }
}
