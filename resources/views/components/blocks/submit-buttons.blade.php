@props([
    "published" => false,
    "draft" => false,
    "deleted" => false,
    "edit" => false,
    "editorLink" => "",
])

<div class="my-5 flex justify-start gap-1 lg:mr-10">
    <button value="publish" class="btn btn-success">
        <x-assets.icons.state-btns.publish-svg />
        Опублікувати
    </button>

    <button value="draft" class="btn btn-accent">
        <x-assets.icons.state-btns.draft-svg />
        В чорновики
    </button>

    <button value='{{ "delete" . ($deleted ? "-permanently" : "") }}' class="btn btn-error">
        <x-assets.icons.state-btns.delete-svg />
        Видалити {{ $deleted ? "назавжди" : "" }}
    </button>

    <a href="{{ $editorLink }}"
        class='{{ "ml-auto btn btn-outline btn-accent " . (Str::of($editorLink)->isEmpty() ? "btn-disabled" : "") }}'>
        <x-assets.icons.state-btns.edit-svg />
    </a>
</div>
