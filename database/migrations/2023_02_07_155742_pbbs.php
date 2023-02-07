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
        Schema::create('pbbs', function (Blueprint $table) {
            $table->bigIncrements('idPBB',1)->unique();
            $table->string('SITEID');
            $table->string('SITENAME');
            $table->string('NOP');
            $table->string('NAMAWP');
            $table->string('NPWP');
            $table->string('KPP');
            $table->string('KELURAHAN');
            $table->string('KECAMATAN');
            $table->string('KAB');
            $table->string('PROVINSI');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pbbs');
    }
};
