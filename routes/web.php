<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index',
        [
            'title' => 'головна',
        ]
    );
});

Route::get('/articles', function () {
    return view('articles',
        [
            'title' => 'новини і статті',
        ]
    );
});

Route::get('/tournaments', function () {
    return view('tournaments',
        [
            'title' => 'турніри',
        ]
    );
});
