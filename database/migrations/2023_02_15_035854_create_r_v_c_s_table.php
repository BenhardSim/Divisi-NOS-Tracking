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
        Schema::create('r_v_c_s', function (Blueprint $table) {
            $table->id();
            $table->string('SITEID');
            $table->string('NOP');
            $table->string('site_name');
            $table->string('traffic');
            $table->string('payload');
            $table->integer('revenue');
            $table->date('date');
            $table->integer('cost');
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
        Schema::dropIfExists('r_v_c_s');
    }
};
