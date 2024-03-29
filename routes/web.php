<?php

use App\Models\imbas_petir;
use App\Models\siteprofile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImbController;
use App\Http\Controllers\PbbController;
use App\Http\Controllers\CommController;
use App\Http\Controllers\lainController;
use App\Http\Controllers\SignController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ClaimController;
use App\Http\Controllers\ImbasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SitesController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\TrackedDocumentController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\NumberedDocumentController;
use App\Http\Controllers\TrackingController;

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
    return redirect()->intended('/dashboard');
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Sidebar route
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/setting', [SettingController::class, 'index'])->middleware('auth');
Route::put('/setting', [SettingController::class, 'update'])->middleware('auth');
Route::get('/upload-dokumen', [UploadController::class, 'index'])->middleware('notAdmin');
Route::get('/upload-data', function(){
    return view('portal.add_data');
})->middleware('admin');
Route::get('/sign-document', [SignController::class, 'index'])->middleware('auth');
Route::get('/history',[HistoryController::class, 'index'])->middleware('auth');
Route::get('/tracking',[TrackingController::class, 'index'])->middleware('admin');
Route::get('/tracking/{tracked_document:id}',[TrackingController::class, 'show'])->middleware('auth');
Route::resource('/numbereddocuments', NumberedDocumentController::class)->middleware('auth');
Route::get('/help',function(){
    return view('portal.help',["title" => "Help"]);
});


// site list
Route::get('/site-all', [SitesController::class, 'indexAll'])->middleware('auth');
Route::get('/site-tp', [SitesController::class, 'indexTp'])->middleware('auth');
Route::get('/site-telkom', [SitesController::class, 'indexTelkom'])->middleware('auth');
Route::get('/site-telkomsel', [SitesController::class, 'indexTelkomsel'])->middleware('auth');
Route::get('/site-reseller', [SitesController::class, 'indexReseller'])->middleware('auth');


// NOP charts 
Route::get('/bbm', [ChartController::class, 'indexBBM'])->middleware('auth');
Route::get('/rvc', [ChartController::class, 'indexRVC'])->middleware('auth');
Route::get('/pl', [ChartController::class, 'indexPL'])->middleware('auth');
Route::get('/opex', [ChartController::class, 'indexOPEX'])->middleware('auth');
Route::get('/rv', [ChartController::class, 'indexRV'])->middleware('auth');
Route::get('/tirr', [ChartController::class, 'indexTIRR'])->middleware('auth');
Route::get('/iirr', [ChartController::class, 'indexIIRR'])->middleware('auth');
Route::get('/kpiu', [ChartController::class, 'indexKPIU'])->middleware('auth');
Route::get('/kpia', [ChartController::class, 'indexKPIA'])->middleware('auth');
Route::get('/kpis', [ChartController::class, 'indexKPIS'])->middleware('auth');


// search
Route::get('/search', [SitesController::class, 'searchSites'])->middleware('auth');
Route::get('/search/{id:SITEID}', [SitesController::class, 'detailSites'])->middleware('auth');




// testing route
Route::get('/tester', function(){
    return view('test', dd(imbas_petir::all()));
});
Route::get('/testing', function(siteprofile $id){
    return view('portal.test', dd($id->kontrak_site_histories()));
})->middleware('auth');


// CRUD Imbas Petir
Route::resource('/imbas_petirs', ImbasController::class)->middleware('auth');
// CRUD Claim Asset
Route::resource('/claim_assets', ClaimController::class)->middleware('auth');
// CRUD PBB
Route::resource('/pbbs', PbbController::class)->middleware('auth');
// CRUD Claim Asset
Route::resource('/claim_assets', ClaimController::class)->middleware('auth');
// CRUD Contract Site
Route::resource('/kontrak_site_histories', ContractController::class)->middleware('auth');
// CRUD Commissue
Route::resource('/commissues',CommController::class)->middleware('auth');

// CRUD certificate Document
Route::resource('/certificate_documents',CertificateController::class)->middleware('auth');
// CRUD IMB Document
Route::resource('/certificate_imbs',ImbController::class)->middleware('auth');
// CRUD Document Lainnya
Route::resource('/lain_documents',lainController::class)->middleware('auth');

// CRUD Tracked Document
Route::resource('/tracked_document',TrackedDocumentController::class)->middleware('auth');




// view file contract site
Route::get('/file-kontrak/{kontrakId:id}', [ContractController::class, 'getDocs'])->middleware('auth');
// view file certificate document
Route::get('/file-certificate/{id_ser:id}',[CertificateController::class, 'getDocs'])->middleware('auth');
// view file IMB document
Route::get('/file-imb/{id_imb:id}',[ImbController::class,'getDocs'])->middleware('auth');
// view file tracked document
Route::get('/file-tracked/{id_trc:id}',[TrackedDocumentController::class,'getDocs'])->middleware('auth');
// view file lainnya 
Route::get('/file-lain/{id_lain:id}',[lainController::class,'getDocs'])->middleware('auth');

Route::get('/download',function(){
    $type = request()->type;
    $path = storage_path().'\app\public\templates\\'.$type.'.csv';
    return response()->download($path);
})->middleware('auth');


// route import CSV
Route::post('/fileImport',[ImportController::class,'importTemplates'])->middleware('auth');


// route get filter data
Route::get('/filter-data',[FilterController::class, 'filterData'])->middleware('auth');
