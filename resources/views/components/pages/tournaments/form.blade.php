@php
    $data = [
        "id" => 1,
        "state" => \App\State::draft,
        "title" => "Відкритий шаховий турнір 'Король дошки' – реєструйся та вигравай!",
        "description" => "Шановні шахисти! Реєструйтесь на турнір 'Король дошки'!",
        "imageSrc" => "",
        "date" => \Carbon\Carbon::now()->addWeeks(2)->toDateString(),
        "tournamentType" => \App\TournamentType::tabletop,
        "linkToForm" => "https://workspace.google.com/intl/uk/products/forms/",
        "hasMoreInfo" => true,
        "hasResults" => false,
        "linkToGallery" => "/gallery/1",
        "content" =>
            '<h2 style="text-align: center">Шахи: Мистецтво Стратегії</h2><blockquote><p><span style="font-size: 16px">Шахи — це боротьба двох умів, де кожен хід — це крок до перемоги або поразки.</span></p></blockquote><h3 style="text-align: center">Основи дебюту</h3><p><span style="font-size: 16px">У шахах </span><span><span style="font-weight: bold;">дебют</span></span><span style="font-size: 16px"> — це перші ходи, які закладають фундамент для подальшої гри.<br>Найпоширеніший дебют — <em>іспанська партія</em>, що починається ходами:</span></p><p><code>1. e4 e5 2. Nf3 Nc6 3. Bb5</code></p><h3 style="text-align: center">Популярні дебюти</h3><ol><li><p><span style="font-size: 16px">Італійська партія</span></p></li><li><p><span style="font-size: 16px">Сицилійський захист</span></p></li><li><p><span style="font-size: 16px">Французький захист</span></p></li><li><p><span style="font-size: 16px">Скандинавський захист</span></p></li><li><p><span style="font-size: 16px">Каро-Канн</span></p></li></ol><h3><span style="font-size: 16px">Таблиця: Ходи та стиль</span></h3><div class="tableWrapper"><table style="min-width: 50px;"><colgroup><col style="min-width: 25px;"><col style="min-width: 25px;"></colgroup><tbody><tr><th colspan="1" rowspan="1"><p><span style="font-size: 16px">Дебют</span></p></th><th colspan="1" rowspan="1"><p><span style="font-size: 16px">Стиль гри</span></p></th></tr><tr><td colspan="1" rowspan="1"><p><span style="font-size: 16px">Італійська партія</span></p></td><td colspan="1" rowspan="1"><p><span style="font-size: 16px"><em>Атакувальний</em></span></p></td></tr><tr><td colspan="1" rowspan="1"><p><span style="font-size: 16px">Каро-Канн</span></p></td><td colspan="1" rowspan="1"><p><span style="font-size: 16px">Оборонний</span></p></td></tr><tr><td colspan="1" rowspan="1"><p><span style="font-size: 16px">Сицилійський захист</span></p></td><td colspan="1" rowspan="1"><p><span style="font-size: 16px">Гнучкий</span></p></td></tr></tbody></table></div><hr contenteditable="false"><h3><span style="font-size: 14px">Корисні ресурси</span></h3><ul><li><p><a target="_blank" rel="noopener noreferrer nofollow" class="link link-info" href="http://chess.com"><span style="font-size: 12px">chess.com</span></a></p></li><li><p><a target="_blank" rel="noopener noreferrer nofollow" class="link link-info" href="http://lichess.org"><span style="font-size: 12px">lichess.org</span></a></p></li></ul>',
    ];
@endphp
<main class="container mx-auto mt-7 lg:flex">
    <div x-data="{{ json_encode($data) }}" id="data-holder" x-init="$nextTick(() => dispatchEvent(new CustomEvent('editor-ready')))" x-bind:data-content="content"
        @update-data.window="Object.assign($data, $event.detail)">
        <section class="grow-3 lg:mr-10">
            <x-blocks.cards.tournaments.create-tournament :props='Arr::except($data, ["content"])' />

            <fieldset class="fieldset ml-5">
                <legend class="fieldset-legend">Тип турніра:</legend>
                <select x-model="tournamentType" class="select w-40">
                    @foreach (\App\TournamentType::cases() as $type)
                        <option value="{{ $type->value }}" @selected($data["tournamentType"]->value == $type->value)>
                            {{ $type->option_title() }}
                        </option>
                    @endforeach
                </select>
            </fieldset>

            <x-blocks.text-editor />
        </section>
        <form action="{{ route("tournament.show", $data["id"]) . "/" }}" method="post"
            @submit.prevent="() => {
                $data.content = window.tiptapEditor.getHTML();
                $el.action += $event.submitter.value;;
                injectDataToForm($el, toRaw($data));

                $nextTick(() => $el.submit());
            }">
            <x-blocks.submit-buttons :state='$data["state"]' />
        </form>
    </div>

    <x-blocks.sidebar.right />
</main>
