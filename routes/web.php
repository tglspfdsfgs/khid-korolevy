<?php

use App\Http\Controllers\Admin\UploadImageController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ComprehensiveDevelopment;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\Tournament\TournamentController;
use Illuminate\Support\Facades\Route;

Route::get('/', MainPageController::class)->name('index');
Route::resourceFor('article', ArticleController::class);
Route::resourceFor('tournament', TournamentController::class, nestedResources: ['results']);
Route::resourceFor('gallery', GalleryController::class);
Route::resourceFor('education', EducationController::class);
Route::resourceFor('comp_dev', ComprehensiveDevelopment::class);

Route::get('/login', [AuthController::class, 'create'])->name('auth.create');
Route::post('/login', [AuthController::class, 'store'])->name('auth.store');
Route::post('/logout', [AuthController::class, 'destroy'])->name('auth.destroy');

Route::prefix('/admin-panel')->middleware(['auth'])->group(function () {
    Route::get('/upload-image/index', [UploadImageController::class, 'index'])->name('upload-image.index');
    Route::post('/upload-image/store', [UploadImageController::class, 'store'])->name('upload-image.store');
    Route::delete('/upload-image/destroy', [UploadImageController::class, 'destroy'])->name('upload-image.destroy');
});

/*
 * TODO:
 * setting
 * Про нас
 * Умови використання
 * Політика конфіденційності
 */
