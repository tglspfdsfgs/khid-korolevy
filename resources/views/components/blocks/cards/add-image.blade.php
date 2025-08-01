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
