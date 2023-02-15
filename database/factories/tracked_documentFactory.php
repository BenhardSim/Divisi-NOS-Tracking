<?php

namespace Database\Factories;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\tracked_document>
 */
class tracked_documentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // $table->id();
            // $table->string('nama_file');
            // $table->string('status')->default('Pending');
            // $table->integer('level_approval');
            // $table->string('id_pengirim');
            // $table->string('nama_pengirim');
            // $table->integer('level_pengirim');
            // $table->string('id_level_dua');
            // $table->string('id_level_tiga');
            // $table->string('id_level_empat');
            'file' => $this->faker->sentence(3),
            'level_approval' => 1,
            // 'view_file' => $this->faker->name(),
            'id_pengirim' => User::where("level_akun", 1)->first()->id,
            'nama_pengirim' => User::where("level_akun", 1)->first()->name,
            'level_pengirim' => 1,
            'id_level_dua' => User::where("level_akun", 2)->first()->id,
            'id_level_tiga' => User::where("level_akun", 3)->first()->id,
            'id_level_empat' => User::where("level_akun", 4)->first()->id,
            'deskripsi' => $this->faker->paragraph(),
            'tanggal' => Carbon::now('Asia/Jakarta'),
            'keterangan' => "-",
        ];
    }
}
