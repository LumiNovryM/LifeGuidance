<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\NoTokenApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [ApiController::class, 'login']);
Route::middleware('auth:sanctum')->get('/data', [ApiController::class, 'getData']);
Route::get('/bimbingan_pribadi/{id}', [NoTokenApiController::class, 'bimbingan_pribadi']);
Route::get('/bimbingan_belajar/{id}', [NoTokenApiController::class, 'bimbingan_belajar']);
Route::get('/bimbingan_sosial/{id}', [NoTokenApiController::class, 'bimbingan_sosial']);
Route::get('/bimbingan_karir/{id}', [NoTokenApiController::class, 'bimbingan_karir']);


Route::get('/detail_bimbingan_pribadi/{id}', [NoTokenApiController::class, 'detail_bimbingan_pribadi']);
Route::get('/detail_bimbingan_belajar/{id}', [NoTokenApiController::class, 'detail_bimbingan_belajar']);
Route::get('/detail_bimbingan_sosial/{id}', [NoTokenApiController::class, 'detail_bimbingan_sosial']);
Route::get('/detail_bimbingan_karir/{id}', [NoTokenApiController::class, 'detail_bimbingan_karir']);