<?php

use App\Http\Controllers\HistoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('login', [LoginController::class, 'index']);
Route::get('register', [LoginController::class, 'registers']);

Route::get('dashboard', [HomeController::class, 'index']);

Route::post('cek-login', [LoginController::class, 'validasi']);
Route::post('registerProses', [LoginController::class, 'registerProses']);

Route::post('history', [HistoryController::class, 'index']);
