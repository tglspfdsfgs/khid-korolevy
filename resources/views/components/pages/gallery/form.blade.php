<main class="container mx-auto mt-7 lg:flex">
    <div x-data="{{ json_encode($data) }}" id="data-holder" x-init="$nextTick(() => dispatchEvent(new CustomEvent('editor-ready')))" x-bind:data-content="content"
        @update-data.window="Object.assign($data, $event.detail)">

        <section class="grow-3 lg:mr-10">

            <x-blocks.cards.gallery.card-form :props='Arr::except($data, ["content"])' />

            <fieldset class="fieldset ml-5">
                <legend class="fieldset-legend">Тип галереї:</legend>
                <select x-model="galleryType" class="select w-40">
                    @foreach (\App\Enums\GalleryType::cases() as $type)
                        <option value="{{ $type->value }}" @selected($data["galleryType"] === $type->value)>
                            {{ $type->nav_title() }}
                        </option>
                    @endforeach
                </select>
            </fieldset>

            <x-blocks.gallery-editor :is-responsive="$isResponsive" :unresponsive-size='$unresponsiveSize' />

        </section>

        <form action="{{ route("gallery.show", $data["id"]) . "/" }}" method="post"
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
