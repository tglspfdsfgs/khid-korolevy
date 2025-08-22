@props([
    "paginator" => null,
])

<div class="mt-2 pl-5">
    <hr class="w-35 my-2" />
    <button @disabled(!($paginator && $paginator->currentPage() > 1)) class="btn btn-outline btn-accent btn-sm mr-2">
        &laquo; Prev
    </button>
    <button @disabled(!($paginator && $paginator->hasMorePages())) class="btn btn-outline btn-accent btn-sm">
        Next &raquo;
    </button>
</div>
