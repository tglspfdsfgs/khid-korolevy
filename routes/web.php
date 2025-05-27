<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\Tournament\TournamentController;
use Illuminate\Support\Facades\Route;

Route::get('/', MainPageController::class)->name('index');
Route::resourceFor('article', ArticleController::class);
Route::resourceFor('tournament', TournamentController::class, nestedResources: ['results']);

/*
 * TODO:
 * setting
 * logout
 * Про нас
 * Умови використання
 * Політика конфіденційності
 */
