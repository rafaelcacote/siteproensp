<?php

use App\Http\Controllers\Api\V1\PublicNoticiaController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->name('api.v1.')->middleware('throttle:120,1')->group(function () {
    Route::get('noticias', [PublicNoticiaController::class, 'index'])->name('noticias.index');
    Route::get('noticias/{slug}', [PublicNoticiaController::class, 'show'])->name('noticias.show');
});
