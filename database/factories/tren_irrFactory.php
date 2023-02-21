<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\tren_irr>
 */
class tren_irrFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    // $table->integer('b2s');
    // $table->integer('collo_tp');
    // $table->integer('target_irr_collo');
    // $table->integer('target_irr_b2s');
    // $table->integer('komitmen_collo');
    // $table->integer('komitmen_b2s');
    // $table->integer('periode');
    // $table->string('nop');
    public function definition()
    {
        return [
            //
            'b2s' => $this->faker->numberBetween(10, 150),
            'collo_tp' => $this->faker->numberBetween(10, 150),
            'target_irr_collo' => $this->faker->numberBetween(10, 150),
            'target_irr_b2s' => $this->faker->numberBetween(10, 150),
            'komitmen_collo' => $this->faker->numberBetween(10, 150),
            'komitmen_b2s' => $this->faker->numberBetween(10, 150),
            'periode' => $this->faker->unique()->numberBetween(1, 12),
            'nop' => $this->faker->randomElement(['semarang', 'surakarta', 'yogyakarta', 'purwokerto', 'pekalongan', 'salatiga']),
        ];
    }
}
