<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SitesController;
use Illuminate\Support\Facades\Route;

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
Route::get('/site-all', [SitesController::class, 'index'])->middleware('auth');

Route::get('/setting', [SettingController::class, 'index'])->middleware('auth');
Route::put('/setting', [SettingController::class, 'update'])->middleware('auth');
Route::get('/upload-dokumen', function(){
    return view('portal.upDokumen');
})->middleware('auth');

Route::get('/bbm', [DashboardController::class, 'indexBBM'])->middleware('auth');

