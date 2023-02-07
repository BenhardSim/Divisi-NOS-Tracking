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
        Schema::create('kontrak_site_histories', function (Blueprint $table) {
            $table->integer('id',1)->unique();
            $table->integer('id_kontrak')->default('0');
            $table->string('no_pks',100)->default('0');
            $table->string('SITEID');
            $table->string('awal_sewa',50)->nullable()->default('NULL');
            $table->string('akhir_sewa',50)->nullable()->default('NULL');
            $table->string('harga_sewa',50)->default('0');
            $table->string('remark',200)->default('0');
            $table->string('file_pks',200)->nullable()->default('NULL');
            $table->enum('STATUSKONTRAK',['RECURRING','RECONTRACT'])->nullable()->default('RECURRING');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kontrak_site_histories');
    }
};
