@php
    $data = [
        "id" => 1,
        "date" => \Carbon\Carbon::now(),
        "state" => \App\State::draft,
        "content" =>
            /*'<h1><span style="font-weight: bold;">Шахи: відкрийте світ стратегії, логіки та нескінченнихможливостей</span></h1><p>Шахи – одна з найдавніших і найпопулярніших ігор у світі, яка поєднує в собі логіку, стратегію татворчість. Вона розвиває мислення, покращує концентрацію та навіть сприяє кращій пам’яті. У ційстатті ми розглянемо:</p><p>✅ <span style="font-weight: bold;">Основні правила шахів</span> для початківців<br>✅ <spanstyle="font-weight: bold;">Ефективні стратегії</span> для перемоги<br>✅ <spanstyle="font-weight: bold;">Цікаві факти</span> з історії гри<br>✅ <spanstyle="font-weight: bold;">Корисні поради</span>, як стати сильнішим гравцем</p><h2><span style="font-weight: bold;">1. Основні правила шахів</span></h2><p>Шахи грають на 64-клітинній дошці двома комплектами фігур (білими та чорними). Кожен гравець має:</p><ul><li><p><span style="font-weight: bold;">1 короля</span> (найважливіша фігура)</p></li><li><p><span style="font-weight: bold;">1 ферзя</span> (найсильніша фігура)</p></li><li><p><span style="font-weight: bold;">2 тури, 2 коні, 2 слони</span></p></li><li><p><span style="font-weight: bold;">8 пішаків</span></p></li></ul><p><span style="font-weight: bold;">Мета гри</span> – поставити мат королю суперника або змуситийого здатися.</p><h2><span style="font-weight: bold;">2. Стратегії для успішної гри</span></h2><ul><li><p><span style="font-weight: bold;">Контроль центру</span> – займайте центральні клітини(e4, e5, d4, d5) для більшої мобільності фігур.</p></li><li><p><span style="font-weight: bold;">Розвиток фігур</span> – виводите коней і слонів наактивні позиції.</p></li><li><p><span style="font-weight: bold;">Безпека короля</span> – не забувайте про рокіровку.</p></li><li><p><span style="font-weight: bold;">Тактичні прийоми</span> – використовуйте вилки, зв’язкита двійний удар.</p></li></ul><h2><span style="font-weight: bold;">3. Цікаві факти про шахи</span></h2><p>🔹 Найдовша шахова партія теоретично може тривати <span style="font-weight: bold;">5 949ходів</span>.<br>🔹 Перший комп’ютерний шаховий двигун з’явився ще <spanstyle="font-weight: bold;">в 1951 році</span>.<br>🔹 <span style="font-weight: bold;">МагнусКарлсен</span> – один із найсильніших гросмейстерів сучасності.</p><h2><span style="font-weight: bold;">4. Як покращити свій рівень гри?</span></h2><ul><li><p><span style="font-weight: bold;">Аналізуйте партії</span> (свої та відомих гравців).</p></li><li><p><span style="font-weight: bold;">Грайте регулярно</span> – онлайн або в шаховому клубі.</p></li><li><p><span style="font-weight: bold;">Вивчайте дебюти та ендшпілі</span>.</p></li><li><p><span style="font-weight: bold;">Використовуйте шахові програми</span> (наприклад, <atarget="_blank" rel="noopener noreferrer nofollow" class="link link-info"href="http://Chess.com">Chess.com</a>, Lichess).</p></li></ul><h3><span style="font-weight: bold;">Висновок</span></h3><p>Шахи – це не просто гра, а справжнє мистецтво стратегії. Вони розвивають інтелект, допомагаютьприймати кращі рішення та залишаються актуальними протягом століть. Почніть грати вже сьогодні –і, можливо, саме ви станете наступним чемпіоном!</p><p>♟️ <span style="font-weight: bold;">Готові до гри?</span> Тренуйтеся онлайн або знаходьте шаховийклуб у своєму місті!</p>',*/
            '<img src="https://placehold.co/1200x1200" class="!m-0 rounded-lg"><img src="https://placehold.co/600x400" class="!m-0 rounded-lg"><img src="https://placehold.co/2400x2400" class="!m-0 rounded-lg"><img src="https://placehold.co/100x400" class="!m-0 rounded-lg"><img src="https://placehold.co/40x40" class="!m-0 mx-auto rounded-lg"><img src="https://placehold.co/400x100" class="!m-0 mx-auto rounded-lg">',
    ];
@endphp
<main class="container mx-auto mt-7 lg:flex">
    <section class="grow-3 lg:mr-10">
        <div>
            <p class="badge badge-lg italic">
                Дата публікації:
                <time class="font-bold"
                    datetime='{{ $data["date"] }}'>{{ \Carbon\Carbon::parse($data["date"])->translatedFormat("d.m.Y") }}</time>
            </p>
        </div>
        <div
            class="format lg:card-side bg-base-100 static mb-5 mt-5 grid min-h-96 w-full max-w-none grid-cols-1 place-items-center gap-4 rounded-lg p-1 px-4 py-5 shadow-sm sm:grid-cols-2 md:grid-cols-3">
            {{--  format p-1 lg:format-lg dark:format-invert focus:outline-none format-blue max-w-none --}}
            {!! $data["content"] !!}
        </div>
        <form x-data action="{{ route("article.show", $data["id"]) . "/" }}" method="post"
            @submit.prevent="() => {

                $el.action += $event.submitter.value;
                injectDataToForm($el, {{ json_encode($data) }});

                $nextTick(() => $el.submit());
            }">
            <x-blocks.submit-buttons :state='$data["state"]' :editor-link='"/article/" . $data["id"] . "/edit"' />
        </form>
    </section>
    <x-blocks.sidebar.right />
</main>
