@props([
    "imageSrc" => "",
    "title" => "Заголовок прев`ю-картки для турніра",
    "description" => "Текст прев`ю-картки для турніра",
    "date" => \Carbon\Carbon::now()->addWeeks(2),
])

<div x-data="{
    imgURL: '{{ $imageSrc }}',
    titleEditing: false,
    title: '{{ html_entity_decode($title) }}',
    descriptionEditing: false,
    description: '{{ html_entity_decode($description) }}',
    dateEditing: false,
    date: '{{ $date }}',
    isNotAnnouncementDay: function() {
        const eventDate = new Date(this.date);
        const today = new Date();

        const diffTime = eventDate - today;
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

        return diffDays >= 1;
    }
}"
    class="card lg:card-side bg-base-100 static mb-5 p-5 shadow-sm md:grid md:grid-cols-[1fr_3fr]">
    <button class="relative block h-auto cursor-pointer"
        x-on:click="imgURL = prompt('Додати картинку за url:', '') ?? imgURL">
        <img x-show="Boolean(imgURL)"
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

        <div x-show="!dateEditing" @click="dateEditing = true" @touchstart="dateEditing = true" class="cursor-pointer">
            <strong x-show="isNotAnnouncementDay()" class="badge badge-sm badge-secondary">АНОНС!</strong>
            <time class="badge badge-sm badge-primary font-bold">
                Дата: <span
                    x-text="(new Date(date).toLocaleDateString('uk-UA', { day: 'numeric', month: 'short', year: 'numeric' }))"></span>
            </time>
            <x-assets.icons.editor-buttons.pencil-svg class="inline cursor-pointer" />
        </div>
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
            <div class="relative">
                <a disabled href="#" class="btn btn-sm btn-outline btn-secondary">
                    Результати
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.5 18.75h-9m9 0a3 3 0 0 1 3 3h-15a3 3 0 0 1 3-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 0 1-.982-3.172M9.497 14.25a7.454 7.454 0 0 0 .981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 0 0 7.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 0 0 2.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 0 1 2.916.52 6.003 6.003 0 0 1-5.395 4.972m0 0a6.726 6.726 0 0 1-2.749 1.35m0 0a6.772 6.772 0 0 1-3.044 0" />
                    </svg>
                </a>
                <button type="button" class="absolute right-[-7px] top-[-7px] cursor-pointer rounded-full bg-white">
                    <x-assets.icons.editor-buttons.add-svg />
                    {{--
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                      <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16ZM6.75 9.25a.75.75 0 0 0 0 1.5h6.5a.75.75 0 0 0 0-1.5h-6.5Z" clip-rule="evenodd" />
                    </svg>
                    --}}
                </button>
            </div>

            <div class="relative" x-show="isNotAnnouncementDay()">
                <a disabled href="#" class="btn btn-sm btn-primary">
                    Записатися
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                    </svg>
                </a>
                <button type="button" class="absolute right-[-7px] top-[-7px] cursor-pointer rounded-full bg-white">
                    <x-assets.icons.editor-buttons.add-svg />
                    {{--
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="size-5">
                      <path fill-rule="evenodd" d="M10 18a8 8 0 1 0 0-16 8 8 0 0 0 0 16ZM6.75 9.25a.75.75 0 0 0 0 1.5h6.5a.75.75 0 0 0 0-1.5h-6.5Z" clip-rule="evenodd" />
                    </svg>
                    --}}
                </button>
            </div>

            <a href="#" class="btn btn-sm btn-info">
                Детальніше
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </a>
        </div>
    </div>
</div>
