@props(["data"])

<div x-data="{
    mainFolder: null,
    innerFolder: null,

    openCBToast: false,
    toggleCBToast() { this.openCBToast = !this.openCBToast }
}" class="flex flex-col items-start">
    <div class="cursor-pointer select-none">
        @foreach ($data as $mainFolder => $inner)
            <div x-data="{ open: false }">

                <x-assets.icons.admin-icons.upload-img.main-folder x-if="!open" @click.self="open = !open" />
                <span @click.self="open = !open">{{ $mainFolder }}</span>
                <span x-cloak x-show="open">
                    @if (empty($inner) || array_is_list($inner))
                        <div
                            @click="
                                    upload_img.showModal();
                                    $refs.whereTo.textContent = `{{ $mainFolder }}`;
                                    mainFolder = `{{ $mainFolder }}`;">
                            <span class="ml-4 mr-1 inline-block select-none text-xl">+</span>
                            <x-assets.icons.admin-icons.upload-img.img-outline />
                            <span class="italic">Додати картинку</span>
                        </div>
                        @foreach ($inner as $image)
                            <span>
                                <div>
                                    <span class="ml-4 inline-block select-none text-xl"
                                        @click='
                                                show_img.showModal();
                                                $refs.showImage.src = `/storage/{{ $image["id"] }}/{{ $image["file_name"] }}`;
                                                $refs.showImage.setAttribute(`data-clipboard` ,`/storage/{{ $image["id"] }}/{{ $image["file_name"] }}`);'>
                                        ↳
                                    </span>
                                    <x-assets.icons.admin-icons.upload-img.img-solid
                                        @click='
                                                show_img.showModal();
                                                $refs.showImage.src = `/storage/{{ $image["id"] }}/{{ $image["file_name"] }}`;
                                                $refs.showImage.setAttribute(`data-clipboard` ,`/storage/{{ $image["id"] }}/{{ $image["file_name"] }}`);' />
                                    <span>
                                        <span
                                            @click='
                                                    show_img.showModal();
                                                    $refs.showImage.src = `/storage/{{ $image["id"] }}/{{ $image["file_name"] }}`;
                                                    $refs.showImage.setAttribute(`data-clipboard` ,`/storage/{{ $image["id"] }}/{{ $image["file_name"] }}`);'>
                                            {{ $image["file_name"] }}
                                        </span>
                                        <x-assets.icons.admin-icons.upload-img.show-img
                                            @click='
                                                    show_img.showModal();
                                                    $refs.showImage.src = `/storage/{{ $image["id"] }}/{{ $image["file_name"] }}`;
                                                    $refs.showImage.setAttribute(`data-clipboard` ,`/storage/{{ $image["id"] }}/{{ $image["file_name"] }}`);' />
                                        <x-assets.icons.admin-icons.upload-img.delete-img
                                            @click='
                                                    delete_img.showModal();
                                                    $refs.idToDelete.value = {{ $image["id"] }};' />
                                    </span>
                                </div>
                            </span>
                        @endforeach
                    @else
                        @foreach ($inner as $innerFolder => $content)
                            <div x-data="{ openInner: false }">
                                <span class="ml-2 inline-block select-none text-lg">|</span>
                                <x-assets.icons.admin-icons.upload-img.inner-folder x-if="!openInner"
                                    @click.self="openInner = !openInner" />
                                <span x-cloak @click.self="openInner = !openInner">{{ $innerFolder }}</span>
                                <div x-show="openInner" x-cloak class="flex flex-col">
                                    <div
                                        @click="
                                                upload_img.showModal();
                                                $refs.whereTo.textContent = `{{ $mainFolder }} / {{ $innerFolder }}`;
                                                mainFolder = `{{ $mainFolder }}`;
                                                innerFolder = `{{ $innerFolder }}`;">
                                        <span class="ml-4 mr-1 inline-block select-none text-xl">+</span>
                                        <x-assets.icons.admin-icons.upload-img.img-outline />
                                        <span class="italic">Додати картинку</span>
                                    </div>
                                    @foreach ($content as $image)
                                        <span>
                                            <div>
                                                <span class="ml-4 inline-block select-none text-xl"
                                                    @click='
                                                            show_img.showModal();
                                                            $refs.showImage.src = `/storage/{{ $image["id"] }}/{{ $image["file_name"] }}`;
                                                            $refs.showImage.setAttribute(`data-clipboard` ,`/storage/{{ $image["id"] }}/{{ $image["file_name"] }}`);'>
                                                    ↳
                                                </span>
                                                <x-assets.icons.admin-icons.upload-img.img-solid
                                                    @click='
                                                            show_img.showModal();
                                                            $refs.showImage.src = `/storage/{{ $image["id"] }}/{{ $image["file_name"] }}`;
                                                            $refs.showImage.setAttribute(`data-clipboard` ,`/storage/{{ $image["id"] }}/{{ $image["file_name"] }}`);' />
                                                <span>
                                                    <span
                                                        @click='
                                                                show_img.showModal();
                                                                $refs.showImage.src = `/storage/{{ $image["id"] }}/{{ $image["file_name"] }}`;
                                                                $refs.showImage.setAttribute(`data-clipboard` ,`/storage/{{ $image["id"] }}/{{ $image["file_name"] }}`);'>
                                                        {{ $image["file_name"] }}
                                                    </span>
                                                    <x-assets.icons.admin-icons.upload-img.show-img
                                                        @click='
                                                                show_img.showModal();
                                                                $refs.showImage.src = `/storage/{{ $image["id"] }}/{{ $image["file_name"] }}`;
                                                                $refs.showImage.setAttribute(`data-clipboard` ,`/storage/{{ $image["id"] }}/{{ $image["file_name"] }}`);' />
                                                    <x-assets.icons.admin-icons.upload-img.delete-img
                                                        @click='
                                                                delete_img.showModal();
                                                                $refs.idToDelete.value = {{ $image["id"] }};' />
                                                </span>
                                            </div>
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    @endif
                </span>
            </div>
        @endforeach
    </div>

    {{-- MODALS: --}}
    {{-- MODALS: --}}
    {{-- MODALS: --}}

    {{-- UPLOAD IMG MODAL ↓↓↓ --}}
    <dialog id="upload_img" class="modal">
        <div class="modal-box w-95">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="text-lg font-bold">Завантаження картинки в:</h3>
            <h4 x-ref="whereTo" class="text-md italic">Куда завантажувати</h4>
            <form action="{{ route("upload-image.store") }}" method="POST" enctype="multipart/form-data"
                class="mx-auto max-w-lg">
                @csrf
                <input type="hidden" x-bind:value="mainFolder" name="mainFolder">

                <input type="hidden" x-bind:value="innerFolder" name="innerFolder">
                <input
                    class="my-4 block w-full cursor-pointer rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 focus:outline-none dark:border-gray-600 dark:bg-gray-700 dark:text-gray-400 dark:placeholder-gray-400"
                    aria-describedby="image" id="image" accept="image/*" type="file" name="image" required>
                <button
                    class="mb-2 me-2 cursor-pointer rounded-lg bg-gray-800 px-5 py-2.5 text-sm font-medium text-white hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700"
                    type="submit">
                    Завантажити

                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                        class="ml-2 inline-block size-5">
                        <path
                            d="M9.25 13.25a.75.75 0 0 0 1.5 0V4.636l2.955 3.129a.75.75 0 0 0 1.09-1.03l-4.25-4.5a.75.75 0 0 0-1.09 0l-4.25 4.5a.75.75 0 1 0 1.09 1.03L9.25 4.636v8.614Z" />
                        <path
                            d="M3.5 12.75a.75.75 0 0 0-1.5 0v2.5A2.75 2.75 0 0 0 4.75 18h10.5A2.75 2.75 0 0 0 18 15.25v-2.5a.75.75 0 0 0-1.5 0v2.5c0 .69-.56 1.25-1.25 1.25H4.75c-.69 0-1.25-.56-1.25-1.25v-2.5Z" />
                    </svg>

                </button>
            </form>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>
    {{-- UPLOAD IMG MODAL ↑↑↑ --}}

    {{-- SHOW IMG MODAL ↓↓↓ --}}
    <dialog id="show_img" class="modal">
        <div class="modal-box w-auto">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <div>
                <img class="mx-auto h-auto max-w-full cursor-pointer rounded-lg" x-ref="showImage" data-clipboard=""
                    src=""
                    @click="
                            $clipboard($refs.showImage.getAttribute('data-clipboard'));
                            toggleCBToast();" />
            </div>
            <div x-show="openCBToast"
                x-effect="if(openCBToast) {
                                const timer = setTimeout(() => openCBToast = false, 2000);
                                return () => clearTimeout(timer);
                           }"
                class="toast toast-top toast-center">
                <div class="alert alert-success">
                    <span>✓ URL зображення скопійовано</span>
                </div>
            </div>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>
    {{-- SHOW IMG MODAL ↑↑↑ --}}

    {{-- DELETE IMG MODAL ↓↓↓ --}}
    <dialog id="delete_img" class="modal">
        <div class="modal-box w-70">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="text-lg font-bold">Видалити картинку?</h3>
            <form action="{{ route("upload-image.destroy") }}" method="POST">
                @csrf
                @method("DELETE")
                <input x-ref="idToDelete" type="hidden" value="" name="id">
                <button
                    class="mx-auto mb-2 mt-4 block cursor-pointer rounded-lg bg-gray-800 px-5 py-2.5 text-sm font-medium text-white hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700"
                    type="submit">
                    Видалити

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="ml-2 inline-block size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>

                </button>
            </form>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>
    {{-- DELETE IMG MODAL ↑↑↑ --}}

</div>
