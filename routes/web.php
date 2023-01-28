<?php

use App\Http\Controllers\LoginController;
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
    return view("home", [
        "title" => "home"
    ]);
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

Route::get('/dashboard', function(){
    return view('portal.dashboard');
})->middleware('auth');
