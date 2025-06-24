@php
    $data = [
        "id" => 1,
        "date" => \Carbon\Carbon::now()->addWeeks(2)->toDateString(),
        "tournamentType" => \App\TournamentType::chess,
        "state" => \App\State::draft,
        "linkToForm" => "https://workspace.google.com/intl/uk/products/forms/",
        "hasResults" => true,
        "linkToGallery" => "/gallery/1",
        "content" =>
            '<p><span style="font-weight: bold;">Шановні гравці та шанувальники шахів!</span></p><p>Шаховий клуб <span style="font-weight: bold;">[Назва клубу]</span> запрошує всіх охочих взяти участь у<span style="font-weight: bold;">відкритому турнірі "Король дошки"</span>, який відбудеться <spanstyle="font-weight: bold;">[дата]</span> за адресою <span style="font-weight: bold;">[місцепроведення]</span>.</p><p><span style="font-weight: bold;">Формат турніру:</span></p><ul><li><p>5 турів за швейцарською системою</p></li><li><p>Контроль часу: <span style="font-weight: bold;">[наприклад, 15 хвилин на партію + 5 секунд захід]</span></p></li><li><p>Розіграш призових місць та спеціальних номінацій</p></li></ul><p><span style="font-weight: bold;">Реєстрація:</span><br>Для участі необхідно заповнити форму до <spanstyle="font-weight: bold;">[дата]</span> за посиланням: <spanstyle="font-weight: bold;">[посилання]</span>. Кількість місць обмежена!</p><p><span style="font-weight: bold;">Призи:</span></p><ul><li><p>🏆 <span style="font-weight: bold;">1 місце:</span> Головний трофей + <spanstyle="font-weight: bold;">[нагорода]</span></p></li><li><p>🥈 <span style="font-weight: bold;">2-3 місця:</span> Медалі та подарунки від партнерів</p></li><li><p>🎯 <span style="font-weight: bold;">Спеціальна номінація:</span> "Найкраща комбінаціятурніру"</p></li></ul><p>Турнір – це чудова можливість випробувати свої сили, зустрітися з однодумцями та отримати незабутнівраження!</p><p><span style="font-weight: bold;">Не проґавте шанс стати Королем дошки!</span> 👑♟️</p><p><em>Деталі за телефоном: <span style="font-weight: bold;">[номер]</span>.<br>Офіційна сторінка події:<span style="font-weight: bold;">[посилання на соцмережі/сайт]</span>.</em></p>',
    ];
@endphp
<main class="container mx-auto mt-7 lg:flex">
    <section class="grow-3 lg:mr-10">
        <div
            class="format lg:card-side bg-base-100 mb-25 static mt-5 flex min-h-96 w-full !flex-col rounded-lg px-4 py-5 shadow-sm">
            <div>
                <p>
                    <strong x-data x-show='isNotAnnouncementDay("{{ $data["date"] }}")'
                        class="badge badge-lg badge-secondary">АНОНС!</strong>
                    <span class="badge badge-lg badge-primary font-bold">
                        Дата:
                        <time
                            datetime='{{ $data["date"] }}'>{{ \Carbon\Carbon::parse($data["date"])->translatedFormat("d.m.Y") }}</time>
                    </span>
                    <span class="badge badge-lg font-bold">
                        Тип турніра:
                        <span class="font-normal">{{ $data["tournamentType"]->option_title() }}</span>
                    </span>
                </p>
                <p class="format">
                    {!! $data["content"] !!}
                </p>
            </div>
            <p class="mr-auto mt-auto block">
                @if ($data["linkToForm"])
                    <a href="{{ $data["linkToForm"] }}"
                        class="btn btn-sm btn-primary text-primary-content no-underline">
                        Записатися
                        <x-assets.icons.button-icons.sign-up />
                    </a>
                @endif
                @if ($data["hasResults"])
                    <a href='{{ "/tournament/" . $data["id"] . "/results" }}'
                        class="btn btn-sm btn-outline btn-secondary text-secondary hover:text-secondary-content no-underline">
                        Результати
                        <x-assets.icons.button-icons.results />
                    </a>
                @endif
                @if ($data["linkToGallery"])
                    <a href='{{ $data["linkToGallery"] }}'
                        class="btn btn-sm btn-outline btn-success text-success hover:text-success-content no-underline">
                        Галерея
                        <x-assets.icons.button-icons.gallery />
                    </a>
                @endif
            </p>
        </div>
        <form x-data action="{{ route("tournament.show", $data["id"]) . "/" }}" method="post"
            @submit.prevent="() => {

                $el.action += $event.submitter.value;
                injectDataToForm($el, {{ json_encode($data) }});

                $nextTick(() => $el.submit());
            }">
            <x-blocks.submit-buttons :state='$data["state"]' :editor-link='"/tournament/" . $data["id"] . "/edit"' />
        </form>
    </section>
    <x-blocks.sidebar.right />
</main>
