<?php

use App\Http\Controllers\ChartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SitesController;
use App\Http\Controllers\TaggingController;
use App\Models\imbas_petir;
use App\Models\tagging_asset;
use App\Models\kontrak_site;
use Illuminate\Support\Facades\Route;


use App\Models\kontrak_site_history;
use App\Models\siteprofile;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view("home", [
    //     "title" => "home"
    // ]);

    return redirect()->intended('/login');
});

Route::get('/about', function () {
    return view("about", [
        "title" => "about",
        "name" => ["Benhard Simanullang", "Julius Adrian"],
        "email" => ["benhard.master.j@gmail.com", "juliusa368@gmail.com"],
        "image" => "nanami-mami.png"
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Route::get('/dashboard', function(){
//     return view('portal.dashboard');
// })->middleware('auth');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');


// site list
Route::get('/site-all', [SitesController::class, 'indexAll'])->middleware('auth');
Route::get('/site-tp', [SitesController::class, 'indexTp'])->middleware('auth');
Route::get('/site-telkom', [SitesController::class, 'indexTelkom'])->middleware('auth');
Route::get('/site-telkomsel', [SitesController::class, 'indexTelkomsel'])->middleware('auth');

// lainnya
Route::get('/setting', [SettingController::class, 'index'])->middleware('auth');
Route::put('/setting', [SettingController::class, 'update'])->middleware('auth');
Route::get('/upload-dokumen', function(){
    return view('portal.upDokumen');
})->middleware('auth');

// site from graph 
Route::get('/bbm', [ChartController::class, 'indexBBM'])->middleware('auth');
Route::get('/rvc', [ChartController::class, 'indexRVC'])->middleware('auth');
Route::get('/pl', [ChartController::class, 'indexPL'])->middleware('auth');
Route::get('/opex', [ChartController::class, 'indexOPEX'])->middleware('auth');
Route::get('/rv', [ChartController::class, 'indexRV'])->middleware('auth');

Route::get('/bbm/{site:SITEID}', [ChartController::class, 'detailBBM'])->middleware('auth');
Route::get('/rvc/{site:SITEID}', [ChartController::class, 'detailRVC'])->middleware('auth');
Route::get('/pl/{site:SITEID}', [ChartController::class, 'detailPL'])->middleware('auth');
Route::get('/opex/{site:SITEID}', [ChartController::class, 'detailOPEX'])->middleware('auth');
Route::get('/rv/{site:SITEID}', [ChartController::class, 'detailRV'])->middleware('auth');

// search
Route::get('/search', [SitesController::class, 'searchSites'])->middleware('auth');
Route::get('/search/{id:SITEID}', [SitesController::class, 'detailSites'])->middleware('auth');


// tagging assset
Route::get('/tagging', [TaggingController::class, 'index'])->middleware('auth');

Route::get('/tester', function(){
    return view('test', dd(imbas_petir::all()));
});
Route::get('/testing', function(siteprofile $id){
    return view('portal.test', dd($id->kontrak_site_histories()));
})->middleware('auth');




