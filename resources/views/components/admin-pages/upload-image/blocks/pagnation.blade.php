@props([
    "paginator" => null,
])

<div class="mt-2 pl-5">
    @dump($paginator?->items())
    <hr class="w-38 my-2" />
    <button class="btn btn-outline btn-accent btn-sm mr-2">
        << Prev </button>
            <button class="btn btn-outline btn-accent btn-sm">Next >> </button>
</div>
