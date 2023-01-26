<?php

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

Route::get('/', [RectifierController::class, 'index']);
Route::get('/login', [RectifierController::class, 'login']);
Route::get('/home', [RectifierController::class, 'home']);
Route::get('/form', [RectifierController::class, 'form']);
Route::get('/rectifier/{rectifier:address}', [RectifierController::class, 'show']);
