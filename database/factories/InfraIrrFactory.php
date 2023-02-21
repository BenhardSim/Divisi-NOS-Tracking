<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\infraIrr>
 */
class InfraIrrFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    // $table->string('NOP');
    // $table->integer('condition_1');
    // $table->integer('condition_2');
    // $table->integer('condition_3');
    // $table->integer('condition_4');
    // $table->integer('condition_5');
    // $table->integer('condition_6');
    // $table->integer('condition_7');
    // $table->integer('condition_8');
    // $table->integer('condition_9');
    // $table->integer('condition_10');
    // $table->integer('condition_11');
    // $table->date('date');
    // $table->enum('owner',['b2s','collo_tp']);
    public function definition()
    {
        return [
            //
            'NOP' => $this->faker->randomElement(['semarang', 'surakarta', 'yogyakarta', 'purwokerto', 'pekalongan', 'salatiga']),
            'condition_1' => $this->faker->numberBetween(1, 5),
            'condition_2' => $this->faker->numberBetween(1, 5),
            'condition_3' => $this->faker->numberBetween(1, 5),
            'condition_4' => $this->faker->numberBetween(1, 5),
            'condition_5' => $this->faker->numberBetween(1, 5),
            'condition_6' => $this->faker->numberBetween(1, 5),
            'condition_7' => $this->faker->numberBetween(1, 5),
            'condition_8' => $this->faker->numberBetween(1, 5),
            'condition_9' => $this->faker->numberBetween(1, 5),
            'condition_10' => $this->faker->numberBetween(1, 5),
            'condition_11' => $this->faker->numberBetween(1, 5),
            'date' => $this->faker->dateTimeBetween('-1 years', 'now'),
            'owner' => $this->faker->randomElement(['b2s', 'collo_tp']),
        ];
    }
}
