@php
    use App\State as State;
    use Carbon\Carbon as Carbon;
    use App\TournamentType as Type;

    $cards = [
        [
            "type" => "comp_dev",
            "id" => 1,
            "state" => \App\State::published,
            "title" => "💻 PROграмування",
            "description" =>
                "Опануйте IT-професії з нуля за 3 місяці – створюйте реальні проекти вже під час навчання!",
            "badge" => "🧑‍💻 Приватна IT школа",
            "imageSrc" => Vite::asset("resources/images/chess(1).jpg"),
            "link" => "#",
            "content" =>
                '<h2 style="text-align: center">Розклад занять</h2><h2 style="text-align: center">у шаховому клубі «[назва клубу]» на 2025-2026</h2><p><span><span style="font-weight: bold;">Коваленко Андрій Сергійович</span></span></p><table style="min-width: 75px"><colgroup><col style="min-width: 25px"><col style="min-width: 25px"><col style="min-width: 25px"></colgroup><tbody><tr><td colspan="1" rowspan="1"><p>Рівень</p></td><td colspan="1" rowspan="1"><p>Дні тижня</p></td><td colspan="1" rowspan="1"><p>Час занять</p></td></tr><tr><td colspan="1" rowspan="1"><p>початківці</p></td><td colspan="1" rowspan="1"><p>сб, нд</p></td><td colspan="1" rowspan="1"><p>09:00-10:00</p></td></tr><tr><td colspan="1" rowspan="1"><p>другий рік навчання (приблизно рівень 4-го розряду)</p></td><td colspan="1" rowspan="1"><p>сб, нд</p></td><td colspan="1" rowspan="1"><p>10:00-11:00</p></td></tr><tr><td colspan="1" rowspan="1"><p>старша група</p></td><td colspan="1" rowspan="1"><p>сб, нд</p></td><td colspan="1" rowspan="1"><p>11:00-12:00</p></td></tr></tbody></table><p><span><span style="font-weight: bold;">Мельник Оксана Василівна</span></span></p><table style="min-width: 75px"><colgroup><col style="min-width: 25px"><col style="min-width: 25px"><col style="min-width: 25px"></colgroup><tbody><tr><td colspan="1" rowspan="1"><p>Рівень</p></td><td colspan="1" rowspan="1"><p>Дні тижня</p></td><td colspan="1" rowspan="1"><p>Час занять</p></td></tr><tr><td colspan="1" rowspan="1"><p>розрядники (рівень 4 сильний - 2 розряд)</p></td><td colspan="1" rowspan="1"><p>пн, ср</p></td><td colspan="1" rowspan="1"><p>17:45-18:45</p></td></tr><tr><td colspan="1" rowspan="1"><p>початківці (рівень 4 - без розряду)</p></td><td colspan="1" rowspan="1"><p>пн, ср</p></td><td colspan="1" rowspan="1"><p>18:45-19:45</p></td></tr></tbody></table><p><span><span style="font-weight: bold;">Шевченко Максим Ігорович</span></span></p><table style="min-width: 75px"><colgroup><col style="min-width: 25px"><col style="min-width: 25px"><col style="min-width: 25px"></colgroup><tbody><tr><td colspan="1" rowspan="1"><p>Рівень</p></td><td colspan="1" rowspan="1"><p>Дні тижня</p></td><td colspan="1" rowspan="1"><p>Час занять</p></td></tr><tr><td colspan="1" rowspan="1"><p>початківці</p></td><td colspan="1" rowspan="1"><p>вт, чт</p></td><td colspan="1" rowspan="1"><p>18:00-19:00</p></td></tr><tr><td colspan="1" rowspan="1"><p>3-4 розряд</p></td><td colspan="1" rowspan="1"><p>вт, чт</p></td><td colspan="1" rowspan="1"><p>19:00-20:00</p></td></tr></tbody></table><p><span><span style="font-weight: bold;">Бондаренко Юлія Олегівна</span></span></p><table style="min-width: 75px"><colgroup><col style="min-width: 25px"><col style="min-width: 25px"><col style="min-width: 25px"></colgroup><tbody><tr><td colspan="1" rowspan="1"><p>Рівень</p></td><td colspan="1" rowspan="1"><p>Дні тижня</p></td><td colspan="1" rowspan="1"><p>Час занять</p></td></tr><tr><td colspan="1" rowspan="1"><p>початківці (у т.ч. дошкільнята)</p></td><td colspan="1" rowspan="1"><p>пн, пт</p></td><td colspan="1" rowspan="1"><p>17:00-18:00</p></td></tr><tr><td colspan="1" rowspan="1"><p>більш сильні, але без розряду</p></td><td colspan="1" rowspan="1"><p>вт, чт<br>додатково може будуть заняття щонеділі</p></td><td colspan="1" rowspan="1"><p>19:00-20:00</p></td></tr></tbody></table><p>&nbsp;</p>',
        ],
        [
            "type" => "comp_dev",
            "id" => 1,
            "state" => \App\State::published,
            "title" => "🧠 Інтелектуально-розвиваючий гурток",
            "description" => "Ігри, головоломки та експерименти для розумних і допитливих!",
            "badge" => "💡 Бейдж",
            "imageSrc" => null,
            "link" => "",
            "content" =>
                '<h2 style="text-align: center">Розклад занять</h2><h2 style="text-align: center">у шаховому клубі «[назва клубу]» на 2025-2026</h2><p><span><span style="font-weight: bold;">Коваленко Андрій Сергійович</span></span></p><table style="min-width: 75px"><colgroup><col style="min-width: 25px"><col style="min-width: 25px"><col style="min-width: 25px"></colgroup><tbody><tr><td colspan="1" rowspan="1"><p>Рівень</p></td><td colspan="1" rowspan="1"><p>Дні тижня</p></td><td colspan="1" rowspan="1"><p>Час занять</p></td></tr><tr><td colspan="1" rowspan="1"><p>початківці</p></td><td colspan="1" rowspan="1"><p>сб, нд</p></td><td colspan="1" rowspan="1"><p>09:00-10:00</p></td></tr><tr><td colspan="1" rowspan="1"><p>другий рік навчання (приблизно рівень 4-го розряду)</p></td><td colspan="1" rowspan="1"><p>сб, нд</p></td><td colspan="1" rowspan="1"><p>10:00-11:00</p></td></tr><tr><td colspan="1" rowspan="1"><p>старша група</p></td><td colspan="1" rowspan="1"><p>сб, нд</p></td><td colspan="1" rowspan="1"><p>11:00-12:00</p></td></tr></tbody></table><p><span><span style="font-weight: bold;">Мельник Оксана Василівна</span></span></p><table style="min-width: 75px"><colgroup><col style="min-width: 25px"><col style="min-width: 25px"><col style="min-width: 25px"></colgroup><tbody><tr><td colspan="1" rowspan="1"><p>Рівень</p></td><td colspan="1" rowspan="1"><p>Дні тижня</p></td><td colspan="1" rowspan="1"><p>Час занять</p></td></tr><tr><td colspan="1" rowspan="1"><p>розрядники (рівень 4 сильний - 2 розряд)</p></td><td colspan="1" rowspan="1"><p>пн, ср</p></td><td colspan="1" rowspan="1"><p>17:45-18:45</p></td></tr><tr><td colspan="1" rowspan="1"><p>початківці (рівень 4 - без розряду)</p></td><td colspan="1" rowspan="1"><p>пн, ср</p></td><td colspan="1" rowspan="1"><p>18:45-19:45</p></td></tr></tbody></table><p><span><span style="font-weight: bold;">Шевченко Максим Ігорович</span></span></p><table style="min-width: 75px"><colgroup><col style="min-width: 25px"><col style="min-width: 25px"><col style="min-width: 25px"></colgroup><tbody><tr><td colspan="1" rowspan="1"><p>Рівень</p></td><td colspan="1" rowspan="1"><p>Дні тижня</p></td><td colspan="1" rowspan="1"><p>Час занять</p></td></tr><tr><td colspan="1" rowspan="1"><p>початківці</p></td><td colspan="1" rowspan="1"><p>вт, чт</p></td><td colspan="1" rowspan="1"><p>18:00-19:00</p></td></tr><tr><td colspan="1" rowspan="1"><p>3-4 розряд</p></td><td colspan="1" rowspan="1"><p>вт, чт</p></td><td colspan="1" rowspan="1"><p>19:00-20:00</p></td></tr></tbody></table><p><span><span style="font-weight: bold;">Бондаренко Юлія Олегівна</span></span></p><table style="min-width: 75px"><colgroup><col style="min-width: 25px"><col style="min-width: 25px"><col style="min-width: 25px"></colgroup><tbody><tr><td colspan="1" rowspan="1"><p>Рівень</p></td><td colspan="1" rowspan="1"><p>Дні тижня</p></td><td colspan="1" rowspan="1"><p>Час занять</p></td></tr><tr><td colspan="1" rowspan="1"><p>початківці (у т.ч. дошкільнята)</p></td><td colspan="1" rowspan="1"><p>пн, пт</p></td><td colspan="1" rowspan="1"><p>17:00-18:00</p></td></tr><tr><td colspan="1" rowspan="1"><p>більш сильні, але без розряду</p></td><td colspan="1" rowspan="1"><p>вт, чт<br>додатково може будуть заняття щонеділі</p></td><td colspan="1" rowspan="1"><p>19:00-20:00</p></td></tr></tbody></table><p>&nbsp;</p>',
        ],
        [
            "type" => "comp_dev",
            "id" => 1,
            "state" => \App\State::published,
            "title" => "🇬🇧 English Boost",
            "description" => "Говори вільно —  інтенсивні заняття з носіями для швидкого результату!",
            "badge" => "🗣️ Розмовні курси",
            "imageSrc" => Vite::asset("resources/images/chess(2).jpg"),
            "link" => "#",
            "content" =>
                '<h2 style="text-align: center">Розклад занять</h2><h2 style="text-align: center">у шаховому клубі «[назва клубу]» на 2025-2026</h2><p><span><span style="font-weight: bold;">Коваленко Андрій Сергійович</span></span></p><table style="min-width: 75px"><colgroup><col style="min-width: 25px"><col style="min-width: 25px"><col style="min-width: 25px"></colgroup><tbody><tr><td colspan="1" rowspan="1"><p>Рівень</p></td><td colspan="1" rowspan="1"><p>Дні тижня</p></td><td colspan="1" rowspan="1"><p>Час занять</p></td></tr><tr><td colspan="1" rowspan="1"><p>початківці</p></td><td colspan="1" rowspan="1"><p>сб, нд</p></td><td colspan="1" rowspan="1"><p>09:00-10:00</p></td></tr><tr><td colspan="1" rowspan="1"><p>другий рік навчання (приблизно рівень 4-го розряду)</p></td><td colspan="1" rowspan="1"><p>сб, нд</p></td><td colspan="1" rowspan="1"><p>10:00-11:00</p></td></tr><tr><td colspan="1" rowspan="1"><p>старша група</p></td><td colspan="1" rowspan="1"><p>сб, нд</p></td><td colspan="1" rowspan="1"><p>11:00-12:00</p></td></tr></tbody></table><p><span><span style="font-weight: bold;">Мельник Оксана Василівна</span></span></p><table style="min-width: 75px"><colgroup><col style="min-width: 25px"><col style="min-width: 25px"><col style="min-width: 25px"></colgroup><tbody><tr><td colspan="1" rowspan="1"><p>Рівень</p></td><td colspan="1" rowspan="1"><p>Дні тижня</p></td><td colspan="1" rowspan="1"><p>Час занять</p></td></tr><tr><td colspan="1" rowspan="1"><p>розрядники (рівень 4 сильний - 2 розряд)</p></td><td colspan="1" rowspan="1"><p>пн, ср</p></td><td colspan="1" rowspan="1"><p>17:45-18:45</p></td></tr><tr><td colspan="1" rowspan="1"><p>початківці (рівень 4 - без розряду)</p></td><td colspan="1" rowspan="1"><p>пн, ср</p></td><td colspan="1" rowspan="1"><p>18:45-19:45</p></td></tr></tbody></table><p><span><span style="font-weight: bold;">Шевченко Максим Ігорович</span></span></p><table style="min-width: 75px"><colgroup><col style="min-width: 25px"><col style="min-width: 25px"><col style="min-width: 25px"></colgroup><tbody><tr><td colspan="1" rowspan="1"><p>Рівень</p></td><td colspan="1" rowspan="1"><p>Дні тижня</p></td><td colspan="1" rowspan="1"><p>Час занять</p></td></tr><tr><td colspan="1" rowspan="1"><p>початківці</p></td><td colspan="1" rowspan="1"><p>вт, чт</p></td><td colspan="1" rowspan="1"><p>18:00-19:00</p></td></tr><tr><td colspan="1" rowspan="1"><p>3-4 розряд</p></td><td colspan="1" rowspan="1"><p>вт, чт</p></td><td colspan="1" rowspan="1"><p>19:00-20:00</p></td></tr></tbody></table><p><span><span style="font-weight: bold;">Бондаренко Юлія Олегівна</span></span></p><table style="min-width: 75px"><colgroup><col style="min-width: 25px"><col style="min-width: 25px"><col style="min-width: 25px"></colgroup><tbody><tr><td colspan="1" rowspan="1"><p>Рівень</p></td><td colspan="1" rowspan="1"><p>Дні тижня</p></td><td colspan="1" rowspan="1"><p>Час занять</p></td></tr><tr><td colspan="1" rowspan="1"><p>початківці (у т.ч. дошкільнята)</p></td><td colspan="1" rowspan="1"><p>пн, пт</p></td><td colspan="1" rowspan="1"><p>17:00-18:00</p></td></tr><tr><td colspan="1" rowspan="1"><p>більш сильні, але без розряду</p></td><td colspan="1" rowspan="1"><p>вт, чт<br>додатково може будуть заняття щонеділі</p></td><td colspan="1" rowspan="1"><p>19:00-20:00</p></td></tr></tbody></table><p>&nbsp;</p>',
        ],
    ];

@endphp

<main class="container mx-auto mt-7 lg:flex">
    <section class="grow-3 lg:mr-10">
        <x-blocks.create text="Натисни щоб створити гурток" link='{{ route("comp_dev.create") }}' />
        <x-blocks.cards-state-navigation />

        @foreach ($cards as $card)
            <x-card :props="$card" />
        @endforeach

        {{-- pagination --}}
        <x-blocks.pagination />
    </section>
    <x-blocks.sidebar.right />
</main>
