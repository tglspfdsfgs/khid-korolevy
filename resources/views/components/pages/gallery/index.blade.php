@php
    use App\State as State;
    use Carbon\Carbon as Carbon;
    use App\TournamentType as Type;

    $cards = [
        [
            "type" => "gallery",
            "id" => 1,
            "state" => State::published,
            "title" => '📸 Турнір у кадрі: "Королівська битва-2025"',
            "description" => "Найкращі моменти та емоції турніру. Дивися галерею!",
            "imageSrc" => Vite::asset("resources/images/chess(1).jpg"),
            "date" => Carbon::now()->toDateString(),
            "galleryType" => Type::TABLETOP,
        ],
        [
            "type" => "gallery",
            "id" => 1,
            "state" => State::published,
            "title" => '📸 Турнір у кадрі: "Королівська битва-2025"',
            "description" => "Найкращі моменти та емоції турніру. Дивися галерею!",
            "imageSrc" => Vite::asset("resources/images/chess(2).jpg"),
            "date" => Carbon::now()->toDateString(),
            "galleryType" => Type::COMP_DEV,
        ],
        [
            "type" => "gallery",
            "id" => 1,
            "state" => State::published,
            "title" => '📸 Турнір у кадрі: "Королівська битва-2025"',
            "description" => "Найкращі моменти та емоції турніру. Дивися галерею!",
            "imageSrc" => Vite::asset("resources/images/chess(1).jpg"),
            "date" => Carbon::now()->toDateString(),
            "galleryType" => Type::CHESS,
        ],
        [
            "type" => "gallery",
            "id" => 1,
            "state" => State::published,
            "title" => '📸 Турнір у кадрі: "Королівська битва-2025"',
            "description" => "Найкращі моменти та емоції турніру. Дивися галерею!",
            "imageSrc" => Vite::asset("resources/images/chess(2).jpg"),
            "date" => Carbon::now()->toDateString(),
            "galleryType" => Type::CLUB,
        ],
        [
            "type" => "gallery",
            "id" => 1,
            "state" => State::published,
            "title" => '📸 Турнір у кадрі: "Королівська битва-2025"',
            "description" => "Найкращі моменти та емоції турніру. Дивися галерею!",
            "imageSrc" => Vite::asset("resources/images/chess(1).jpg"),
            "date" => Carbon::now()->toDateString(),
            "galleryType" => Type::SPORTS,
        ],
    ];
@endphp

<main class="container mx-auto mt-7 lg:flex">
    <section class="grow-3 lg:mr-10">
        <x-blocks.create text="Натисни щоб створити галерею" link='{{ route("gallery.create") }}' />
        <x-blocks.cards-state-navigation />

        @foreach ($cards as $card)
            <x-card :props="$card" />
        @endforeach

        {{-- pagination --}}
        <x-blocks.pagination />
    </section>
    <x-blocks.sidebar.right />
</main>
