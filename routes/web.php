<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\WalasController;


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

Route::controller(DashboardController::class)->group(function () {

    # ID
    Route::get('/', 'indonesia')->name('dashboard');
    Route::get('/jp', 'japanese');

});

# Login Handler
Route::controller(AuthController::class)->group(function () {

    # Admin
    Route::get('/login_admin', 'login_admin')->name('login_admin');
    Route::post('/login_admin_action', 'login_admin_action')->name('login_admin_action');
    Route::post('/logout_admin', 'logout_admin')->name('logout_admin');

    # Guru
    Route::get('/login_guru', 'login_guru')->name('login_guru');
    Route::post('/login_guru_action', 'login_guru_action')->name('login_guru_action');
    Route::post('/logout_guru', 'logout_guru')->name('logout_guru');

    # Siswa
    Route::get('/login_siswa', [AuthController::class, 'login_siswa'])->name('login_siswa');
    Route::post('/login_siswa_action', [AuthController::class, 'login_siswa_action'])->name('login_siswa_action');
    Route::post('/logout_siswa', 'logout_siswa')->name('logout_siswa');

    # Wali Kelas
    Route::get('/login_walas', [AuthController::class, 'login_walas'])->name('login_walas');
    Route::post('/login_walas_action', [AuthController::class, 'login_walas_action'])->name('login_walas_action');
    Route::post('/logout_walas', 'logout_walas')->name('logout_walas');

    //profile
    Route::get('/profile', [AuthController::class, 'show_profile'])->name('show_profile');
});

# Admin Handler
Route::prefix('admin')->middleware('auth')->group(function () {
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


    // arsip
    Route::get('/arsip', [AdminController::class, 'show_arsip'])->name('show_arsip');
    Route::get('/arsip/kelas/{id}', [AdminController::class, 'kelas_arsip'])->name('kelas_arsip');
    Route::get('/arsip/kelas/list_pribadi/{id}', [AdminController::class, 'list_arsip_pribadi'])->name('list_arsip_pribadi');
    Route::get('/arsip/kelas/list_pribadi/detail/{id}/{kelas_id}', [AdminController::class, 'detail_arsip_pribadi'])->name('detail_arsip_pribadi');
    Route::get('/arsip/kelas/list_belajar/{id}', [AdminController::class, 'list_arsip_belajar'])->name('list_arsip_belajar');
    Route::get('/arsip/kelas/list_belajar/detail/{id}/{kelas_id}', [AdminController::class, 'detail_arsip_belajar'])->name('detail_arsip_belajar');
    Route::get('/arsip/kelas/list_sosial/{id}', [AdminController::class, 'list_arsip_sosial'])->name('list_arsip_sosial');
    Route::get('/arsip/kelas/list_sosial/detail/{id}/{kelas_id}', [AdminController::class, 'detail_arsip_sosial'])->name('detail_arsip_sosial');
    Route::get('/arsip/kelas/list_karir/{id}', [AdminController::class, 'list_arsip_karir'])->name('list_arsip_karir');
    Route::get('/arsip/kelas/list_karir/detail/{id}/{kelas_id}', [AdminController::class, 'detail_arsip_karir'])->name('detail_arsip_karir');





    //profile
    Route::get('/profile_admin', [AdminController::class, 'show_profile_admin'])->name('show_profile_admin');
});

# Walas Handler
Route::prefix('walas')->middleware('auth:walas')->group(function () {
    Route::get('/dashboard', [WalasController::class, 'home_walas'])->name('home_walas');

    // bimbingan pribadi
    Route::get('/jadwal_bimbingan_pribadi', [WalasController::class, 'walas_list_bimbingan_pribadi'])->name('walas_list_bimbingan_pribadi');
    Route::get('/detail_bimbingan_pribadi/{id}', [WalasController::class, 'walas_detail_bimbingan_pribadi'])->name('walas_detail_bimbingan_pribadi');

    // bimbingan belajar
    Route::get('/jadwal_bimbingan_belajar', [WalasController::class, 'walas_list_bimbingan_belajar'])->name('walas_list_bimbingan_belajar');
    Route::get('/detail_bimbingan_belajar/{id}', [WalasController::class, 'walas_detail_bimbingan_belajar'])->name('walas_detail_bimbingan_belajar');

    // bimbingan sosial
    Route::get('/jadwal_bimbingan_sosial', [WalasController::class, 'walas_list_bimbingan_sosial'])->name('walas_list_bimbingan_sosial');
    Route::get('/detail_bimbingan_sosial/{id}', [WalasController::class, 'walas_detail_bimbingan_sosial'])->name('walas_detail_bimbingan_sosial');

    // bimbingan karir
    Route::get('/jadwal_bimbingan_karir', [WalasController::class, 'walas_list_bimbingan_karir'])->name('walas_list_bimbingan_karir');
    Route::get('/detail_bimbingan_karir/{id}', [WalasController::class, 'walas_detail_bimbingan_karir'])->name('walas_detail_bimbingan_karir');

    // peta kerawanan
    Route::get('/peta_kerawanan', [WalasController::class, 'walas_peta_kerawanan'])->name('walas_peta_kerawanan');
    Route::get('/peta_kerawanan/detail/{id}', [WalasController::class, 'walas_detail_peta_kerawanan'])->name('walas_detail_peta_kerawanan');
    Route::post('/peta_kerawanan/update/{id}', [WalasController::class, 'walas_update_peta_kerawanan'])->name('walas_update_peta_kerawanan');

    //profile
    Route::get('/profile_walas', [WalasController::class, 'show_profile_walas'])->name('show_profile_walas');

    Route::get('/export_pdf/{id}', [WalasController::class, 'export_pdf'])->name('export_pdf_walas');
    Route::get('/export_excel/{id}', [GuruController::class, 'export_excel'])->name('export_excel_walas');

});

# Siswa Handler
Route::prefix('siswa')->middleware('auth:siswa')->group(function () {
    Route::get('/dashboard', [SiswaController::class, 'home_siswa'])->name('home_siswa');

    //bimbingan pribadi
    Route::get('/bimbingan_pribadi', [SiswaController::class, 'show_bimbingan_pribadi'])->name('show_bimbingan_pribadi');
    Route::post('/bimbingan_pribadi/store', [SiswaController::class, 'store_bimbingan_pribadi'])->name('store_bimbingan_pribadi');
    Route::get('/bimbingan_pribadi/detail/{id}', [SiswaController::class, 'detail_bimbingan_pribadi'])->name('detail_bimbingan_pribadi');


    // bimbingan belajar
    Route::get('/bimbingan_belajar', [SiswaController::class, 'bimbingan_belajar'])->name('bimbingan_belajar');
    Route::post('/bimbingan_belajar/store', [SiswaController::class, 'store_bimbingan_belajar'])->name('store_bimbingan_belajar');
    Route::get('/bimbingan_belajar/detail/{id}', [SiswaController::class, 'detail_bimbingan_belajar'])->name('detail_bimbingan_belajar');


    // bimbingan sosial
    Route::get('/bimbingan_sosial', [SiswaController::class, 'bimbingan_sosial'])->name('bimbingan_sosial');
    Route::post('/bimbingan_sosial/store', [SiswaController::class, 'store_bimbingan_sosial'])->name('store_bimbingan_sosial');
    Route::get('/bimbingan_sosial/detail/{id}', [SiswaController::class, 'detail_bimbingan_sosial'])->name('detail_bimbingan_sosial');

    // bimbingan sosial
    Route::get('/bimbingan_karir', [SiswaController::class, 'bimbingan_karir'])->name('bimbingan_karir');
    Route::post('/bimbingan_karir/store', [SiswaController::class, 'store_bimbingan_karir'])->name('store_bimbingan_karir');
    Route::get('/bimbingan_karir/detail/{id}', [SiswaController::class, 'detail_bimbingan_karir'])->name('detail_bimbingan_karir');

     //profile
     Route::get('/profile', [SiswaController::class, 'show_profile'])->name('show_profile_siswa');
});

# guru Handler
Route::prefix('guru')->middleware('auth:guru')->group(function () {
    Route::get('/dashboard', [GuruController::class, 'home_guru'])->name('home_guru');

    // bimbingan pribadi
    Route::get('/bimbingan_pribadi', [GuruController::class, 'guru_bimbingan_pribadi'])->name('guru_bimbingan_pribadi');
    Route::post('/bimbingan_pribadi/store', [GuruController::class, 'guru_store_bimbingan_pribadi'])->name('guru_store_bimbingan_pribadi');
    Route::get('/bimbingan_pribadi/detail/{id}', [GuruController::class, 'guru_detail_bimbingan_pribadi'])->name('guru_detail_bimbingan_pribadi');
    Route::post('/bimbingan_pribadi/update/{id}', [GuruController::class, 'guru_update_bimbingan_pribadi'])->name('guru_update_bimbingan_pribadi');
    Route::post('/bimbingan_pribadi/accept/{id}', [GuruController::class, 'guru_accept_bimbingan_pribadi'])->name('guru_accept_bimbingan_pribadi');
    Route::post('/bimbingan_pribadi/finish/{id}', [GuruController::class, 'guru_finish_bimbingan_pribadi'])->name('guru_finish_bimbingan_pribadi');

    // bimbingan belajar
    Route::get('/bimbingan_belajar', [GuruController::class, 'guru_bimbingan_belajar'])->name('guru_bimbingan_belajar');
    Route::post('/bimbingan_belajar/store', [GuruController::class, 'guru_store_bimbingan_belajar'])->name('guru_store_bimbingan_belajar');
    Route::get('/bimbingan_belajar/detail/{id}', [GuruController::class, 'guru_detail_bimbingan_belajar'])->name('guru_detail_bimbingan_belajar');
    Route::post('/bimbingan_belajar/update/{id}', [GuruController::class, 'guru_update_bimbingan_belajar'])->name('guru_update_bimbingan_belajar');
    Route::post('/bimbingan_belajar/accept/{id}', [GuruController::class, 'guru_accept_bimbingan_belajar'])->name('guru_accept_bimbingan_belajar');
    Route::post('/bimbingan_belajar/finish/{id}', [GuruController::class, 'guru_finish_bimbingan_belajar'])->name('guru_finish_bimbingan_belajar');


    // bimbingan sosial
    Route::get('/bimbingan_sosial', [GuruController::class, 'guru_bimbingan_sosial'])->name('guru_bimbingan_sosial');
    Route::post('/bimbingan_sosial/store', [GuruController::class, 'guru_store_bimbingan_sosial'])->name('guru_store_bimbingan_sosial');
    Route::get('/bimbingan_sosial/detail/{id}', [GuruController::class, 'guru_detail_bimbingan_sosial'])->name('guru_detail_bimbingan_sosial');
    Route::post('/bimbingan_sosial/update/{id}', [GuruController::class, 'guru_update_bimbingan_sosial'])->name('guru_update_bimbingan_sosial');
    Route::post('/bimbingan_sosial/accept/{id}', [GuruController::class, 'guru_accept_bimbingan_sosial'])->name('guru_accept_bimbingan_sosial');
    Route::post('/bimbingan_sosial/finish/{id}', [GuruController::class, 'guru_finish_bimbingan_sosial'])->name('guru_finish_bimbingan_sosial');


    // bimbingan karir
    Route::get('/bimbingan_karir', [GuruController::class, 'guru_bimbingan_karir'])->name('guru_bimbingan_karir');
    Route::post('/bimbingan_karir/store', [GuruController::class, 'guru_store_bimbingan_karir'])->name('guru_store_bimbingan_karir');
    Route::get('/bimbingan_karir/detail/{id}', [GuruController::class, 'guru_detail_bimbingan_karir'])->name('guru_detail_bimbingan_karir');
    Route::post('/bimbingan_karir/update/{id}', [GuruController::class, 'guru_update_bimbingan_karir'])->name('guru_update_bimbingan_karir');
    Route::post('/bimbingan_karir/accept/{id}', [GuruController::class, 'guru_accept_bimbingan_karir'])->name('guru_accept_bimbingan_karir');
    Route::post('/bimbingan_karir/finish/{id}', [GuruController::class, 'guru_finish_bimbingan_karir'])->name('guru_finish_bimbingan_karir');


    // peta kerawanan
    Route::get('/peta_kerawanan', [GuruController::class, 'guru_peta_kerawanan'])->name('guru_peta_kerawanan');
    Route::get('/peta_kerawanan/list/{id}', [GuruController::class, 'guru_list_peta_kerawanan'])->name('guru_list_peta_kerawanan');
    Route::get('/peta_kerawanan/edit/{id}', [GuruController::class, 'guru_edit_peta_kerawanan'])->name('guru_edit_peta_kerawanan');
    Route::get('/peta_kerawanan/create/{id}', [GuruController::class, 'guru_create_peta_kerawanan'])->name('guru_create_peta_kerawanan');
    Route::post('/peta_kerawanan/update/{id}', [GuruController::class, 'guru_update_peta_kerawanan'])->name('guru_update_peta_kerawanan');
    Route::post('/peta_kerawanan/store', [GuruController::class, 'guru_store_peta_kerawanan'])->name('guru_store_peta_kerawanan');
    Route::get('/export_pdf/{id}', [GuruController::class, 'export_pdf'])->name('export_pdf');
    Route::get('/export_excel/{id}', [GuruController::class, 'export_excel'])->name('export_excel_guru');




    //profile
    Route::get('/profile_guru', [GuruController::class, 'show_profile_guru'])->name('show_profile_guru');
});

# API GOOGLE
Route::get('login/google/',[AuthController::class, 'redirectToGoogle'])->name('login.google');
Route::get('login/google/callback',[AuthController::class, 'handleGoogleCallback']);
