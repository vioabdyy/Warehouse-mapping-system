<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermintaanController;
use App\Http\Controllers\DriverController;



Route::get('/', [LoginController::class,'login'] )->name('login');
Route::post('/postlogin', [LoginController::class,'postlogin'] )->name('postlogin');
Route::get('/logout', [LoginController::class,'logout'] )->name('logout');
Route::get('/dashboard', [DashboardController::class,'index'] )->name('dashboard');

Route::middleware(['auth','ceklevel:admin,user,penanggung jawab,pengawas,receiving'])->group(function () {
    Route::get('/index', [AdminController::class,'index'] )->name('index');
    Route::get('/tambah_palet', [AdminController::class,'tambah_palet'] )->name('tambah_palet');
    Route::post('/simpan_palet', [AdminController::class,'simpan_palet'] )->name('simpan_palet');    
    Route::get('/edit_palet/{id}', [AdminController::class,'edit'] )->name('edit_palet'); 
    Route::post('/update_palet/{id}', [AdminController::class,'update'] )->name('update_palet');
    Route::get('/delete_palet/{id}', [AdminController::class,'destroy'] )->name('delete_palet'); 
    Route::get('/index_user', [UserController::class,'index_user'] )->name('index_user');
    Route::get('/index_permintaan', [PermintaanController::class,'index_permintaan'] )->name('index_permintaan');
    Route::get('/tambah_permintaan', [PermintaanController::class,'tambah_permintaan'] )->name('tambah_permintaan');
    Route::post('/simpan_permintaan', [PermintaanController::class,'simpan_permintaan'] )->name('simpan_permintaan'); 
    Route::get('/edit_permintaan/{id}', [PermintaanController::class,'edit'] )->name('edit_permintaan'); 
    Route::post('/update_permintaan/{id}', [PermintaanController::class,'update'] )->name('update_permintaan');
    Route::get('/delete_permintaan/{id}', [PermintaanController::class,'destroy'] )->name('delete_permintaan'); 
    Route::get('/index_driver', [DriverController::class,'index_driver'] )->name('index_driver');
    Route::get('/tambah_driver', [DriverController::class,'tambah_driver'] )->name('tambah_driver');
    Route::post('/simpan_driver', [DriverController::class,'simpan_driver'] )->name('simpan_driver');
    Route::get('/edit_driver/{id}', [DriverController::class,'edit'] )->name('edit_driver');
    Route::post('/update_driver/{id}', [DriverController::class,'update'] )->name('update_driver');
    Route::get('/delete_driver/{id}', [DriverController::class,'destroy'] )->name('delete_driver'); 

 
 

});
 


