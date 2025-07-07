@props(["isResponsive", "unresponsiveSize"])

<div
    class='{{ ($isResponsive ? " w-full px-4 " : $unresponsiveSize) . " lg:card-side bg-base-100 static mb-8 mt-5  rounded-lg py-5 shadow-sm " }}'>

    <div class="border-b border-gray-200 px-3 py-2 dark:border-gray-600">
        <div class="flex flex-col items-start">
            <div class="flex flex-wrap items-center space-x-1 pl-4 rtl:space-x-reverse">

                <button id="toggleUndoButton" data-tooltip-target="tooltip-undo" type="button"
                    class="cursor-pointer rounded-sm p-1.5 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="h-9 w-9" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 9h13a5 5 0 0 1 0 10H7M3 9l4-4M3 9l4 4" />
                    </svg>
                    <span class="sr-only">Undo</span>
                </button>
                <div id="tooltip-undo" role="tooltip"
                    class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 transition-opacity duration-300 dark:bg-gray-700">
                    Відмінити
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>

                <button id="toggleRedoButton" data-tooltip-target="tooltip-redo" type="button"
                    class="cursor-pointer rounded-sm p-1.5 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="h-9 w-9" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 9H8a5 5 0 0 0 0 10h9m4-10-4-4m4 4-4 4" />
                    </svg>
                    <span class="sr-only">Redo</span>
                </button>
                <div id="tooltip-redo" role="tooltip"
                    class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 transition-opacity duration-300 dark:bg-gray-700">
                    Повернути
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>

                <div class="px-1">
                    <span class="block h-4 w-px bg-gray-300 dark:bg-gray-600"></span>
                </div>

                <button type="button" data-tooltip-target="tooltip-advanced-image"
                    data-modal-target="advanced-image-modal" data-modal-toggle="advanced-image-modal"
                    class="cursor-pointer rounded-sm p-1.5 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="h-9 w-9" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M18.5116 10.0771C18.5116 10.8157 17.8869 11.4146 17.1163 11.4146C16.3457 11.4146 15.7209 10.8157 15.7209 10.0771C15.7209 9.33841 16.3457 8.7396 17.1163 8.7396C17.8869 8.7396 18.5116 9.33841 18.5116 10.0771Z" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M18.0363 5.53245C16.9766 5.39588 15.6225 5.39589 13.9129 5.39591H10.0871C8.37751 5.39589 7.02343 5.39588 5.9637 5.53245C4.87308 5.673 3.99033 5.96913 3.29418 6.63641C2.59803 7.30369 2.28908 8.14982 2.14245 9.19521C1.99997 10.211 1.99999 11.5089 2 13.1475V13.2482C1.99999 14.8868 1.99997 16.1847 2.14245 17.2005C2.28908 18.2459 2.59803 19.092 3.29418 19.7593C3.99033 20.4266 4.87307 20.7227 5.9637 20.8633C7.02344 20.9998 8.37751 20.9998 10.0871 20.9998H13.9129C15.6225 20.9998 16.9766 20.9998 18.0363 20.8633C19.1269 20.7227 20.0097 20.4266 20.7058 19.7593C21.402 19.092 21.7109 18.2459 21.8575 17.2005C22 16.1847 22 14.8868 22 13.2482V13.1476C22 11.5089 22 10.211 21.8575 9.19521C21.7109 8.14982 21.402 7.30369 20.7058 6.63641C20.0097 5.96913 19.1269 5.673 18.0363 5.53245ZM6.14963 6.858C5.21373 6.97861 4.67452 7.20479 4.28084 7.58215C3.88716 7.9595 3.65119 8.47635 3.52536 9.37343C3.42443 10.093 3.40184 10.9923 3.3968 12.1686L3.86764 11.7737C4.99175 10.8309 6.68596 10.885 7.74215 11.8974L11.7326 15.7223C12.1321 16.1053 12.7611 16.1575 13.2234 15.8461L13.5008 15.6593C14.8313 14.763 16.6314 14.8668 17.8402 15.9096L20.2479 17.9866C20.3463 17.7226 20.4206 17.4075 20.4746 17.0223C20.6032 16.106 20.6047 14.8981 20.6047 13.1979C20.6047 11.4976 20.6032 10.2897 20.4746 9.37343C20.3488 8.47635 20.1128 7.9595 19.7192 7.58215C19.3255 7.20479 18.7863 6.97861 17.8504 6.858C16.8944 6.7348 15.6343 6.73338 13.8605 6.73338H10.1395C8.36575 6.73338 7.10559 6.7348 6.14963 6.858Z" />
                        <path
                            d="M17.0863 2.61039C16.2265 2.49997 15.1318 2.49998 13.7672 2.5H10.6775C9.31284 2.49998 8.21815 2.49997 7.35834 2.61039C6.46796 2.72473 5.72561 2.96835 5.13682 3.53075C4.79725 3.8551 4.56856 4.22833 4.41279 4.64928C4.91699 4.41928 5.48704 4.28374 6.12705 4.20084C7.21143 4.06037 8.597 4.06038 10.3463 4.06039H14.2612C16.0105 4.06038 17.396 4.06037 18.4804 4.20084C19.0394 4.27325 19.545 4.38581 20 4.56638C19.8454 4.17917 19.625 3.83365 19.3078 3.53075C18.719 2.96835 17.9767 2.72473 17.0863 2.61039Z" />
                    </svg>
                    <span class="sr-only">Insert advanced image</span>
                </button>
                <div id="tooltip-advanced-image" role="tooltip"
                    class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 transition-opacity duration-300 dark:bg-gray-700">
                    Додати картинку в галерею
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                {{-- IMAGE MODAL ↓↓↓ --}}
                <div id="advanced-image-modal" tabindex="-1" aria-hidden="true"
                    class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">
                    <div class="relative max-h-full w-full max-w-md p-4">
                        <!-- Modal content -->
                        <div class="relative rounded-lg bg-white shadow-sm dark:bg-gray-700">
                            <!-- Modal header -->
                            <div
                                class="flex items-center justify-between rounded-t border-b border-gray-200 p-4 md:p-5 dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Вставка картинки
                                </h3>
                                <button type="button"
                                    class="end-2.5 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="advanced-image-modal">
                                    <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-4 md:p-5">
                                <form id="advancedImageForm" class="space-y-4" action="#">
                                    <div>
                                        <label for="URL"
                                            class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">URL
                                            картинки</label>
                                        <input name="url" id="IMAGE-URL"
                                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400"
                                            value="https://placehold.co/600x400" required />
                                    </div>

                                    {{-- --}}

                                    <div id="accordion-collapse" data-accordion="collapse">
                                        <h2 id="accordion-collapse-heading-1">
                                            <button type="button"
                                                class="flex w-full items-center justify-between gap-3 rounded-t-xl border border-b-0 border-gray-200 p-2 font-medium text-gray-500 hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 rtl:text-right dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-800 dark:focus:ring-gray-800"
                                                data-accordion-target="#accordion-collapse-body-1"
                                                aria-expanded="false" aria-controls="accordion-collapse-body-1">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                        fill="currentColor" class="inline-block size-5">
                                                        <path
                                                            d="M10 3.75a2 2 0 1 0-4 0 2 2 0 0 0 4 0ZM17.25 4.5a.75.75 0 0 0 0-1.5h-5.5a.75.75 0 0 0 0 1.5h5.5ZM5 3.75a.75.75 0 0 1-.75.75h-1.5a.75.75 0 0 1 0-1.5h1.5a.75.75 0 0 1 .75.75ZM4.25 17a.75.75 0 0 0 0-1.5h-1.5a.75.75 0 0 0 0 1.5h1.5ZM17.25 17a.75.75 0 0 0 0-1.5h-5.5a.75.75 0 0 0 0 1.5h5.5ZM9 10a.75.75 0 0 1-.75.75h-5.5a.75.75 0 0 1 0-1.5h5.5A.75.75 0 0 1 9 10ZM17.25 10.75a.75.75 0 0 0 0-1.5h-1.5a.75.75 0 0 0 0 1.5h1.5ZM14 10a2 2 0 1 0-4 0 2 2 0 0 0 4 0ZM10 16.25a2 2 0 1 0-4 0 2 2 0 0 0 4 0Z" />
                                                    </svg>
                                                    Настільні пристрої
                                                </span>
                                                <svg data-accordion-icon class="h-3 w-3 shrink-0 rotate-180"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 10 6">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                                                </svg>
                                            </button>
                                        </h2>
                                        <div id="accordion-collapse-body-1" class="hidden"
                                            aria-labelledby="accordion-collapse-heading-1">
                                            <div class="border border-t-0 border-gray-200 p-3 dark:border-gray-700">
                                                <div class="mb-2 flex justify-between">
                                                    <label class="inline-flex cursor-pointer items-center">
                                                        <input type="checkbox" value="" class="peer sr-only"
                                                            disabled checked>
                                                        <div
                                                            class="peer relative me-2 h-5 w-9 rounded-full bg-gray-200 after:absolute after:start-[2px] after:top-[2px] after:h-4 after:w-4 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-blue-600 peer-checked:after:translate-x-full peer-checked:after:border-white peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rtl:peer-checked:after:-translate-x-full dark:border-gray-600 dark:bg-gray-700 dark:peer-checked:bg-blue-600 dark:peer-focus:ring-blue-800">
                                                        </div>
                                                        <span
                                                            class="ms-1 text-sm font-medium text-gray-900 dark:text-gray-300">
                                                            Відносні розміри
                                                            <button data-popover-target="rel-sizes-img"
                                                                data-popover-placement="right" type="button"><svg
                                                                    class="h-4 w-4 text-gray-400 hover:text-gray-500"
                                                                    aria-hidden="true" fill="currentColor"
                                                                    viewBox="0 0 20 20"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd"
                                                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                                                        clip-rule="evenodd"></path>
                                                                </svg><span class="sr-only">Show
                                                                    information</span></button>
                                                            <div data-popover id="rel-sizes-img" role="tooltip"
                                                                class="shadow-xs invisible absolute z-10 inline-block w-64 rounded-lg border border-gray-200 bg-white text-sm text-gray-500 opacity-0 transition-opacity duration-300 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400">
                                                                <div
                                                                    class="rounded-t-lg border-b border-gray-200 bg-gray-100 px-3 py-2 dark:border-gray-600 dark:bg-gray-700">
                                                                    <h3
                                                                        class="font-semibold text-gray-900 dark:text-white">
                                                                        Підказка</h3>
                                                                </div>
                                                                <div class="px-3 py-2">
                                                                    <p>Величина у відсотках (%) від розміру контейнера.
                                                                    </p>
                                                                </div>
                                                                <div data-popper-arrow></div>
                                                            </div>
                                                        </span>
                                                    </label>
                                                    <button id="imagePositioning"
                                                        data-dropdown-toggle="dropdownRadioHelper"
                                                        class="inline-flex items-center rounded-lg bg-blue-700 px-2.5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                                        type="button">Позиціонування<svg class="ms-3 h-2.5 w-2.5"
                                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 10 6">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="m1 1 4 4 4-4" />
                                                        </svg>
                                                    </button>
                                                    <!-- Dropdown menu -->
                                                    <div id="dropdownRadioHelper"
                                                        class="z-10 hidden w-60 divide-y divide-gray-100 rounded-lg bg-white shadow-sm dark:divide-gray-600 dark:bg-gray-700">
                                                        <ul class="space-y-1 p-3 text-sm text-gray-700 dark:text-gray-200"
                                                            aria-labelledby="imagePositioning">
                                                            <li>
                                                                <div
                                                                    class="flex rounded-sm p-2 hover:bg-gray-100 dark:hover:bg-gray-600">
                                                                    <div class="flex h-5 items-center">
                                                                        <input checked id="img-left"
                                                                            name="img-placement" type="radio"
                                                                            class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-700 dark:focus:ring-blue-600 dark:focus:ring-offset-gray-700">
                                                                    </div>
                                                                    <div class="ms-2 text-sm">
                                                                        <label for="img-left"
                                                                            class="font-medium text-gray-900 dark:text-gray-300">
                                                                            <div>Картинка зліва</div>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div
                                                                    class="flex rounded-sm p-2 hover:bg-gray-100 dark:hover:bg-gray-600">
                                                                    <div class="flex h-5 items-center">
                                                                        <input id="img-right" name="img-placement"
                                                                            type="radio"
                                                                            class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-700 dark:focus:ring-blue-600 dark:focus:ring-offset-gray-700">
                                                                    </div>
                                                                    <div class="ms-2 text-sm">
                                                                        <label for="img-right"
                                                                            class="font-medium text-gray-900 dark:text-gray-300">
                                                                            <div>Картинка справа</div>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div
                                                                    class="flex rounded-sm p-2 hover:bg-gray-100 dark:hover:bg-gray-600">
                                                                    <div class="flex h-5 items-center">
                                                                        <input id="img-center" name="img-placement"
                                                                            type="radio"
                                                                            class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-700 dark:focus:ring-blue-600 dark:focus:ring-offset-gray-700">
                                                                    </div>
                                                                    <div class="ms-2 text-sm">
                                                                        <label for="img-center"
                                                                            class="font-medium text-gray-900 dark:text-gray-300">
                                                                            <div>По центру</div>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div
                                                                    class="flex rounded-sm p-2 hover:bg-gray-100 dark:hover:bg-gray-600">
                                                                    <div class="flex h-5 items-center">
                                                                        <input id="img-left-float"
                                                                            name="img-placement" type="radio"
                                                                            class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-700 dark:focus:ring-blue-600 dark:focus:ring-offset-gray-700">
                                                                    </div>
                                                                    <div class="ms-2 text-sm">
                                                                        <label for="img-left-float"
                                                                            class="font-medium text-gray-900 dark:text-gray-300">
                                                                            <div>Картинка зліва</div>
                                                                            <p id="img-left-float-text"
                                                                                class="text-xs font-normal text-gray-500 dark:text-gray-300">
                                                                                + обтікання текстом.</p>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div
                                                                    class="flex rounded-sm p-2 hover:bg-gray-100 dark:hover:bg-gray-600">
                                                                    <div class="flex h-5 items-center">
                                                                        <input id="img-right-float"
                                                                            name="img-placement" type="radio"
                                                                            class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-500 dark:bg-gray-600 dark:ring-offset-gray-700 dark:focus:ring-blue-600 dark:focus:ring-offset-gray-700">
                                                                    </div>
                                                                    <div class="ms-2 text-sm">
                                                                        <label for="img-right-float"
                                                                            class="font-medium text-gray-900 dark:text-gray-300">
                                                                            <div>Картинка справа</div>
                                                                            <p id="img-right-float-text"
                                                                                class="text-xs font-normal text-gray-500 dark:text-gray-300">
                                                                                + обтікання текстом.</p>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                </div>
                                                <div class="relative mb-6">
                                                    <label for="rel-sizes-input" class="sr-only">Labels range</label>
                                                    <input id="rel-sizes-input" type="range" value="30"
                                                        step="5" min="5" max="100"
                                                        class="h-2 w-full cursor-pointer appearance-none rounded-lg bg-gray-200 dark:bg-gray-700">
                                                    <span
                                                        class="absolute -bottom-6 start-0 text-sm text-gray-500 dark:text-gray-400">5%</span>
                                                    <span
                                                        class="absolute -bottom-6 start-1/4 -translate-x-1/2 text-sm text-gray-500 rtl:translate-x-1/2 dark:text-gray-400">25%</span>
                                                    <span
                                                        class="absolute -bottom-6 start-1/2 -translate-x-1/2 text-sm text-gray-500 rtl:translate-x-1/2 dark:text-gray-400">50%</span>
                                                    <span
                                                        class="absolute -bottom-6 start-3/4 -translate-x-1/2 text-sm text-gray-500 rtl:translate-x-1/2 dark:text-gray-400">75%</span>
                                                    <span
                                                        class="absolute -bottom-6 end-0 text-sm text-gray-500 dark:text-gray-400">100%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" id="addAdvancedImageButton"
                                        class="w-full rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Додати</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- IMAGE MODAL ↑↑↑ --}}

            </div>
        </div>
        <div class="rounded-b-lg bg-white px-4 py-2 dark:bg-gray-800">
            <label for="wysiwyg" class="sr-only">Publish post</label>
            <div id="wysiwyg"
                class="block min-h-96 w-full overflow-hidden border-0 bg-white px-0 text-sm text-gray-800 focus:ring-0 dark:bg-gray-800 dark:text-white dark:placeholder-gray-400">
                {{-- JS gonna add editor on 'editor-ready' event --}}
            </div>
        </div>
    </div>

    @vite("resources/js/gallery-editor.js")
