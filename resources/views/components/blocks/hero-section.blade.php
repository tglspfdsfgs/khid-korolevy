@php
    use App\Enums\EducationType as EduType;
    use App\Enums\TournamentType as Type;

    $links = [
        "school" => route("education.index") . "?type=" . EduType::beginners->value,
        "qualification" => route("education.index") . "?type=" . EduType::adults->value,
        "comprehensive development" => route("comp_dev.index"),
        "tabletop tournaments" => route("tournament.index") . "?type=" . Type::tabletop->value,
        "sports tournaments" => route("tournament.index") . "?type=" . Type::sports->value,
        "chess tournaments" => route("tournament.index") . "?type=" . Type::chess->value,
    ];
@endphp

<div class="container mx-auto">
    {{-- tablet and desktop --}}
    <div class="hidden w-full p-4 px-4 sm:px-6 md:block lg:px-8">
        <div class="menu grid items-start gap-2 sm:grid-cols-2 lg:grid-cols-6">
            <a class="text-base-content hover:bg-base-300 focus:outline-hidden focus:bg-base-200 group flex flex-col justify-center rounded-xl p-4 md:p-4"
                href="{{ $links["school"] }}">
                <div class="flex items-center justify-center">
                    <x-assets.icons.hero.school class="mt-2 size-12 shrink-0 text-gray-800 dark:text-white" />
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
                    <x-assets.icons.hero.qualification class="mt-2 size-12 shrink-0 text-gray-800 dark:text-white" />
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
                    <x-assets.icons.hero.chess class="mt-2 size-12 shrink-0 text-gray-800 dark:text-white" />
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
                    <x-assets.icons.hero.tabletop class="mt-2 size-12 shrink-0 text-gray-800 dark:text-white"
                        fill="currentColor" />
                </div>
                <div class="mt-5">
                    <h3 class="group-hover:text-base-content/50 text-center text-lg font-semibold">Турніри з настільних
                        ігор</h3>
                    <p class="mt-1 text-center">Проведення турнірів з різних видів настільних ігор.</p>
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
                href="{{ $links["sports tournaments"] }}">
                <div class="flex items-center justify-center">
                    <x-assets.icons.hero.sports class="mt-2 size-12 shrink-0 text-gray-800 dark:text-white" />
                </div>
                <div class="mt-5">
                    <h3 class="group-hover:text-base-content/50 text-center text-lg font-semibold">Спортивні турніри
                    </h3>
                    <p class="mt-1 text-center">Проведення турнірів з різних видів спортивних ігор.</p>
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
                href="{{ $links["comprehensive development"] }}">
                <div class="flex items-center justify-center">
                    <x-assets.icons.hero.comprehensive-dev
                        class="mt-2 size-12 shrink-0 text-gray-800 dark:text-white" />

                </div>
                <div class="mt-5">
                    <h3 class="group-hover:text-base-content/50 text-center text-lg font-semibold">Розумаха
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
                        <x-assets.icons.hero.school class="ml-4 mt-2 size-8 shrink-0 text-gray-800 dark:text-white" />

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
                        <x-assets.icons.hero.qualification
                            class="ml-4 mt-2 size-8 shrink-0 text-gray-800 dark:text-white" />
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
                        <x-assets.icons.hero.chess class="ml-4 mt-2 size-8 shrink-0 text-gray-800 dark:text-white" />

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
                        <x-assets.icons.hero.tabletop
                            class="ml-4 mt-2 size-8 shrink-0 text-gray-800 dark:text-white" />
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
                        <x-assets.icons.hero.sports class="ml-4 mt-2 size-8 shrink-0 text-gray-800 dark:text-white" />
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
                        <x-assets.icons.hero.comprehensive-dev
                            class="ml-4 mt-2 size-8 shrink-0 text-gray-800 dark:text-white" />
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
