<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index', ['title' => 'головна']);
});

Route::get('/articles', function () {
    return view('articles', ['title' => 'новини і статті']);
});

Route::get('/tournaments', function () {
    return view('tournaments', ['title' => 'турніри']);
});

Route::get('/article/1', function () {
    return view('article', ['title' => 'Шахи: правила, стратегії та цікаві факти для початківців і професіоналів']);
});
