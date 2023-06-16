<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use App\Models\Admin;
use App\Models\Produk;
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

Route::get('/', function () {
    return view('homepage', [
        'produks' => Produk::all(),
    ]);
});


// Admin
Route::get('/loginadm', [AdminController::class, 'loginadm']);
Route::post('/login/admin', [AdminController::class, 'admcheck']);


// Customer
Route::get('/login', [CustomerController::class, 'logincus'])->name('login');
Route::post('/login/customer', [CustomerController::class, 'cuscheck']);


// Auth Customer
Route::middleware('auth:customer')->group(function () {
    Route::get('/logout', [CustomerController::class, 'logout'])->name('logout');
    Route::get('/transaksi/{id}', [TransaksiController::class, 'index']);
    Route::post('/transaksi/store', [TransaksiController::class, 'store']);
});


// Auth Admin
Route::middleware('auth:admin')->group(function () {    
    Route::get('/admin', [AdminController::class, 'dashboard']);
    Route::get('/logout/admin', [AdminController::class, 'logout']);

    // Tambah data Product
    Route::get('/tambah', [ProdukController::class, 'index']);
    Route::post('/store', [ProdukController::class, 'store']);

    // Edit data Product
    Route::get('/edit/{id}', [ProdukController::class, 'edit']);
    Route::post('/update', [ProdukController::class, 'update']);

    // Delete data product
    Route::get('/hapus/{id}', [ProdukController::class, 'hapus']);
});