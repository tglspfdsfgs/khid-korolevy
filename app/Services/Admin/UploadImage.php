<?php

namespace App\Services\Admin;

use App\Models\Image;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class UploadImage
{
    protected static array $collections = [
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

    public static function getAllImages(): array
    {
        $images = [];

        foreach (self::$collections as $collection => $item) {
            $query = self::getImages($collection, 1);
            $images[$collection] = $query[$collection] ?? $item;
        }

        return $images;
    }

    public static function getImages(string $collectionName, int $page): array
    {
        $media = self::queryMedia($collectionName, $page);

        $sortedMedia = self::sortMediaBySubCollection($media);

        $grouped = self::groupByCollection($sortedMedia);

        return self::sortBySubCollection($grouped);
    }

    public static function storeImage(string $collectionName, ?string $subCollection): void
    {
        $image = Image::create();

        $image->addMediaFromRequest('image')
            ->withCustomProperties([
                'subCollection' => $subCollection,
            ])
            ->toMediaCollection($collectionName);
    }

    public static function deleteImage(int $imageId): void
    {
        $media = Media::findOrFail($imageId);
        $image = $media->model;
        $media->delete();
        $image?->delete();
    }

    private static function queryMedia(string $collectionName, int $page): LengthAwarePaginator
    {
        return Media::where('model_type', Image::class)
            ->where('collection_name', $collectionName)
            ->orderBy('created_at', 'desc')
            ->paginate(15, ['*'], 'page', $page);
    }

    private static function sortMediaBySubCollection(LengthAwarePaginator $media): array
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

    private static function groupByCollection(array $arguments): array
    {
        $result = $arguments['data']->groupBy(function ($item) {
            return $item['collection_name'];
        })->toArray();

        return [
            'data' => $result,
            'paginator' => $arguments['paginator'],
        ];
    }

    private static function sortBySubCollection(array $arguments): array
    {
        $structure = self::$collections;

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
