<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;
Use App\Http\Controllers\PanelController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\WilayahController;


/*
|--------------------------------------------------------------------------
| FrontendController
|--------------------------------------------------------------------------
*/

Route::get('/', [FrontendController::class, 'beranda'])->name('beranda');

Route::get('/berita/{slug}', [FrontendController::class, 'showberita'])->name('berita');

Route::get('/semuaberita', [FrontendController::class, 'semuaberita'])->name('semuaberita');

Route::get('/sekolah', [FrontendController::class, 'sekolah'])->name('sekolah');

Route::get('/fgetprovsp', [FrontendController::class, 'fgetprovsp'])->name('fgetprovsp');

Route::get('/sekolah/onprovinsi/{id}', [FrontendController::class, 'onprovinsi'])->name('sekolah/onprovinsi');

Route::get('/fgetkotasp/{id}', [FrontendController::class, 'fgetkotasp'])->name('fgetkotasp');

Route::get('/sekolah/onkota/{id}', [FrontendController::class, 'onkota'])->name('sekolah/onkota');

Route::get('/fgetkecsp/{id}', [FrontendController::class, 'fgetkecsp'])->name('fgetkecsp');

Route::get('/sekolah/onkecamatan/{id}', [FrontendController::class, 'onkecamatan'])->name('sekolah/onkecamatan');

Route::get('/fgetdesasp/{id}', [FrontendController::class, 'fgetdesasp'])->name('fgetdesasp');

Route::get('/satuanpendidikan/{id}', [FrontendController::class, 'satuanpendidikan'])->name('satuanpendidikan');

Route::get('/semuasekolah', [FrontendController::class, 'semuasekolah'])->name('semuasekolah');

Route::get('/fgetsemuasekolah', [FrontendController::class, 'fgetsemuasekolah'])->name('fgetsemuasekolah');

Route::get('/semuasma', [FrontendController::class, 'semuasma'])->name('semuasma');

Route::get('/fgetsemuasma', [FrontendController::class, 'fgetsemuasma'])->name('fgetsemuasma');

Route::get('/semuasmp', [FrontendController::class, 'semuasmp'])->name('semuasmp');

Route::get('/fgetsemuasmp', [FrontendController::class, 'fgetsemuasmp'])->name('fgetsemuasmp');

Route::get('/semuasd', [FrontendController::class, 'semuasd'])->name('semuasd');

Route::get('/fgetsemuasd', [FrontendController::class, 'fgetsemuasd'])->name('fgetsemuasd');

Route::get('/semuatk', [FrontendController::class, 'semuatk'])->name('semuatk');

Route::get('/fgetsemuatk', [FrontendController::class, 'fgetsemuatk'])->name('fgetsemuatk');

Route::get('/semuapaud', [FrontendController::class, 'semuapaud'])->name('semuapaud');

Route::get('/fgetsemuapaud', [FrontendController::class, 'fgetsemuapaud'])->name('fgetsemuapaud');


/*------------------------------------------------------------------------*/

Route::middleware(['auth'])->group(function () {
    /*
    |--------------------------------------------------------------------------
    | PanelController
    |--------------------------------------------------------------------------
    */

    Route::get('/panel/tambahsekolah', [PanelController::class, 'tambahsekolah'])->name('panel/tambahsekolah');

    Route::get('/panel', [PanelController::class, 'panel'])->name('panel');

    Route::get('/panel/daftarberita', [PanelController::class, 'daftarberita'])->name('panel/daftarberita');

    Route::get('/panel/newseditor', [PanelController::class, 'newseditor'])->name('panel/newseditor');

    Route::get('/panel/sekolah', [PanelController::class, 'sekolah'])->name('panel/sekolah');


    Route::get('/panel/spkota/{id}', [PanelController::class, 'spkota'])->name('panel/spkota');

    Route::get('/panel/spkec/{id}', [PanelController::class, 'spkec'])->name('panel/spkec');

    Route::get('/panel/spall/{id}', [PanelController::class, 'spall'])->name('panel/spall');

    Route::get('/panel/sp/{id}', [PanelController::class, 'sp'])->name('panel/sp');

    Route::get('/panel/editberita/{id}', [PanelController::class, 'editberita'])->name('panel/editberita');


    /*------------------------------------------------------------------------*/

    /*
    |--------------------------------------------------------------------------
    | BeritaController
    |--------------------------------------------------------------------------
    */

    Route::post('/storeberita', [BeritaController::class, 'storeberita'])->name('storeberita');

    Route::get('/getdaftarberita', [BeritaController::class, 'getdaftarberita'])->name('getdaftarberita');

    Route::get('/deleteberita/{id}', [BeritaController::class, 'deleteberita'])->name('deleteberita');

    Route::get('/setpub/{id}/{status}', [BeritaController::class, 'setpub'])->name('setpub');

    Route::get('/getpub/{id}', [BeritaController::class, 'getpub'])->name('getpub');

    Route::post('/updateberita/{id}', [BeritaController::class, 'updateberita'])->name('updateberita');

    /*------------------------------------------------------------------------*/

    /*
    |--------------------------------------------------------------------------
    | SekolahController
    |--------------------------------------------------------------------------
    */



    Route::post('/storesekolah', [SekolahController::class, 'storesekolah'])->name('storesekolah');

    Route::get('/getprovsp', [SekolahController::class, 'getprovsp'])->name('getprovsp');

    Route::get('/getkotasp/{id}', [SekolahController::class, 'getkotasp'])->name('getkotasp');

    Route::get('/getkecsp/{id}', [SekolahController::class, 'getkecsp'])->name('getkecsp');

    Route::get('/getallsp/{id}', [SekolahController::class, 'getallsp'])->name('getallsp');

    Route::get('/getsp/{id}', [SekolahController::class, 'getsp'])->name('getsp');

    Route::get('/deletesekolah/{id}', [SekolahController::class, 'deletesekolah'])->name('deletesekolah');

    /*------------------------------------------------------------------------*/

    /*
    |--------------------------------------------------------------------------
    | WilayahController
    |--------------------------------------------------------------------------
    */

    Route::get('/getprovinsi', [WilayahController::class, 'getprovinsi'])->name('getprovinsi');

    Route::get('/getkota/{province_id}', [WilayahController::class, 'getkota'])->name('getkota');

    Route::get('/getkecamatan/{regency_id}', [WilayahController::class, 'getkecamatan'])->name('getkecamatan');

    Route::get('/getdesa/{district_id}', [WilayahController::class, 'getdesa'])->name('getdesa');

    /*------------------------------------------------------------------------*/

});


// Route::get('/', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
