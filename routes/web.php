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

    # Wali Kelas
    Route::get('/login_walas', [AuthController::class, 'login_walas'])->name('login_walas');

    # Siswa
    Route::get('/login_siswa', [AuthController::class, 'login_siswa'])->name('login_siswa');

    # Guru
    Route::get('/login_guru', [AuthController::class, 'login_guru'])->name('login_guru');

});
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'home_admin'])->name('home_admin');

    // walas controller
    Route::get('/walas', [AdminController::class, 'show_walas'])->name('show_walas');
    Route::get('/walas/create', [AdminController::class, 'create_walas'])->name('create_walas');
    Route::post('/walas/store', [AdminController::class, 'store_walas'])->name('store_walas');
    Route::post('/walas/destroy/{id}', [AdminController::class, 'destroy_walas'])->name('destroy_walas');
    Route::post('/walas/update/{id}', [AdminController::class, 'update_walas'])->name('update_walas');
    Route::get('/walas/edit/{id}', [AdminController::class, 'edit_walas'])->name('edit_walas');

    // guru bk controller
    Route::get('/guru_bk', [AdminController::class, 'show_guru_bk'])->name('show_guru_bk');
    Route::get('/guru_bk/create', [AdminController::class, 'create_guru_bk'])->name('create_guru_bk');
    Route::post('/guru_bk/store', [AdminController::class, 'store_guru_bk'])->name('store_guru_bk');
    Route::post('/guru_bk/destroy/{id}', [AdminController::class, 'destroy_guru_bk'])->name('destroy_guru_bk');
    Route::post('/guru_bk/update/{id}', [AdminController::class, 'update_guru_bk'])->name('update_guru_bk');
    Route::get('/guru_bk/edit/{id}', [AdminController::class, 'edit_guru_bk'])->name('edit_guru_bk');
});
