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

Route::get('/dashboard', function () {
    return view('layout.page.landingpage');
});

// Route::get('/login', function () {
//     return view('layout.page.login');
// });

Route::controller(AuthController::class)->group(function(){
    Route::get('/login_admin', 'login_admin')->name('login_admin');
    Route::get('/tes', 'tes')->name('tes');
    Route::post('/logout', 'logout')->name('logout');
    Route::post('/login_admin', 'login_admin_action')->name('login_admin_action'); 
});