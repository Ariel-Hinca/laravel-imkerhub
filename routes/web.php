<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\NewsController;


Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /* "/admin" enkel voor admins toegangkelijk die de middelware check up voldoen */
    Route::get('/admin', function () {
        return 'Admin dashboard (alleen voor admins)';
    })->middleware(['auth', 'admin'])->name('admin');
});

// Views rutes voor niet ingelogde users zichtbaarheid en voor user's updates (avatar/profielfoto)
// Publiek profiel
Route::get('/users/{user}', [UserProfileController::class, 'show'])->name('profile.show');

// Eigen profiel bewerken
Route::get('/profile/edit-extra', [UserProfileController::class, 'edit'])
    ->middleware('auth')
    ->name('profile.edit.extra');

// Opslaan
Route::post('/profile/update-extra', [UserProfileController::class, 'update'])
    ->middleware('auth')
    ->name('profile.update.extra');

require __DIR__.'/auth.php';

// Toon de news views
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');

