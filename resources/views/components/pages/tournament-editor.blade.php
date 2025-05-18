@php
    $data = [
        "tournamentID" => 1,
        "title" => "Відкритий шаховий турнір \'Король дошки\' – реєструйся та вигравай!",
        "description" => "Шановні шахисти! Реєструйтесь на турнір \'Король дошки\'!",
        "imageSrc" => "",
        "date" => \Carbon\Carbon::now()->addWeeks(2)->toDateString(),
        "tournamentType" => \App\TournamentType::tabletop,
        "buttons" => [
            "linkToForm" => "https://workspace.google.com/intl/uk/products/forms/",
            "hasMoreInfo" => true,
            "hasResults" => false,
            "hasGallery" => false,
        ],
    ];
@endphp
<main class="container mx-auto mt-7 lg:flex">
    <div x-data="{{ json_encode($data) }}" @update-data.window="Object.assign($data, $event.detail)">
        <section class="grow-3 lg:mr-10">
            <x-blocks.cards.create-tournament :props='Arr::only($data, ["imageSrc", "title", "description", "date", "buttons", "tournamentID"])' />

            <fieldset class="fieldset ml-5">
                <legend class="fieldset-legend">Тип турніра:</legend>
                <select x-model="tournamentType" class="select w-40">
                    @foreach (\App\TournamentType::cases() as $type)
                        <option value="{{ $type->value }}" @selected($data["tournamentType"]->value == $type->value)>
                            {{ $type->uk_translation() }}
                        </option>
                    @endforeach
                </select>
            </fieldset>

            <x-blocks.text-editor />

        </section>
        <x-blocks.submit-buttons />
    </div>

    <x-blocks.sidebar.right />
</main>
