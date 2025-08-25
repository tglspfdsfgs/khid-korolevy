<?php

namespace App\Services\Pages;

use App\Enums\PageType;
use App\Enums\State;
use App\Models\Article;

class ArticleService
{
    public function getAll(): array
    {
        return Article::all()->toArray();
    }

    public function create(?array $fields): ?int
    {
        if (! isset($fields)) {
            return Article::create([
                'type' => PageType::article,
                'state' => State::draft,
                'title' => 'Заголовок сторінки',
                'description' => "Короткий опис прев'ю-картки",
                'imageSrc' => null,
                'date' => now(),
                'content' => 'Контент основної сторінки',
            ])->id;
        }

        Article::create($fields);

        return null;
    }

    public function getById(int $id): Article
    {
        return Article::findOrFail($id);
    }
}
