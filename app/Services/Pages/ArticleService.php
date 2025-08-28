<?php

namespace App\Services\Pages;

use App\Enums\PageType;
use App\Enums\State;
use App\Models\Article;

class ArticleService extends BaseService
{
    public function __construct()
    {
        parent::__construct(Article::class, [
            'type' => PageType::article,
            'state' => State::draft,
            'title' => 'Заголовок сторінки',
            'description' => "Короткий опис прев'ю-картки",
            'imageSrc' => null,
            'date' => now(),
            'content' => '<p><em>Контент основної сторінки</em></p>',
        ]);
    }
}
