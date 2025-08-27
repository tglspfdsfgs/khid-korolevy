<?php

use App\Http\Controllers\Admin\UploadImageController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Pages\ArticleController;
use App\Http\Controllers\Pages\ComprehensiveDevelopment;
use App\Http\Controllers\Pages\EducationController;
use App\Http\Controllers\Pages\GalleryController;
use App\Http\Controllers\Pages\MainPageController;
use App\Http\Controllers\Pages\Tournament\TournamentController;
use Illuminate\Support\Facades\Route;

Route::get('/', MainPageController::class)->name('index');
Route::resourceFor('article', ArticleController::class);
Route::resourceFor('tournament', TournamentController::class, nestedResources: ['results']);
Route::resourceFor('gallery', GalleryController::class);
Route::resourceFor('education', EducationController::class);
Route::resourceFor('comp_dev', ComprehensiveDevelopment::class);

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'create'])->name('auth.create');
    Route::post('/login', [AuthController::class, 'store'])->name('auth.store');
    Route::post('/logout', [AuthController::class, 'destroy'])->name('auth.destroy');
});

Route::prefix('/admin-panel')->middleware(['auth'])->group(function () {
    Route::get('/upload-image/index', [UploadImageController::class, 'index'])->name('upload-image.index');
    Route::get('/upload-image/show', [UploadImageController::class, 'show'])->name('upload-image.show');
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
