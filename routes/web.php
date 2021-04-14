<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Utama;
use App\Http\Controllers\Login;
use App\Http\Controllers\Order;
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

Route::get('/',[Utama::class, 'index']);
Route::post('pushData',[Utama::class, 'store']);
Route::get('/login',[Login::class, 'index']);
Route::post('/daftar',[Login::class, 'register']);
Route::post('/masuk',[Login::class, 'masuk']);
Route::get('/keluar',[Login::class, 'keluar']);
Route::post('/AddCart',[Order::class, 'order']);
Route::get('/keranjang',[Order::class, 'keranjang']);