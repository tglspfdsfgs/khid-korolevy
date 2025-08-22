@props(["data"])
@php
    use Illuminate\Pagination\LengthAwarePaginator;

    $paginator = null;

    function extractPaginator(array &$data): ?LengthAwarePaginator
    {
        if (array_key_exists("__paginator", $data)) {
            $paginator = $data["__paginator"];
            unset($data["__paginator"]);
            $data = array_filter($data, fn($v) => is_array($v) || !empty($v));
            return $paginator;
        }
        return null;
    }
@endphp

<div x-data="{
    mainFolder: null,
    innerFolder: null,

    openCBToast: false,
    toggleCBToast() { this.openCBToast = !this.openCBToast }
}" class="flex flex-col items-start">
    <div class="select-none">
        @foreach ($data as $mainFolder => $inner)
            <div x-data="{ open: false }">
                <x-assets.icons.admin-icons.upload-img.main-folder x-if="!open" @click.self="open = !open" />
                <span @click.self="open = !open">{{ $mainFolder }}</span>
                <span x-cloak x-show="open">
                    @if (array_key_exists("__data", $inner))
                        <x-admin-pages.upload-image.blocks.add-image :$mainFolder />
                        @php
                            $paginator = extractPaginator($inner);
                        @endphp
                        @foreach ($inner["__data"] as $image)
                            <x-admin-pages.upload-image.blocks.image :$image />
                        @endforeach
                        <x-admin-pages.upload-image.blocks.pagnation :$paginator />
                        @php
                            $paginator = null;
                        @endphp
                    @else
                        @php
                            $paginator = extractPaginator($inner);
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
            </div>
        @endforeach
    </div>

    <x-admin-pages.upload-image.blocks.upload-img-modal />

    <x-admin-pages.upload-image.blocks.show-img-modal />

    <x-admin-pages.upload-image.blocks.delete-img-modal />

</div>
