<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\KPI_aktif;
use App\Models\KPI_Support;
use App\Models\KPI_utama;
use App\Models\profit_loss;
use App\Models\ReservedCost;
use App\Models\RVC;
use App\Models\siteprofile;
use App\Models\tracked_document;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(20)->create();
        tracked_document::factory(5)->create();
        siteprofile::factory(100)->create();
        KPI_utama::factory(100)->create();
        KPI_Support::factory(100)->create();
        KPI_aktif::factory(100)->create();
        RVC::factory(100)->create();
        profit_loss::factory(100)->create();
        ReservedCost::factory(100)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
