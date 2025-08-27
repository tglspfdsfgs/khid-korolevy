<?php

namespace App\Services\Pages;

use App\Enums\PageType;
use App\Enums\State;
use App\Models\CompDev;

class CompDevService
{
    protected string $model = CompDev::class;

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
                'type' => PageType::comp_dev,
                'state' => State::draft,
                'title' => 'Заголовок сторінки',
                'description' => "Короткий опис прев'ю-картки",
                'badge' => '',
                'imageSrc' => null,
                'link' => '',
                'content' => '<p><em>Контент основної сторінки</em></p>',
            ])->id;
        }

        $this->model::create($fields);

        return null;
    }

    public function getById(int $id): CompDev
    {
        return $this->model::findOrFail($id);
    }

    public function update(int $id, array $data, State $state): bool
    {
        $article = $this->getById($id);

        return $article->update(array_merge($data, ['id' => $id, 'state' => $state]));
    }
}
