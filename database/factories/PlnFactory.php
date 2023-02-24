<?php

namespace Database\Factories;

use App\Models\siteprofile;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\pln>
 */
class PlnFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    // $table->string('SITEID');
    // $table->string('sitename');
    // $table->integer('IDPEL');
    // $table->integer('tarif');
    // $table->integer('DAYA');
    // $table->string('statusdaya');
    // $table->string('faktorkali');
    // $table->string('standawal');
    // $table->string('standakhir');
    // $table->string('pemakaianreal');
    // $table->string('jmltagihan');
    public function definition()
    {
            $site = siteprofile::inRandomOrder()->first();
            $awal = $this->faker->numberBetween(100000,1000000);
            $akhir = $this->faker->numberBetween(100000,1000000);
        return [
            //
            'SITEID' => $site->SITEID,
            'sitename' => $site->SITENAME,
            'IDPEL' => $site->IDPEL,
            'tarif' => $this->faker->randomElement(['B2', 'LB2', 'B1', 'LB1']),
            'DAYA' => $site->DAYALISTRIKTERPASANG,
            'statusdaya' => $this->faker->randomElement(['-']),
            'faktorkali' => $this->faker->randomElement(['-']),
            'standawal' => $awal,
            'standakhir' => $akhir,
            'pemakaianreal' => $akhir - $awal,
            'jmltagihan' => $this->faker->numberBetween(1000000, 50000000),
            'date' => $this->faker->dateTimeBetween('-1 years', 'now'),
        ];
    }
}
