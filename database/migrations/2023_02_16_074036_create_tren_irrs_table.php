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
        Schema::create('tren_irrs', function (Blueprint $table) {
            $table->id();
            $table->integer('b2s');
            $table->integer('collo_tp');
            $table->integer('target_irr_collo');
            $table->integer('target_irr_b2s');
            $table->integer('komitmen_collo');
            $table->integer('komitmen_b2s');
            $table->integer('periode');
            $table->string('nop');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tren_irrs');
    }
};
