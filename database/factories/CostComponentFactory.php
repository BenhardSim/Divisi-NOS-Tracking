<?php

namespace Database\Factories;

use App\Models\siteprofile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CostComponent>
 */
class CostComponentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    // $table->string('SITEID');
    // $table->integer('depre_bts');
    // $table->integer('depre_tower_own');
    // $table->integer('opex_isr');
    // $table->integer('cost_nsr');
    // $table->integer('depre_combat');
    // $table->integer('depre_power');
    // $table->integer('opex_transmission');
    // $table->integer('cost_tower');
    // $table->integer('depre_uso');
    // $table->integer('depre_sitesupport');
    // $table->integer('opex_power');
    // $table->integer('depre_accesslink');
    // $table->integer('opex_frequency');
    // $table->integer('opex_rm');
    // $table->date('date');
    public function definition()
    {
        $site = siteprofile::inRandomOrder()->first();
        return [
            //
            'SITEID' => $site->SITEID,
            'depre_bts' => $this->faker->numberBetween(1000000, 20000000),
            'depre_tower_own' => $this->faker->numberBetween(1000000, 20000000),
            'opex_isr' => $this->faker->numberBetween(1000000, 20000000),
            'cost_nsr' => $this->faker->numberBetween(1000000, 20000000),
            'depre_combat' => $this->faker->numberBetween(1000000, 20000000),
            'depre_power' => $this->faker->numberBetween(1000000, 20000000),
            'opex_transmission' => $this->faker->numberBetween(1000000, 20000000),
            'cost_tower' => $this->faker->numberBetween(1000000, 20000000),
            'depre_uso' => $this->faker->numberBetween(1000000, 20000000),
            'depre_sitesupport' => $this->faker->numberBetween(1000000, 20000000),
            'opex_power' => $this->faker->numberBetween(1000000, 20000000),
            'depre_accesslink' => $this->faker->numberBetween(1000000, 20000000),
            'opex_frequency' => $this->faker->numberBetween(1000000, 20000000),
            'opex_rm' => $this->faker->numberBetween(1000000, 20000000),
            'date' => $this->faker->dateTimeBetween('-1 years', 'now'),
        ];
    }
}
