<?php

namespace App\Models;

use App\Enums\State;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['state', 'title', 'description', 'imageSrc', 'date', 'content'];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'state' => State::class,
        ];
    }
}
