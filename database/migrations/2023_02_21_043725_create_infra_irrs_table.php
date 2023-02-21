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
        Schema::create('infra_irrs', function (Blueprint $table) {
            $table->id();
            $table->string('NOP');
            $table->integer('condition_1');
            $table->integer('condition_2');
            $table->integer('condition_3');
            $table->integer('condition_4');
            $table->integer('condition_5');
            $table->integer('condition_6');
            $table->integer('condition_7');
            $table->integer('condition_8');
            $table->integer('condition_9');
            $table->integer('condition_10');
            $table->integer('condition_11');
            $table->date('date');
            $table->enum('owner',['b2s','collo_tp']);
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
        Schema::dropIfExists('infra_irrs');
    }
};
