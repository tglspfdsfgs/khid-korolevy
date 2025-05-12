@php
    $links = [
        "school" => "#",
        "qualification" => "#",
        "comprehensive development" => "#",
        "tabletop tournaments" => "#",
        "sports tournaments" => "#",
        "chess tournaments" => "#",
    ];
@endphp

<div class="container mx-auto">
    {{-- tablet and desktop --}}
    <div class="hidden w-full p-4 px-4 sm:px-6 md:block lg:px-8">
        <div class="menu grid items-start gap-2 sm:grid-cols-2 lg:grid-cols-6">
            <a class="text-base-content hover:bg-base-300 focus:outline-hidden focus:bg-base-200 group flex flex-col justify-center rounded-xl p-4 md:p-4"
                href="{{ $links["school"] }}">
                <div class="flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="mt-2 size-12 shrink-0 text-gray-800 dark:text-white">
                        <path
                            d="M11.7 2.805a.75.75 0 0 1 .6 0A60.65 60.65 0 0 1 22.83 8.72a.75.75 0 0 1-.231 1.337 49.948 49.948 0 0 0-9.902 3.912l-.003.002c-.114.06-.227.119-.34.18a.75.75 0 0 1-.707 0A50.88 50.88 0 0 0 7.5 12.173v-.224c0-.131.067-.248.172-.311a54.615 54.615 0 0 1 4.653-2.52.75.75 0 0 0-.65-1.352 56.123 56.123 0 0 0-4.78 2.589 1.858 1.858 0 0 0-.859 1.228 49.803 49.803 0 0 0-4.634-1.527.75.75 0 0 1-.231-1.337A60.653 60.653 0 0 1 11.7 2.805Z" />
                        <path
                            d="M13.06 15.473a48.45 48.45 0 0 1 7.666-3.282c.134 1.414.22 2.843.255 4.284a.75.75 0 0 1-.46.711 47.87 47.87 0 0 0-8.105 4.342.75.75 0 0 1-.832 0 47.87 47.87 0 0 0-8.104-4.342.75.75 0 0 1-.461-.71c.035-1.442.121-2.87.255-4.286.921.304 1.83.634 2.726.99v1.27a1.5 1.5 0 0 0-.14 2.508c-.09.38-.222.753-.397 1.11.452.213.901.434 1.346.66a6.727 6.727 0 0 0 .551-1.607 1.5 1.5 0 0 0 .14-2.67v-.645a48.549 48.549 0 0 1 3.44 1.667 2.25 2.25 0 0 0 2.12 0Z" />
                        <path
                            d="M4.462 19.462c.42-.419.753-.89 1-1.395.453.214.902.435 1.347.662a6.742 6.742 0 0 1-1.286 1.794.75.75 0 0 1-1.06-1.06Z" />
                    </svg>
                </div>
                <div class="mt-5">
                    <h3 class="group-hover:text-base-content/50 text-center text-lg font-semibold">Школа</h3>
                    <p class="mt-1 text-center">Школа шахів для дітей та дорослих.</p>
                    <span
                        class="link link-hover link-success mt-2 flex items-center justify-center gap-x-1.5 text-sm font-medium">
                        Детальніше
                        <svg class="size-4 shrink-0" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6" />
                        </svg>
                    </span>
                </div>
            </a>

            <a class="text-base-content hover:bg-base-300 focus:outline-hidden focus:bg-base-200 group flex flex-col justify-center rounded-xl p-4 md:p-4"
                href="{{ $links["qualification"] }}">
                <div class="flex items-center justify-center">
                    <svg class="mt-2 size-12 shrink-0 text-gray-800 dark:text-white" version="1.0"
                        xmlns="http://www.w3.org/2000/svg" width="357.000000pt" height="386.000000pt"
                        viewBox="0 0 357.000000 386.000000" preserveAspectRatio="xMidYMid meet">
                        <g transform="translate(0.000000,386.000000) scale(0.100000,-0.100000)" fill="currentColor"
                            stroke="none">
                            <path
                                d="M2418 3386 c-201 -22 -369 -43 -372 -46 -3 -3 42 -59 100 -124 57 -66 104 -122 103 -125 -1 -8 -692 -624 -705 -628 -6 -2 -67 44 -135 102 -67 58 -126 104 -131 103 -8 -3 -1028 -990 -1028 -996 0 -2 3 -1 8 1 253 157 1027 627 1031 627 3 0 61 -48 129 -106 l123 -105 167 144 c92 79 295 255 451 390 156 136 287 247 290 247 3 -1 53 -54 111 -120 58 -65 108 -116 111 -112 4 4 43 169 88 367 45 198 86 375 91 393 8 32 8 32 -28 31 -20 -1 -202 -20 -404 -43z" />
                            <path d="M2780 1345 l0 -995 270 0 270 0 0 995 0 995 -270 0 -270 0 0 -995z" />
                            <path d="M1930 1155 l0 -805 270 0 270 0 0 805 0 805 -270 0 -270 0 0 -805z" />
                            <path d="M1090 975 l0 -625 270 0 270 0 0 625 0 625 -270 0 -270 0 0 -625z" />
                            <path d="M240 735 l0 -385 270 0 270 0 0 385 0 385 -270 0 -270 0 0 -385z" />
                        </g>
                    </svg>
                </div>
                <div class="mt-5">
                    <h3 class="group-hover:text-base-content/50 text-center text-lg font-semibold">Кваліфікація</h3>
                    <p class="mt-1 text-center">Підвищення рівня шахових знань.</p>
                    <span
                        class="link link-hover link-success mt-2 flex items-center justify-center gap-x-1.5 text-sm font-medium">
                        Детальніше
                        <svg class="size-4 shrink-0" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6" />
                        </svg>
                    </span>
                </div>
            </a>

            <a class="text-base-content hover:bg-base-300 focus:outline-hidden focus:bg-base-200 group flex flex-col justify-center rounded-xl p-4 md:p-4"
                href="{{ $links["chess tournaments"] }}">
                <div class="flex items-center justify-center">
                    <svg class="mt-2 size-12 shrink-0 text-gray-800 dark:text-white" height="800px" width="800px"
                        version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" fill="currentColor" viewBox="0 0 512 512"
                        xml:space="preserve">
                        <g>
                            <path d="M256,161.408c44.568,0,80.71-36.13,80.71-80.698C336.71,36.142,300.567,0,256,0
  c-44.568,0-80.698,36.142-80.698,80.71C175.302,125.278,211.431,161.408,256,161.408z" />
                            <path d="M113.114,431.973h285.783c0,0,16.267-3.756,16.267-22.57c0-28.216-50.702-46.641-63.92-56.664
  c-61.577-46.726-57.334-145.58,18.023-145.58v-29.74H142.745v29.74c75.345,0,79.588,98.854,18.01,145.58
  c-13.218,10.023-63.92,28.448-63.92,56.664C96.836,428.217,113.114,431.973,113.114,431.973z" />
                            <polygon
                                points="113.114,451.8 97.544,478.028 97.544,512 414.456,512 414.456,478.028 398.897,451.8 	" />
                        </g>
                    </svg>
                </div>
                <div class="mt-5">
                    <h3 class="group-hover:text-base-content/50 text-center text-lg font-semibold">Шахові турніри</h3>
                    <p class="mt-1 text-center text-base">Проведення шахових турнірів різних рівнів.</p>
                    <span
                        class="link link-hover link-success mt-2 flex items-center justify-center gap-x-1.5 text-sm font-medium">
                        Детальніше
                        <svg class="size-4 shrink-0" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6" />
                        </svg>
                    </span>
                </div>
            </a>

            <a class="text-base-content hover:bg-base-300 focus:outline-hidden focus:bg-base-200 group flex flex-col justify-center rounded-xl p-4 md:p-4"
                href="{{ $links["tabletop tournaments"] }}">
                <div class="flex items-center justify-center">
                    <svg class="mt-2 size-12 shrink-0 text-gray-800 dark:text-white" width="800px" height="800px"
                        viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g id="Page-1" stroke="none" stroke-width="1" fill="currentColor" fill-rule="evenodd">
                            <g id="Dribbble-Light-Preview" transform="translate(-220.000000, -2719.000000)">
                                <g id="icons" transform="translate(56.000000, 160.000000)">
                                    <path
                                        d="M174,2573 L178,2573 L178,2569 L174,2569 L174,2573 Z M170,2569 L174,2569 L174,2565 L170,2565 L170,2569 Z M182,2565 L178,2565 L178,2569 L182,2569 L182,2573 L178,2573 L178,2577 L174,2577 L174,2573 L170,2573 L170,2577 L167,2577 C166.448,2577 166,2576.657 166,2576.105 L166,2573 L170,2573 L170,2569 L166,2569 L166,2565 L170,2565 L170,2561 L174,2561 L174,2565 L178,2565 L178,2561 L181,2561 C181.552,2561 182,2561.552 182,2562.105 L182,2565 Z M182,2559 L166,2559 C164.895,2559 164,2559.895 164,2561 L164,2577 C164,2578.104 164.895,2579 166,2579 L182,2579 C183.105,2579 184,2578.104 184,2577 L184,2561 C184,2559.895 183.105,2559 182,2559 L182,2559 Z"
                                        id="chess-[#1218]">
                                    </path>
                                </g>
                            </g>
                        </g>
                    </svg>
                </div>
                <div class="mt-5">
                    <h3 class="group-hover:text-base-content/50 text-center text-lg font-semibold">Турніри з настільних
                        ігор</h3>
                    <p class="mt-1 text-center">Проведення турнірів з різних видів настільних ігор.</p>
                    <span
                        class="link link-hover link-success mt-2 flex items-center justify-center gap-x-1.5 text-sm font-medium">
                        Детальніше
                        <svg class="size-4 shrink-0" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6" />
                        </svg>
                    </span>
                </div>
            </a>

            <a class="text-base-content hover:bg-base-300 focus:outline-hidden focus:bg-base-200 group flex flex-col justify-center rounded-xl p-4 md:p-4"
                href="{{ $links["sports tournaments"] }}">
                <div class="flex items-center justify-center">
                    <svg class="mt-2 size-12 shrink-0 text-gray-800 dark:text-white" version="1.1" id="Icons"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        viewBox="0 0 32 32" xml:space="preserve" fill="currentColor">
                        <path d="M27.5,24c1.6-2.3,2.5-5,2.5-8c0-2.7-0.8-5.2-2.1-7.3c0-0.1-0.1-0.1-0.1-0.2C25.3,4.6,21,2,16,2C11,2,6.6,4.6,4.2,8.6
 c0,0.1-0.1,0.1-0.1,0.2c-1.3,2.1-2,4.6-2,7.3c0,3,0.9,5.7,2.5,8c0,0,0.1,0.1,0.1,0.1C7.1,27.7,11.3,30,16,30c4.7,0,8.8-2.3,11.4-5.8
 C27.4,24.1,27.4,24.1,27.5,24z M26,22.5L22.4,23l-1.4-1.4l2-5.8l3.1-1.5l2,1.2c0,0.2,0,0.4,0,0.7C28,18.4,27.3,20.7,26,22.5z
 M25.9,9.3l-0.8,3l-3.2,1.6L17,10.5V6.6l3.4-1.7c0,0,0,0,0,0C22.7,5.8,24.6,7.3,25.9,9.3z M11.5,4.9C11.5,4.9,11.5,4.9,11.5,4.9
 L15,6.6v3.9l-4.9,3.5l-3.3-1.6L6,9.3C7.4,7.3,9.3,5.8,11.5,4.9z M4,15.3l2-1.2l3.1,1.6l2,5.8l-1.4,1.4l-3.7-0.4
 C4.7,20.6,4,18.4,4,16C4,15.8,4,15.5,4,15.3z M12.9,27.6C12.9,27.6,12.9,27.6,12.9,27.6l-1.7-3.4l1.2-1.2h7.2l1.2,1.2l-1.7,3.4
 c0,0,0,0,0,0c-1,0.3-2,0.4-3.1,0.4S13.9,27.8,12.9,27.6z" />
                    </svg>
                </div>
                <div class="mt-5">
                    <h3 class="group-hover:text-base-content/50 text-center text-lg font-semibold">Спортивні турніри
                    </h3>
                    <p class="mt-1 text-center">Проведення турнірів з різних видів спортивних ігор.</p>
                    <span
                        class="link link-hover link-success mt-2 flex items-center justify-center gap-x-1.5 text-sm font-medium">
                        Детальніше
                        <svg class="size-4 shrink-0" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6" />
                        </svg>
                    </span>
                </div>
            </a>

            <a class="text-base-content hover:bg-base-300 focus:outline-hidden focus:bg-base-200 group flex flex-col justify-center rounded-xl p-4 md:p-4"
                href="{{ $links["comprehensive development"] }}">
                <div class="flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="mt-2 size-12 shrink-0 text-gray-800 dark:text-white">
                        <path
                            d="M12 .75a8.25 8.25 0 0 0-4.135 15.39c.686.398 1.115 1.008 1.134 1.623a.75.75 0 0 0 .577.706c.352.083.71.148 1.074.195.323.041.6-.218.6-.544v-4.661a6.714 6.714 0 0 1-.937-.171.75.75 0 1 1 .374-1.453 5.261 5.261 0 0 0 2.626 0 .75.75 0 1 1 .374 1.452 6.712 6.712 0 0 1-.937.172v4.66c0 .327.277.586.6.545.364-.047.722-.112 1.074-.195a.75.75 0 0 0 .577-.706c.02-.615.448-1.225 1.134-1.623A8.25 8.25 0 0 0 12 .75Z" />
                        <path fill-rule="evenodd"
                            d="M9.013 19.9a.75.75 0 0 1 .877-.597 11.319 11.319 0 0 0 4.22 0 .75.75 0 1 1 .28 1.473 12.819 12.819 0 0 1-4.78 0 .75.75 0 0 1-.597-.876ZM9.754 22.344a.75.75 0 0 1 .824-.668 13.682 13.682 0 0 0 2.844 0 .75.75 0 1 1 .156 1.492 15.156 15.156 0 0 1-3.156 0 .75.75 0 0 1-.668-.824Z"
                            clip-rule="evenodd" />
                    </svg>

                </div>
                <div class="mt-5">
                    <h3 class="group-hover:text-base-content/50 text-center text-lg font-semibold">Всебічний розвиток
                    </h3>
                    <p class="mt-1 text-center">Всебічний розвиток вас та вашої дитини.</p>
                    <span
                        class="link link-hover link-success mt-2 flex items-center justify-center gap-x-1.5 text-sm font-medium">
                        Детальніше
                        <svg class="size-4 shrink-0" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6" />
                        </svg>
                    </span>
                </div>
            </a>
        </div>
    </div>

    {{-- mobile --}}

    <div class="mx-auto w-full px-3 md:hidden">
        <div class="mx-auto">

            <div class="">
                <div class="">

                    <a href="{{ $links["school"] }}"
                        class="text-base-content hover:bg-base-300 focus:outline-hidden focus:bg-base-200 group mb-4 flex gap-x-5 rounded-xl px-2 py-4 sm:gap-x-8">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="ml-4 mt-2 size-8 shrink-0 text-gray-800 dark:text-white">
                            <path
                                d="M11.7 2.805a.75.75 0 0 1 .6 0A60.65 60.65 0 0 1 22.83 8.72a.75.75 0 0 1-.231 1.337 49.948 49.948 0 0 0-9.902 3.912l-.003.002c-.114.06-.227.119-.34.18a.75.75 0 0 1-.707 0A50.88 50.88 0 0 0 7.5 12.173v-.224c0-.131.067-.248.172-.311a54.615 54.615 0 0 1 4.653-2.52.75.75 0 0 0-.65-1.352 56.123 56.123 0 0 0-4.78 2.589 1.858 1.858 0 0 0-.859 1.228 49.803 49.803 0 0 0-4.634-1.527.75.75 0 0 1-.231-1.337A60.653 60.653 0 0 1 11.7 2.805Z" />
                            <path
                                d="M13.06 15.473a48.45 48.45 0 0 1 7.666-3.282c.134 1.414.22 2.843.255 4.284a.75.75 0 0 1-.46.711 47.87 47.87 0 0 0-8.105 4.342.75.75 0 0 1-.832 0 47.87 47.87 0 0 0-8.104-4.342.75.75 0 0 1-.461-.71c.035-1.442.121-2.87.255-4.286.921.304 1.83.634 2.726.99v1.27a1.5 1.5 0 0 0-.14 2.508c-.09.38-.222.753-.397 1.11.452.213.901.434 1.346.66a6.727 6.727 0 0 0 .551-1.607 1.5 1.5 0 0 0 .14-2.67v-.645a48.549 48.549 0 0 1 3.44 1.667 2.25 2.25 0 0 0 2.12 0Z" />
                            <path
                                d="M4.462 19.462c.42-.419.753-.89 1-1.395.453.214.902.435 1.347.662a6.742 6.742 0 0 1-1.286 1.794.75.75 0 0 1-1.06-1.06Z" />
                        </svg>

                        <div class="grow">
                            <h3 class="group-hover:text-base-content/50 font-semibold sm:text-lg">
                                Школа
                            </h3>
                            <p class="mt-1">
                                Школа шахів для дітей та дорослих.
                                <span
                                    class="link link-hover link-success mt-2 flex items-center justify-start gap-x-1.5 text-sm font-medium">
                                    Детальніше
                                    <svg class="size-4 shrink-0" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m9 18 6-6-6-6" />
                                    </svg>
                                </span>
                            </p>
                        </div>
                    </a>

                    <a href="{{ $links["qualification"] }}"
                        class="text-base-content hover:bg-base-300 focus:outline-hidden focus:bg-base-200 group mb-4 flex gap-x-5 rounded-xl px-2 py-4 sm:gap-x-8">
                        <svg class="ml-4 mt-2 size-8 shrink-0 text-gray-800 dark:text-white" version="1.0"
                            xmlns="http://www.w3.org/2000/svg" width="357.000000pt" height="386.000000pt"
                            viewBox="0 0 357.000000 386.000000" preserveAspectRatio="xMidYMid meet">
                            <g transform="translate(0.000000,386.000000) scale(0.100000,-0.100000)"
                                fill="currentColor" stroke="none">
                                <path
                                    d="M2418 3386 c-201 -22 -369 -43 -372 -46 -3 -3 42 -59 100 -124 57 -66 104 -122 103 -125 -1 -8 -692 -624 -705 -628 -6 -2 -67 44 -135 102 -67 58 -126 104 -131 103 -8 -3 -1028 -990 -1028 -996 0 -2 3 -1 8 1 253 157 1027 627 1031 627 3 0 61 -48 129 -106 l123 -105 167 144 c92 79 295 255 451 390 156 136 287 247 290 247 3 -1 53 -54 111 -120 58 -65 108 -116 111 -112 4 4 43 169 88 367 45 198 86 375 91 393 8 32 8 32 -28 31 -20 -1 -202 -20 -404 -43z" />
                                <path d="M2780 1345 l0 -995 270 0 270 0 0 995 0 995 -270 0 -270 0 0 -995z" />
                                <path d="M1930 1155 l0 -805 270 0 270 0 0 805 0 805 -270 0 -270 0 0 -805z" />
                                <path d="M1090 975 l0 -625 270 0 270 0 0 625 0 625 -270 0 -270 0 0 -625z" />
                                <path d="M240 735 l0 -385 270 0 270 0 0 385 0 385 -270 0 -270 0 0 -385z" />
                            </g>
                        </svg>

                        <div class="grow">
                            <h3 class="group-hover:text-base-content/50 font-semibold sm:text-lg">
                                Кваліфікація
                            </h3>
                            <p class="mt-1">
                                Підвищення рівня шахових знань.
                                <span
                                    class="link link-hover link-success mt-2 flex items-center justify-start gap-x-1.5 text-sm font-medium">
                                    Детальніше
                                    <svg class="size-4 shrink-0" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m9 18 6-6-6-6" />
                                    </svg>
                                </span>
                            </p>
                        </div>
                    </a>

                    <a href="{{ $links["chess tournaments"] }}"
                        class="text-base-content hover:bg-base-300 focus:outline-hidden focus:bg-base-200 group mb-4 flex gap-x-5 rounded-xl px-2 py-4 sm:gap-x-8">
                        <svg class="ml-4 mt-2 size-8 shrink-0 text-gray-800 dark:text-white" height="800px"
                            width="800px" version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" fill="currentColor" viewBox="0 0 512 512"
                            xml:space="preserve">
                            <g>
                                <path d="M256,161.408c44.568,0,80.71-36.13,80.71-80.698C336.71,36.142,300.567,0,256,0
  c-44.568,0-80.698,36.142-80.698,80.71C175.302,125.278,211.431,161.408,256,161.408z" />
                                <path d="M113.114,431.973h285.783c0,0,16.267-3.756,16.267-22.57c0-28.216-50.702-46.641-63.92-56.664
  c-61.577-46.726-57.334-145.58,18.023-145.58v-29.74H142.745v29.74c75.345,0,79.588,98.854,18.01,145.58
  c-13.218,10.023-63.92,28.448-63.92,56.664C96.836,428.217,113.114,431.973,113.114,431.973z" />
                                <polygon
                                    points="113.114,451.8 97.544,478.028 97.544,512 414.456,512 414.456,478.028 398.897,451.8 	" />
                            </g>
                        </svg>

                        <div class="grow">
                            <h3 class="group-hover:text-base-content/50 font-semibold sm:text-lg">
                                Шахові турніри
                            </h3>
                            <p class="mt-1">
                                Проведення шахових турнірів різних рівнів.
                                <span
                                    class="link link-hover link-success mt-2 flex items-center justify-start gap-x-1.5 text-sm font-medium">
                                    Детальніше
                                    <svg class="size-4 shrink-0" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m9 18 6-6-6-6" />
                                    </svg>
                                </span>
                            </p>
                        </div>
                    </a>

                    <a href="{{ $links["tabletop tournaments"] }}"
                        class="text-base-content hover:bg-base-300 focus:outline-hidden focus:bg-base-200 group mb-4 flex gap-x-5 rounded-xl px-2 py-4 sm:gap-x-8">
                        <svg class="ml-4 mt-2 size-8 shrink-0 text-gray-800 dark:text-white" width="800px"
                            height="800px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g id="Page-1" stroke="none" stroke-width="1" fill="currentColor"
                                fill-rule="evenodd">
                                <g id="Dribbble-Light-Preview" transform="translate(-220.000000, -2719.000000)">
                                    <g id="icons" transform="translate(56.000000, 160.000000)">
                                        <path
                                            d="M174,2573 L178,2573 L178,2569 L174,2569 L174,2573 Z M170,2569 L174,2569 L174,2565 L170,2565 L170,2569 Z M182,2565 L178,2565 L178,2569 L182,2569 L182,2573 L178,2573 L178,2577 L174,2577 L174,2573 L170,2573 L170,2577 L167,2577 C166.448,2577 166,2576.657 166,2576.105 L166,2573 L170,2573 L170,2569 L166,2569 L166,2565 L170,2565 L170,2561 L174,2561 L174,2565 L178,2565 L178,2561 L181,2561 C181.552,2561 182,2561.552 182,2562.105 L182,2565 Z M182,2559 L166,2559 C164.895,2559 164,2559.895 164,2561 L164,2577 C164,2578.104 164.895,2579 166,2579 L182,2579 C183.105,2579 184,2578.104 184,2577 L184,2561 C184,2559.895 183.105,2559 182,2559 L182,2559 Z"
                                            id="chess-[#1218]">
                                        </path>
                                    </g>
                                </g>
                            </g>
                        </svg>

                        <div class="grow">
                            <h3 class="group-hover:text-base-content/50 font-semibold sm:text-lg">
                                Турніри з настільних ігор
                            </h3>
                            <p class="mt-1">
                                Проведення турнірів з різних видів настільних ігор.
                                <span
                                    class="link link-hover link-success mt-2 flex items-center justify-start gap-x-1.5 text-sm font-medium">
                                    Детальніше
                                    <svg class="size-4 shrink-0" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m9 18 6-6-6-6" />
                                    </svg>
                                </span>
                            </p>
                        </div>
                    </a>

                    <a href="{{ $links["sports tournaments"] }}"
                        class="text-base-content hover:bg-base-300 focus:outline-hidden focus:bg-base-200 group mb-4 flex gap-x-5 rounded-xl px-2 py-4 sm:gap-x-8">
                        <svg class="ml-4 mt-2 size-8 shrink-0 text-gray-800 dark:text-white" version="1.1"
                            id="Icons" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 32 32" xml:space="preserve"
                            fill="currentColor">
                            <path d="M27.5,24c1.6-2.3,2.5-5,2.5-8c0-2.7-0.8-5.2-2.1-7.3c0-0.1-0.1-0.1-0.1-0.2C25.3,4.6,21,2,16,2C11,2,6.6,4.6,4.2,8.6
 c0,0.1-0.1,0.1-0.1,0.2c-1.3,2.1-2,4.6-2,7.3c0,3,0.9,5.7,2.5,8c0,0,0.1,0.1,0.1,0.1C7.1,27.7,11.3,30,16,30c4.7,0,8.8-2.3,11.4-5.8
 C27.4,24.1,27.4,24.1,27.5,24z M26,22.5L22.4,23l-1.4-1.4l2-5.8l3.1-1.5l2,1.2c0,0.2,0,0.4,0,0.7C28,18.4,27.3,20.7,26,22.5z
 M25.9,9.3l-0.8,3l-3.2,1.6L17,10.5V6.6l3.4-1.7c0,0,0,0,0,0C22.7,5.8,24.6,7.3,25.9,9.3z M11.5,4.9C11.5,4.9,11.5,4.9,11.5,4.9
 L15,6.6v3.9l-4.9,3.5l-3.3-1.6L6,9.3C7.4,7.3,9.3,5.8,11.5,4.9z M4,15.3l2-1.2l3.1,1.6l2,5.8l-1.4,1.4l-3.7-0.4
 C4.7,20.6,4,18.4,4,16C4,15.8,4,15.5,4,15.3z M12.9,27.6C12.9,27.6,12.9,27.6,12.9,27.6l-1.7-3.4l1.2-1.2h7.2l1.2,1.2l-1.7,3.4
 c0,0,0,0,0,0c-1,0.3-2,0.4-3.1,0.4S13.9,27.8,12.9,27.6z" />
                        </svg>
                        <div class="grow">
                            <h3 class="group-hover:text-base-content/50 font-semibold sm:text-lg">
                                Спортивні турніри
                            </h3>
                            <p class="mt-1">
                                Проведення турнірів з різних видів спортивних ігор.
                                <span
                                    class="link link-hover link-success mt-2 flex items-center justify-start gap-x-1.5 text-sm font-medium">
                                    Детальніше
                                    <svg class="size-4 shrink-0" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m9 18 6-6-6-6" />
                                    </svg>
                                </span>
                            </p>
                        </div>
                    </a>

                    <a href="{{ $links["comprehensive development"] }}"
                        class="text-base-content hover:bg-base-300 focus:outline-hidden focus:bg-base-200 group mb-4 flex gap-x-5 rounded-xl px-2 py-4 sm:gap-x-8">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                            class="ml-4 mt-2 size-8 shrink-0 text-gray-800 dark:text-white">
                            <path
                                d="M12 .75a8.25 8.25 0 0 0-4.135 15.39c.686.398 1.115 1.008 1.134 1.623a.75.75 0 0 0 .577.706c.352.083.71.148 1.074.195.323.041.6-.218.6-.544v-4.661a6.714 6.714 0 0 1-.937-.171.75.75 0 1 1 .374-1.453 5.261 5.261 0 0 0 2.626 0 .75.75 0 1 1 .374 1.452 6.712 6.712 0 0 1-.937.172v4.66c0 .327.277.586.6.545.364-.047.722-.112 1.074-.195a.75.75 0 0 0 .577-.706c.02-.615.448-1.225 1.134-1.623A8.25 8.25 0 0 0 12 .75Z" />
                            <path fill-rule="evenodd"
                                d="M9.013 19.9a.75.75 0 0 1 .877-.597 11.319 11.319 0 0 0 4.22 0 .75.75 0 1 1 .28 1.473 12.819 12.819 0 0 1-4.78 0 .75.75 0 0 1-.597-.876ZM9.754 22.344a.75.75 0 0 1 .824-.668 13.682 13.682 0 0 0 2.844 0 .75.75 0 1 1 .156 1.492 15.156 15.156 0 0 1-3.156 0 .75.75 0 0 1-.668-.824Z"
                                clip-rule="evenodd" />
                        </svg>
                        <div class="grow">
                            <h3 class="group-hover:text-base-content/50 font-semibold sm:text-lg">
                                Всебічний розвиток
                            </h3>
                            <p class="mt-1">
                                Всебічний розвиток вас та вашої дитини.
                                <span
                                    class="link link-hover link-success mt-2 flex items-center justify-start gap-x-1.5 text-sm font-medium">
                                    Детальніше
                                    <svg class="size-4 shrink-0" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m9 18 6-6-6-6" />
                                    </svg>
                                </span>
                            </p>
                        </div>
                    </a>

                </div>

            </div>

        </div>
    </div>

</div>
