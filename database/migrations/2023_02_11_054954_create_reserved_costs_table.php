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
        Schema::create('reserved_costs', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->integer('ticket_number');
            $table->string('status');
            $table->string('work_status');
            $table->string('SITEID');
            $table->string('site_name');
            $table->string('nop');
            $table->enum('type',['PS','RM']);
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
        Schema::dropIfExists('reserved_costs');
    }
};
