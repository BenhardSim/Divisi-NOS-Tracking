<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\KPI_utama>
 */
class KPI_utamaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $fake_kpi = $this->faker->numberBetween(50, 100);
        return [
            //
            // $table->string('NOP');
            // $table->integer('ach_kpi');
            // $table->string('avail_all');
            // $table->string('avail_power');
            // $table->integer('kpi_target');
            // $table->date('date');
            // $table->integer('kpi_utama');
            'NOP' => $this->faker->randomElement(['semarang', 'surakarta', 'yogyakarta', 'purwokerto', 'pekalongan', 'salatiga']),
            'ach_kpi' => $fake_kpi,
            'avail_all' => $this->faker->numberBetween(10, 1000),
            'avail_power' => $this->faker->numberBetween(10, 1000),
            'kpi_target' => 70,
            'date' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'kpi_utama' => $fake_kpi,
        ];
    }
}
