<main class="container mx-auto mt-7 lg:flex">
    <section class="grow-3 lg:mr-10">
        <x-blocks.create text="Натисни щоб створити статтю" link='{{ route("article.create") }}' />
        <x-blocks.cards-state-navigation />

        @foreach ($data as $card)
            <x-card :props="$card" />
        @endforeach

        {{-- pagination --}}
        <x-blocks.pagination />
    </section>
    <x-blocks.sidebar.right />
</main>
