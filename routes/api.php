<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\GuruApiController;
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


Route::post('/tambah_bimbingan_pribadi', [NoTokenApiController::class, 'tambah_bimbingan_pribadi']);
Route::post('/tambah_bimbingan_belajar', [NoTokenApiController::class, 'tambah_bimbingan_belajar']);
Route::post('/tambah_bimbingan_sosial', [NoTokenApiController::class, 'tambah_bimbingan_sosial']);
Route::post('/tambah_bimbingan_karir', [NoTokenApiController::class, 'tambah_bimbingan_karir']);


Route::put('/ubah_bimbingan_pribadi/{id}', [NoTokenApiController::class, 'ubah_bimbingan_pribadi']);
Route::put('/ubah_bimbingan_belajar/{id}', [NoTokenApiController::class, 'ubah_bimbingan_belajar']);
Route::put('/ubah_bimbingan_sosial/{id}', [NoTokenApiController::class, 'ubah_bimbingan_sosial']);
Route::put('/ubah_bimbingan_karir/{id}', [NoTokenApiController::class, 'ubah_bimbingan_karir']);


Route::delete('/hapus_bimbingan_pribadi/{id}', [NoTokenApiController::class, 'hapus_bimbingan_pribadi']);
Route::delete('/hapus_bimbingan_belajar/{id}', [NoTokenApiController::class, 'hapus_bimbingan_belajar']);
Route::delete('/hapus_bimbingan_sosial/{id}', [NoTokenApiController::class, 'hapus_bimbingan_sosial']);
Route::delete('/hapus_bimbingan_karir/{id}', [NoTokenApiController::class, 'hapus_bimbingan_karir']);


Route::get('/count_bimbingan_pribadi/{id}', [NoTokenApiController::class, 'count_bimbingan_pribadi']);
Route::get('/count_bimbingan_belajar/{id}', [NoTokenApiController::class, 'count_bimbingan_belajar']);
Route::get('/count_bimbingan_sosial/{id}', [NoTokenApiController::class, 'count_bimbingan_sosial']);
Route::get('/count_bimbingan_karir/{id}', [NoTokenApiController::class, 'count_bimbingan_karir']);

Route::get('/get_guru', [NoTokenApiController::class, 'get_guru']);
Route::get('/get_walas', [NoTokenApiController::class, 'get_walas']);
Route::get('/get_siswa', [NoTokenApiController::class, 'get_siswa']);




// guru
Route::get('/guru/bimbingan_pribadi/{id}', [GuruApiController::class, 'bimbingan_pribadi']);
Route::get('/guru/bimbingan_belajar/{id}', [GuruApiController::class, 'bimbingan_belajar']);
Route::get('/guru/bimbingan_sosial/{id}', [GuruApiController::class, 'bimbingan_sosial']);
Route::get('/guru/bimbingan_karir/{id}', [GuruApiController::class, 'bimbingan_karir']);


Route::post('/guru/tambah_bimbingan_pribadi', [GuruApiController::class, 'tambah_bimbingan_pribadi']);
Route::post('/guru/tambah_bimbingan_belajar', [GuruApiController::class, 'tambah_bimbingan_belajar']);
Route::post('/guru/tambah_bimbingan_sosial', [GuruApiController::class, 'tambah_bimbingan_sosial']);
Route::post('/guru/tambah_bimbingan_karir', [GuruApiController::class, 'tambah_bimbingan_karir']);


Route::put('/guru/ubah_bimbingan_pribadi/{id}', [GuruApiController::class, 'ubah_bimbingan_pribadi']);
Route::put('/guru/ubah_bimbingan_belajar/{id}', [GuruApiController::class, 'ubah_bimbingan_belajar']);
Route::put('/guru/ubah_bimbingan_sosial/{id}', [GuruApiController::class, 'ubah_bimbingan_sosial']);
Route::put('/guru/ubah_bimbingan_karir/{id}', [GuruApiController::class, 'ubah_bimbingan_karir']);


Route::delete('/guru/hapus_bimbingan_pribadi/{id}', [GuruApiController::class, 'hapus_bimbingan_pribadi']);
Route::delete('/guru/hapus_bimbingan_belajar/{id}', [GuruApiController::class, 'hapus_bimbingan_belajar']);
Route::delete('/guru/hapus_bimbingan_sosial/{id}', [GuruApiController::class, 'hapus_bimbingan_sosial']);
Route::delete('/guru/hapus_bimbingan_karir/{id}', [GuruApiController::class, 'hapus_bimbingan_karir']);


Route::get('/guru/count_bimbingan_pribadi/{id}', [GuruApiController::class, 'count_bimbingan_pribadi']);
Route::get('/guru/count_bimbingan_belajar/{id}', [GuruApiController::class, 'count_bimbingan_belajar']);
Route::get('/guru/count_bimbingan_sosial/{id}', [GuruApiController::class, 'count_bimbingan_sosial']);
Route::get('/guru/count_bimbingan_karir/{id}', [GuruApiController::class, 'count_bimbingan_karir']);

Route::get('/guru/get_guru', [GuruApiController::class, 'get_guru']);
Route::get('/guru/get_walas', [GuruApiController::class, 'get_walas']);
Route::get('/guru/get_siswa', [GuruApiController::class, 'get_siswa']);

