<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RectifierController;
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

// Route::get('/', [RectifierController::class, 'index']);
Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/home', [RectifierController::class, 'index'])->middleware('auth');

Route::get('/edit/{rectifier:ip_recti}', [RectifierController::class, 'edit'])->middleware('auth');
Route::post('/edit/{rectifier:ip_recti}', [RectifierController::class, 'update'])->middleware('auth');

Route::get('/delete/{rectifier:ip_recti}', [RectifierController::class, 'delete'])->middleware('auth');
Route::post('/delete/{rectifier:ip_recti}', [RectifierController::class, 'destroy'])->middleware('auth');

Route::get('/form', [RectifierController::class, 'create'])->middleware('auth');
Route::post('/form', [RectifierController::class, 'store'])->middleware('auth');

Route::get('/analysis', [RectifierController::class, 'showAnalysis'])->middleware('auth');
Route::get('/analysis/all', [RectifierController::class, 'ajaxAnalysisAll'])->middleware('auth');
Route::get('/analysis/voltage', [RectifierController::class, 'ajaxAnalysisVoltage'])->middleware('auth');
Route::get('/analysis/current', [RectifierController::class, 'ajaxAnalysisCurrent'])->middleware('auth');
Route::get('/analysis/temp', [RectifierController::class, 'ajaxAnalysisTemp'])->middleware('auth');
Route::get('/test', [RectifierController::class, 'chart'])->middleware('auth');

Route::get('/rectifier/realtime/{rectifier:ip_recti}', [RectifierController::class, 'showRealtime'])->middleware('auth');
Route::get('/rectifier/detail/{rectifier:ip_recti}', [RectifierController::class, 'showDetail'])->middleware('auth');
Route::get('/rectifier/detail2/{rectifier:ip_recti}', [RectifierController::class, 'showAjaxDetailV2']);

Route::get('/analysis', [RectifierController::class, 'showAnalysis'])->middleware('auth');
