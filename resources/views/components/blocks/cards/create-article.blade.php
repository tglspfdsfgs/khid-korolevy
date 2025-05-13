@props([
    "imageSrc" => "",
    "title" => "Заголовок прев`ю-картки для статті",
    "description" => "Текст прев`ю-картки для статті",
    "date" => \Carbon\Carbon::now(),
])

<div x-data="{
    imgURL: '{{ $imageSrc }}',
    titleEditing: false,
    title: '{{ html_entity_decode($title) }}',
    descriptionEditing: false,
    description: '{{ html_entity_decode($description) }}',
    dateEditing: false,
    date: '{{ $date }}'
}"
    class="card lg:card-side bg-base-100 static mb-5 p-5 shadow-sm md:grid md:grid-cols-[1fr_3fr]">
    <button class="relative block h-auto cursor-pointer"
        x-on:click="imgURL = prompt('Додати картинку за url:', '') ?? imgURL">
        <img x-cloak x-show="Boolean(imgURL)"
            class="h-full w-full rounded-xl object-cover object-center transition hover:scale-105"
            x-bind:src="imgURL" />
        <div x-show="Boolean(imgURL)" class="absolute right-2 top-2">
            <x-assets.icons.editor-buttons.change-img-svg />
        </div>

        <div x-show="!Boolean(imgURL)" class="flex h-full w-full items-center justify-center rounded-xl">
            <span
                class="flex h-full w-full cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-gray-300 bg-gray-50 hover:bg-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:border-gray-500 dark:hover:bg-gray-600 dark:hover:bg-gray-800">
                <div class="flex flex-col items-center justify-center pb-6 pt-5">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-8 text-gray-500 dark:text-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                    </svg>
                    <p class="m-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Натисни</span>
                        щоб додати фото</p>
                </div>
            </span>
        </div>
    </button>

    <div class="card-body lg:pt-0">
        <h2 class="card-title relative cursor-pointer" x-show="!titleEditing" @click="titleEditing = true"
            @touchstart="titleEditing = true">
            <span x-text="title"></span>
            <x-assets.icons.editor-buttons.pencil-svg class="absolute right-0 inline cursor-pointer" />
        </h2>
        <div x-show="titleEditing" class="join">
            <input x-model="title" @blur="titleEditing = false" @keydown.enter="titleEditing = false"
                class="input join-item w-full"></textarea>
            <button class="btn btn-accent join-item" @click="titleEditing = false">зберегти</button>
        </div>

        <i x-show="!dateEditing" class="badge badge-sm cursor-pointer" @click="dateEditing = true"
            @touchstart="dateEditing = true">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="inline size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                </svg>
                Опубліковано:
                <time class="font-bold"
                    x-text="(new Date(date).toLocaleDateString('uk-UA', { day: 'numeric', month: 'numeric', year: 'numeric' }))"></time>
                <x-assets.icons.editor-buttons.pencil-svg class="inline cursor-pointer" />
            </span>
        </i>

        <div x-show="dateEditing" class="join w-65">
            <input type="date" class="input input-sm join-item" @blur="dateEditing = false"
                @keydown.enter="dateEditing = false" x-model="date" />
            <button class="btn btn-accent btn-sm join-item" @click="dateEditing = false">зберегти</button>
        </div>

        <p x-show="!descriptionEditing" @click="descriptionEditing = true" @touchstart="descriptionEditing = true">
            <span class="cursor-pointer" x-text="description"></span>
            <x-assets.icons.editor-buttons.pencil-svg class="inline cursor-pointer" />
        </p>
        <div x-show="descriptionEditing" class="bg-base-300 rounded-box">
            <textarea x-model="description" @blur="descriptionEditing = false" @keydown.enter="descriptionEditing = false"
                class="textarea join-item w-full resize-y"></textarea>
            <button class="btn btn-accent m-2 rounded-b-lg" @click="descriptionEditing = false">зберегти</button>
        </div>

        <div class="card-actions justify-end">
            <a href="#" class="btn btn-sm btn-info">
                Читати
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </a>
        </div>
    </div>
</div>
