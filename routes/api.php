<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RectifierController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/rectifier/realtime/{rectifier:ip_recti}', [RectifierController::class, 'showAjax'])->name('api.realtime');
Route::get('/rectifier/detail/{rectifier:ip_recti}', [RectifierController::class, 'showAjaxDetail'])->name('api.detail');
