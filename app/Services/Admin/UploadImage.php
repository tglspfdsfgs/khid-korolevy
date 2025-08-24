<?php

namespace App\Services\Admin;

use App\Models\Image;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class UploadImage
{
    protected array $collections = [
        'Новини і статті' => [
            "Прев'ю-картинки" => [],
            'Контент' => [],
        ],
        'Навчання' => [
            "Прев'ю-картинки" => [],
            'Контент' => [],
        ],
        'Турніри' => [
            "Прев'ю-картинки" => [],
            'Контент' => [],
        ],
        'Галерея' => [
            "Прев'ю-картинки" => [],
            'Контент' => [],
        ],
        'Розумаха' => [
            "Прев'ю-картинки" => [],
            'Контент' => [],
        ],
        'Інше' => [],
    ];

    public function getAllImages(): array
    {
        $images = [];

        foreach ($this->collections as $collection => $item) {
            $query = $this->getImages($collection, 1);
            $images[$collection] = $query[$collection] ?? $item;
        }

        return $images;
    }

    public function getSingleCollection(string $collectionName, int $page): array
    {
        $result = $this->getImages($collectionName, $page);

        return array_filter(
            $result,
            fn ($folder) => $folder === $collectionName,
            mode: ARRAY_FILTER_USE_KEY
        );
    }

    public function storeImage(string $collectionName, ?string $subCollection): void
    {
        $image = Image::create();

        $image->addMediaFromRequest('image')
            ->withCustomProperties([
                'subCollection' => $subCollection,
            ])
            ->toMediaCollection($collectionName);
    }

    public function deleteImage(int $imageId): void
    {
        $media = Media::findOrFail($imageId);
        $image = $media->model;
        $media->delete();
        $image?->delete();
    }

    private function getImages(string $collectionName, int $page): array
    {
        $media = $this->queryMedia($collectionName, $page);

        $sortedMedia = $this->sortMediaBySubCollection($media);

        $grouped = $this->groupByCollection($sortedMedia);

        return $this->sortBySubCollection($grouped);
    }

    private function queryMedia(string $collectionName, int $page): LengthAwarePaginator
    {
        return Media::where('model_type', Image::class)
            ->where('collection_name', $collectionName)
            ->orderBy('created_at', 'desc')
            ->paginate(15, ['*'], 'page', $page);
    }

    private function sortMediaBySubCollection(LengthAwarePaginator $media): array
    {
        $mediaCollection = $media->getCollection()->map(function ($media) {
            if (empty($media->custom_properties)
                || empty($media->custom_properties['subCollection'])) {
                return [
                    'id' => $media->id,
                    'url' => $media->getUrl(),
                    'collection_name' => $media->collection_name,
                    'file_name' => $media->file_name,
                    'size' => round($media->size / 1024, 1).' KB',
                ];
            } else {
                return [
                    'id' => $media->id,
                    'url' => $media->getUrl(),
                    'collection_name' => $media->collection_name,
                    'subCollection' => $media->custom_properties['subCollection'],
                    'file_name' => $media->file_name,
                    'size' => round($media->size / 1024, 1).' KB', ];
            }
        });

        return [
            'data' => $mediaCollection,
            'paginator' => $media,
        ];
    }

    private function groupByCollection(array $arguments): array
    {
        $result = $arguments['data']->groupBy(function ($item) {
            return $item['collection_name'];
        })->toArray();

        return [
            'data' => $result,
            'paginator' => $arguments['paginator'],
        ];
    }

    private function sortBySubCollection(array $arguments): array
    {
        $structure = $this->collections;

        foreach ($arguments['data'] as $collectionName => $records) {
            foreach ($records as $record) {
                $sub = $record['subCollection'] ?? null;

                if ($sub && isset($structure[$collectionName][$sub])) {
                    $structure[$collectionName][$sub][] = $record;
                } else {
                    $structure['Інше']['__data'][] = $record;
                }

                $structure[$collectionName]['__paginator'] = $arguments['paginator'];
            }
        }

        return $structure;
    }
}
