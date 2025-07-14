@php
    $data = [
        "id" => 1,
        "date" => \Carbon\Carbon::now(),
        "state" => \App\State::draft,
        "galleryType" => \App\TournamentType::CHESS,
        "content" =>
            '<img src="https://placehold.co/1200x1200" class="!m-0 rounded-lg"><img src="https://placehold.co/600x400" class="!m-0 rounded-lg"><img src="https://placehold.co/2400x2400" class="!m-0 rounded-lg"><img src="https://placehold.co/100x400" class="!m-0 rounded-lg"><img src="https://placehold.co/40x40" class="!m-0 mx-auto rounded-lg"><img src="https://placehold.co/400x100" class="!m-0 mx-auto rounded-lg">',
    ];
@endphp
<main class="container mx-auto mt-7 lg:flex">
    <section class="grow-3 lg:mr-10">
        <div>
            <time class="badge badge-lg italic">
                Дата публікації:
                <time class="font-bold"
                    datetime='{{ $data["date"] }}'>{{ \Carbon\Carbon::parse($data["date"])->translatedFormat("d.m.Y") }}</time>
            </time>
            <h2 class="badge badge-lg font-bold">
                <span class="font-normal">[ {{ \App\TournamentType::gallery_title($data["galleryType"]) }} ]</span>
            </h2>
        </div>
        <div x-data
            x-on:click='
                 if ($event.target instanceof HTMLImageElement) {
                    image_modal.showModal()
                }
             '
            class="grid grid-cols-1 place-items-center gap-4 p-4 sm:grid-cols-2 md:grid-cols-3">

            <dialog id="image_modal" class="modal modal-bottom sm:modal-middle">
                <div class="modal-box">
                    <h3 class="text-lg font-bold">Modal title</h3>
                    <p class="py-4">IMAGE</p>
                    <div class="modal-action">
                        <form method="dialog">
                            <!-- if there is a button in form, it will close the modal -->
                            <button class="btn">Close</button>
                        </form>
                    </div>
                </div>
            </dialog>

            {!! $data["content"] !!}
        </div>
        <form x-data action="{{ route("gallery.show", $data["id"]) . "/" }}" method="post"
            @submit.prevent="() => {

                $el.action += $event.submitter.value;
                injectDataToForm($el, {{ json_encode($data) }});

                $nextTick(() => $el.submit());
            }">
            <x-blocks.submit-buttons :state='$data["state"]' :editor-link='"/gallery/" . $data["id"] . "/edit"' />
        </form>
    </section>
    <x-blocks.sidebar.right />
</main>
