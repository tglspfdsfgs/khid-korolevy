<?php

namespace App\Services\Pages;

use App\Enums\GalleryType;
use App\Enums\PageType;
use App\Enums\State;
use App\Models\Gallery;

class GalleryService extends BaseService
{
    public function __construct()
    {
        parent::__construct(Gallery::class, [
            'type' => PageType::gallery,
            'state' => State::draft,
            'title' => 'Заголовок сторінки',
            'description' => "Короткий опис прев'ю-картки",
            'imageSrc' => null,
            'date' => now(),
            'galleryType' => GalleryType::chess,
            'content' => '',
        ]);
    }
}
