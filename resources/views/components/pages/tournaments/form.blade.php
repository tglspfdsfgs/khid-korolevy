@php
    $data = [
        "id" => 1,
        "state" => \App\State::draft,
        "title" => "Відкритий шаховий турнір 'Король дошки' – реєструйся та вигравай!",
        "description" => "Шановні шахисти! Реєструйтесь на турнір 'Король дошки'!",
        "imageSrc" => "",
        "date" => \Carbon\Carbon::now()->addWeeks(2)->toDateString(),
        "tournamentType" => \App\TournamentType::chess,
        "linkToForm" => "https://workspace.google.com/intl/uk/products/forms/",
        "hasMoreInfo" => true,
        "hasResults" => false,
        "linkToGallery" => "/gallery/1",
        "content" =>
            '<p><span style="font-weight: bold;">Шановні гравці та шанувальники шахів!</span></p><p>Шаховий клуб <span style="font-weight: bold;">[Назва клубу]</span> запрошує всіх охочих взяти участь у<span style="font-weight: bold;">відкритому турнірі "Король дошки"</span>, який відбудеться <spanstyle="font-weight: bold;">[дата]</span> за адресою <span style="font-weight: bold;">[місцепроведення]</span>.</p><p><span style="font-weight: bold;">Формат турніру:</span></p><ul><li><p>5 турів за швейцарською системою</p></li><li><p>Контроль часу: <span style="font-weight: bold;">[наприклад, 15 хвилин на партію + 5 секунд захід]</span></p></li><li><p>Розіграш призових місць та спеціальних номінацій</p></li></ul><p><span style="font-weight: bold;">Реєстрація:</span><br>Для участі необхідно заповнити форму до <spanstyle="font-weight: bold;">[дата]</span> за посиланням: <spanstyle="font-weight: bold;">[посилання]</span>. Кількість місць обмежена!</p><p><span style="font-weight: bold;">Призи:</span></p><ul><li><p>🏆 <span style="font-weight: bold;">1 місце:</span> Головний трофей + <spanstyle="font-weight: bold;">[нагорода]</span></p></li><li><p>🥈 <span style="font-weight: bold;">2-3 місця:</span> Медалі та подарунки від партнерів</p></li><li><p>🎯 <span style="font-weight: bold;">Спеціальна номінація:</span> "Найкраща комбінаціятурніру"</p></li></ul><p>Турнір – це чудова можливість випробувати свої сили, зустрітися з однодумцями та отримати незабутнівраження!</p><p><span style="font-weight: bold;">Не проґавте шанс стати Королем дошки!</span> 👑♟️</p><p><em>Деталі за телефоном: <span style="font-weight: bold;">[номер]</span>.<br>Офіційна сторінка події:<span style="font-weight: bold;">[посилання на соцмережі/сайт]</span>.</em></p>',
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
                    @foreach ($data["tournamentType"]::cases() as $type)
                        <option value="{{ $type->value }}" @selected($data["tournamentType"]->value == $type->value)>
                            {{ $type->option_title() }}
                        </option>
                    @endforeach
                </select>
            </fieldset>

            <x-blocks.text-editor :is-responsive="$isResponsive" :unresponsive-size='$unresponsiveSize' />
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
