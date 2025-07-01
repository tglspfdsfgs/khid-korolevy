@php
    $data = [
        "id" => 1,
        "state" => \App\State::deleted,
        "title" => "Шахи: правила, стратегії та цікаві факти для початківців і професіоналів",
        "description" => "Все про шахи: від основ до просунутих тактик. Читайте!",
        "imageSrc" => "",
        "date" => \Carbon\Carbon::now(),
        "content" =>
            '<img src="https://placehold.co/1200x1200" class="!m-0 rounded-lg"><img src="https://placehold.co/600x400" class="!m-0 rounded-lg"><img src="https://placehold.co/2400x2400" class="!m-0 rounded-lg"><img src="https://placehold.co/100x400" class="!m-0 rounded-lg"><img src="https://placehold.co/40x40" class="!m-0 mx-auto rounded-lg"><img src="https://placehold.co/400x100" class="!m-0 mx-auto rounded-lg">',
    ];
@endphp
<main class="container mx-auto mt-7 lg:flex">
    <div x-data="{{ json_encode($data) }}" id="data-holder" x-init="$nextTick(() => dispatchEvent(new CustomEvent('editor-ready')))" x-bind:data-content="content"
        @update-data.window="Object.assign($data, $event.detail)">

        <section class="grow-3 lg:mr-10">

            {{-- <x-blocks.cards.articles.card-form :props='Arr::except($data, ["content"])' /> --}}
            <x-blocks.cards.gallery-card />
            {{-- <x-blocks.text-editor :is-responsive="$isResponsive" :unresponsive-size='$unresponsiveSize' /> --}}
            <x-blocks.gallery-editor :is-responsive="$isResponsive" :unresponsive-size='$unresponsiveSize' />

        </section>

        <form action="{{ route("article.show", $data["id"]) . "/" }}" method="post"
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
