<?php

namespace Database\Factories;

use App\Models\siteprofile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BBM>
 */
class BBMFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    // $table->string('SITEID');
    //         $table->string('site_name');
    //         $table->string('site_category');
    //         $table->string('nop');
    //         $table->string('genset');
    //         $table->integer('harga_rata');
    //         $table->string('cluster');
    //         $table->string('RH');
    //         $table->integer('harga_total');
    //         $table->date('date');
    //         $table->integer('bbm');
    public function definition()
    {
        $site = siteprofile::inRandomOrder()->first();
        return [
            //
            'SITEID' => $site->SITEID,
            'site_name' => $site->SITENAME,
            'site_category' => $site->TOWERSTATUS,
            'nop' => $this->faker->randomElement(['semarang', 'surakarta', 'yogyakarta', 'purwokerto', 'pekalongan', 'salatiga']),
            'genset' => $this->faker->randomElement(['Genset 1', 'Genset 2', 'Genset 3']),
            'RH' => $this->faker->numberBetween(10, 100),
            'cluster' => $this->faker->randomElement(['Cluster 1', 'Cluster 2', 'Cluster 3']),
            'harga_rata' => $this->faker->numberBetween(1000, 10000),
            'harga_total' => $this->faker->numberBetween(1000, 10000),
            'date' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'bbm' => $this->faker->numberBetween(1, 10)
        ];
    }
}
