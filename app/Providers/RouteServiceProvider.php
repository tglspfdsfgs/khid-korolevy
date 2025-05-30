<?php

namespace App\Providers;

use App\State;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Route::pattern('id', '[0-9]+');

        Route::macro('resourceFor', function (string $name, string $controller, array $nestedResources = []) {
            Route::prefix($name)->name("$name.")->group(function () use ($controller, $nestedResources) {
                Route::get('/', [$controller, 'index'])->name('index');
                Route::get('/{id}', [$controller, 'show'])->name('show');

                // TODO: add auth middleware
                Route::get('/create', [$controller, 'create'])->name('create');
                Route::prefix('/{id}')->group(function () use ($controller) {
                    Route::get('/edit', [$controller, 'edit'])->name('edit');
                    Route::post('/publish', [$controller, State::action(State::published)])->name('publish');
                    Route::post('/draft', [$controller, State::action(State::draft)])->name('draft');
                    Route::post('/delete', [$controller, State::action(State::deleted)])->name('delete');
                });

                foreach ($nestedResources as $resource) {
                    Route::prefix('/{id}'."/$resource")->group(function () use ($controller, $resource) {
                        Route::get('/', [$controller, "$resource".'Show'])->name("$resource.show");
                        Route::get('/edit', [$controller, "$resource".'Edit'])->name("$resource.edit");
                        Route::post('/save', [$controller, $resource.'Save'])->name("$resource.save");
                    });
                }
            });
        });
    }
}
