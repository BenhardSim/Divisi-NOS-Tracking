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
        Schema::create('numbered_documents', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->unique();
            $table->dateTime('tanggal');
            $table->string('tipe_file');
            $table->string('departemen');
            $table->string('uraian');
            $table->string('vendor');
            $table->integer('amount');
            $table->string('dokumen');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('numbered_documents');
    }
};
