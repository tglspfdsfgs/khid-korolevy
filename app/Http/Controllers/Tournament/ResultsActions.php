<?php

namespace App\Http\Controllers\Tournament;

use Illuminate\Http\Request;

trait ResultsActions
{
    protected array $unresponsiveProps = [
        'isResponsive' => false,
        'unresponsiveSize' => ' w-[1024px] ',
    ];

    /**
     * Save the specified nested resource in storage.
     */
    public function resultsSave(Request $request, string $id)
    {
        dump('save');
        dump($request->toArray());
    }

    /**
     * Show the form for editing the specified nested resource.
     */
    public function resultsEdit(Request $request, string $id)
    {
        return view('main', [
            'title' => 'результати турніру',
            'page' => 'pages.tournaments.results-form',
            ...$this->unresponsiveProps,
        ]);
    }

    /**
     * Display the specified nested resource.
     */
    public function resultsShow(Request $request, string $id)
    {
        return view('main', [
            'title' => 'результати турніру',
            'page' => 'pages.tournaments.results',
            ...$this->unresponsiveProps,
        ]);
    }
}
