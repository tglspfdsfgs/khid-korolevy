@props(["paginator"])

<div class="join my-5 flex justify-center">
    <a href="{{ $paginator->previousPageUrl() }}" @disabled(!$paginator->previousPageUrl()) class="join-item btn">
        « Попередня
    </a>
    <a href="{{ $paginator->nextPageUrl() }}" @disabled(!$paginator->hasMorePages()) class="join-item btn">
        Наступна »
    </a>
</div>
