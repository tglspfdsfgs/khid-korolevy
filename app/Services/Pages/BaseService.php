<?php

namespace App\Services\Pages;

use App\Enums\State;
use Illuminate\Database\Eloquent\Model;

abstract class BaseService
{
    public function __construct(protected string $model, protected array $fields)
    {
    }

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
            return $this->model::create($this->fields)->id;
        }

        $this->model::create($fields);

        return null;
    }

    public function getById(int $id): Model
    {
        return $this->model::findOrFail($id);
    }

    public function update(int $id, array $data, State $state): bool
    {
        $article = $this->getById($id);

        return $article->update(array_merge($data, ['id' => $id, 'state' => $state]));
    }
}
