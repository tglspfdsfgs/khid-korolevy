<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UploadImageRequest;
use App\Models\Image;

class UploadImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin-panel', [
            'title' => 'завантаження фото',
            'page' => 'admin-pages.upload-image.index',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UploadImageRequest $request)
    {
        $fields = $request->validated();
        dump($fields);

        /*$image = Image::create();

        $image->addMediaFromRequest('image')
            ->toMediaCollection('gallery');

        return back();*/
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(/* string $id */)
    {
        dump('destroy');
    }
}
