<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['status', 'title', 'description', 'imageSrc', 'date', 'content'];
}
