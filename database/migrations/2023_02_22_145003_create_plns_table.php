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
            $table->integer('IDPEL');
            $table->integer('tarif');
            $table->integer('DAYA');
            $table->string('statusdaya');
            $table->string('faktorkali');
            $table->string('standawal');
            $table->string('standakhir');
            $table->string('pemakaianreal');
            $table->string('jmltagihan');
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
        Schema::dropIfExists('plns');
    }
};
