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
Route::get('/', [LoginController::class, 'index']);
Route::post('/', [LoginController::class, 'authenticate']);
Route::get('/home', [RectifierController::class, 'index']);
Route::get('/form', [RectifierController::class, 'form']);
Route::get('/rectifier/{rectifier:ip_recti}', [RectifierController::class, 'show']);
