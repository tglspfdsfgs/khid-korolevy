@props(["image"])

<span>
    <div class="cursor-pointer">
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
