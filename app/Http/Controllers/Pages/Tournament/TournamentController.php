<?php

namespace App\Http\Controllers\Pages\Tournament;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
    use ResultsActions;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('main', [
            'title' => 'турніри',
            'page' => 'pages.tournaments.index',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect()->route('tournament.edit', 999);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('main', [
            'title' => 'Відкритий шаховий турнір \'Король дошки\' – реєструйся та вигравай!',
            'page' => 'pages.tournaments.page',
            'content' => '',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('main', [
            'title' => "Відкритий шаховий турнір 'Король дошки' – реєструйся та вигравай!",
            'page' => 'pages.tournaments.form',
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
