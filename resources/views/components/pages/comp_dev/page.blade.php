@php
    $data = [
        "id" => 1,
        "badge" => "💡 Бейдж",
        "title" => "🧠 Інтелектуально-розвиваючий гурток",
        "state" => \App\State::draft,
        "link" => "#",
        "content" =>
            '<h3 style="text-align: center"><em>Чи любите ви виклики, які змушують думати нестандартно?</em></h3><p>Наш інтелектуально-розвиваючий гурток — це простір, де пізнання зустрічається з грою! У нас діти, підлітки й дорослі розвивають логіку, креативність та критичне мислення через цікаві завдання, головоломки та експерименти.</p><h4><span><span style="font-weight: bold;">Чому варто приєднатися?</span></span></h4><p>✅ <span><span style="font-weight: bold;">Розвиваємо мислення</span></span> — від логічних пазлів до стратегічних ігор.<br>✅ <span><span style="font-weight: bold;">Працюємо в команді</span></span> — вчимося знаходити рішення разом.<br>✅ <span><span style="font-weight: bold;">Весело навчаємося</span></span> — наука через гру мотивує краще за зубріння!</p><h4><span><span style="font-weight: bold;">Що чекає на учасників?</span></span></h4><ul><li><p><span><span style="font-weight: bold;">Логічні квести</span></span> — загадки, шифри, математичні виклики.</p></li><li><p><span><span style="font-weight: bold;">Творчі експерименти</span></span> — від наукових дослідів до арт-проєктів.</p></li><li><p><span><span style="font-weight: bold;">Дискусійні клуби</span></span> — вчимося аргументувати думки.</p></li></ul><p>Наш гурток — це місце, де кожен знаходить щось своє: діти розкривають потенціал, дорослі тренують мозок, а всі разом отримують заряд натхнення.</p><p><span><span style="font-weight: bold;">Приєднуйтесь — розвивайте інтелект із задоволенням!</span></span></p>',
    ];
@endphp
<main class="container mx-auto mt-7 lg:flex">
    <section class="grow-3 lg:mr-10">
        <div>
            <b class="mb-2 uppercase">{{ $data["title"] }}</b>
            <div class="badge badge-lg font-bold">
                [
                <span class="font-normal">{{ $data["badge"] }}</span>
                ]
            </div>
        </div>
        <div class="format lg:card-side bg-base-100 static mb-5 mt-5 min-h-96 w-full rounded-lg px-4 py-5 shadow-sm">

            {!! $data["content"] !!}

            <p class="mr-auto mt-auto block">
                @if ($data["link"])
                    <a href="{{ $data["link"] }}" target="_blank"
                        class="btn btn-sm btn-secondary text-secondary-content no-underline">
                        Посилання
                        <x-assets.icons.button-icons.link />
                    </a>
                @endif
            </p>
        </div>

        <form x-data action="{{ route("comp_dev.show", $data["id"]) . "/" }}" method="post"
            @submit.prevent="() => {

                $el.action += $event.submitter.value;
                injectDataToForm($el, {{ json_encode($data) }});

                $nextTick(() => $el.submit());
            }">
            <x-blocks.submit-buttons :state='$data["state"]' :editor-link='"/comp_dev/" . $data["id"] . "/edit"' />
        </form>
    </section>
    <x-blocks.sidebar.right />
</main>
