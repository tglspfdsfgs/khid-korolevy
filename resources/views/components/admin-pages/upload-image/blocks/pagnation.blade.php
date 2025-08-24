@props([
    "paginator" => null,
])

<div class="ml-4">
    <div class="w-35 border-t-1 mb-2 mt-3"></div>
    <button type="submit" value="{{ $paginator ? $paginator->currentPage() - 1 : 1 }}" @disabled(!($paginator && $paginator->currentPage() > 1))
        class="btn btn-outline btn-accent btn-sm mr-2">
        &laquo; Prev
    </button>
    <button type="submit" value="{{ $paginator ? $paginator->currentPage() + 1 : 1 }}" @disabled(!($paginator && $paginator->hasMorePages()))
        class="btn btn-outline btn-accent btn-sm">
        Next &raquo;
    </button>
</div>
