<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [UserController::class, 'index']);
Route::get('/blog', [BlogController::class, 'index']);
Route::get('/blog/kategori/{id}', [UserController::class, 'kategori']);
Route::get('/login', [UserController::class, 'login'])->middleware('guest:user');
Route::post('/doLogin', [UserController::class, 'doLogin'])->middleware('guest:user');
Route::get('/register', [UserController::class, 'register'])->middleware('guest:user');
Route::post('/doRegister', [UserController::class, 'doRegister'])->middleware('guest:user');

Route::post('/pesan', [UserController::class, 'pesan'])->middleware('auth:user');

Route::get('/logout', [UserController::class, 'logout']);



//Admin
Route::get('/admin/login', [AdminController::class, 'login'])->name('login')->middleware('guest:admin');
Route::post('/admin/doLogin', [AdminController::class, 'doLogin'])->middleware('guest:admin');
Route::get('/admin/logout', [AdminController::class, 'logout']);

Route::get('/admin', [AdminController::class, 'index'])->name('dashboard');

Route::get('/admin/kategori', [AdminController::class, 'kategori'])->name('kategori');
Route::post('/admin/kategori/tambah', [AdminController::class, 'kategoriInsert']);
Route::get('/admin/kategori/detail/{id}', [AdminController::class, 'kategoriDetail']);
Route::post('/admin/kategori/edit', [AdminController::class, 'kategoriEdit']);
Route::post('/admin/kategori/hapus', [AdminController::class, 'kategoriHapus']);

Route::get('/admin/vendor', [AdminController::class, 'vendor'])->name('vendor');
Route::post('/admin/vendor/tambah', [AdminController::class, 'vendorInsert']);
Route::get('/admin/vendor/detail/{id}', [AdminController::class, 'vendorDetail']);
Route::post('/admin/vendor/edit', [AdminController::class, 'vendorEdit']);
Route::post('/admin/vendor/hapus', [AdminController::class, 'vendorHapus']);

Route::get('/admin/user', [AdminController::class, 'user']);

Route::get('/admin/profile', [AdminController::class, 'profile']);
Route::post('/admin/editProfile', [AdminController::class, 'profileEdit']);

Route::get('/admin/pesanan', [AdminController::class, 'pesanan'])->name('pesanan');


//vendor 
Route::get('/vendor',[VendorController::class,'index']);