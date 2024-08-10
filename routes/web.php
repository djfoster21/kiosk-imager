<?php

use App\Http\Controllers\ImagesController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::controller(\App\Http\Controllers\ImagesController::class)
        ->name('images.')
        ->prefix('images')
        ->group(function () {
            Route::post('/upload', 'upload')->name('upload');
            Route::post('/delete', 'delete')->name('delete');
        });
});

require __DIR__.'/auth.php';
