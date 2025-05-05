@php
    $activeState = fn(string $state) => request("state", "published") === $state ? "" : "btn-outline";
    $urlBuilder = fn(string $state) => url()->current() .
        "?" .
        http_build_query(array_merge(request()->query(), ["state" => $state]));
@endphp

<div class="mb-2 flex justify-center">
    <div class="join">
        <a href="{{ $urlBuilder("published") }}" class="btn btn-success join-item {{ $activeState("published") }}">
            <x-assets.icons.state-btns.publish-svg />
            Опубліковані
        </a>
        <a href="{{ $urlBuilder("draft") }}" class="btn btn-accent join-item {{ $activeState("draft") }}">
            <x-assets.icons.state-btns.draft-svg />
            Чорновики
        </a>
        <a href="{{ $urlBuilder("deleted") }}" class="btn btn-error join-item {{ $activeState("deleted") }}">
            <x-assets.icons.state-btns.delete-svg />
            Видалені
        </a>
    </div>
</div>
