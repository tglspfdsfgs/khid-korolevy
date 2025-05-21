@php
    use App\State;
    $activeState = fn(string $currState) => request("state", State::published->value) === $currState
        ? ""
        : "btn-outline";
    $urlBuilder = fn(string $state) => url()->current() .
        "?" .
        http_build_query(array_merge(request()->query(), ["state" => $state]));
@endphp

<div class="mb-2 flex justify-center">
    <div class="join">
        <a href="{{ $urlBuilder(State::published->value) }}"
            class="btn btn-success join-item {{ $activeState(State::published->value) }}">
            <x-assets.icons.state-btns.publish-svg />
            Опубліковані
        </a>
        <a href="{{ $urlBuilder(State::draft->value) }}"
            class="btn btn-accent join-item {{ $activeState(State::draft->value) }}">
            <x-assets.icons.state-btns.draft-svg />
            Чорновики
        </a>
        <a href="{{ $urlBuilder(State::deleted->value) }}"
            class="btn btn-error join-item {{ $activeState(State::deleted->value) }}">
            <x-assets.icons.state-btns.delete-svg />
            Видалені
        </a>
    </div>
</div>
