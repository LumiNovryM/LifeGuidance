<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\landingpageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layout.page.landingpage');
});

# Login Page For Admin
Route::get('/login_admin', [AuthController::class, 'login_admin'])->name('login_admin');
# Login Page For Wali Kelas
Route::get('/login_walas', [AuthController::class, 'login_walas'])->name('login_walas');
# Route Page For Siswa
Route::get('/login_siswa', [AuthController::class, 'login_siswa'])->name('login_siswa');
# Route Page For Guru BK
Route::get('/login_guru', [AuthController::class, 'login_guru'])->name('login_guru');