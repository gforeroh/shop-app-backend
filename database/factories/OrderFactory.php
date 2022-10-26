<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('orders')->truncate();
        Schema::enableForeignKeyConstraints();

        return [
            // 'date_order' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'date_order' => $this->faker->dateTimeBetween('now', '2022-11-15'),
            'client' => $this->faker->name(),
            'document' => $this->faker->unique()->randomNumber($nbDigits = 8, $strict = true)
        ];
    }
}
