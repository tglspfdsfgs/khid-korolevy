<?php

namespace App\Services\Pages;

use App\Enums\PageType;
use App\Enums\State;
use App\Models\Article;

class ArticleService
{
    public function getAll(array $query): array
    {
        $paginator = Article::where(['state' => $query['state']])
            ->orderBy('created_at', 'desc')
            ->paginate(5)
            ->appends(request()->except('page'));

        return [
            'data' => $paginator->getCollection()->map->toArray()->all(),
            'paginator' => $paginator,
        ];
    }

    public function create(?array $fields = null): ?int
    {
        if (! isset($fields)) {
            return Article::create([
                'type' => PageType::article,
                'state' => State::draft, // "state" => "draft"
                'title' => 'Заголовок сторінки', // "title" => "Заголовок сторінки"
                'description' => "Короткий опис прев'ю-картки", // "description" => "Короткий опис прев'ю-картки"
                'imageSrc' => null, // "imageSrc" => null
                'date' => now(), // "date" => "2025-08-25"
                'content' => 'Контент основної сторінки', // "content" => "<p><em><span style="font-weight: bold;">Контент основної сторінки</span></em></p>"
            ])->id;
        }

        Article::create($fields);

        return null;
    }

    public function getById(int $id): Article
    {
        return Article::findOrFail($id);
    }

    public function update(int $id, array $data, State $state): bool
    {
        $article = $this->getById($id);

        return $article->update(array_merge($data, ['id' => $id, 'state' => $state]));
    }
}
