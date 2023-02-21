<?php

namespace Database\Factories;

use App\Models\siteprofile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReservedCost>
 */
class ReservedCostFactory extends Factory
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
            // //$table->date('date');
            // $table->integer('ticket_number');
            // $table->string('status');
            // $table->string('work_status');
            // $table->string('SITEID');
            // $table->string('site_name');
            // $table->string('nop');
            // $table->enum('type',['PS','RM']);
            
            'date' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'ticket_number' => $this->faker->numberBetween(1000, 100000),
            'status' => $this->faker->address(),
            'work_status' => $this->faker->address(),
            'SITEID' => $site->SITEID,
            'site_name' => $site->SITENAME,
            'nop' => $this->faker->randomElement(['semarang', 'surakarta', 'yogyakarta', 'purwokerto', 'pekalongan', 'salatiga']),
            'type' => $this->faker->randomElement(['PS', 'RM']),
        ];
    }
}
