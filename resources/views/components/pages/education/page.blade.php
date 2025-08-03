@php
    $data = [
        "id" => 1,
        "educationType" => \App\Enums\EducationType::beginners,
        "state" => \App\Enums\State::draft,
        "linkToForm" => "https://workspace.google.com/intl/uk/products/forms/",
        "content" =>
            '<h2 style="text-align: center">Розклад занять</h2><h2 style="text-align: center">у шаховому клубі «[назва клубу]» на 2025-2026</h2><p><span><span style="font-weight: bold;">Коваленко Андрій Сергійович</span></span></p><table style="min-width: 75px"><colgroup><col style="min-width: 25px"><col style="min-width: 25px"><col style="min-width: 25px"></colgroup><tbody><tr><td colspan="1" rowspan="1"><p>Рівень</p></td><td colspan="1" rowspan="1"><p>Дні тижня</p></td><td colspan="1" rowspan="1"><p>Час занять</p></td></tr><tr><td colspan="1" rowspan="1"><p>початківці</p></td><td colspan="1" rowspan="1"><p>сб, нд</p></td><td colspan="1" rowspan="1"><p>09:00-10:00</p></td></tr><tr><td colspan="1" rowspan="1"><p>другий рік навчання (приблизно рівень 4-го розряду)</p></td><td colspan="1" rowspan="1"><p>сб, нд</p></td><td colspan="1" rowspan="1"><p>10:00-11:00</p></td></tr><tr><td colspan="1" rowspan="1"><p>старша група</p></td><td colspan="1" rowspan="1"><p>сб, нд</p></td><td colspan="1" rowspan="1"><p>11:00-12:00</p></td></tr></tbody></table><p><span><span style="font-weight: bold;">Мельник Оксана Василівна</span></span></p><table style="min-width: 75px"><colgroup><col style="min-width: 25px"><col style="min-width: 25px"><col style="min-width: 25px"></colgroup><tbody><tr><td colspan="1" rowspan="1"><p>Рівень</p></td><td colspan="1" rowspan="1"><p>Дні тижня</p></td><td colspan="1" rowspan="1"><p>Час занять</p></td></tr><tr><td colspan="1" rowspan="1"><p>розрядники (рівень 4 сильний - 2 розряд)</p></td><td colspan="1" rowspan="1"><p>пн, ср</p></td><td colspan="1" rowspan="1"><p>17:45-18:45</p></td></tr><tr><td colspan="1" rowspan="1"><p>початківці (рівень 4 - без розряду)</p></td><td colspan="1" rowspan="1"><p>пн, ср</p></td><td colspan="1" rowspan="1"><p>18:45-19:45</p></td></tr></tbody></table><p><span><span style="font-weight: bold;">Шевченко Максим Ігорович</span></span></p><table style="min-width: 75px"><colgroup><col style="min-width: 25px"><col style="min-width: 25px"><col style="min-width: 25px"></colgroup><tbody><tr><td colspan="1" rowspan="1"><p>Рівень</p></td><td colspan="1" rowspan="1"><p>Дні тижня</p></td><td colspan="1" rowspan="1"><p>Час занять</p></td></tr><tr><td colspan="1" rowspan="1"><p>початківці</p></td><td colspan="1" rowspan="1"><p>вт, чт</p></td><td colspan="1" rowspan="1"><p>18:00-19:00</p></td></tr><tr><td colspan="1" rowspan="1"><p>3-4 розряд</p></td><td colspan="1" rowspan="1"><p>вт, чт</p></td><td colspan="1" rowspan="1"><p>19:00-20:00</p></td></tr></tbody></table><p><span><span style="font-weight: bold;">Бондаренко Юлія Олегівна</span></span></p><table style="min-width: 75px"><colgroup><col style="min-width: 25px"><col style="min-width: 25px"><col style="min-width: 25px"></colgroup><tbody><tr><td colspan="1" rowspan="1"><p>Рівень</p></td><td colspan="1" rowspan="1"><p>Дні тижня</p></td><td colspan="1" rowspan="1"><p>Час занять</p></td></tr><tr><td colspan="1" rowspan="1"><p>початківці (у т.ч. дошкільнята)</p></td><td colspan="1" rowspan="1"><p>пн, пт</p></td><td colspan="1" rowspan="1"><p>17:00-18:00</p></td></tr><tr><td colspan="1" rowspan="1"><p>більш сильні, але без розряду</p></td><td colspan="1" rowspan="1"><p>вт, чт<br>додатково може будуть заняття щонеділі</p></td><td colspan="1" rowspan="1"><p>19:00-20:00</p></td></tr></tbody></table><p>&nbsp;</p>',
    ];
@endphp
<main class="container mx-auto mt-7 lg:flex">
    <section class="grow-3 lg:mr-10">
        <div>
            <span class="badge badge-lg font-bold">
                Тип навчання:
                <span class="font-normal">{{ $data["educationType"]->to_string() }}</span>
            </span>
        </div>
        <div class="format lg:card-side bg-base-100 static mb-5 mt-5 min-h-96 w-full rounded-lg px-4 py-5 shadow-sm">

            {!! $data["content"] !!}

            <p class="mr-auto mt-auto block">
                @if ($data["linkToForm"])
                    <a href="{{ $data["linkToForm"] }}" target="_blank"
                        class="btn btn-sm btn-primary text-primary-content no-underline">
                        Записатися
                        <x-assets.icons.button-icons.sign-up />
                    </a>
                @endif

        </div>
        <form x-data action="{{ route("education.show", $data["id"]) . "/" }}" method="post"
            @submit.prevent="() => {

                $el.action += $event.submitter.value;
                injectDataToForm($el, {{ json_encode($data) }});

                $nextTick(() => $el.submit());
            }">
            <x-blocks.submit-buttons :state='$data["state"]' :editor-link='"/education/" . $data["id"] . "/edit"' />
        </form>
    </section>
    <x-blocks.sidebar.right />
</main>
