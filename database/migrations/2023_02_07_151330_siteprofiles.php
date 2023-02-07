<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siteprofiles', function (Blueprint $table) {
            $table->string('SITEID')->unique();
            $table->string('SITENAME');
            $table->string('ALAMAT');
            $table->string('KABUPATEN');
            $table->string('PROPINSI');
            $table->string('LONGITUDE',100);
            $table->string('LATITUDE',100);
            $table->string('TAHUNONAIR');
            $table->string('TYPESITE');
            $table->string('TYPEBTN');
            $table->string('JENISTOWER');
            $table->string('KETINGGIANTOWER');
            $table->string('TOWERSTATUS');
            $table->string('PEMILIKLAHAN');
            $table->string('PEMILIKTOWER');
            $table->string('BIAYASEWATOWER');
            $table->string('UTILITIESITE');
            $table->string('IMBSTATUS');
            $table->string('NOIMBTOWER');
            $table->string('NOSERTIFIKATLAHAN');
            $table->string('NOKONTRAK');
            $table->string('AWALPERIODEKONTRAK');
            $table->string('AKHIRPERIODEKONTRAK');
            $table->string('LUASDIMENSILAHAN');
            $table->string('JENISCATUANLISTRIK');
            $table->string('DAYALISTRIKTERPASANG');
            $table->string('ID_PEL');
            $table->string('SITESTATUS');
            $table->string('HO',20);
            $table->string('SITETSELBARU',20);
            $table->string('SITETSELSEWA',20);
            $table->timestamp('TGL')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->string('status',50);
            $table->enum('STATUSKONTRAK',['RECURRING','RECONTRACT'])->nullable()->default('RECURRING');
            $table->date('LEASESTART');
            $table->date('LEASEEND');
            $table->primary('SITEID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siteprofiles');
    }
};
