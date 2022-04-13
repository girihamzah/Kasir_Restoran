<?php

use Illuminate\Support\Facades\Route;
use App\Models\Transaksi;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
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
    return view('welcome');
});

Auth::routes(['register' => 'false']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function() {
    Route::name('admin.')->prefix('admin')->group(function () {
        Route::resource('user', UserController::class);
    });
    
    Route::name('manajer.')->prefix('manajer')->group(function () {
        Route::resource('menu', MenuController::class);
        Route::get('laporan', function(){
            $transaksis = Transaksi::all();
            return view('manajer.laporan.index',compact('transaksis'));
        })->name('laporan');
    });
    
    Route::name('kasir.')->prefix('kasir')->group(function() {
        Route::resource('transaksi', TransaksiController::class);
    });
});