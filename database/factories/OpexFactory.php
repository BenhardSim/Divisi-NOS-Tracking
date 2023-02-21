<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\opex>
 */
class OpexFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    // $table->string('NOP'); // NOP
    // $table->string('funds_center_desc');
    // $table->string('commitmen_item');
    // $table->string('commitmen_item_desc');
    // $table->string('funds_area_desc');
    // $table->integer('absorption');
    // $table->integer('accure');
    // $table->integer('available');
    // $table->date('date');
    // $table->string('kuartal');
    public function definition()
    {
        return [
            //
            'NOP' => $this->faker->randomElement(['semarang', 'surakarta', 'yogyakarta', 'purwokerto', 'pekalongan', 'salatiga']),
            'funds_center_desc' => $this->faker->sentence(),
            'funds_area_desc' => $this->faker->sentence(),
            'commitmen_item' => $this->faker->words(3, true),
            'commitmen_item_desc' => $this->faker->sentence(),
            'absorption' => $this->faker->numberBetween(1000, 100000),
            'accure' => $this->faker->numberBetween(1000, 100000),
            'available' => $this->faker->numberBetween(1000, 100000),
            'date' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'kuartal' => $this->faker->numberBetween(1, 4)
        ];
    }
}
