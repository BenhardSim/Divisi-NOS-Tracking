<?php

namespace Database\Factories;

use App\Models\siteprofile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\profit_loss>
 */
class profit_lossFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $site = siteprofile::inRandomOrder()->first();
        return [
            // $table->string('SITEID');
            // $table->string('site_name');
            // $table->string('kabupaten');
            // $table->string('NOP');
            // $table->integer('revenue');
            // $table->string('remark');
            // $table->date('date');
            //
            'SITEID' => $site->SITEID,
            'site_name' => $site->SITENAME,
            'kabupaten' => $site->KABUPATEN,
            'NOP' => $this->faker->randomElement(['semarang', 'surakarta', 'yogyakarta', 'purwokerto', 'pekalongan', 'salatiga']),
            'revenue' => $this->faker->numberBetween(1000, 5000),
            'remark' => $this->faker->randomElement(['profit', 'loss', 'high profit']),
            'date' => $this->faker->dateTimeBetween('-1 years', 'now'),
        ];
    }
}
