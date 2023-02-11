<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracked_documents', function (Blueprint $table) {
            $table->id();
            $table->string('file')->default('-');
            $table->string('deskripsi')->default('-');
            $table->string('status')->default('Pending');
            $table->integer('level_approval');
            $table->string('id_pengirim');
            $table->string('nama_pengirim');
            $table->integer('level_pengirim');
            $table->string('id_level_dua')->nullable()->default('-');
            $table->string('id_level_tiga')->nullable()->default('-');
            $table->string('id_level_empat');
            $table->dateTime('tanggal');
            $table->string('keterangan')->default('-');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tracked_documents');
    }
};
