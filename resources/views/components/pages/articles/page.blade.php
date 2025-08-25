<main class="container mx-auto mt-7 lg:flex">
    <section class="grow-3 lg:mr-10">
        <div>
            <p class="badge badge-lg italic">
                Дата публікації:
                <time class="font-bold"
                    datetime='{{ $data["date"] }}'>{{ \Carbon\Carbon::parse($data["date"])->translatedFormat("d.m.Y") }}</time>
            </p>
        </div>
        <div class="format lg:card-side bg-base-100 static mb-5 mt-5 min-h-96 w-full rounded-lg px-4 py-5 shadow-sm">

            {!! $data["content"] !!}

        </div>
        <form x-data action="{{ route("article.show", $data["id"]) . "/" }}" method="post"
            @submit.prevent="() => {

                $el.action += $event.submitter.value;
                injectDataToForm($el, {{ json_encode($data) }});

                $nextTick(() => $el.submit());
            }">
            <x-blocks.submit-buttons :state='$data["state"]' :editor-link='"/article/" . $data["id"] . "/edit"' />
        </form>
    </section>
    <x-blocks.sidebar.right />
</main>
