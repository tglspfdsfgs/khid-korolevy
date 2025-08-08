@props(["link"])

@auth
    <div class="absolute right-1 top-1 rounded-lg bg-white hover:ring-1 hover:ring-white">
        <a href='{{ $link }}' class="btn btn-outline btn-accent">
            <x-assets.icons.state-btns.edit-svg />
        </a>
    </div>
@endauth
