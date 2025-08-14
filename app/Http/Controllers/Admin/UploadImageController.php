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
        $image = Image::create();

        $image->addMediaFromRequest('image')
            ->withCustomProperties([
                'subCollection' => $request?->innerFolder,
            ])
            ->toMediaCollection($request->mainFolder);

        return back()->with('success', "Зображення успішно завантажено в {$request->mainFolder}".
            ($request->innerFolder ? " / {$request->innerFolder}" : ''));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(/* string $id */)
    {
        dump('destroy');
    }
}
