@php
    use App\TournamentType as Type;
    extract($props);
@endphp

<div class="card lg:card-side bg-base-100 relative mb-5 p-5 shadow-sm md:grid md:grid-cols-[1fr_3fr]">
    <span class="block h-auto">
        <img class="h-full w-full rounded-xl object-cover object-center"
            src="{{ empty($imageSrc) ? Vite::asset("resources/images/fallback.png") : $imageSrc }}"
            alt="{{ $title }}" />
    </span>
    <div class="card-body lg:pt-0">
        <h2 class="card-title">
            {{ $title }}
        </h2>
        <i class="badge badge-sm">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
            </svg>

            @if (Type::isTournament($galleryType))
                Дата турніру:
            @else
                Дата публікації:
            @endif

            <time class="font-bold"
                datetime="{{ $date }}">{{ \Carbon\Carbon::parse($date)->translatedFormat("d.m.Y") }}</time>
        </i>

        <b class="badge badge-sm">
            [ {{ Type::gallery_title($galleryType) }} ]
        </b>

        <p>{{ $description }}</p>
        <div class="card-actions justify-end">
            <a href='{{ "/gallery/" . $id }}' class="btn btn-sm btn-success">
                Дивитися галерею
                <x-assets.icons.button-icons.navigate />
            </a>
        </div>
    </div>

    <div class="absolute right-1 top-1 rounded-lg bg-white hover:ring-1 hover:ring-white">
        <a href='{{ "/gallery/" . $id . "/edit" }}' class="btn btn-outline btn-accent">
            <x-assets.icons.state-btns.edit-svg />
        </a>
    </div>

</div>
