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
        Schema::create('cost_components', function (Blueprint $table) {
            $table->id();
            $table->string('SITEID');
            $table->integer('depre_bts');
            $table->integer('depre_tower_own');
            $table->integer('opex_isr');
            $table->integer('cost_nsr');
            $table->integer('depre_combat');
            $table->integer('depre_power');
            $table->integer('opex_transmission');
            $table->integer('cost_tower');
            $table->integer('depre_uso');
            $table->integer('depre_sitesupport');
            $table->integer('opex_power');
            $table->integer('depre_accesslink');
            $table->integer('opex_frequency');
            $table->integer('opex_rm');
            $table->date('date');
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
        Schema::dropIfExists('cost_components');
    }
};
