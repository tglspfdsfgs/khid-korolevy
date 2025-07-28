@php
    $data = [
        "id" => 1,
        "state" => \App\State::draft,
        "title" => "🧠 Інтелектуально-розвиваючий гурток",
        "description" => "Ігри, головоломки та експерименти для розумних і допитливих!",
        "badge" => "💡 Бейдж",
        "imageSrc" => "",
        "link" => "",
        "content" =>
            '<h3 style="text-align: center"><em>Чи любите ви виклики, які змушують думати нестандартно? </em></h3><p>Наш інтелектуально-розвиваючий гурток — це простір, де пізнання зустрічається з грою! У нас діти, підлітки й дорослі розвивають логіку, креативність та критичне мислення через цікаві завдання, головоломки та експерименти.</p><h4><span><span style="font-weight: bold;">Чому варто приєднатися?</span></span></h4><p>✅ <span><span style="font-weight: bold;">Розвиваємо мислення</span></span> — від логічних пазлів до стратегічних ігор.<br>✅ <span><span style="font-weight: bold;">Працюємо в команді</span></span> — вчимося знаходити рішення разом.<br>✅ <span><span style="font-weight: bold;">Весело навчаємося</span></span> — наука через гру мотивує краще за зубріння!</p><h4><span><span style="font-weight: bold;">Що чекає на учасників?</span></span></h4><ul><li><p><span><span style="font-weight: bold;">Логічні квести</span></span> — загадки, шифри, математичні виклики.</p></li><li><p><span><span style="font-weight: bold;">Творчі експерименти</span></span> — від наукових дослідів до арт-проєктів.</p></li><li><p><span><span style="font-weight: bold;">Дискусійні клуби</span></span> — вчимося аргументувати думки.</p></li></ul><p>Наш гурток — це місце, де кожен знаходить щось своє: діти розкривають потенціал, дорослі тренують мозок, а всі разом отримують заряд натхнення.</p><p><span><span style="font-weight: bold;">Приєднуйтесь — розвивайте інтелект із задоволенням!</span></span></p>',
    ];
@endphp
<main class="container mx-auto mt-7 lg:flex">
    <div x-data="{{ json_encode($data) }}" id="data-holder" x-init="$nextTick(() => dispatchEvent(new CustomEvent('editor-ready')))" x-bind:data-content="content"
        @update-data.window="Object.assign($data, $event.detail)">

        <section class="grow-3 lg:mr-10">

            <x-blocks.cards.comp_dev.card-form :props='Arr::except($data, ["content"])' />
            <x-blocks.text-editor :is-responsive="$isResponsive" :unresponsive-size='$unresponsiveSize' />

        </section>

        <form action="{{ route("comp_dev.show", $data["id"]) . "/" }}" method="post"
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
