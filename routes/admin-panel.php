<?php

use App\Http\Controllers\Admin\UploadImageController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin-panel')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return redirect()->route('upload-image.index');
    });
    Route::get('/upload-image/index', [UploadImageController::class, 'index'])->name('upload-image.index');
    Route::get('/upload-image/show', [UploadImageController::class, 'show'])->name('upload-image.show');
    Route::post('/upload-image/store', [UploadImageController::class, 'store'])->name('upload-image.store');
    Route::delete('/upload-image/destroy', [UploadImageController::class, 'destroy'])->name('upload-image.destroy');
});
