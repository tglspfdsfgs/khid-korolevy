<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main', [
        'title' => 'головна',
        'content' => 'components.pages.index',
    ]);
});

Route::get('/articles', function () {
    return view('main', [
        'title' => 'новини і статті',
        'content' => 'components.pages.articles',
    ]);
});

Route::get('/tournaments', function () {
    return view('main', [
        'title' => 'турніри',
        'content' => 'components.pages.tournaments',
    ]);
});

Route::get('/article/1', function () {
    return view('main', [
        'title' => 'Шахи: правила, стратегії та цікаві факти для початківців і професіоналів',
        'content' => 'components.pages.article',
    ]);
});

Route::get('/article/1/edit', function () {
    return view('main', [
        'title' => 'Шахи: правила, стратегії та цікаві факти для початківців і професіоналів',
        'content' => 'components.pages.editor',
    ]);
});
