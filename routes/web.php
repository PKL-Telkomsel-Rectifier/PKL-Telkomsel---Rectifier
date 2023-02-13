<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\DataRectifierController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RectifierController;

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

/**
 * Login Routes
 */
Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

/**
 * Rectifier Routes
 */
Route::get('/home', [RectifierController::class, 'index'])->middleware('auth');
Route::get('/edit/{rectifier:ip_recti}', [RectifierController::class, 'edit'])->middleware('auth');
Route::post('/edit/{rectifier:ip_recti}', [RectifierController::class, 'update'])->middleware('auth');
Route::get('/delete/{rectifier:ip_recti}', [RectifierController::class, 'delete'])->middleware('auth');
Route::post('/delete/{rectifier:ip_recti}', [RectifierController::class, 'destroy'])->middleware('auth');
Route::get('/form', [RectifierController::class, 'create'])->middleware('auth');
Route::post('/form', [RectifierController::class, 'store'])->middleware('auth');

/**
 * Chart Routes
 * Untuk menampilkan chart dari database
 */
Route::get('/rectifier/realtime/{rectifier:ip_recti}', [ChartController::class, 'showRealtime'])->middleware('auth');
Route::get('/rectifier/detail/{rectifier:ip_recti}', [ChartController::class, 'showDetail'])->middleware('auth');
Route::get('/analysis', [ChartController::class, 'showAnalysis'])->middleware('auth');


/**
 * API Routes 
 * Untuk AJAX mengambil data dari database
 */
Route::get('/rectifier/realtime/ajax/{rectifier:ip_recti}', [DataRectifierController::class, 'showDataRealtime'])->name('api.realtime')->middleware('auth');
Route::get('/rectifier/detail/ajax/{rectifier:ip_recti}', [DataRectifierController::class, 'showDataDetail'])->name('api.detail')->middleware('auth');
Route::get('/analysis/all', [DataRectifierController::class, 'showDataAnalysis'])->middleware('auth');
