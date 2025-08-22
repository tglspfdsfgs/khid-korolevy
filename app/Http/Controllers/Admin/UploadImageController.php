<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UploadImage\DeleteImageRequest;
use App\Http\Requests\UploadImage\PaginationRequest;
use App\Http\Requests\UploadImage\UploadImageRequest;
use App\Services\Admin\UploadImage;

class UploadImageController extends Controller
{
    public function __construct(private UploadImage $uploader)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = $this->uploader->getAllImages();

        return view('admin-panel', [
            'title' => 'завантаження фото',
            'page' => 'admin-pages.upload-image.index',
            'data' => $images,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(PaginationRequest $request)
    {
        $images = $this->uploader->getImages($request->mainFolder, $request->page);

        try {
            $html = view('components.admin-pages.upload-image.blocks.add-image', [
                'mainFolder' => $request->mainFolder,
                'innerFolder' => $request->innerFolder,
            ])->render();

            return response()->json(['success' => true, 'html' => $html]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UploadImageRequest $request)
    {
        $this->uploader->storeImage($request->mainFolder, $request?->innerFolder);

        return back()->with('success', "Зображення успішно завантажено в {$request->mainFolder}".
            ($request->innerFolder ? " / {$request->innerFolder}" : ''));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteImageRequest $request)
    {
        $this->uploader->deleteImage($request->id);

        return back()->with('success', 'Зображення успішно видалено');
    }
}
