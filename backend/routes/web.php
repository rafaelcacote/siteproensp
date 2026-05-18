<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\NoticiaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'create'])->name('login');
    Route::post('login', [LoginController::class, 'store']);
});

Route::post('logout', [LoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::get('dashboard', fn () => redirect()->route('admin.noticias.index'))
    ->middleware('auth')
    ->name('dashboard');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', fn () => redirect()->route('admin.noticias.index'))->name('dashboard');
    Route::resource('noticias', NoticiaController::class);
});
