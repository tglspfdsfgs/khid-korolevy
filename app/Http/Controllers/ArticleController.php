<?php

namespace App\Http\Controllers;

use App\Enums\State;
use App\Http\Requests\ArticleRequest;
use App\Services\Pages\ArticleService;

class ArticleController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct(protected ArticleService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = request()->only(['state', 'page']);

        $result = $this->service->getAll($query);

        return view('main', [
            'title' => 'новини і статті',
            'page' => 'pages.articles.index',
            'data' => $result['data'],
            'paginator' => $result['paginator'],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect()->route('article.edit', $this->service->create());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = $this->service->getById($id);

        return view('main', [
            'title' => 'Шахи: правила, стратегії та цікаві факти для початківців і професіоналів',
            'page' => 'pages.articles.page',
            'data' => $data,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = $this->service->getById($id);

        $article->only(array_merge(['id'], $article->getFillable()));

        return view('main', [
            'title' => $article->title,
            'page' => 'pages.articles.form',
            'data' => $article->only(array_merge(['id'], $article->getFillable())),
        ]);
    }

    /**
     * Publish the specified resource in storage.
     */
    public function publish(ArticleRequest $request, int $id)
    {
        $this->service->update($id, $request->validated(), State::published);

        return redirect()->route('article.show', $id);
    }

    /**
     * Draft the specified resource in storage.
     */
    public function draft(ArticleRequest $request, int $id)
    {
        $this->service->update($id, $request->validated(), State::draft);

        return redirect()->route('article.show', $id);
    }

    /**
     * Delete the specified resource in storage.
     */
    public function delete(ArticleRequest $request, int $id)
    {
        $this->service->update($id, $request->validated(), State::deleted);

        return redirect()->route('article.show', $id);
    }
}
