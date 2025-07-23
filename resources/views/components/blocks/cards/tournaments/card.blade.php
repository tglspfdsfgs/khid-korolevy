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

        <b class="badge badge-sm">
            <span>Тип турніру: </span>
            [ {{ $tournamentType->option_title() }} ]
        </b>

        <p>{{ $description }}</p>
        <div class="card-actions justify-end">
            @if ($hasResults)
                <a href="{{ "/tournament/" . $id . "/results" }}" class="btn btn-sm btn-outline btn-secondary">
                    Результати
                    <x-assets.icons.button-icons.results />
                </a>
            @endif
            @if ($linkToGallery)
                <a href="{{ $linkToGallery }}" class="btn btn-sm btn-outline btn-success">
                    Галерея
                    <x-assets.icons.button-icons.gallery />
                </a>
            @endif
            @if ($linkToForm)
                <a href="{{ $linkToForm }}" target="_blank" class="btn btn-sm btn-primary">
                    Записатися
                    <x-assets.icons.button-icons.sign-up />
                </a>
            @endif
            @if ($hasMoreInfo)
                <a href="{{ "/tournament/" . $id }}" class="btn btn-sm btn-info">
                    Детальніше
                    <x-assets.icons.button-icons.navigate />
                </a>
            @endif
        </div>
    </div>

    <div class="absolute right-1 top-1 rounded-lg bg-white hover:ring-1 hover:ring-white">
        <a href='{{ "/tournament/" . $id . "/edit" }}' class="btn btn-outline btn-accent">
            <x-assets.icons.state-btns.edit-svg />
        </a>
    </div>
</div>
