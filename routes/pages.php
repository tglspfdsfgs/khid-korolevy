<?php

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
