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
