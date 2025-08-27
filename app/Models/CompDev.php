<?php

namespace App\Models;

use App\Enums\State;
use Illuminate\Database\Eloquent\Model;

class CompDev extends Model
{
    protected $fillable = ['type', 'state', 'title', 'description', 'imageSrc', 'badge', 'link', 'content'];

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
