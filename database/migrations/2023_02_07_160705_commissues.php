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
        Schema::create('commissues', function (Blueprint $table) {
            $table->bigIncrements('idComm')->unique();
            $table->string('SITEID');
            $table->string('SITENAME',100);
            $table->string('REVENUE');
            $table->string('DETAIL');
            $table->string('ACTION');
            $table->string('PIC');
            $table->string('STATSSITE');
            $table->string('KOMPENSASI');
            $table->string('REALISASI');
            $table->string('STATSCASE',100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commissues');
    }
};
