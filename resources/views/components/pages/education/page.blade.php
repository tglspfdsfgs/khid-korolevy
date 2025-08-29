<main class="container mx-auto mt-7 lg:flex">
    <section class="grow-3 lg:mr-10">
        <div>
            <span class="badge badge-lg font-bold">
                Тип навчання:
                <span class="font-normal">{{ $data["educationType"]->to_string() }}</span>
            </span>
        </div>
        <div class="format lg:card-side bg-base-100 static mb-5 mt-5 min-h-96 w-full rounded-lg px-4 py-5 shadow-sm">

            {!! $data["content"] !!}

            <p class="mr-auto mt-auto block">
                @if ($data["linkToForm"])
                    <a href="{{ $data["linkToForm"] }}" target="_blank"
                        class="btn btn-sm btn-primary text-primary-content no-underline">
                        Записатися
                        <x-assets.icons.button-icons.sign-up />
                    </a>
                @endif

        </div>
        <form x-data action="{{ route("education.show", $data["id"]) . "/" }}" method="post"
            @submit.prevent="() => {

                $el.action += $event.submitter.value;
                injectDataToForm($el, {{ json_encode($data) }});

                $nextTick(() => $el.submit());
            }">
            <x-blocks.submit-buttons :state='$data["state"]' :editor-link='"/education/" . $data["id"] . "/edit"' />
        </form>
    </section>
    <x-blocks.sidebar.right />
</main>
