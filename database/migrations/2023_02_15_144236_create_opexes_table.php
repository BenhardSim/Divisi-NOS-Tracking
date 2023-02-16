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
        Schema::create('opexes', function (Blueprint $table) {
            $table->id();
            $table->string('NOP'); // NOP
            $table->string('funds_center_desc');
            $table->string('commitmen_item');
            $table->string('commitmen_item_desc');
            $table->string('funds_area_desc');
            $table->integer('absorption');
            $table->integer('accure');
            $table->integer('available');
            $table->date('date');
            $table->string('kuartal');
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
        Schema::dropIfExists('opexes');
    }
};
