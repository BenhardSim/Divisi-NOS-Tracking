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
        Schema::create('imbas_petirs', function (Blueprint $table) {
            $table->bigInteger('idimbas',1)->length(20)->unique();
            $table->string('Siteid',250);
            $table->string('Regional');
            $table->string('SiteName');
            $table->string('ClaimID',250);
            $table->integer('claim',0);
            $table->integer('RTPO',0);
            $table->string('PolisNumber',250);
            $table->string('VendorName',250);
            $table->date('EventDate');
            $table->date('ReportDate');
            $table->string('DamageNotes',250);
            $table->string('CostClaim',250);
            $table->string('EarlyStatus',250);
            $table->string('FinalStatus',250);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('imbas_petirs');
    }
};
