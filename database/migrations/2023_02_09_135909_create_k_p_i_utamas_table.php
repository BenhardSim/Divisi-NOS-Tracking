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
        Schema::create('k_p_i_utamas', function (Blueprint $table) {
            $table->id();
            $table->string('NOP');
            $table->integer('ach_kpi');
            $table->string('avail_all');
            $table->string('avail_power');
            $table->integer('kpi_target');
            $table->timestamp('date')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('k_p_i_utamas');
    }
};
