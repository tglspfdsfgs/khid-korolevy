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
