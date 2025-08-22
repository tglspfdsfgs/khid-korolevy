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
                    <x-admin-pages.upload-image.page :$mainFolder :$inner />
                </span>
            </div>
        @endforeach
    </div>

    <x-admin-pages.upload-image.blocks.upload-img-modal />

    <x-admin-pages.upload-image.blocks.show-img-modal />

    <x-admin-pages.upload-image.blocks.delete-img-modal />

</div>
