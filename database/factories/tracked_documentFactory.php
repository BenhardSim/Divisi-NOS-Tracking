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
            'file' => "Persetujuan Pembelian BTS",
            'level_approval' => 1,
            // 'view_file' => $this->faker->name(),
            'id_pengirim' => "1",
            'nama_pengirim' => "Parker Bins",
            'level_pengirim' => 1,
            'id_level_dua' => "2",
            'id_level_tiga' => "3",
            'id_level_empat' => "4",
            'deskripsi' => "File ini adalah...",
            'tanggal' => Carbon::now('Asia/Jakarta'),
            'keterangan' => "-",
        ];
    }
}
