<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
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

# Login Handler
Route::controller(AuthController::class)->group(function(){
    # Admin
    Route::get('/login_admin', 'login_admin')->name('login_admin');
    Route::get('/home_admin', 'home_admin')->name('home.admin');
    Route::post('/logout', 'logout')->name('logout');
    Route::post('/login_admin', 'login_admin_action')->name('login_admin_action'); 

    # Guru
    Route::get('/login_guru', [AuthController::class, 'login_guru'])->name('login_guru');
    Route::post('/login_guru_action', [AuthController::class, 'login_guru_action'])->name('login_guru_action');
    Route::post('/logout_guru', 'logout_guru')->name('logout_guru');

    # Siswa
    Route::get('/login_siswa', [AuthController::class, 'login_siswa'])->name('login_siswa');

    # Wali Kelas
    Route::get('/login_walas', [AuthController::class, 'login_walas'])->name('login_walas');

});

Route::get('/admin/dashboard', [AdminController::class, 'home_admin'])->name('home_admin');
