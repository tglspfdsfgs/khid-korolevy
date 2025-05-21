@php
    $cards = [
        [
            "type" => "tournament",
            "tournamentID" => 1,
            "title" => "Відкритий шаховий турнір 'Король дошки' – реєструйся та вигравай!",
            "description" => "Шановні шахисти! Реєструйтесь на турнір 'Король дошки'!",
            "imageSrc" => Vite::asset("resources/images/chess(1).jpg"),
            "date" => \Carbon\Carbon::now()->addWeeks(2)->toDateString(),
            "tournamentType" => \App\TournamentType::tabletop,
            "linkToForm" => "https://workspace.google.com/intl/uk/products/forms/",
            "hasMoreInfo" => true,
            "hasResults" => false,
            "hasGallery" => false,
        ],
        [
            "type" => "article",
            "articleID" => 1,
            "title" => "Шахи: правила, стратегії та цікаві факти для початківців і професіоналів",
            "description" => "Все про шахи: від основ до просунутих тактик. Читайте!",
            "imageSrc" => Vite::asset("resources/images/chess(2).jpg"),
            "date" => \Carbon\Carbon::now()->toDateString(),
        ],
        [
            "type" => "tournament",
            "tournamentID" => 1,
            "title" => "Відкритий шаховий турнір 'Король дошки' – реєструйся та вигравай!",
            "description" => "Шановні шахисти! Реєструйтесь на турнір 'Король дошки'!",
            "imageSrc" => Vite::asset("resources/images/chess(1).jpg"),
            "date" => \Carbon\Carbon::now()
                ->addWeeks(-2)
                ->toDateString(),
            "tournamentType" => \App\TournamentType::chess,
            "linkToForm" => "",
            "hasMoreInfo" => false,
            "hasResults" => true,
            "hasGallery" => true,
        ],
        [
            "type" => "article",
            "articleID" => 1,
            "title" => "Шахи: правила, стратегії та цікаві факти для початківців і професіоналів",
            "description" => "Все про шахи: від основ до просунутих тактик. Читайте!",
            "imageSrc" => Vite::asset("resources/images/chess(2).jpg"),
            "date" => \Carbon\Carbon::now()->toDateString(),
        ],
    ];
@endphp

<div>
    <x-blocks.hero-section />
    <main class="container mx-auto mt-7 lg:flex">
        <section class="grow-3 lg:mr-10">

            @foreach ($cards as $card)
                <x-card :props="$card" />
            @endforeach

            {{-- pagination --}}
            <x-blocks.pagination />
        </section>
        <x-blocks.sidebar.right />
    </main>
</div>
