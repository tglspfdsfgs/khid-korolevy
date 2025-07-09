<div x-data="{
    ...{{ json_encode($props) }},
    editing: {
        title: false,
        description: false,
        date: false,
    }
}"
    x-effect="() => {
        const dispatchedData = toRaw($data);
        delete dispatchedData.editing;
        $dispatch('update-data', toRaw(dispatchedData))
    }"
    class="card lg:card-side bg-base-100 static mb-5 p-5 shadow-sm md:grid md:grid-cols-[1fr_3fr]">
    <button class="relative block h-auto cursor-pointer"
        x-on:click="imageSrc = prompt('Додати картинку за url:', '') ?? imageSrc">
        <img x-cloak x-show="Boolean(imageSrc)"
            class="h-full w-full rounded-xl object-cover object-center transition hover:scale-105"
            x-bind:src="imageSrc" />
        <div x-show="Boolean(imageSrc)" class="absolute right-2 top-2">
            <x-assets.icons.editor-buttons.change-img-svg />
        </div>

        <div x-show="!Boolean(imageSrc)" class="flex h-full w-full items-center justify-center rounded-xl">
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
        <h2 class="card-title relative cursor-pointer" x-show="!editing.title" @click="editing.title = true"
            @touchstart="editing.title = true">
            <span x-text="title"></span>
            <x-assets.icons.editor-buttons.pencil-svg class="absolute right-0 inline cursor-pointer" />
        </h2>
        <div x-show="editing.title" class="join">
            <input x-model="title" @blur="editing.title = false" @keydown.enter="editing.title = false"
                class="input join-item w-full"></textarea>
            <button class="btn btn-accent join-item" @click="editing.title = false">зберегти</button>
        </div>

        <i x-show="!editing.date" class="badge badge-sm cursor-pointer" @click="editing.date = true"
            @touchstart="editing.date = true">
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

        <b class="badge badge-sm tooltip" data-tip="Відобразиться після публікації">
            [ 📦 Тип галереї ]
        </b>

        <div x-show="editing.date" class="join w-65">
            <input type="date" class="input input-sm join-item" @blur="editing.date = false"
                @keydown.enter="editing.date = false" x-model="date" />
            <button class="btn btn-accent btn-sm join-item" @click="editing.date = false">зберегти</button>
        </div>

        <p x-show="!editing.description" @click="editing.description = true" @touchstart="editing.description = true">
            <span class="cursor-pointer" x-text="description"></span>
            <x-assets.icons.editor-buttons.pencil-svg class="inline cursor-pointer" />
        </p>
        <div x-show="editing.description" class="bg-base-300 rounded-box">
            <textarea x-model="description" @blur="editing.description = false" @keydown.enter="editing.description = false"
                class="textarea join-item w-full resize-y"></textarea>
            <button class="btn btn-accent m-2 rounded-b-lg" @click="editing.description = false">зберегти</button>
        </div>

        <div class="card-actions justify-end">
            <a href="{{ "/gallery/" . $props["id"] }}" class="btn btn-sm btn-success">
                Дивитися галерею
                <x-assets.icons.button-icons.navigate />
            </a>
        </div>
    </div>
</div>
