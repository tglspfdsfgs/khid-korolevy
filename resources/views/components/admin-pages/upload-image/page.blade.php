@props(["mainFolder", "inner"])

@php
    use App\Helpers;
    $paginator = null;
@endphp

<span>
    @if (array_key_exists("__data", $inner))
        <x-admin-pages.upload-image.blocks.add-image :$mainFolder />
        @dump($inner)
        @php
            $paginator = Helpers::extractPaginator($inner);
        @endphp
        @foreach ($inner["__data"] as $image)
            <x-admin-pages.upload-image.blocks.image :$image />
        @endforeach
        <x-admin-pages.upload-image.blocks.pagnation :$paginator />
        @php
            $paginator = null;
        @endphp
    @else
        @dump($inner)
        @php
            $paginator = Helpers::extractPaginator($inner);
        @endphp
        @foreach ($inner as $innerFolder => $content)
            <div x-data="{ openInner: false }">
                <span class="ml-2 inline-block select-none text-lg">|</span>
                <x-assets.icons.admin-icons.upload-img.inner-folder x-if="!openInner"
                    @click.self="openInner = !openInner" />
                <span x-cloak @click.self="openInner = !openInner">{{ $innerFolder }}</span>
                <div x-show="openInner" x-cloak class="flex flex-col">
                    <x-admin-pages.upload-image.blocks.add-image :$mainFolder :$innerFolder />
                    @foreach ($content as $image)
                        <x-admin-pages.upload-image.blocks.image :$image />
                    @endforeach
                </div>
            </div>
        @endforeach
        <x-admin-pages.upload-image.blocks.pagnation :$paginator />
        @php
            $paginator = null;
        @endphp
    @endif
</span>
