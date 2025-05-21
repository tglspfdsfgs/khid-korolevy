@php
    $data = [
        "articleID" => 1,
        "state" => \App\State::deleted,
        "title" => "Шахи: правила, стратегії та цікаві факти для початківців і професіоналів",
        "description" => "Все про шахи: від основ до просунутих тактик. Читайте!",
        "imageSrc" => "",
        "date" => \Carbon\Carbon::now(),
        "content" =>
            '<h2 style="text-align: center">Шахи: Мистецтво Стратегії</h2><blockquote><p><span style="font-size: 16px">Шахи — це боротьба двох умів, де кожен хід — це крок до перемоги або поразки.</span></p></blockquote><h3 style="text-align: center">Основи дебюту</h3><p><span style="font-size: 16px">У шахах </span><span><span style="font-weight: bold;">дебют</span></span><span style="font-size: 16px"> — це перші ходи, які закладають фундамент для подальшої гри.<br>Найпоширеніший дебют — <em>іспанська партія</em>, що починається ходами:</span></p><p><code>1. e4 e5 2. Nf3 Nc6 3. Bb5</code></p><h3 style="text-align: center">Популярні дебюти</h3><ol><li><p><span style="font-size: 16px">Італійська партія</span></p></li><li><p><span style="font-size: 16px">Сицилійський захист</span></p></li><li><p><span style="font-size: 16px">Французький захист</span></p></li><li><p><span style="font-size: 16px">Скандинавський захист</span></p></li><li><p><span style="font-size: 16px">Каро-Канн</span></p></li></ol><h3><span style="font-size: 16px">Таблиця: Ходи та стиль</span></h3><div class="tableWrapper"><table style="min-width: 50px;"><colgroup><col style="min-width: 25px;"><col style="min-width: 25px;"></colgroup><tbody><tr><th colspan="1" rowspan="1"><p><span style="font-size: 16px">Дебют</span></p></th><th colspan="1" rowspan="1"><p><span style="font-size: 16px">Стиль гри</span></p></th></tr><tr><td colspan="1" rowspan="1"><p><span style="font-size: 16px">Італійська партія</span></p></td><td colspan="1" rowspan="1"><p><span style="font-size: 16px"><em>Атакувальний</em></span></p></td></tr><tr><td colspan="1" rowspan="1"><p><span style="font-size: 16px">Каро-Канн</span></p></td><td colspan="1" rowspan="1"><p><span style="font-size: 16px">Оборонний</span></p></td></tr><tr><td colspan="1" rowspan="1"><p><span style="font-size: 16px">Сицилійський захист</span></p></td><td colspan="1" rowspan="1"><p><span style="font-size: 16px">Гнучкий</span></p></td></tr></tbody></table></div><hr contenteditable="false"><h3><span style="font-size: 14px">Корисні ресурси</span></h3><ul><li><p><a target="_blank" rel="noopener noreferrer nofollow" class="link link-info" href="http://chess.com"><span style="font-size: 12px">chess.com</span></a></p></li><li><p><a target="_blank" rel="noopener noreferrer nofollow" class="link link-info" href="http://lichess.org"><span style="font-size: 12px">lichess.org</span></a></p></li></ul>',
    ];
@endphp
<main class="container mx-auto mt-7 lg:flex">
    <div x-data="{{ json_encode($data) }}" id="data-holder" x-init="$nextTick(() => dispatchEvent(new CustomEvent('editor-ready')))" x-bind:data-content="content"
        @update-data.window="Object.assign($data, $event.detail)">
        <section class="grow-3 lg:mr-10">
            <x-blocks.cards.create-article :props='Arr::except($data, ["content"])' />
            <x-blocks.text-editor />
        </section>
        <form action="/editor" method="post"
            @submit.prevent="() => {
                $data.content = window.tiptapEditor.getHTML();
                $data.method = $event.submitter.value;
                injectDataToForm($el, toRaw($data));

                $nextTick(() => $el.submit());
            }">
            <x-blocks.submit-buttons :state='$data["state"]' />
        </form>
    </div>
    <x-blocks.sidebar.right />
</main>
