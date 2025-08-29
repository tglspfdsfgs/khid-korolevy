<?php

namespace App\Models;

use App\Enums\GalleryType;
use App\Enums\State;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['type', 'state', 'title', 'description', 'imageSrc', 'date', 'galleryType', 'content'];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'state' => State::class,
            'galleryType' => GalleryType::class,
        ];
    }
}
