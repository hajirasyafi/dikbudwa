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

Route::get('/sekolah', [FrontendController::class, 'sekolah'])->name('sekolah');

Route::get('/fgetprovsp', [FrontendController::class, 'fgetprovsp'])->name('fgetprovsp');

Route::get('/sekolah/onprovinsi/{id}', [FrontendController::class, 'onprovinsi'])->name('sekolah/onprovinsi');

Route::get('/fgetkotasp/{id}', [FrontendController::class, 'fgetkotasp'])->name('fgetkotasp');

Route::get('/sekolah/onkota/{id}', [FrontendController::class, 'onkota'])->name('sekolah/onkota');

Route::get('/fgetkecsp/{id}', [FrontendController::class, 'fgetkecsp'])->name('fgetkecsp');

Route::get('/sekolah/onkecamatan/{id}', [FrontendController::class, 'onkecamatan'])->name('sekolah/onkecamatan');

Route::get('/fgetdesasp/{id}', [FrontendController::class, 'fgetdesasp'])->name('fgetdesasp');

Route::get('/satuanpendidikan/{id}', [FrontendController::class, 'satuanpendidikan'])->name('satuanpendidikan');


/*------------------------------------------------------------------------*/

/*
|--------------------------------------------------------------------------
| PanelController
|--------------------------------------------------------------------------
*/

Route::get('/panel', [PanelController::class, 'panel'])->name('panel');

Route::get('/daftarberita', [PanelController::class, 'daftarberita'])->name('daftarberita');

Route::get('/newseditor', [PanelController::class, 'newseditor']);

/*------------------------------------------------------------------------*/

/*
|--------------------------------------------------------------------------
| BeritaController
|--------------------------------------------------------------------------
*/

Route::post('/storeberita', [BeritaController::class, 'storeberita'])->name('storeberita');

Route::get('/getdaftarberita', [BeritaController::class, 'getdaftarberita'])->name('getdaftarberita');

Route::get('/deleteberita/{id}', [BeritaController::class, 'deleteberita'])->name('deleteberita');

/*------------------------------------------------------------------------*/

/*
|--------------------------------------------------------------------------
| SekolahController
|--------------------------------------------------------------------------
*/

Route::get('/spprov', [SekolahController::class, 'spprov'])->name('spprov');

Route::get('/tambahsekolah', [SekolahController::class, 'tambahsekolah'])->name('tambahsekolah');

Route::post('/storesekolah', [SekolahController::class, 'storesekolah'])->name('storesekolah');

Route::get('/getprovsp', [SekolahController::class, 'getprovsp'])->name('getprovsp');

Route::get('/spkota/{id}', [SekolahController::class, 'spkota'])->name('spkota');

Route::get('/getkotasp/{id}', [SekolahController::class, 'getkotasp'])->name('getkotasp');

Route::get('/spkec/{id}', [SekolahController::class, 'spkec'])->name('spkec');

Route::get('/getkecsp/{id}', [SekolahController::class, 'getkecsp'])->name('getkecsp');

Route::get('/spall/{id}', [SekolahController::class, 'spall'])->name('spall');

Route::get('/getallsp/{id}', [SekolahController::class, 'getallsp'])->name('getallsp');

Route::get('/sp/{id}', [SekolahController::class, 'sp'])->name('sp');

Route::get('/getsp/{id}', [SekolahController::class, 'getsp'])->name('getsp');

/*------------------------------------------------------------------------*/

/*
|--------------------------------------------------------------------------
| WilayahController
|--------------------------------------------------------------------------
*/

Route::get('/getprovinsi', [WilayahController::class, 'getprovinsi']);

Route::get('/getkota/{province_id}', [WilayahController::class, 'getkota']);

Route::get('/getkecamatan/{regency_id}', [WilayahController::class, 'getkecamatan']);

Route::get('/getdesa/{district_id}', [WilayahController::class, 'getdesa']);

/*------------------------------------------------------------------------*/