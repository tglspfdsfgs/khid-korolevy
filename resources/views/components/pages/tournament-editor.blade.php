@php
    $title = "Відкритий шаховий турнір \'Король дошки\' – реєструйся та вигравай!";
    $description = "Шановні шахисти! Реєструйтесь на турнір \'Король дошки\'!";
    $imageSrc = "";
@endphp
<main class="container mx-auto mt-7 lg:flex">
    <section class="grow-3 lg:mr-10">
        <x-blocks.cards.create-tournament image-src="{{ $imageSrc }}" title="{{ $title }}"
            description="{{ $description }}" />
        <x-blocks.text-editor />
    </section>
    <x-blocks.sidebar.right />
</main>
