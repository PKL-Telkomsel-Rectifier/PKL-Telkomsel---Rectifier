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
Route::get('/form', [RectifierController::class, 'form'])->middleware('auth');
Route::post('/form', [RectifierController::class, 'store'])->middleware('auth');
Route::get('/rectifier/{rectifier:ip_recti}', [RectifierController::class, 'show'])->middleware('auth');
