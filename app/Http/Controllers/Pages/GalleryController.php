<?php

namespace App\Http\Controllers\Pages;

use App\Enums\State;
use App\Http\Controllers\Controller;
use App\Http\Requests\GalleryRequest;
use App\Services\Pages\GalleryService;

class GalleryController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct(protected GalleryService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = request()->only(['state', 'page']);
        $additionalQuery = request()->only(['galleryType']);

        $result = $this->service->getAll($query, $additionalQuery);

        return view('main', [
            'title' => 'галерея',
            'page' => 'pages.gallery.index',
            'data' => $result['data'],
            'paginator' => $result['paginator'],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect()->route('gallery.edit', $this->service->create());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = $this->service->getById($id);

        return view('main', [
            'title' => 'Шахи: правила, стратегії та цікаві факти для початківців і професіоналів',
            'page' => 'pages.gallery.page',
            'data' => $data,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $page = $this->service->getById($id);

        return view('main', [
            'title' => $page->title,
            'page' => 'pages.gallery.form',
            'data' => $page->only(array_merge(['id'], $page->getFillable())),
        ]);
    }

    /**
     * Publish the specified resource in storage.
     */
    public function publish(GalleryRequest $request, string $id)
    {
        $this->service->update($id, $request->validated(), State::published);

        return redirect()->route('gallery.show', $id);
    }

    /**
     * Draft the specified resource in storage.
     */
    public function draft(GalleryRequest $request, string $id)
    {
        $this->service->update($id, $request->validated(), State::draft);

        return redirect()->route('gallery.show', $id);
    }

    /**
     * Delete the specified resource in storage.
     */
    public function delete(GalleryRequest $request, string $id)
    {
        $this->service->update($id, $request->validated(), State::deleted);

        return redirect()->route('gallery.show', $id);
    }
}
