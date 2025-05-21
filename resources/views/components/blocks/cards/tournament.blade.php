@php
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
        <div>
            <strong x-data x-show="isNotAnnouncementDay('{{ $date }}')"
                class="badge badge-sm badge-secondary">АНОНС!</strong>
            <time class="badge badge-sm badge-primary font-bold"
                datetime="{{ $date }}">{{ \Carbon\Carbon::parse($date)->translatedFormat("d.m.Y") }}</time>
        </div>
        <p>{{ $description }}</p>
        <div class="card-actions justify-end">
            @if ($hasResults)
                <a href="{{ "/tournament/" . $tournamentID . "/results" }}"
                    class="btn btn-sm btn-outline btn-secondary">
                    Результати
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.5 18.75h-9m9 0a3 3 0 0 1 3 3h-15a3 3 0 0 1 3-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 0 1-.982-3.172M9.497 14.25a7.454 7.454 0 0 0 .981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 0 0 7.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 0 0 2.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 0 1 2.916.52 6.003 6.003 0 0 1-5.395 4.972m0 0a6.726 6.726 0 0 1-2.749 1.35m0 0a6.772 6.772 0 0 1-3.044 0" />
                    </svg>
                </a>
            @endif
            @if ($hasGallery)
                <a href='{{ "/tournament/" . $tournamentID . "/gallery" }}' class="btn btn-sm btn-outline btn-success">
                    Галерея
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd"
                            d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            @endif
            @if ($linkToForm)
                <a href="{{ $linkToForm }}" class="btn btn-sm btn-primary">
                    Записатися
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                    </svg>
                </a>
            @endif
            @if ($hasMoreInfo)
                <a href="{{ "/tournament/" . $tournamentID }}" class="btn btn-sm btn-info">
                    Детальніше
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                </a>
            @endif
        </div>
    </div>

    <div class="absolute right-1 top-1 rounded-lg bg-white hover:ring-1 hover:ring-white">
        <a href='{{ "/tournament/" . $tournamentID . "/edit" }}' class="btn btn-outline btn-accent">
            <x-assets.icons.state-btns.edit-svg />
        </a>
    </div>
</div>
