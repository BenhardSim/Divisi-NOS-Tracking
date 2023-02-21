<?php

namespace Database\Factories;

use App\Models\siteprofile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RVC>
 */
class RVCFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // $table->id();
        // $table->string('SITEID');
        // $table->string('NOP');
        // $table->string('site_name');
        // $table->string('traffic');
        // $table->string('payload');
        // $table->integer('revenue');
        // $table->date('date');
        // $table->integer('cost');
        // $table->timestamps();
        $site = siteprofile::inRandomOrder()->first();
        return [
            //
            'SITEID' => $site->SITEID,
            'site_name' => $site->SITENAME,
            'NOP' => $this->faker->randomElement(['semarang', 'surakarta', 'yogyakarta', 'purwokerto', 'pekalongan', 'salatiga']),
            'traffic' => $this->faker->address(),
            'payload' => $this->faker->address(),
            'revenue' => $this->faker->numberBetween(1000, 100000),
            'date' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'cost' => $this->faker->numberBetween(1000, 100000)
        ];
    }
}
