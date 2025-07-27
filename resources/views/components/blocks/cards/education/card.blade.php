@php
    use App\EducationType as Type;
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

        <b class="badge badge-sm">
            [ {{ Type::stringify($educationType) }} ]
        </b>

        <p>{{ $description }}</p>

        <div class="card-actions justify-end">
            @if ($linkToForm)
                <a href="{{ $linkToForm }}" target="_blank" class="btn btn-sm btn-primary">
                    Записатися
                    <x-assets.icons.button-icons.sign-up />
                </a>
            @endif
            <div class="card-actions justify-end">
                <a href='{{ "/education/" . $id }}' class="btn btn-sm btn-success">
                    Графік занять
                    <x-assets.icons.button-icons.schedule />
                </a>
            </div>
        </div>
    </div>

    <div class="absolute right-1 top-1 rounded-lg bg-white hover:ring-1 hover:ring-white">
        <a href='{{ "/education/" . $id . "/edit" }}' class="btn btn-outline btn-accent">
            <x-assets.icons.state-btns.edit-svg />
        </a>
    </div>

</div>
