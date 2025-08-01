@props(["state", "editorLink" => "", "isNestedResource" => false])
<div>
    @if (!$isNestedResource)
        <span class="ml-4"><b>Статус: </b><i> {{ $state->toUkrainian() }}</i></span>
    @endif
    <div
        class='{{ (!$isNestedResource ? " max-md:flex-col " : " ") . " mx-4 my-5 flex justify-start flex-wrap gap-1.5 lg:mr-10 " }}'>
        @if (!$isNestedResource)
            <button value="{{ $state->action($state::published) }}"
                class='{{ "btn btn-success " . ($state->isPublished() ? "btn-disabled" : "") }}'>
                <x-assets.icons.state-btns.publish-svg />
                Опублікувати
            </button>

            <button value="{{ $state->action($state::draft) }}"
                class='{{ "btn btn-accent " . ($state->isDraft() ? "btn-disabled" : "") }}'>
                <x-assets.icons.state-btns.draft-svg />
                Перенести до чорновиків
            </button>

            <button value="{{ $state->action($state::deleted) }}" class="btn btn-error">
                <x-assets.icons.state-btns.delete-svg />
                Видалити {{ $state->isDeleted() ? "назавжди" : "" }}
            </button>
        @endif
        @if ($isNestedResource)
            <button value="save"
                class='{{ " btn btn-warning " . (Str::of($editorLink)->isNotEmpty() ? "btn-disabled" : " ") }}'>
                <x-assets.icons.state-btns.publish-svg />
                Зберегти
            </button>
        @endif
        <a href="{{ $editorLink }}"
            class='{{ "ml-auto btn btn-outline btn-accent " . (Str::of($editorLink)->isEmpty() ? "btn-disabled" : " ") }}'>
            @if ($isNestedResource)
                РЕДАГУВАТИ
            @endif
            <x-assets.icons.state-btns.edit-svg />
        </a>
    </div>
</div>
