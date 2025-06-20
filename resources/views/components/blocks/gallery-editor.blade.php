@props(["isResponsive", "unresponsiveSize"])

<div
    class='{{ ($isResponsive ? " w-full px-4 " : $unresponsiveSize) . " lg:card-side bg-base-100 static mb-8 mt-5  rounded-lg py-5 shadow-sm " }}'>
    <div class="border-b border-gray-200 px-3 py-2 dark:border-gray-600">
        <div class="flex flex-col items-start">
            <div class="flex flex-wrap items-center space-x-1 rtl:space-x-reverse">
                <button id="toggleUndoButton" data-tooltip-target="tooltip-undo" type="button"
                    class="cursor-pointer rounded-sm p-1.5 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
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
                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
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
                <button id="toggleHTMLButton" data-tooltip-target="tooltip-html" data-modal-target="source-code-modal"
                    data-modal-toggle="source-code-modal" type="button"
                    class="cursor-pointer rounded-sm p-1.5 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="m3 2 1.578 17.824L12 22l7.467-2.175L21 2H3Zm14.049 6.048H9.075l.172 2.016h7.697l-.626 6.565-4.246 1.381-4.281-1.455-.288-2.932h2.024l.16 1.411 2.4.815 2.346-.763.297-3.005H7.416l-.562-6.05h10.412l-.217 2.017Z" />
                    </svg>
                    <span class="sr-only">HTML</span>
                </button>
                <div id="tooltip-html" role="tooltip"
                    class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 transition-opacity duration-300 dark:bg-gray-700">
                    Експорт HTML
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <!-- export html modal: -->
                <div id="source-code-modal" tabindex="-1" aria-hidden="true"
                    class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">
                    <div class="relative max-h-full w-full max-w-xl p-4">
                        <!-- Modal content -->
                        <div class="relative rounded-lg bg-white shadow-sm dark:bg-gray-700">
                            <!-- Modal header -->
                            <div
                                class="flex items-center justify-between rounded-t border-b border-gray-200 p-4 md:p-5 dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Експорт HTML
                                </h3>
                                <button type="button"
                                    class="end-2.5 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="source-code-modal">
                                    <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Закрити</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div
                                class="format lg:format-lg dark:format-invert format-blue max-w-none p-4 focus:outline-none md:p-5">
                                <pre><code id="sourceCode"></code></pre>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-1">
                    <span class="block h-4 w-px bg-gray-300 dark:bg-gray-600"></span>
                </div>
                <button id="typographyDropdownButton" data-dropdown-toggle="typographyDropdown"
                    class="flex items-center justify-center rounded-lg bg-gray-100 px-3 py-1.5 text-sm font-medium text-gray-500 hover:bg-gray-200 hover:text-gray-900 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-50 dark:bg-gray-600 dark:text-gray-400 dark:hover:bg-gray-500 dark:hover:text-white dark:focus:ring-gray-600"
                    type="button">
                    Заголовки
                    <svg class="-me-0.5 ms-1.5 h-3.5 w-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 9-7 7-7-7" />
                    </svg>
                </button>
                <div class="ps-1.5">
                    <span class="block h-4 w-px bg-gray-300 dark:bg-gray-600"></span>
                </div>
                <!-- Heading Dropdown -->
                <div id="typographyDropdown"
                    class="z-10 hidden w-72 rounded-sm bg-white p-2 shadow-sm dark:bg-gray-700">
                    <ul class="space-y-1 text-sm font-medium" aria-labelledby="typographyDropdownButton">
                        <li>
                            <button id="toggleParagraphButton" type="button"
                                class="flex w-full items-center justify-between rounded-sm px-3 py-2 text-base text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-600">Параграф
                                <div class="space-x-1.5">
                                    <kbd
                                        class="rounded-lg border border-gray-200 bg-gray-100 px-2 py-1 text-xs font-semibold text-gray-500 dark:border-gray-500 dark:bg-gray-600 dark:text-gray-400">Ctrl</kbd>
                                    <kbd
                                        class="rounded-lg border border-gray-200 bg-gray-100 px-2 py-1 text-xs font-semibold text-gray-500 dark:border-gray-500 dark:bg-gray-600 dark:text-gray-400">Alt</kbd>
                                    <kbd
                                        class="rounded-lg border border-gray-200 bg-gray-100 px-2 py-1 text-xs font-semibold text-gray-500 dark:border-gray-500 dark:bg-gray-600 dark:text-gray-400">0</kbd>
                                </div>
                            </button>
                        </li>
                        <li>
                            <button data-heading-level="1" type="button"
                                class="flex w-full items-center justify-between rounded-sm px-3 py-2 text-base text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-600">Заголовок
                                1
                                <div class="space-x-1.5">
                                    <kbd
                                        class="rounded-lg border border-gray-200 bg-gray-100 px-2 py-1 text-xs font-semibold text-gray-500 dark:border-gray-500 dark:bg-gray-600 dark:text-gray-400">Ctrl</kbd>
                                    <kbd
                                        class="rounded-lg border border-gray-200 bg-gray-100 px-2 py-1 text-xs font-semibold text-gray-500 dark:border-gray-500 dark:bg-gray-600 dark:text-gray-400">Alt</kbd>
                                    <kbd
                                        class="rounded-lg border border-gray-200 bg-gray-100 px-2 py-1 text-xs font-semibold text-gray-500 dark:border-gray-500 dark:bg-gray-600 dark:text-gray-400">1</kbd>
                                </div>
                            </button>
                        </li>
                        <li>
                            <button data-heading-level="2" type="button"
                                class="flex w-full items-center justify-between rounded-sm px-3 py-2 text-base text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-600">Заголовок
                                2
                                <div class="space-x-1.5">
                                    <kbd
                                        class="rounded-lg border border-gray-200 bg-gray-100 px-2 py-1 text-xs font-semibold text-gray-500 dark:border-gray-500 dark:bg-gray-600 dark:text-gray-400">Ctrl</kbd>
                                    <kbd
                                        class="rounded-lg border border-gray-200 bg-gray-100 px-2 py-1 text-xs font-semibold text-gray-500 dark:border-gray-500 dark:bg-gray-600 dark:text-gray-400">Alt</kbd>
                                    <kbd
                                        class="rounded-lg border border-gray-200 bg-gray-100 px-2 py-1 text-xs font-semibold text-gray-500 dark:border-gray-500 dark:bg-gray-600 dark:text-gray-400">2</kbd>
                                </div>
                            </button>
                        </li>
                        <li>
                            <button data-heading-level="3" type="button"
                                class="flex w-full items-center justify-between rounded-sm px-3 py-2 text-base text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-600">Заголовок
                                3
                                <div class="space-x-1.5">
                                    <kbd
                                        class="rounded-lg border border-gray-200 bg-gray-100 px-2 py-1 text-xs font-semibold text-gray-500 dark:border-gray-500 dark:bg-gray-600 dark:text-gray-400">Ctrl</kbd>
                                    <kbd
                                        class="rounded-lg border border-gray-200 bg-gray-100 px-2 py-1 text-xs font-semibold text-gray-500 dark:border-gray-500 dark:bg-gray-600 dark:text-gray-400">Alt</kbd>
                                    <kbd
                                        class="rounded-lg border border-gray-200 bg-gray-100 px-2 py-1 text-xs font-semibold text-gray-500 dark:border-gray-500 dark:bg-gray-600 dark:text-gray-400">3</kbd>
                                </div>
                            </button>
                        </li>
                        <li>
                            <button data-heading-level="4" type="button"
                                class="flex w-full items-center justify-between rounded-sm px-3 py-2 text-base text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-600">Заголовок
                                4
                                <div class="space-x-1.5">
                                    <kbd
                                        class="rounded-lg border border-gray-200 bg-gray-100 px-2 py-1 text-xs font-semibold text-gray-500 dark:border-gray-500 dark:bg-gray-600 dark:text-gray-400">Ctrl</kbd>
                                    <kbd
                                        class="rounded-lg border border-gray-200 bg-gray-100 px-2 py-1 text-xs font-semibold text-gray-500 dark:border-gray-500 dark:bg-gray-600 dark:text-gray-400">Alt</kbd>
                                    <kbd
                                        class="rounded-lg border border-gray-200 bg-gray-100 px-2 py-1 text-xs font-semibold text-gray-500 dark:border-gray-500 dark:bg-gray-600 dark:text-gray-400">4</kbd>
                                </div>
                            </button>
                        </li>
                        <li>
                            <button data-heading-level="5" type="button"
                                class="flex w-full items-center justify-between rounded-sm px-3 py-2 text-base text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-600">Заголовок
                                5
                                <div class="space-x-1.5">
                                    <kbd
                                        class="rounded-lg border border-gray-200 bg-gray-100 px-2 py-1 text-xs font-semibold text-gray-500 dark:border-gray-500 dark:bg-gray-600 dark:text-gray-400">Ctrl</kbd>
                                    <kbd
                                        class="rounded-lg border border-gray-200 bg-gray-100 px-2 py-1 text-xs font-semibold text-gray-500 dark:border-gray-500 dark:bg-gray-600 dark:text-gray-400">Alt</kbd>
                                    <kbd
                                        class="rounded-lg border border-gray-200 bg-gray-100 px-2 py-1 text-xs font-semibold text-gray-500 dark:border-gray-500 dark:bg-gray-600 dark:text-gray-400">5</kbd>
                                </div>
                            </button>
                        </li>
                        <li>
                            <button data-heading-level="6" type="button"
                                class="flex w-full items-center justify-between rounded-sm px-3 py-2 text-base text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-600">Заголовок
                                6
                                <div class="space-x-1.5">
                                    <kbd
                                        class="rounded-lg border border-gray-200 bg-gray-100 px-2 py-1 text-xs font-semibold text-gray-500 dark:border-gray-500 dark:bg-gray-600 dark:text-gray-400">Ctrl</kbd>
                                    <kbd
                                        class="rounded-lg border border-gray-200 bg-gray-100 px-2 py-1 text-xs font-semibold text-gray-500 dark:border-gray-500 dark:bg-gray-600 dark:text-gray-400">Alt</kbd>
                                    <kbd
                                        class="rounded-lg border border-gray-200 bg-gray-100 px-2 py-1 text-xs font-semibold text-gray-500 dark:border-gray-500 dark:bg-gray-600 dark:text-gray-400">6</kbd>
                                </div>
                            </button>
                        </li>
                    </ul>
                </div>
                <button type="button" data-tooltip-target="tooltip-advanced-image"
                    data-modal-target="advanced-image-modal" data-modal-toggle="advanced-image-modal"
                    class="cursor-pointer rounded-sm p-1.5 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M18 8C18 9.10457 17.1046 10 16 10C14.8954 10 14 9.10457 14 8C14 6.89543 14.8954 6 16 6C17.1046 6 18 6.89543 18 8Z" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M11.9426 1.25H12.0574C14.3658 1.24999 16.1748 1.24998 17.5863 1.43975C19.031 1.63399 20.1711 2.03933 21.0659 2.93414C21.9607 3.82895 22.366 4.96897 22.5603 6.41371C22.75 7.82519 22.75 9.63423 22.75 11.9426V12.0309C22.75 13.9397 22.75 15.5023 22.6463 16.7745C22.5422 18.0531 22.3287 19.1214 21.8509 20.0087C21.6401 20.4001 21.3812 20.7506 21.0659 21.0659C20.1711 21.9607 19.031 22.366 17.5863 22.5603C16.1748 22.75 14.3658 22.75 12.0574 22.75H11.9426C9.63423 22.75 7.82519 22.75 6.41371 22.5603C4.96897 22.366 3.82895 21.9607 2.93414 21.0659C2.14086 20.2726 1.7312 19.2852 1.51335 18.0604C1.29935 16.8573 1.2602 15.3603 1.25207 13.5015C1.25 13.0287 1.25 12.5286 1.25 12.001V11.9426C1.24999 9.63424 1.24998 7.82519 1.43975 6.41371C1.63399 4.96897 2.03933 3.82895 2.93414 2.93414C3.82895 2.03933 4.96897 1.63399 6.41371 1.43975C7.82519 1.24998 9.63424 1.24999 11.9426 1.25ZM6.61358 2.92637C5.33517 3.09825 4.56445 3.42514 3.9948 3.9948C3.42514 4.56445 3.09825 5.33517 2.92637 6.61358C2.75159 7.91356 2.75 9.62178 2.75 12C2.75 12.2905 2.75 12.5715 2.75034 12.8435L3.75148 11.9675C4.66275 11.1702 6.03617 11.2159 6.89238 12.0721L11.1821 16.3618C11.8693 17.0491 12.9511 17.1428 13.7463 16.5839L14.0445 16.3744C15.1887 15.5702 16.7368 15.6634 17.7764 16.599L20.6068 19.1463C20.8917 18.548 21.0609 17.7618 21.1513 16.6527C21.2494 15.4482 21.25 13.9459 21.25 12C21.25 9.62178 21.2484 7.91356 21.0736 6.61358C20.9018 5.33517 20.5749 4.56445 20.0052 3.9948C19.4355 3.42514 18.6648 3.09825 17.3864 2.92637C16.0864 2.75159 14.3782 2.75 12 2.75C9.62178 2.75 7.91356 2.75159 6.61358 2.92637Z" />
                    </svg>
                    <span class="sr-only">Insert advanced image</span>
                </button>
                <div id="tooltip-advanced-image" role="tooltip"
                    class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 transition-opacity duration-300 dark:bg-gray-700">
                    Додати картинку
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
                                        <input type="url" name="url" id="IMAGE-URL"
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

                {{-- <button type="button" data-tooltip-target="tooltip-advanced-gallery"
                        data-modal-target="advanced-image-modal" data-modal-toggle="advanced-image-modal"
                        class="cursor-pointer rounded-sm p-1.5 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg  class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M18.5116 10.0771C18.5116 10.8157 17.8869 11.4146 17.1163 11.4146C16.3457 11.4146 15.7209 10.8157 15.7209 10.0771C15.7209 9.33841 16.3457 8.7396 17.1163 8.7396C17.8869 8.7396 18.5116 9.33841 18.5116 10.0771Z" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M18.0363 5.53245C16.9766 5.39588 15.6225 5.39589 13.9129 5.39591H10.0871C8.37751 5.39589 7.02343 5.39588 5.9637 5.53245C4.87308 5.673 3.99033 5.96913 3.29418 6.63641C2.59803 7.30369 2.28908 8.14982 2.14245 9.19521C1.99997 10.211 1.99999 11.5089 2 13.1475V13.2482C1.99999 14.8868 1.99997 16.1847 2.14245 17.2005C2.28908 18.2459 2.59803 19.092 3.29418 19.7593C3.99033 20.4266 4.87307 20.7227 5.9637 20.8633C7.02344 20.9998 8.37751 20.9998 10.0871 20.9998H13.9129C15.6225 20.9998 16.9766 20.9998 18.0363 20.8633C19.1269 20.7227 20.0097 20.4266 20.7058 19.7593C21.402 19.092 21.7109 18.2459 21.8575 17.2005C22 16.1847 22 14.8868 22 13.2482V13.1476C22 11.5089 22 10.211 21.8575 9.19521C21.7109 8.14982 21.402 7.30369 20.7058 6.63641C20.0097 5.96913 19.1269 5.673 18.0363 5.53245ZM6.14963 6.858C5.21373 6.97861 4.67452 7.20479 4.28084 7.58215C3.88716 7.9595 3.65119 8.47635 3.52536 9.37343C3.42443 10.093 3.40184 10.9923 3.3968 12.1686L3.86764 11.7737C4.99175 10.8309 6.68596 10.885 7.74215 11.8974L11.7326 15.7223C12.1321 16.1053 12.7611 16.1575 13.2234 15.8461L13.5008 15.6593C14.8313 14.763 16.6314 14.8668 17.8402 15.9096L20.2479 17.9866C20.3463 17.7226 20.4206 17.4075 20.4746 17.0223C20.6032 16.106 20.6047 14.8981 20.6047 13.1979C20.6047 11.4976 20.6032 10.2897 20.4746 9.37343C20.3488 8.47635 20.1128 7.9595 19.7192 7.58215C19.3255 7.20479 18.7863 6.97861 17.8504 6.858C16.8944 6.7348 15.6343 6.73338 13.8605 6.73338H10.1395C8.36575 6.73338 7.10559 6.7348 6.14963 6.858Z" />
                        <path d="M17.0863 2.61039C16.2265 2.49997 15.1318 2.49998 13.7672 2.5H10.6775C9.31284 2.49998 8.21815 2.49997 7.35834 2.61039C6.46796 2.72473 5.72561 2.96835 5.13682 3.53075C4.79725 3.8551 4.56856 4.22833 4.41279 4.64928C4.91699 4.41928 5.48704 4.28374 6.12705 4.20084C7.21143 4.06037 8.597 4.06038 10.3463 4.06039H14.2612C16.0105 4.06038 17.396 4.06037 18.4804 4.20084C19.0394 4.27325 19.545 4.38581 20 4.56638C19.8454 4.17917 19.625 3.83365 19.3078 3.53075C18.719 2.96835 17.9767 2.72473 17.0863 2.61039Z" />
                    </svg>
                    <span class="sr-only">Insert advanced gallery</span>
                </button>
                <div id="tooltip-advanced-gallery" role="tooltip"
                     class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 transition-opacity duration-300 dark:bg-gray-700">
                    Створити галерею
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div> --}}
                {{-- GALLERY MODAL ↓↓↓ --}}

                {{-- <div id="advanced-gallery-modal" tabindex="-1" aria-hidden="true"
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
                                <form id="advancedGalleryForm" class="space-y-4" action="#">
                                    <div>
                                        <label for="URL"
                                               class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">URL
                                            картинки</label>
                                        <input type="url" name="url" id="IMAGE-URL"
                                               class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400"
                                               value="https://placehold.co/600x400" required />
                                    </div>

                                    --}}{{-- --}}{{--

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
                </div> --}}

                {{-- GALLERY MODAL ↑↑↑ --}}

                <div id="tooltip-video" role="tooltip"
                    class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 transition-opacity duration-300 dark:bg-gray-700">
                    Додати відео (youtube)
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>

                <button id="toggleListButton" type="button" data-tooltip-target="tooltip-list"
                    class="cursor-pointer rounded-sm p-1.5 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                            d="M9 8h10M9 12h10M9 16h10M4.99 8H5m-.02 4h.01m0 4H5" />
                    </svg>
                    <span class="sr-only">Toggle list</span>
                </button>
                <div id="tooltip-list" role="tooltip"
                    class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 transition-opacity duration-300 dark:bg-gray-700">
                    Список
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <button id="toggleOrderedListButton" type="button" data-tooltip-target="tooltip-ordered-list"
                    class="cursor-pointer rounded-sm p-1.5 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6h8m-8 6h8m-8 6h8M4 16a2 2 0 1 1 3.321 1.5L4 20h5M4 5l2-1v6m-2 0h4" />
                    </svg>
                    <span class="sr-only">Toggle ordered list</span>
                </button>
                <div id="tooltip-ordered-list" role="tooltip"
                    class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 transition-opacity duration-300 dark:bg-gray-700">
                    Нумерованний список
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <button id="toggleBlockquoteButton" type="button" data-tooltip-target="tooltip-blockquote-list"
                    class="cursor-pointer rounded-sm p-1.5 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M6 6a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h3a3 3 0 0 1-3 3H5a1 1 0 1 0 0 2h1a5 5 0 0 0 5-5V8a2 2 0 0 0-2-2H6Zm9 0a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h3a3 3 0 0 1-3 3h-1a1 1 0 1 0 0 2h1a5 5 0 0 0 5-5V8a2 2 0 0 0-2-2h-3Z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="sr-only">Toggle blockquote</span>
                </button>
                <div id="tooltip-blockquote-list" role="tooltip"
                    class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 transition-opacity duration-300 dark:bg-gray-700">
                    Цитата
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <button id="toggleHRButton" type="button" data-tooltip-target="tooltip-hr-list"
                    class="cursor-pointer rounded-sm p-1.5 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 12h14" />
                        <path stroke="currentColor" stroke-linecap="round"
                            d="M6 9.5h12m-12 9h12M6 7.5h12m-12 9h12M6 5.5h12m-12 9h12" />
                    </svg>
                    <span class="sr-only">Toggle Horizontal Rule</span>
                </button>
                <div id="tooltip-hr-list" role="tooltip"
                    class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 transition-opacity duration-300 dark:bg-gray-700">
                    Додати горизонтальну лінію
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </div>

            <div class="flex flex-wrap items-center">
                <div class="flex flex-wrap items-center space-x-1 rtl:space-x-reverse">
                    <button id="toggleBoldButton" data-tooltip-target="tooltip-bold" type="button"
                        class="cursor-pointer rounded-sm p-1.5 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M8 5h4.5a3.5 3.5 0 1 1 0 7H8m0-7v7m0-7H6m2 7h6.5a3.5 3.5 0 1 1 0 7H8m0-7v7m0 0H6" />
                        </svg>
                        <span class="sr-only">Bold</span>
                    </button>
                    <div id="tooltip-bold" role="tooltip"
                        class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 transition-opacity duration-300 dark:bg-gray-700">
                        Жирний
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <button id="toggleItalicButton" data-tooltip-target="tooltip-italic" type="button"
                        class="cursor-pointer rounded-sm p-1.5 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m8.874 19 6.143-14M6 19h6.33m-.66-14H18" />
                        </svg>
                        <span class="sr-only">Italic</span>
                    </button>
                    <div id="tooltip-italic" role="tooltip"
                        class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 transition-opacity duration-300 dark:bg-gray-700">
                        Похилий
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <button id="toggleUnderlineButton" data-tooltip-target="tooltip-underline" type="button"
                        class="cursor-pointer rounded-sm p-1.5 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                d="M6 19h12M8 5v9a4 4 0 0 0 8 0V5M6 5h4m4 0h4" />
                        </svg>
                        <span class="sr-only">Underline</span>
                    </button>
                    <div id="tooltip-underline" role="tooltip"
                        class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 transition-opacity duration-300 dark:bg-gray-700">
                        Підкреслений
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <button id="toggleStrikeButton" data-tooltip-target="tooltip-strike" type="button"
                        class="cursor-pointer rounded-sm p-1.5 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M7 6.2V5h12v1.2M7 19h6m.2-14-1.677 6.523M9.6 19l1.029-4M5 5l6.523 6.523M19 19l-7.477-7.477" />
                        </svg>
                        <span class="sr-only">Strike</span>
                    </button>
                    <div id="tooltip-strike" role="tooltip"
                        class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 transition-opacity duration-300 dark:bg-gray-700">
                        Перекреслений
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <button id="toggleHighlightButton" data-tooltip-target="tooltip-highlight" type="button"
                        class="cursor-pointer rounded-sm p-1.5 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                d="M9 19.2H5.5c-.3 0-.5-.2-.5-.5V16c0-.2.2-.4.5-.4h13c.3 0 .5.2.5.4v2.7c0 .3-.2.5-.5.5H18m-6-1 1.4 1.8h.2l1.4-1.7m-7-5.4L12 4c0-.1 0-.1 0 0l4 8.8m-6-2.7h4m-7 2.7h2.5m5 0H17" />
                        </svg>
                        <span class="sr-only">Highlight</span>
                    </button>
                    <div id="tooltip-highlight" role="tooltip"
                        class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 transition-opacity duration-300 dark:bg-gray-700">
                        Виділений
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <button id="toggleCodeButton" type="button" data-tooltip-target="tooltip-code"
                        class="cursor-pointer rounded-sm p-1.5 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m8 8-4 4 4 4m8 0 4-4-4-4m-2-3-4 14" />
                        </svg>
                        <span class="sr-only">Code</span>
                    </button>
                    <div id="tooltip-code" role="tooltip"
                        class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 transition-opacity duration-300 dark:bg-gray-700">
                        Форматувати як код
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <button id="toggleLinkButton" data-tooltip-target="tooltip-link" type="button"
                        class="cursor-pointer rounded-sm p-1.5 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M13.213 9.787a3.391 3.391 0 0 0-4.795 0l-3.425 3.426a3.39 3.39 0 0 0 4.795 4.794l.321-.304m-.321-4.49a3.39 3.39 0 0 0 4.795 0l3.424-3.426a3.39 3.39 0 0 0-4.794-4.795l-1.028.961" />
                        </svg>
                        <span class="sr-only">Link</span>
                    </button>
                    <div id="tooltip-link" role="tooltip"
                        class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 transition-opacity duration-300 dark:bg-gray-700">
                        Додати посилання на текст
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <button id="removeLinkButton" data-tooltip-target="tooltip-remove-link" type="button"
                        class="cursor-pointer rounded-sm p-1.5 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                d="M13.2 9.8a3.4 3.4 0 0 0-4.8 0L5 13.2A3.4 3.4 0 0 0 9.8 18l.3-.3m-.3-4.5a3.4 3.4 0 0 0 4.8 0L18 9.8A3.4 3.4 0 0 0 13.2 5l-1 1m7.4 14-1.8-1.8m0 0L16 16.4m1.8 1.8 1.8-1.8m-1.8 1.8L16 20" />
                        </svg>
                        <span class="sr-only">Remove link</span>
                    </button>
                    <div id="tooltip-remove-link" role="tooltip"
                        class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 transition-opacity duration-300 dark:bg-gray-700">
                        Видалити посилання з тексту
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <button id="toggleTextSizeButton" data-dropdown-toggle="textSizeDropdown" type="button"
                        data-tooltip-target="tooltip-text-size"
                        class="cursor-pointer rounded-sm p-1.5 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M3 6.2V5h11v1.2M8 5v14m-3 0h6m2-6.8V11h8v1.2M17 11v8m-1.5 0h3" />
                        </svg>
                        <span class="sr-only">Text size</span>
                    </button>
                    <div id="tooltip-text-size" role="tooltip"
                        class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 transition-opacity duration-300 dark:bg-gray-700">
                        Розмір тексту
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <div id="textSizeDropdown"
                        class="w-94 z-10 hidden rounded-sm bg-white p-2 shadow-sm dark:bg-gray-700">
                        <ul class="space-y-1 text-sm font-medium" aria-labelledby="toggleTextSizeButton">
                            <li>
                                <button data-text-size="16px" type="button"
                                    class="flex w-full items-center justify-between rounded-sm px-3 py-2 text-base text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-600">16px
                                    (За замовчуванням)
                                </button>
                            </li>
                            <li>
                                <button data-text-size="12px" type="button"
                                    class="flex w-full items-center justify-between rounded-sm px-3 py-2 text-xs text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-600">12px
                                    (Крихітний)
                                </button>
                            </li>
                            <li>
                                <button data-text-size="14px" type="button"
                                    class="flex w-full items-center justify-between rounded-sm px-3 py-2 text-sm text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-600">14px
                                    (Маленький)
                                </button>
                            </li>
                            <li>
                                <button data-text-size="18px" type="button"
                                    class="flex w-full items-center justify-between rounded-sm px-3 py-2 text-lg text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-600">18px
                                    (Більший)
                                </button>
                            </li>
                            <li>
                                <button data-text-size="24px" type="button"
                                    class="flex w-full items-center justify-between rounded-sm px-3 py-2 text-2xl text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-600">24px
                                    (Великий)
                                </button>
                            </li>
                            <li>
                                <button data-text-size="36px" type="button"
                                    class="flex w-full items-center justify-between rounded-sm px-3 py-2 text-4xl text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-600">36px
                                    (Величезний)
                                </button>
                            </li>
                        </ul>
                    </div>
                    <button id="toggleTextColorButton" data-dropdown-toggle="textColorDropdown" type="button"
                        data-tooltip-target="tooltip-text-color"
                        class="cursor-pointer rounded-sm p-1.5 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="25"
                            height="24" fill="none" viewBox="0 0 25 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                d="m6.532 15.982 1.573-4m-1.573 4h-1.1m1.1 0h1.65m-.077-4 2.725-6.93a.11.11 0 0 1 .204 0l2.725 6.93m-5.654 0H8.1m.006 0h5.654m0 0 .617 1.569m5.11 4.453c0 1.102-.854 1.996-1.908 1.996-1.053 0-1.907-.894-1.907-1.996 0-1.103 1.907-4.128 1.907-4.128s1.909 3.025 1.909 4.128Z" />
                        </svg>
                        <span class="sr-only">Text color</span>
                    </button>
                    <div id="tooltip-text-color" role="tooltip"
                        class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 transition-opacity duration-300 dark:bg-gray-700">
                        Колір тексту
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <div id="textColorDropdown"
                        class="z-10 hidden w-48 rounded-sm bg-white p-2 shadow-sm dark:bg-gray-700">
                        <div
                            class="group mb-3 grid grid-cols-6 items-center gap-2 rounded-lg p-1.5 hover:bg-gray-100 dark:hover:bg-gray-600">
                            <input type="color" id="color" value="#e66465"
                                class="col-span-3 h-8 w-full rounded-md border border-gray-200 bg-gray-50 p-px px-1 hover:bg-gray-50 group-hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-700 dark:group-hover:bg-gray-700" />
                            <label for="color"
                                class="col-span-3 text-sm font-medium text-gray-500 group-hover:text-gray-900 dark:text-gray-400 dark:group-hover:text-white">Pick
                                a color</label>
                        </div>
                        <div class="mb-3 grid grid-cols-6 gap-1">
                            <button type="button" data-hex-color="#1A56DB" style="background-color: #1A56DB"
                                class="h-6 w-6 rounded-md"><span class="sr-only">Blue</span></button>
                            <button type="button" data-hex-color="#0E9F6E" style="background-color: #0E9F6E"
                                class="h-6 w-6 rounded-md"><span class="sr-only">Green</span></button>
                            <button type="button" data-hex-color="#FACA15" style="background-color: #FACA15"
                                class="h-6 w-6 rounded-md"><span class="sr-only">Yellow</span></button>
                            <button type="button" data-hex-color="#F05252" style="background-color: #F05252"
                                class="h-6 w-6 rounded-md"><span class="sr-only">Red</span></button>
                            <button type="button" data-hex-color="#FF8A4C" style="background-color: #FF8A4C"
                                class="h-6 w-6 rounded-md"><span class="sr-only">Orange</span></button>
                            <button type="button" data-hex-color="#0694A2" style="background-color: #0694A2"
                                class="h-6 w-6 rounded-md"><span class="sr-only">Teal</span></button>
                            <button type="button" data-hex-color="#B4C6FC" style="background-color: #B4C6FC"
                                class="h-6 w-6 rounded-md"><span class="sr-only">Light indigo</span></button>
                            <button type="button" data-hex-color="#8DA2FB" style="background-color: #8DA2FB"
                                class="h-6 w-6 rounded-md"><span class="sr-only">Indigo</span></button>
                            <button type="button" data-hex-color="#5145CD" style="background-color: #5145CD"
                                class="h-6 w-6 rounded-md"><span class="sr-only">Purple</span></button>
                            <button type="button" data-hex-color="#771D1D" style="background-color: #771D1D"
                                class="h-6 w-6 rounded-md"><span class="sr-only">Brown</span></button>
                            <button type="button" data-hex-color="#FCD9BD" style="background-color: #FCD9BD"
                                class="h-6 w-6 rounded-md"><span class="sr-only">Light orange</span></button>
                            <button type="button" data-hex-color="#99154B" style="background-color: #99154B"
                                class="h-6 w-6 rounded-md"><span class="sr-only">Bordo</span></button>
                            <button type="button" data-hex-color="#7E3AF2" style="background-color: #7E3AF2"
                                class="h-6 w-6 rounded-md"><span class="sr-only">Dark Purple</span></button>
                            <button type="button" data-hex-color="#CABFFD" style="background-color: #CABFFD"
                                class="h-6 w-6 rounded-md"><span class="sr-only">Light</span></button>
                            <button type="button" data-hex-color="#D61F69" style="background-color: #D61F69"
                                class="h-6 w-6 rounded-md"><span class="sr-only">Dark Pink</span></button>
                            <button type="button" data-hex-color="#F8B4D9" style="background-color: #F8B4D9"
                                class="h-6 w-6 rounded-md"><span class="sr-only">Pink</span></button>
                            <button type="button" data-hex-color="#F6C196" style="background-color: #F6C196"
                                class="h-6 w-6 rounded-md"><span class="sr-only">Cream</span></button>
                            <button type="button" data-hex-color="#A4CAFE" style="background-color: #A4CAFE"
                                class="h-6 w-6 rounded-md"><span class="sr-only">Light Blue</span></button>
                            <button type="button" data-hex-color="#5145CD" style="background-color: #5145CD"
                                class="h-6 w-6 rounded-md"><span class="sr-only">Dark Blue</span></button>
                            <button type="button" data-hex-color="#B43403" style="background-color: #B43403"
                                class="h-6 w-6 rounded-md"><span class="sr-only">Orange Brown</span></button>
                            <button type="button" data-hex-color="#FCE96A" style="background-color: #FCE96A"
                                class="h-6 w-6 rounded-md"><span class="sr-only">Light Yellow</span></button>
                            <button type="button" data-hex-color="#1E429F" style="background-color: #1E429F"
                                class="h-6 w-6 rounded-md"><span class="sr-only">Navy Blue</span></button>
                            <button type="button" data-hex-color="#768FFD" style="background-color: #768FFD"
                                class="h-6 w-6 rounded-md"><span class="sr-only">Light Purple</span></button>
                            <button type="button" data-hex-color="#BCF0DA" style="background-color: #BCF0DA"
                                class="h-6 w-6 rounded-md"><span class="sr-only">Light Green</span></button>
                            <button type="button" data-hex-color="#EBF5FF" style="background-color: #EBF5FF"
                                class="h-6 w-6 rounded-md"><span class="sr-only">Sky Blue</span></button>
                            <button type="button" data-hex-color="#16BDCA" style="background-color: #16BDCA"
                                class="h-6 w-6 rounded-md"><span class="sr-only">Cyan</span></button>
                            <button type="button" data-hex-color="#E74694" style="background-color: #E74694"
                                class="h-6 w-6 rounded-md"><span class="sr-only">Pink</span></button>
                            <button type="button" data-hex-color="#83B0ED" style="background-color: #83B0ED"
                                class="h-6 w-6 rounded-md"><span class="sr-only">Darker Sky Blue</span></button>
                            <button type="button" data-hex-color="#03543F" style="background-color: #03543F"
                                class="h-6 w-6 rounded-md"><span class="sr-only">Forest Green</span></button>
                            <button type="button" data-hex-color="#111928" style="background-color: #111928"
                                class="h-6 w-6 rounded-md"><span class="sr-only">Black</span></button>
                            <button type="button" data-hex-color="#4B5563" style="background-color: #4B5563"
                                class="h-6 w-6 rounded-md"><span class="sr-only">Stone</span></button>
                            <button type="button" data-hex-color="#6B7280" style="background-color: #6B7280"
                                class="h-6 w-6 rounded-md"><span class="sr-only">Gray</span></button>
                            <button type="button" data-hex-color="#D1D5DB" style="background-color: #D1D5DB"
                                class="h-6 w-6 rounded-md"><span class="sr-only">Light Gray</span></button>
                            <button type="button" data-hex-color="#F3F4F6" style="background-color: #F3F4F6"
                                class="h-6 w-6 rounded-md"><span class="sr-only">Cloud Gray</span></button>
                            <button type="button" data-hex-color="#F3F4F6" style="background-color: #F3F4F6"
                                class="h-6 w-6 rounded-md"><span class="sr-only">Cloud Gray</span></button>
                            <button type="button" data-hex-color="#F9FAFB" style="background-color: #F9FAFB"
                                class="h-6 w-6 rounded-md"><span class="sr-only">Heaven Gray</span></button>
                        </div>
                        <button type="button" id="reset-color"
                            class="w-full rounded-lg bg-white py-1.5 text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-900 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:bg-gray-700 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-700">Reset
                            color</button>
                    </div>
                    <button id="toggleFontFamilyButton" data-dropdown-toggle="fontFamilyDropdown" type="button"
                        data-tooltip-target="tooltip-font-family"
                        class="cursor-pointer rounded-sm p-1.5 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="m10.6 19 4.298-10.93a.11.11 0 0 1 .204 0L19.4 19m-8.8 0H9.5m1.1 0h1.65m7.15 0h-1.65m1.65 0h1.1m-7.7-3.985h4.4M3.021 16l1.567-3.985m0 0L7.32 5.07a.11.11 0 0 1 .205 0l2.503 6.945h-5.44Z" />
                        </svg>
                        <span class="sr-only">Font family</span>
                    </button>
                    <div id="tooltip-font-family" role="tooltip"
                        class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 transition-opacity duration-300 dark:bg-gray-700">
                        Шрифт
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <div id="fontFamilyDropdown"
                        class="z-10 hidden w-48 rounded-sm bg-white p-2 shadow-sm dark:bg-gray-700">
                        <ul class="space-y-1 text-sm font-medium" aria-labelledby="toggleFontFamilyButton">
                            <li>
                                <button data-font-family="Inter, ui-sans-serif" type="button"
                                    class="flex w-full items-center justify-between rounded-sm px-3 py-2 font-sans text-sm text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-600">Default
                                </button>
                            </li>
                            <li>
                                <button data-font-family="Arial, sans-serif" type="button"
                                    class="flex w-full items-center justify-between rounded-sm px-3 py-2 text-sm text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-600"
                                    style="font-family: Arial, sans-serif;">Arial
                                </button>
                            </li>
                            <li>
                                <button data-font-family="'Courier New', monospace" type="button"
                                    class="flex w-full items-center justify-between rounded-sm px-3 py-2 text-sm text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-600"
                                    style="font-family: 'Courier New', monospace;">Courier New
                                </button>
                            </li>
                            <li>
                                <button data-font-family="Georgia, serif" type="button"
                                    class="flex w-full items-center justify-between rounded-sm px-3 py-2 text-sm text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-600"
                                    style="font-family: Georgia, serif;">Georgia
                                </button>
                            </li>
                            <li>
                                <button data-font-family="'Lucida Sans Unicode', sans-serif" type="button"
                                    class="flex w-full items-center justify-between rounded-sm px-3 py-2 text-sm text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-600"
                                    style="font-family: 'Lucida Sans Unicode', sans-serif;">Lucida Sans Unicode
                                </button>
                            </li>
                            <li>
                                <button data-font-family="Tahoma, sans-serif" type="button"
                                    class="flex w-full items-center justify-between rounded-sm px-3 py-2 text-sm text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-600"
                                    style="font-family: Tahoma, sans-serif;">Tahoma
                                </button>
                            </li>
                            <li>
                                <button data-font-family="'Times New Roman', serif;" type="button"
                                    class="flex w-full items-center justify-between rounded-sm px-3 py-2 text-sm text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-600"
                                    style="font-family: 'Times New Roman', serif;">Times New Roman
                                </button>
                            </li>
                            <li>
                                <button data-font-family="'Trebuchet MS', sans-serif" type="button"
                                    class="flex w-full items-center justify-between rounded-sm px-3 py-2 text-sm text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-600"
                                    style="font-family: 'Trebuchet MS', sans-serif;">Trebuchet MS
                                </button>
                            </li>
                            <li>
                                <button data-font-family="Verdana, sans-serif" type="button"
                                    class="flex w-full items-center justify-between rounded-sm px-3 py-2 text-sm text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-600"
                                    style="font-family: Verdana, sans-serif;">Verdana
                                </button>
                            </li>
                        </ul>
                    </div>
                    <div class="px-1">
                        <span class="block h-4 w-px bg-gray-300 dark:bg-gray-600"></span>
                    </div>
                    <button id="toggleLeftAlignButton" type="button" data-tooltip-target="tooltip-left-align"
                        class="cursor-pointer rounded-sm p-1.5 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M6 6h8m-8 4h12M6 14h8m-8 4h12" />
                        </svg>
                        <span class="sr-only">Align left</span>
                    </button>
                    <div id="tooltip-left-align" role="tooltip"
                        class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 transition-opacity duration-300 dark:bg-gray-700">
                        Вирівняти вліво
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <button id="toggleCenterAlignButton" type="button" data-tooltip-target="tooltip-center-align"
                        class="cursor-pointer rounded-sm p-1.5 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M8 6h8M6 10h12M8 14h8M6 18h12" />
                        </svg>
                        <span class="sr-only">Align center</span>
                    </button>
                    <div id="tooltip-center-align" role="tooltip"
                        class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 transition-opacity duration-300 dark:bg-gray-700">
                        По центру
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <button id="toggleRightAlignButton" type="button" data-tooltip-target="tooltip-right-align"
                        class="cursor-pointer rounded-sm p-1.5 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M18 6h-8m8 4H6m12 4h-8m8 4H6" />
                        </svg>
                        <span class="sr-only">Align right</span>
                    </button>
                    <div id="tooltip-right-align" role="tooltip"
                        class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 transition-opacity duration-300 dark:bg-gray-700">
                        Вирівняти вправо
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <button id="toggleJustifyButton" type="button" data-tooltip-target="tooltip-justify"
                        class="cursor-pointer rounded-sm p-1.5 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M18 6H6m12 4H6m12 4H6m12 4H6" />
                        </svg>
                        <span class="sr-only">Justify</span>
                    </button>
                    <div id="tooltip-justify" role="tooltip"
                        class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 transition-opacity duration-300 dark:bg-gray-700">
                        Вирівняти по ширині
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <div class="flex flex-wrap items-center space-x-1 rtl:space-x-reverse">
                    <button id="addTableButton" type="button" data-tooltip-target="tooltip-table"
                        class="cursor-pointer rounded-sm p-1.5 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M3 15v3c0 .5523.44772 1 1 1h10.5M3 15v-4m0 4h11M3 11V6c0-.55228.44772-1 1-1h16c.5523 0 1 .44772 1 1v5M3 11h18m0 0v1M8 11v8m4-8v8m4-8v2m1 4h2m0 0h2m-2 0v2m0-2v-2" />
                        </svg>
                        <span class="sr-only">Add table</span>
                    </button>
                    <div id="tooltip-table" role="tooltip"
                        class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 transition-opacity duration-300 dark:bg-gray-700">
                        Додати нову таблицю
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <button id="deleteTableButton" type="button" data-tooltip-target="tooltip-delete-table"
                        class="cursor-pointer rounded-sm p-1.5 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M3 15.5v3c0 .5523.44772 1 1 1h10.5M3 15.5v-4m0 4h11m-11-4v-5c0-.55228.44772-1 1-1h16c.5523 0 1 .44772 1 1v5m-18 0h18m0 0v1m-13-1v8m4-8v8m4-8v2m1.8956 5.9528 1.5047-1.5047m0 0 1.5048-1.5048m-1.5048 1.5048 1.4605 1.4604m-1.4605-1.4604-1.4604-1.4605" />
                        </svg>
                        <span class="sr-only">Delete table</span>
                    </button>
                    <div id="tooltip-delete-table" role="tooltip"
                        class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 transition-opacity duration-300 dark:bg-gray-700">
                        Видалити поточну таблицю
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <div class="px-1">
                        <span class="block h-4 w-px bg-gray-300 dark:bg-gray-600"></span>
                    </div>
                    <button id="addColumnBeforeButton" type="button"
                        data-tooltip-target="tooltip-add-column-before"
                        class="cursor-pointer rounded-sm p-1.5 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M15 5.5v14m-8-7h2m0 0h2m-2 0v2m0-2v-2m12 1h-6m6 4h-6m-11 4h16c.5523 0 1-.4477 1-1v-12c0-.55228-.4477-1-1-1H4c-.55228 0-1 .44772-1 1v12c0 .5523.44772 1 1 1Z" />
                        </svg>
                        <span class="sr-only">Add column before</span>
                    </button>
                    <div id="tooltip-add-column-before" role="tooltip"
                        class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 transition-opacity duration-300 dark:bg-gray-700">
                        Додати стовпчик перед поточним
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <button id="addColumnAfterButton" type="button"
                        data-tooltip-target="tooltip-add-column-after"
                        class="cursor-pointer rounded-sm p-1.5 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 5.5v14m8-7h-2m0 0h-2m2 0v2m0-2v-2m-12 1h6m-6 4h6m11 4H4c-.55228 0-1-.4477-1-1v-12c0-.55228.44772-1 1-1h16c.5523 0 1 .44772 1 1v12c0 .5523-.4477 1-1 1Z" />
                        </svg>
                        <span class="sr-only">Add column after</span>
                    </button>
                    <div id="tooltip-add-column-after" role="tooltip"
                        class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 transition-opacity duration-300 dark:bg-gray-700">
                        Додати стовпчик після поточного
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <button id="removeColumnButton" type="button" data-tooltip-target="tooltip-remove-column"
                        class="cursor-pointer rounded-sm p-1.5 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 5.5v14m-6-8h6m-6 4h6m4.5061-1.4939L15.0123 12.5m0 0 1.5061-1.5061M15.0123 12.5l1.5061 1.5061M15.0123 12.5l-1.5062-1.5061M20 19.5H4c-.55228 0-1-.4477-1-1v-12c0-.55228.44772-1 1-1h16c.5523 0 1 .44772 1 1v12c0 .5523-.4477 1-1 1Z" />
                        </svg>
                        <span class="sr-only">Remove column</span>
                    </button>
                    <div id="tooltip-remove-column" role="tooltip"
                        class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 transition-opacity duration-300 dark:bg-gray-700">
                        Видалити поточний стовпчик
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <div class="px-1">
                        <span class="block h-4 w-px bg-gray-300 dark:bg-gray-600"></span>
                    </div>
                    <button id="addRowBeforeButton" type="button" data-tooltip-target="tooltip-add-row-before"
                        class="cursor-pointer rounded-sm p-1.5 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M3 15.5v3c0 .5523.44772 1 1 1h16c.5523 0 1-.4477 1-1v-3m-18 0v-9c0-.55228.44772-1 1-1h16c.5523 0 1 .44772 1 1v9m-18 0h18m-13 0v4m4-4v4m4-4v4m-6-9h2m0 0h2m-2 0v2m0-2v-2" />
                        </svg>
                        <span class="sr-only">Add row before</span>
                    </button>
                    <div id="tooltip-add-row-before" role="tooltip"
                        class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 transition-opacity duration-300 dark:bg-gray-700">
                        Додати рядок перед поточним
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <button id="addRowAfterButton" type="button" data-tooltip-target="tooltip-add-row-after"
                        class="cursor-pointer rounded-sm p-1.5 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M3 9.5v-3c0-.55228.44772-1 1-1h16c.5523 0 1 .44771 1 1v3m-18 0v9c0 .5523.44772 1 1 1h16c.5523 0 1-.4477 1-1v-9m-18 0h18m-13 0v-4m4 4v-4m4 4v-4m-6 9h2m0 0h2m-2 0v-2m0 2v2" />
                        </svg>
                        <span class="sr-only">Add row after</span>
                    </button>
                    <div id="tooltip-add-row-after" role="tooltip"
                        class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 transition-opacity duration-300 dark:bg-gray-700">
                        Додати рядок після поточного
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <button id="removeRowButton" type="button" data-tooltip-target="tooltip-remove-row"
                        class="cursor-pointer rounded-sm p-1.5 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M3 15.5v3c0 .5523.44772 1 1 1h16c.5523 0 1-.4477 1-1v-3m-18 0v-9c0-.55228.44772-1 1-1h16c.5523 0 1 .44772 1 1v9m-18 0h18m-13 0v4m4-4v4m4-4v4m-5.5061-7.4939L12 10.5m0 0 1.5061-1.50614M12 10.5l1.5061 1.5061M12 10.5l-1.5061-1.50614" />
                        </svg>
                        <span class="sr-only">Remove row</span>
                    </button>
                    <div id="tooltip-remove-row" role="tooltip"
                        class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 transition-opacity duration-300 dark:bg-gray-700">
                        Видалити поточний рядок
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap items-center space-x-1 rtl:space-x-reverse">
                <button id="mergeCellsButton" type="button" data-tooltip-target="tooltip-merge-cells"
                    class="cursor-pointer rounded-sm p-1.5 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2"
                            d="M10 18.5v2H4v-16h6v2m4 12v2h6v-16h-6v2m-6.49543 8.4954L10 12.5m0 0-2.49543-2.4954M10 12.5H4.05191m12.50199 2.5539L14 12.5m0 0 2.5539-2.55392M14 12.5h5.8319" />
                    </svg>
                    <span class="sr-only">Merge cells</span>
                </button>
                <div id="tooltip-merge-cells" role="tooltip"
                    class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 transition-opacity duration-300 dark:bg-gray-700">
                    Об'єднати клітинки
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <button id="splitCellsButton" type="button" data-tooltip-target="tooltip-split-cells"
                    class="cursor-pointer rounded-sm p-1.5 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 18.5v2h6v-16H4v2m16 12v2h-6v-16h6v2M6.49545 14.9954 4.00003 12.5m0 0 2.49542-2.4954M4.00003 12.5h5.94809m7.49798 2.5539L20 12.5m0 0-2.5539-2.55392M20 12.5h-5.8319" />
                    </svg>
                    <span class="sr-only">Split cells</span>
                </button>
                <div id="tooltip-split-cells" role="tooltip"
                    class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 transition-opacity duration-300 dark:bg-gray-700">
                    Розділити клітинки
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <button id="mergeOrSplitButton" type="button" data-tooltip-target="tooltip-merge-or-split"
                    class="cursor-pointer rounded-sm p-1.5 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2"
                            d="M18.5045 14.9954 21 12.5m0 0-2.4955-2.4954M21 12.5h-5.9481m-9.49798 2.5539L3 12.5m0 0 2.55392-2.55392M3 12.5h5.83192m.16807 7v-14H15v14H8.99999Z" />
                    </svg>
                    <span class="sr-only">Merge or split</span>
                </button>
                <div id="tooltip-merge-or-split" role="tooltip"
                    class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 transition-opacity duration-300 dark:bg-gray-700">
                    Об'єднати/розділити
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <div class="px-1">
                    <span class="block h-4 w-px bg-gray-300 dark:bg-gray-600"></span>
                </div>
                <button id="toggleHeaderColumnButton" type="button"
                    data-tooltip-target="tooltip-toggle-header-column"
                    class="cursor-pointer rounded-sm p-1.5 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2"
                            d="M15 5.5v14m6-8h-6m6 4h-6m-9-3h1.99093M4 19.5h16c.5523 0 1-.4477 1-1v-12c0-.55228-.4477-1-1-1H4c-.55228 0-1 .44772-1 1v12c0 .5523.44772 1 1 1Zm8-7c0 1.1046-.8954 2-2 2-1.10457 0-2-.8954-2-2s.89543-2 2-2c1.1046 0 2 .8954 2 2Z" />
                    </svg>
                    <span class="sr-only">Toggle header column</span>
                </button>
                <div id="tooltip-toggle-header-column" role="tooltip"
                    class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 transition-opacity duration-300 dark:bg-gray-700">
                    Вкл/викл заголовок-стопчкик
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <button id="toggleHeaderRowButton" type="button" data-tooltip-target="tooltip-toggle-header-row"
                    class="cursor-pointer rounded-sm p-1.5 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2"
                            d="M3 15.5v3c0 .5523.44772 1 1 1h16c.5523 0 1-.4477 1-1v-3m-18 0v-9c0-.55228.44772-1 1-1h16c.5523 0 1 .44772 1 1v9m-18 0h18m-13 0v4m4-4v4m4-4v4m-7-9h1.9909M15 10.5c0 1.1046-.8954 2-2 2s-2-.8954-2-2c0-1.10457.8954-2 2-2s2 .89543 2 2Z" />
                    </svg>
                    <span class="sr-only">Toggle header row</span>
                </button>
                <div id="tooltip-toggle-header-row" role="tooltip"
                    class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 transition-opacity duration-300 dark:bg-gray-700">
                    Вкл/викл заголовок-рядок
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <button id="toggleHeaderCellButton" type="button"
                    data-tooltip-target="tooltip-toggle-header-cell"
                    class="cursor-pointer rounded-sm p-1.5 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2"
                            d="M3 15.5v3c0 .5523.44772 1 1 1h16c.5523 0 1-.4477 1-1v-3m-18 0v-9c0-.55228.44772-1 1-1h16c.5523 0 1 .44772 1 1v9m-18 0h18m-13 0v4m4-4v4m4-4v4m-7-9h1.9909M15 10.5c0 1.1046-.8954 2-2 2s-2-.8954-2-2c0-1.10457.8954-2 2-2s2 .89543 2 2Z" />
                    </svg>
                    <span class="sr-only">Toggle header cell</span>
                </button>
                <div id="tooltip-toggle-header-cell" role="tooltip"
                    class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 transition-opacity duration-300 dark:bg-gray-700">
                    Вкл/викл заголовок-клітинку (поточна)
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <button data-modal-toggle="cell-attribute-modal" data-modal-target="cell-attribute-modal"
                    type="button" data-tooltip-target="tooltip-add-cell-attribute"
                    class="cursor-pointer rounded-sm p-1.5 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2"
                            d="M3 15.5v3c0 .5523.44772 1 1 1h8v-8m-9 4v-4m0 4h9m-9-4v-5c0-.55228.44772-1 1-1h16c.5523 0 1 .44772 1 1v4m-18 1h11m6.25 5c0 1.2426-1.0073 2.25-2.25 2.25m2.25-2.25c0-1.2426-1.0073-2.25-2.25-2.25m2.25 2.25H21m-3 2.25c-1.2426 0-2.25-1.0074-2.25-2.25M18 18.75v.75m-2.25-3c0-1.2426 1.0074-2.25 2.25-2.25m-2.25 2.25H15m3-2.25v-.75m-1.591 1.409-.5303-.5303m4.2426 4.2426-.5303-.5303m-3.182 0-.5303.5303m4.2426-4.2426-.5303.5303" />
                    </svg>
                    <span class="sr-only">Add cell attribute</span>
                </button>
                <div id="tooltip-add-cell-attribute" role="tooltip"
                    class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 transition-opacity duration-300 dark:bg-gray-700">
                    Додати атрибут до клітинки (стилізація)
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <div class="px-1">
                    <span class="block h-4 w-px bg-gray-300 dark:bg-gray-600"></span>
                </div>
                <button id="fixTablesButton" type="button" data-tooltip-target="tooltip-fix-tables"
                    class="cursor-pointer rounded-sm p-1.5 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2"
                            d="M3 15.5v3c0 .5523.44772 1 1 1h4v-4m-5 0v-4m0 4h5m-5-4v-5c0-.55228.44772-1 1-1h16c.5523 0 1 .44772 1 1v1.98935M3 11.5h5v4m9.4708 4.1718-.8696-1.4388-2.8164-.235-2.573-4.2573 1.4873-2.8362 1.4441 2.3893c.3865.6396 1.2183.8447 1.8579.4582.6396-.3866.8447-1.2184.4582-1.858l-1.444-2.38925h3.1353l2.6101 4.27715-1.0713 2.5847.8695 1.4388" />
                    </svg>
                    <span class="sr-only">Fix tables</span>
                </button>
                <div id="tooltip-fix-tables" role="tooltip"
                    class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 transition-opacity duration-300 dark:bg-gray-700">
                    Пофіксити таблицю
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <button id="previousCellButton" type="button" data-tooltip-target="tooltip-previous-cell"
                    class="cursor-pointer rounded-sm p-1.5 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2"
                            d="M3 15.5v3c0 .5523.44772 1 1 1h9.5M3 15.5v-4m0 4h9m-9-4v-5c0-.55228.44772-1 1-1h16c.5523 0 1 .44772 1 1v5H3Zm5 0v8m4-8v8m5.9001-1.0999L16 16.5m0 0 1.9001-1.9001M16 16.5h5" />
                    </svg>
                    <span class="sr-only">Previous cell</span>
                </button>
                <div id="tooltip-previous-cell" role="tooltip"
                    class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 transition-opacity duration-300 dark:bg-gray-700">
                    Перейти на попередню клітинку
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
                <button id="nextCellButton" type="button" data-tooltip-target="tooltip-next-cell"
                    class="cursor-pointer rounded-sm p-1.5 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2"
                            d="M3 15.5v3c0 .5523.44772 1 1 1h9.5M3 15.5v-4m0 4h9m-9-4v-5c0-.55228.44772-1 1-1h16c.5523 0 1 .44772 1 1v5H3Zm5 0v8m4-8v8m7.0999-1.0999L21 16.5m0 0-1.9001-1.9001M21 16.5h-5" />
                    </svg>
                    <span class="sr-only">Next cell</span>
                </button>
                <div id="tooltip-next-cell" role="tooltip"
                    class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 transition-opacity duration-300 dark:bg-gray-700">
                    Перейти на наступну клітинку
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </div>
            <div id="cell-attribute-modal" tabindex="-1" aria-hidden="true"
                class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">
                <div class="relative max-h-full w-full max-w-md p-4">
                    <!-- Modal content -->
                    <div class="relative rounded-lg bg-white shadow-sm dark:bg-gray-700">
                        <!-- Modal header -->
                        <div
                            class="flex items-center justify-between rounded-t border-b border-gray-200 p-4 md:p-5 dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Add cell attribute
                            </h3>
                            <button type="button"
                                class="end-2.5 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="cell-attribute-modal">
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
                            <form id="addCellAttributeForm" class="space-y-4" action="#">
                                <div>
                                    <label for="attribute-name"
                                        class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Attribute
                                        name</label>
                                    <input type="text" name="attribute-name" id="attribute-name"
                                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400"
                                        value="backgroundColor" placeholder="eg. backgroundColor" />
                                </div>
                                <div>
                                    <label for="attribute-value"
                                        class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Attribute
                                        value</label>
                                    <input type="text" name="attribute-value" id="attribute-value"
                                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400"
                                        value="#E1EFFE;" placeholder="#E1EFFE;" />
                                </div>
                                <button type="submit" id="addCellAttributeButton"
                                    class="w-full rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Set
                                    attribute</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="rounded-b-lg bg-white px-4 py-2 dark:bg-gray-800">
            <label for="wysiwyg" class="sr-only">Publish post</label>
            <div id="wysiwyg"
                class="block w-full border-0 bg-white px-0 text-sm text-gray-800 focus:ring-0 dark:bg-gray-800 dark:text-white dark:placeholder-gray-400">
            </div>
        </div>
    </div>

    @vite("resources/js/gallery-editor.js")
