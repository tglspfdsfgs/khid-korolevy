@php
    $title = "Шахи: правила, стратегії та цікаві факти для початківців і професіоналів";
    $description = "Все про шахи: від основ до просунутих тактик. Читайте!";
    $imageSrc = "";
@endphp
<main class="container mx-auto mt-7 lg:flex">
    <section class="grow-3 lg:mr-10">
        <x-blocks.cards.create-article image-src="{{ $imageSrc }}" title="{{ $title }}"
            description="{{ $description }}" />
        <x-blocks.text-editor />
        <x-blocks.submit-buttons />
    </section>
    <x-blocks.sidebar.right />
</main>
