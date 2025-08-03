@props(["isResponsive", "unresponsiveSize"])

@php
    $data = [
        "id" => 1,
        "date" => \Carbon\Carbon::now()->addWeeks(2)->toDateString(),
        "tournamentType" => \App\Enums\TournamentType::chess,
        "linkToGallery" => "/gallery/1",
        "content" =>
            "<table><thead><tr><th>Місце</th><th>Учасник</th><th>Рейтинг (FIDE)</th><th>1</th><th>2</th><th>3</th><th>4</th><th>5</th><th>6</th><th>7</th><th>8</th><th>Очки</th><th>Дод. показники (Buchholz)</th><th>Примітки</th></tr></thead><tbody><tr><td>1</td><td>Іванов Олексій</td><td>2450</td><td>—</td><td>=</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>6.5</td><td>28.5</td><td>🏆 Переможець</td></tr><tr><td>2</td><td>Петрова Марія</td><td>2320</td><td>=</td><td>—</td><td>0</td><td>1</td><td>1</td><td>1</td><td>1</td><td>1</td><td>5.5</td><td>25.0</td><td>🥈 2-ге місце</td></tr><tr><td>3</td><td>Сидоренко Ігор</td><td>2280</td><td>0</td><td>1</td><td>—</td><td>=</td><td>1</td><td>0</td><td>1</td><td>1</td><td>4.5</td><td>22.5</td><td>🥉 3-тє місце</td></tr><tr><td>4</td><td>Коваль Юлія</td><td>2200</td><td>0</td><td>0</td><td>=</td><td>—</td><td>1</td><td>1</td><td>0</td><td>1</td><td>3.5</td><td>20.0</td><td></td></tr><tr><td>5</td><td>Шевченко Андрій</td><td>2150</td><td>0</td><td>0</td><td>0</td><td>0</td><td>—</td><td>1</td><td>1</td><td>1</td><td>3.0</td><td>18.5</td><td></td></tr><tr><td>6</td><td>Білий Максим</td><td>2100</td><td>0</td><td>0</td><td>1</td><td>0</td><td>0</td><td>—</td><td>=</td><td>1</td><td>2.5</td><td>17.0</td><td></td></tr><tr><td>7</td><td>Чорна Анна</td><td>2050</td><td>0</td><td>0</td><td>0</td><td>1</td><td>0</td><td>=</td><td>—</td><td>0</td><td>1.5</td><td>15.5</td><td></td></tr><tr><td>8</td><td>Лисенко Дмитро</td><td>2000</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>0</td><td>1</td><td>—</td><td>1.0</td><td>14.0</td><td></td></tr></tbody></table>",
    ];
@endphp
<main class='{{ ($isResponsive ? " container lg:flex " : " $unresponsiveSize flex ") . " mx-auto mt-7 lg:flex " }}'>
    <div x-data id="data-holder" x-init="$nextTick(() => dispatchEvent(new CustomEvent('editor-ready')))" data-content='{{ $data["content"] }}'>
        <section class="grow-3 mb-25">

            <p class="pl-4">
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

            <x-blocks.text-editor :is-responsive="$isResponsive" :unresponsive-size='$unresponsiveSize' />

            @if ($data["linkToGallery"])
                <p class="ml-5 mt-5">
                    <a href='{{ $data["linkToGallery"] }}'
                        class="btn btn-sm btn-outline btn-success text-success hover:text-success-content no-underline">
                        Галерея
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd"
                                d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </p>
            @endif
        </section>
        <form action='{{ route("tournament.results.show", $data["id"]) . "/" }}' method="post"
            @submit.prevent="() => {
                const editorContent = { content: window.tiptapEditor.getHTML() };
                $el.action += $event.submitter.value;
                injectDataToForm($el, editorContent);

                $nextTick(() => $el.submit());
            }">
            <x-blocks.submit-buttons :state='\App\Enums\State::published' :is-nested-resource="true" />
        </form>
    </div>
</main>
