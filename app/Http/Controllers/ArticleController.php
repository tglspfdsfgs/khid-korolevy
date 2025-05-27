<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('main', [
            'title' => 'новини і статті',
            'page' => 'components.pages.articles',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect()->route('article.edit', 999);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('main', [
            'title' => 'Шахи: правила, стратегії та цікаві факти для початківців і професіоналів',
            'page' => 'components.pages.article',
            'content' => '',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('main', [
            'title' => 'Шахи: правила, стратегії та цікаві факти для початківців і професіоналів',
            'page' => 'components.pages.article-editor',
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
