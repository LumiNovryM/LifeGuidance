<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\WalasController;
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
    Route::post('/login_admin_action', 'login_admin_action')->name('login_admin_action'); 
    Route::post('/logout_admin', 'logout')->name('logout_admin');
    Route::post('/logout_walas', 'logout')->name('logout_walas');
    Route::post('/logout_guru', 'logout')->name('logout_guru');

    # Guru
    Route::get('/login_guru', 'login_guru')->name('login_guru');
    Route::post('/login_guru_action', 'login_guru_action')->name('login_guru_action');
    Route::post('/logout_guru', 'logout')->name('logout_guru');

    # Siswa
    Route::get('/login_siswa', [AuthController::class, 'login_siswa'])->name('login_siswa');
    Route::post('/login_siswa_action', [AuthController::class, 'login_siswa_action'])->name('login_siswa_action');

    # Wali Kelas
    Route::get('/login_walas', [AuthController::class, 'login_walas'])->name('login_walas');
    Route::post('/login_walas_action', [AuthController::class, 'login_walas_action'])->name('login_walas_action');
    

});

# Admin Handler
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

    // siswa controller
    Route::get('kelas/siswa/{id}', [AdminController::class, 'show_siswa'])->name('show_siswa');
    Route::get('kelas/siswa/create/{id}', [AdminController::class, 'create_siswa'])->name('create_siswa');
    Route::post('kelas/siswa/store', [AdminController::class, 'store_siswa'])->name('store_siswa');
    Route::post('kelas/siswa/destroy/{id}', [AdminController::class, 'destroy_siswa'])->name('destroy_siswa');
    Route::post('kelas/siswa/update/{id}', [AdminController::class, 'update_siswa'])->name('update_siswa');
    Route::get('kelas/siswa/edit/{id}', [AdminController::class, 'edit_siswa'])->name('edit_siswa');

    // kelas
    Route::get('/kelas', [AdminController::class, 'show_kelas'])->name('show_kelas');
    Route::get('/kelas/create', [AdminController::class, 'create_kelas'])->name('create_kelas');
    Route::post('/kelas/store', [AdminController::class, 'store_kelas'])->name('store_kelas');
    Route::post('/kelas/destroy/{id}', [AdminController::class, 'destroy_kelas'])->name('destroy_kelas');
    Route::post('/kelas/update/{id}', [AdminController::class, 'update_kelas'])->name('update_kelas');
    Route::get('/kelas/edit/{id}', [AdminController::class, 'edit_kelas'])->name('edit_kelas');
});

# Walas Handler
Route::prefix('walas')->group(function () {
    Route::get('/dashboard', [WalasController::class, 'home_walas'])->name('home_walas');
});

# Siswa Handler
Route::prefix('siswa')->group(function () {
    Route::get('/dashboard', [SiswaController::class, 'home_siswa'])->name('home_siswa');

    //bimbingan pribadi
    Route::get('/bimbingan_pribadi', [SiswaController::class, 'show_bimbingan_pribadi'])->name('show_bimbingan_pribadi');
    Route::get('/bimbingan_pribadi/list', [SiswaController::class, 'show_list_bimbingan_pribadi'])->name('show_list_bimbingan_pribadi');
    Route::get('/bimbingan_pribadi/create/{id}', [SiswaController::class, 'show_form_bimbingan_pribadi'])->name('show_form_bimbingan_pribadi');
    Route::post('/bimbingan_pribadi/store', [SiswaController::class, 'store_bimbingan_pribadi'])->name('store_bimbingan_pribadi');
    Route::get('/bimbingan_pribadi/list/detail/{id}', [SiswaController::class, 'detail_bimbingan_pribadi'])->name('detail_bimbingan_pribadi');
    

    // bimbingan belajar
    Route::get('/bimbingan_belajar', [SiswaController::class, 'bimbingan_belajar'])->name('bimbingan_belajar');
    Route::post('/bimbingan_belajar/store', [SiswaController::class, 'store_bimbingan_belajar'])->name('store_bimbingan_belajar');
    Route::get('/bimbingan_belajar/list', [SiswaController::class, 'list_bimbingan_belajar'])->name('list_bimbingan_belajar');
    Route::get('/bimbingan_belajar/list/detail/{id}', [SiswaController::class, 'detail_bimbingan_belajar'])->name('detail_bimbingan_belajar');
    Route::get('/bimbingan_belajar/create/{id}', [SiswaController::class, 'create_bimbingan_belajar'])->name('create_bimbingan_belajar');
});

# guru Handler
Route::prefix('guru')->group(function () {
    Route::get('/dashboard', [GuruController::class, 'home_guru'])->name('home_guru');
});
