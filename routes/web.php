<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main', [
        'title' => 'головна',
        'page' => 'components.pages.index',
    ]);
});

Route::get('/articles', function () {
    return view('main', [
        'title' => 'новини і статті',
        'page' => 'components.pages.articles',
    ]);
});

Route::get('/tournaments', function () {
    return view('main', [
        'title' => 'турніри',
        'page' => 'components.pages.tournaments',
    ]);
});

Route::get('/tournament/1', function () {
    return view('main', [
        'title' => 'Відкритий шаховий турнір \'Король дошки\' – реєструйся та вигравай!',
        'page' => 'components.pages.tournament',
        'content' => '',
    ]);
});

Route::get('/article/1', function () {
    return view('main', [
        'title' => 'Шахи: правила, стратегії та цікаві факти для початківців і професіоналів',
        'page' => 'components.pages.article',
        'content' => '',
    ]);
});

Route::get('/tournament/1/edit', function () {
    return view('main', [
        'title' => "Відкритий шаховий турнір 'Король дошки' – реєструйся та вигравай!",
        'page' => 'components.pages.tournament-editor',
        'content' => '',
    ]);
});

Route::get('/article/1/edit', function () {
    return view('main', [
        'title' => 'Шахи: правила, стратегії та цікаві факти для початківців і професіоналів',
        'page' => 'components.pages.article-editor',
        'content' => '',
    ]);
});

Route::post('/editor', function () {
    dump(request()->all());
});
