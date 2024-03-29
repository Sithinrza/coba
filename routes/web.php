<?php

use App\Http\Controllers\ApotekController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

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
/**
 * Route berfungsi sebagai penghubunng antara user dengan keseluruhan framework
 * Dalam laravel, setiap alamat web yang kita ketik di web browseer akan melewati route terlebih dahulu
 * Route yg akan menentukan kemana proses akan dibawa apakah ke Controller atau ke Viewphp
 */

Route::get('/register',[RegisterController::class,'index']);
Route::post('/register_proses',[RegisterController::class,'register_proses']);
Route::get('/',[LoginController::class,'index'])->name('login');
Route::post('/login_proses',[loginController::class,'login_proses']);
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::resource('/products', ApotekController::class)->middleware('auth');
Route::post('/logout', [LoginController::class, 'logout']);

