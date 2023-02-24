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
        Schema::create('plns', function (Blueprint $table) {
            $table->id();
            $table->string('SITEID');
            $table->string('sitename');
            $table->string('IDPEL');
            $table->string('tarif');
            $table->integer('DAYA');
            $table->string('statusdaya');
            $table->string('faktorkali');
            $table->integer('standawal');
            $table->integer('standakhir');
            $table->string('pemakaianreal');
            $table->integer('jmltagihan');
            $table->date('date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plns');
    }
};
