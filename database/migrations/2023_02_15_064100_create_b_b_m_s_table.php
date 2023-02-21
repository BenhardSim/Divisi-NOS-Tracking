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
        Schema::create('b_b_m_s', function (Blueprint $table) {
            $table->id();
            $table->string('SITEID');
            $table->string('site_name');
            $table->string('site_category');
            $table->string('nop');
            $table->string('genset');
            $table->integer('harga_rata');
            $table->string('cluster');
            $table->integer('RH');
            $table->integer('harga_total');
            $table->date('date');
            $table->integer('bbm');
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
        Schema::dropIfExists('b_b_m_s');
    }
};
