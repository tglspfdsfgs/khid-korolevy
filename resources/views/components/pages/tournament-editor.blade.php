@php
    $title = "Відкритий шаховий турнір \'Король дошки\' – реєструйся та вигравай!";
    $description = "Шановні шахисти! Реєструйтесь на турнір \'Король дошки\'!";
    $imageSrc = "";
@endphp
<main class="container mx-auto mt-7 lg:flex">
    <div>
        <section class="grow-3 lg:mr-10">
            <x-blocks.cards.create-tournament image-src="{{ $imageSrc }}" title="{{ $title }}"
                description="{{ $description }}" />

            <fieldset class="fieldset">
                <legend class="fieldset-legend">Вибери тип турніра:</legend>
                <select class="select w-40">
                    <option selected>♟️ Шаховий</option>
                    <option>🎲 Настільний</option>
                    <option>⚽ Спортивний</option>
                </select>
            </fieldset>

            <x-blocks.text-editor />

        </section>
        <x-blocks.submit-buttons />
    </div>

    <x-blocks.sidebar.right />
</main>
