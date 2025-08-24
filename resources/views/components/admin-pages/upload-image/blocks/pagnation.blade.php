@props([
    "paginator" => null,
])

<span class="mt-2">
    <hr class="w-35 my-2" />
    <button type="submit" value="{{ $paginator ? $paginator->currentPage() - 1 : 1 }}" @disabled(!($paginator && $paginator->currentPage() > 1))
        class="btn btn-outline btn-accent btn-sm mr-2">
        &laquo; Prev
    </button>
    <button type="submit" value="{{ $paginator ? $paginator->currentPage() + 1 : 1 }}" @disabled(!($paginator && $paginator->hasMorePages()))
        class="btn btn-outline btn-accent btn-sm">
        Next &raquo;
    </button>
</span>
