@props(["data"])

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
                    @if (empty($inner) || array_is_list($inner))
                        <x-admin-pages.upload-image.blocks.add-image :$mainFolder />
                        @foreach ($inner as $image)
                            <x-admin-pages.upload-image.blocks.image :$image />
                        @endforeach

                        <x-admin-pages.upload-image.blocks.pagnation />
                    @else
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

                                    <x-admin-pages.upload-image.blocks.pagnation />
                                </div>
                            </div>
                        @endforeach
                    @endif
                </span>
            </div>
        @endforeach
    </div>

    <x-admin-pages.upload-image.blocks.upload-img-modal />

    <x-admin-pages.upload-image.blocks.show-img-modal />

    <x-admin-pages.upload-image.blocks.delete-img-modal />

</div>
