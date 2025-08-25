<?php

namespace App\Services\Admin;

use App\Models\Image;
use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class UploadImageService
{
    protected array $collections = [
        'Новини і статті',
        'Навчання',
        'Турніри',
        'Галерея',
        'Розумаха',
        'Інше',
    ];

    public function getAllImages(): array
    {
        $query = [];

        foreach ($this->collections as $collection) {
            $query[$collection] = $this->getImages($collection, 1);
        }

        return $query;
    }

    public function getImages(string $collectionName, int $page): array
    {
        $media = $this->queryMedia($collectionName, $page);

        return $this->retrieveCollection($media);
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

    private function queryMedia(string $collectionName, int $page): LengthAwarePaginator
    {
        return Media::where('model_type', Image::class)
            ->where('collection_name', $collectionName)
            ->orderBy('created_at', 'desc')
            ->paginate(10, ['*'], 'page', $page);
    }

    private function retrieveCollection(LengthAwarePaginator $media): array
    {
        $mediaCollection = $media->getCollection()->map(function ($media) {
            return [
                'id' => $media->id,
                'url' => $media->getUrl(),
                'collection_name' => $media->collection_name,
                'file_name' => $media->file_name,
                'size' => round($media->size / 1024, 1).' KB',
            ];
        });

        return [
            'data' => $mediaCollection,
            'paginator' => $media,
        ];
    }
}
