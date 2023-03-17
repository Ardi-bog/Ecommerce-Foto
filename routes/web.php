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
Route::get('/detail/{id}', [UserController::class, 'detail']);
Route::get('/porto/{id}', [UserController::class, 'porto']);
Route::get('/blog', [BlogController::class, 'index']);
Route::get('/kategori/{id}', [UserController::class, 'kategori']);
Route::get('/search', [UserController::class, 'search']);
Route::get('/login', [UserController::class, 'login'])->middleware('guest:user');
Route::post('/doLogin', [UserController::class, 'doLogin'])->middleware('guest:user');
Route::get('/register', [UserController::class, 'register'])->middleware('guest:user');
Route::post('/doRegister', [UserController::class, 'doRegister'])->middleware('guest:user');

Route::post('/pesan', [UserController::class, 'pesan'])->middleware('auth:user');

Route::get('/logout', [UserController::class, 'logout']);



//Admin
Route::get('/admin/login', [AdminController::class, 'login'])->name('login-admin')->middleware('guest:admin');
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
Route::get('/vendor/login', [VendorController::class, 'login'])->name('login-vendor')->middleware('guest:vendor');
Route::get('/vendor/register', [VendorController::class, 'register'])->name('register-vendor')->middleware('guest:vendor');
Route::post('/vendor/doRegister', [VendorController::class, 'doRegister'])->middleware('guest:vendor');
Route::post('/vendor/doLogin', [VendorController::class, 'doLogin'])->middleware('guest:vendor');
Route::get('/vendor/logout', [VendorController::class, 'logout']);
Route::get('/vendor',[VendorController::class,'index']);
Route::get('/vendor/detail',[VendorController::class,'detail']);
Route::post('/vendor/ubahDetail',[VendorController::class,'ubahDetail']);
Route::post('/vendor/uploadSlider',[VendorController::class,'uploadSlider']);
Route::delete('/vendor/hapusSlider',[VendorController::class,'hapusSlider']);


Route::get('/vendor/ubah-password',[VendorController::class,'ubahPassword']);
Route::post('/vendor/doUbahPassword',[VendorController::class,'doUbahPassword']);