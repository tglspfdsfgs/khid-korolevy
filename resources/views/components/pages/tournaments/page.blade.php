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
        <div class="format lg:card-side bg-base-100 static mb-5 mt-5 w-full rounded-lg px-4 py-5 shadow-sm">
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

            <p>
                @if ($data["linkToForm"])
                    <a href="{{ $data["linkToForm"] }}"
                        class="btn btn-sm btn-primary text-primary-content no-underline">
                        Записатися
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                    </a>
                @endif
                @if ($data["hasResults"])
                    <a href='{{ "/tournament/" . $data["id"] . "/results" }}'
                        class="btn btn-sm btn-outline btn-secondary text-secondary hover:text-secondary-content no-underline">
                        Результати
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.5 18.75h-9m9 0a3 3 0 0 1 3 3h-15a3 3 0 0 1 3-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 0 1-.982-3.172M9.497 14.25a7.454 7.454 0 0 0 .981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 0 0 7.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 0 0 2.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 0 1 2.916.52 6.003 6.003 0 0 1-5.395 4.972m0 0a6.726 6.726 0 0 1-2.749 1.35m0 0a6.772 6.772 0 0 1-3.044 0" />
                        </svg>
                    </a>
                @endif
                @if ($data["linkToGallery"])
                    <a href='{{ $data["linkToGallery"] }}'
                        class="btn btn-sm btn-outline btn-success text-success hover:text-success-content no-underline">
                        Галерея
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd"
                                d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z"
                                clip-rule="evenodd" />
                        </svg>
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
