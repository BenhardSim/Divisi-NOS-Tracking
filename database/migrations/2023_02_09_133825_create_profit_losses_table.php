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
        // blm jadi 
        Schema::create('profit_losses', function (Blueprint $table) {
            $table->id();
            $table->string('SITEID');
            // $table->int('low_profit');
            // $table->int('loss');
            // $table->int('high_profit');
            // $table->date('date')->default('s')
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profit_losses');
    }
};
