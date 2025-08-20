@props(["mainFolder", "innerFolder" => false])
<div class="cursor-pointer"
    @click='
             upload_img.showModal();
             $refs.whereTo.textContent = `{{ $mainFolder }}{{ $innerFolder ? " / " . $innerFolder : "" }}`;
             mainFolder = `{{ $mainFolder }}`;
             {{ $innerFolder ? "innerFolder = " . "`$innerFolder`" . ";" : "" }}'>
    <span class="ml-4 mr-1 inline-block select-none text-xl">+</span>
    <x-assets.icons.admin-icons.upload-img.img-outline />
    <span class="italic">Додати картинку</span>
</div>
