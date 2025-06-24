@props(["isResponsive", "unresponsiveSize"])

@php
    $data = [
        "id" => 1,
        "date" => \Carbon\Carbon::now()->addWeeks(2)->toDateString(),
        "tournamentType" => \App\TournamentType::chess,
        "linkToGallery" => "/gallery/1",
        "content" =>
            "<table><thead><tr><th>Місце</th><th>Учасник</th><th>Рейтинг (FIDE)</th><th>1</th><th>2</th><th>3</th><th>4</th><th>5</th><th>6</th><th>7</th><th>8</th><th>Очки</th><th>Дод. показники (Buchholz)</th><th>Примітки</th></tr></thead><tbody><tr><td>1</td><td>Іванов Олексій</td><td>2450</td><td>—</td><td>=</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>6.5</td><td>28.5</td><td>🏆 Переможець</td></tr><tr><td>2</td><td>Петрова Марія</td><td>2320</td><td>=</td><td>—</td><td>0</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>5.5</td><td>25.0</td><td>🥈 2-ге місце</td></tr><tr><td>3</td><td>Сидоренко Ігор</td><td>2280</td><td>0</td><td>1</td><td>—</td><td>=</td><td>1</td><td>0</td><td>1</td><td>1</td><td>4.5</td><td>22.5</td><td>🥉 3-тє місце</td></tr><tr><td>4</td><td>Коваль Юлія</td><td>2200</td><td>0</td><td>0</td><td>=</td><td>—</td><td>1</td><td>1</td><td>0</td><td>1</td><td>3.5</td><td>20.0</td><td></td></tr><tr><td>5</td><td>Шевченко Андрій</td><td>2150</td><td>0</td><td>0</td><td>0</td><td>0</td><td>—</td><td>1</td><td>1</td><td>1</td><td>3.0</td><td>18.5</td><td></td></tr><tr><td>6</td><td>Білий Максим</td><td>2100</td><td>0</td><td>0</td><td>1</td><td>0</td><td>0</td><td>—</td><td>=</td><td>1</td><td>2.5</td><td>17.0</td><td></td></tr><tr><td>7</td><td>Чорна Анна</td><td>2050</td><td>0</td><td>0</td><td>0</td><td>1</td><td>0</td><td>=</td><td>—</td><td>0</td><td>1.5</td><td>15.5</td><td></td></tr><tr><td>8</td><td>Лисенко Дмитро</td><td>2000</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>1</td><td>—</td><td>1.0</td><td>14.0</td><td></td></tr></tbody></table>",
    ];
@endphp
<main class='{{ ($isResponsive ? " container lg:flex " : " $unresponsiveSize flex ") . " mx-auto mt-7 lg:flex " }}'>
    <section class="grow-3">
        <div
            class="format lg:card-side bg-base-100 mb-25 static mt-5 flex min-h-96 w-full !flex-col rounded-lg px-4 py-5 shadow-sm">
            <div>
                <p>
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
                <p class="format flex-grow">
                    {!! $data["content"] !!}
                </p>
            </div>
            <p class="mr-auto mt-auto block">
                @if ($data["linkToGallery"])
                    <a href='{{ $data["linkToGallery"] }}'
                        class="btn btn-sm btn-outline btn-success text-success hover:text-success-content no-underline">
                        Галерея
                        <x-assets.icons.button-icons.gallery />
                    </a>
                @endif
            </p>

        </div>
        <x-blocks.submit-buttons :state='\App\State::published' :is-nested-resource="true" :editor-link='"/tournament/" . $data["id"] . "/results/edit"' />
    </section>

</main>
