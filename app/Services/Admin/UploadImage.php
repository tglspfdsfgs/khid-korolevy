<?php

namespace App\Services\Admin;

use App\Models\Image;
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
            $query = self::getImages($collection);
            $images[$collection] = $query[$collection] ?? $item;
        }

        return $images;
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
        $image = $media->model; // это твоя запись в таблице images
        $media->delete();
        $image?->delete(); // если хочешь ещё и саму запись Image убрать
    }

    private static function getImages(string $collectionName): array
    {
        $media = self::queryMedia($collectionName);

        $sortedMedia = self::sortMediaBySubCollection($media);

        $grouped = self::groupByCollection($sortedMedia);

        return self::sortBySubCollection($grouped);
    }

    private static function queryMedia($collectionName)
    {
        return Media::where('model_type', Image::class)
            ->where('collection_name', $collectionName)
            ->orderBy('created_at', 'desc')
            ->paginate(100);
    }

    private static function sortMediaBySubCollection($media)
    {
        return $media->through(function ($media) {
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
                    'size' => round($media->size / 1024, 1).' KB',
                ];
            }
        });
    }

    private static function groupByCollection($items)
    {
        return $items->groupBy(function ($item) {
            return $item['collection_name'];
        });
    }

    private static function sortBySubCollection($items): array
    {
        $structure = self::$collections;

        foreach ($items as $collectionName => $records) {
            foreach ($records as $record) {
                $sub = $record['subCollection'] ?? null;

                if ($sub && isset($structure[$collectionName][$sub])) {
                    $structure[$collectionName][$sub][] = $record;
                } else {
                    $structure['Інше'][] = $record;
                }
            }
        }

        return $structure;
    }
}
