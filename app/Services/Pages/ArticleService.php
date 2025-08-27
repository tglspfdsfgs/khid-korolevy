<?php

namespace App\Services\Pages;

use App\Enums\PageType;
use App\Enums\State;
use App\Models\Article;

class ArticleService
{
    protected string $model = Article::class;

    public function getAll(array $query): array
    {
        $paginator = $this->model::where(['state' => $query['state']])
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
            return $this->model::create([
                'type' => PageType::article,
                'state' => State::draft,
                'title' => 'Заголовок сторінки',
                'description' => "Короткий опис прев'ю-картки",
                'imageSrc' => null,
                'date' => now(),
                'content' => '<p><em>Контент основної сторінки</em></p>',
            ])->id;
        }

        $this->model::create($fields);

        return null;
    }

    public function getById(int $id): Article
    {
        return $this->model::findOrFail($id);
    }

    public function update(int $id, array $data, State $state): bool
    {
        $article = $this->getById($id);

        return $article->update(array_merge($data, ['id' => $id, 'state' => $state]));
    }
}
