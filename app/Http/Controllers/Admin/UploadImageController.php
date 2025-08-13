<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;

class UploadImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin-panel', [
            'title' => 'адмін-панель',
            'page' => 'admin-pages.upload-image.index',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        dump('Show the form for creating a new resource.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dump();

        /*$image = Image::create();

        $image->addMediaFromRequest('image')
            ->toMediaCollection('gallery');

        return back();*/
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        dump('Display the specified resource.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        dump('Show the form to edit a specified resource.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        dump('Update the specified resource in storage.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        dump('Delete the specified resource in storage.');
    }
}
