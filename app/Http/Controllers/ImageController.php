<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function create()
    {
        return view('main', [
            'title' => 'завантажити зображення',
            'page' => 'pages.image.create',
        ]);
    }

    public function store(Request $request)
    {
        $image = Image::create();

        $image->addMediaFromRequest('image')
            ->toMediaCollection();

        return back();
    }
}
