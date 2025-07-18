@php
    use App\TournamentType as Type;
    use Carbon\Carbon;

    $data = [
        "id" => 1,
        "date" => Carbon::now(),
        "state" => \App\State::draft,
        "galleryType" => Type::CHESS,
        "content" =>
            '<img src="https://placehold.co/1200x1200" class="!m-0 rounded-lg"><img src="https://placehold.co/600x400" class="!m-0 rounded-lg"><img src="https://placehold.co/2400x2400" class="!m-0 rounded-lg"><img src="https://placehold.co/100x400" class="!m-0 rounded-lg"><img src="https://placehold.co/40x40" class="!m-0 mx-auto rounded-lg"><img src="https://placehold.co/400x100" class="!m-0 mx-auto rounded-lg">',
    ];
@endphp
<main class="container mx-auto mt-7 lg:flex">
    <section class="grow-3 lg:mr-10">
        <div>
            <span class="badge badge-lg italic">

                @if (Type::isTournament($data["galleryType"]))
                    Дата турніру:
                @else
                    Дата публікації:
                @endif

                <time class="font-bold"
                    datetime='{{ $data["date"] }}'>{{ Carbon::parse($data["date"])->translatedFormat("d.m.Y") }}</time>
            </span>
            <h2 class="badge badge-lg font-bold">
                <span class="font-normal">[ {{ Type::gallery_title($data["galleryType"]) }} ]</span>
            </h2>
        </div>
        <div x-data='{ src: "" }'
            x-on:click="
                 if ($event.target instanceof HTMLImageElement) {
                    image_modal.showModal();
                    src = $event.target.src;
                }
             "
            class="grid grid-cols-1 place-items-center gap-4 p-4 sm:grid-cols-2 md:grid-cols-3">

            <dialog id="image_modal" class="modal hidden:modal-bottom sm:modal-middle">
                <div class="modal-box p-2">
                    <img :src="src" class="h-auto w-full rounded-sm object-contain" />
                </div>

                <form method="dialog" class="modal-backdrop">
                    <button>close</button>
                </form>
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
