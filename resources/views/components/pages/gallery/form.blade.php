@php
    use App\TournamentType as Type;
    $data = [
        "id" => 1,
        "state" => \App\State::deleted,
        "title" => '📸 Турнір у кадрі: "Королівська битва-2025"',
        "description" => "Найкращі моменти та емоції турніру. Дивися галерею!",
        "imageSrc" => "",
        "date" => \Carbon\Carbon::now(),
        "galleryType" => Type::COMP_DEV,
        "content" =>
            '<img src="https://placehold.co/1200x1200" class="!m-0 rounded-lg"><img src="https://placehold.co/600x400" class="!m-0 rounded-lg"><img src="https://placehold.co/2400x2400" class="!m-0 rounded-lg"><img src="https://placehold.co/100x400" class="!m-0 rounded-lg"><img src="https://placehold.co/40x40" class="!m-0 mx-auto rounded-lg"><img src="https://placehold.co/400x100" class="!m-0 mx-auto rounded-lg">',
    ];
@endphp
<main class="container mx-auto mt-7 lg:flex">
    <div x-data="{{ json_encode($data) }}" id="data-holder" x-init="$nextTick(() => dispatchEvent(new CustomEvent('editor-ready')))" x-bind:data-content="content"
        @update-data.window="Object.assign($data, $event.detail)">

        <section class="grow-3 lg:mr-10">

            <x-blocks.cards.gallery.card-form :props='Arr::except($data, ["content"])' />

            <fieldset class="fieldset ml-5">
                <legend class="fieldset-legend">Тип галереї:</legend>
                <select x-model="galleryType" class="select w-40">
                    @foreach (Type::getAllGalleryTypes() as $key => $value)
                        <option value="{{ $value }}" @selected($data["galleryType"] == $value)>
                            {{ Type::gallery_title($value) }}
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
