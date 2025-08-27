<?php

namespace App\Http\Controllers;

use App\Enums\State;
use App\Http\Requests\CompDevRequest;
use App\Services\Pages\CompDevService;

class ComprehensiveDevelopment extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct(protected CompDevService $service)
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
            'title' => 'розумаха',
            'page' => 'pages.comp_dev.index',
            'data' => $result['data'],
            'paginator' => $result['paginator'],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect()->route('comp_dev.edit', $this->service->create());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = $this->service->getById($id);

        return view('main', [
            'title' => 'Інтелектуально-розвиваючий гурток',
            'page' => 'pages.comp_dev.page',
            'data' => $data,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $page = $this->service->getById($id);

        $page->only(array_merge(['id'], $page->getFillable()));

        return view('main', [
            'title' => $page->title,
            'page' => 'pages.comp_dev.form',
            'data' => $page->only(array_merge(['id'], $page->getFillable())),
        ]);
    }

    /**
     * Publish the specified resource in storage.
     */
    public function publish(CompDevRequest $request, int $id)
    {
        $this->service->update($id, $request->validated(), State::published);

        return redirect()->route('comp_dev.show', $id);
    }

    /**
     * Draft the specified resource in storage.
     */
    public function draft(CompDevRequest $request, int $id)
    {
        $this->service->update($id, $request->validated(), State::draft);

        return redirect()->route('comp_dev.show', $id);
    }

    /**
     * Delete the specified resource in storage.
     */
    public function delete(CompDevRequest $request, int $id)
    {
        $this->service->update($id, $request->validated(), State::deleted);

        return redirect()->route('comp_dev.show', $id);
    }
}
