<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;
Use App\Http\Controllers\PanelController;

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

Route::get('/panel', [PanelController::class, 'panel'])->name('panel');

Route::get('/daftarberita', [PanelController::class, 'daftarberita'])->name('daftarberita');

Route::get('/newseditor', [PanelController::class, 'newseditor']);

Route::post('/storeberita', [BeritaController::class, 'storeberita'])->name('storeberita');

Route::get('/getdaftarberita', [BeritaController::class, 'getdaftarberita'])->name('getdaftarberita');