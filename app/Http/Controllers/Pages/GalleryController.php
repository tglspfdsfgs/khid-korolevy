<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('main', [
            'title' => 'галерея',
            'page' => 'pages.gallery.index',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect()->route('gallery.edit', 999);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('main', [
            'title' => 'Шахи: правила, стратегії та цікаві факти для початківців і професіоналів',
            'page' => 'pages.gallery.page',
            'content' => '',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('main', [
            'title' => 'Галерея шахового турніру Королівська битва',
            'page' => 'pages.gallery.form',
            'content' => '',
        ]);
    }

    /**
     * Publish the specified resource in storage.
     */
    public function publish(Request $request, string $id)
    {
        dump('publish');
        dump($request->toArray());
    }

    /**
     * Draft the specified resource in storage.
     */
    public function draft(Request $request, string $id)
    {
        dump('draft');
        dump($request->toArray());
    }

    /**
     * Delete the specified resource in storage.
     */
    public function delete(Request $request, string $id)
    {
        dump('delete');
        dump($request->toArray());
    }
}
