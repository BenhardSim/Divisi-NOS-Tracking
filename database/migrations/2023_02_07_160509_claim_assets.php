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
        Schema::create('claim_assets', function (Blueprint $table) {
            $table->bigIncrements('idclaim',1)->unique();
            $table->string('SiteIDClaim');
            $table->string('SiteNameClaim');
            $table->date('Reportdate');
            $table->string('ClaimNumber');
            $table->string('rtpo');
            $table->string('Regional');
            $table->string('LostStatus');
            $table->string('DamageCause');
            $table->string('Earlyreport');
            $table->string('AssetCatagory');
            $table->string('ItemMerk');
            $table->string('ItemType');
            $table->string('Quantity');
            $table->string('ItemUnit');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('claim_assets');
    }
};
