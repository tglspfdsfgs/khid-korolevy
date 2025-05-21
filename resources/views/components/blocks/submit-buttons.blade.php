@props(["state", "editorLink" => ""])

@php
    $state->isDeleted();
@endphp
<div class="my-5 flex justify-start gap-1 lg:mr-10">
    <button value="publish" class='{{ "btn btn-success " . ($state->isPublished() ? "btn-disabled" : "") }}'>
        <x-assets.icons.state-btns.publish-svg />
        Опублікувати
    </button>

    <button value="draft" class='{{ "btn btn-accent " . ($state->isDraft() ? "btn-disabled" : "") }}'>
        <x-assets.icons.state-btns.draft-svg />
        Перенести до чорновиків
    </button>

    <button value="delete" class="btn btn-error">
        <x-assets.icons.state-btns.delete-svg />
        Видалити {{ $state->isDeleted() ? "назавжди" : "" }}
    </button>

    <a href="{{ $editorLink }}"
        class='{{ "ml-auto btn btn-outline btn-accent " . (Str::of($editorLink)->isEmpty() ? "btn-disabled" : "") }}'>
        <x-assets.icons.state-btns.edit-svg />
    </a>
</div>
