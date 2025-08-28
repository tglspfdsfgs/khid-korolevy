@php
    $cards = [
        [
            "type" => "tournament",
            "id" => 1,
            "state" => \App\Enums\State::published, //published | draft | deleted
            "title" => "Відкритий шаховий турнір 'Король дошки' – реєструйся та вигравай!",
            "description" => "Шановні шахисти! Реєструйтесь на турнір 'Король дошки'!",
            "imageSrc" => Vite::asset("resources/images/chess(1).jpg"),
            "date" => \Carbon\Carbon::now()->addWeeks(2)->toDateString(),
            "tournamentType" => \App\Enums\TournamentType::tabletop,
            "linkToForm" => "https://workspace.google.com/intl/uk/products/forms/",
            "hasMoreInfo" => true,
            "hasResults" => false,
            "linkToGallery" => "",
        ],
        [
            "type" => "article",
            "id" => 1,
            "state" => \App\Enums\State::published, //published | draft | deleted
            "title" => "Шахи: правила, стратегії та цікаві факти для початківців і професіоналів",
            "description" => "Все про шахи: від основ до просунутих тактик. Читайте!",
            "imageSrc" => Vite::asset("resources/images/chess(2).jpg"),
            "date" => \Carbon\Carbon::now()->toDateString(),
        ],
        [
            "type" => "tournament",
            "id" => 1,
            "state" => \App\Enums\State::published, //published | draft | deleted
            "title" => "Відкритий шаховий турнір 'Король дошки' – реєструйся та вигравай!",
            "description" => "Шановні шахисти! Реєструйтесь на турнір 'Король дошки'!",
            "imageSrc" => Vite::asset("resources/images/chess(1).jpg"),
            "date" => \Carbon\Carbon::now()
                ->addWeeks(-2)
                ->toDateString(),
            "tournamentType" => \App\Enums\TournamentType::chess,
            "linkToForm" => "",
            "hasMoreInfo" => false,
            "hasResults" => true,
            "linkToGallery" => "/gallery/1",
        ],
        [
            "type" => "article",
            "id" => 1,
            "state" => \App\Enums\State::published, //published | draft | deleted
            "title" => "Шахи: правила, стратегії та цікаві факти для початківців і професіоналів",
            "description" => "Все про шахи: від основ до просунутих тактик. Читайте!",
            "imageSrc" => Vite::asset("resources/images/chess(2).jpg"),
            "date" => \Carbon\Carbon::now()->toDateString(),
        ],
    ];
@endphp

<main class="container mx-auto mt-7 lg:flex">
    <section class="grow-3 lg:mr-10">
        <x-blocks.create text="Натисни щоб створити турнір" link='{{ route("tournament.create") }}' />
        <x-blocks.cards-state-navigation />

        @if (empty($data))
            <x-blocks.no-items text="Немає турнірів :(" />
        @else
            <div class="lg:min-h-200">
                @foreach ($data as $card)
                    <x-card :props="$card" />
                @endforeach
            </div>
        @endif

        {{-- pagination --}}
        <x-blocks.pagination />
    </section>
    <x-blocks.sidebar.right />
</main>
