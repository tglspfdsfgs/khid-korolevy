@php
    $navLinks = [
        "Головна" => "/",
        "Новини і статті" => "/articles",
        "Турніри" => [
            "ВСІ ТУРНІРИ" => "/tournaments?type=all",
            "♟️ Шахові" => "/tournaments?type=chess",
            "🎲 Настільні" => "/tournaments?type=board",
            "⚽ Спортивні" => "/tournaments?type=sports",
        ],
        "Галерея" => "/gallery",
        "Про нас" => "/about_us",
    ];
@endphp

{{-- TODO: add About Us page --}}

<div>
    <header class="bg-cover bg-center bg-no-repeat max-md:h-auto"
        style="background-image: url('{{ Vite::asset("resources/images/header-image.jpg") }}')">
        <div class="mx-auto hidden md:container md:flex">
            <a href="/">
                <x-assets.logos.large background="white" pieces="black" primary="black" secondary="#FFFF00" />
            </a>
            <h1 class="text-base-content mb-5 ml-5 mt-5 grid flex-1 flex-col content-center">
                <i class="mx-auto text-center text-2xl lg:text-3xl">Спортивно-інтелектуальний клуб шахів</i>
                <strong class="mx-auto text-center text-3xl lg:text-5xl">«ХІД КОРОЛЕВИ»</strong>
            </h1>
        </div>
        <div class="bg-accent text-accent-content w-full">
            <div class="mx-auto md:container">
                <div class="drawer bg-accent text-accent-content">
                    <input id="my-drawer-3" type="checkbox" class="drawer-toggle" />
                    <div class="drawer-content flex flex-col">
                        <!-- Navbar -->
                        <div class="navbar mx-auto md:container">
                            <div class="flex-none md:hidden">
                                <label for="my-drawer-3" aria-label="open sidebar" class="btn btn-circle btn-ghost">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        class="inline-block h-6 w-6 stroke-current">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 6h16M4 12h16M4 18h16"></path>
                                    </svg>
                                </label>
                            </div>
                            <a href="/" class="flex-1 md:hidden">
                                <x-assets.logos.small class="px-5" background="oklch(0% 0 0)" pieces="white"
                                    primary="black" secondary="#FFFF00" />
                            </a>
                            <div class="hidden flex-1 md:block">
                                <div class="flex grow justify-start px-2">
                                    <div class="flex items-stretch">
                                        @foreach ($navLinks as $item => $val)
                                            @if (is_array($val))
                                                <div class="dropdown">
                                                    <div tabindex="0" role="button"
                                                        class="btn btn-ghost rounded-field">
                                                        {{ $item }}
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                            fill="currentColor" class="size-5">
                                                            <path fill-rule="evenodd"
                                                                d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    </div>
                                                    <ul tabindex="0"
                                                        class="menu dropdown-content bg-base-200 text-base-content rounded-box z-1 mt-4 w-52 p-2 shadow-sm">
                                                        @foreach ($val as $name => $link)
                                                            <li><a href="{{ $link }}">{{ $name }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @else
                                                <a href="{{ $val }}"
                                                    class="btn btn-ghost rounded-field">{{ $item }}</a>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="hidden flex-none md:block">
                                <a href="/notifications" class="btn btn-ghost btn-circle">
                                    <div class="indicator">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                        </svg>
                                        <span class="badge badge-xs badge-error indicator-item isolated">2</span>
                                    </div>
                                </a>
                                <div class="dropdown dropdown-end">
                                    <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                                        <div class="w-10 rounded-full">
                                            <img alt="Tailwind CSS Navbar component"
                                                src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" />
                                        </div>
                                    </div>
                                    <ul tabindex="0"
                                        class="menu menu-sm dropdown-content text-base-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
                                        <li>
                                            <a href="/setting">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="size-6">
                                                    <path
                                                        d="M6 12a.75.75 0 0 1-.75-.75v-7.5a.75.75 0 1 1 1.5 0v7.5A.75.75 0 0 1 6 12ZM18 12a.75.75 0 0 1-.75-.75v-7.5a.75.75 0 0 1 1.5 0v7.5A.75.75 0 0 1 18 12ZM6.75 20.25v-1.5a.75.75 0 0 0-1.5 0v1.5a.75.75 0 0 0 1.5 0ZM18.75 18.75v1.5a.75.75 0 0 1-1.5 0v-1.5a.75.75 0 0 1 1.5 0ZM12.75 5.25v-1.5a.75.75 0 0 0-1.5 0v1.5a.75.75 0 0 0 1.5 0ZM12 21a.75.75 0 0 1-.75-.75v-7.5a.75.75 0 0 1 1.5 0v7.5A.75.75 0 0 1 12 21ZM3.75 15a2.25 2.25 0 1 0 4.5 0 2.25 2.25 0 0 0-4.5 0ZM12 11.25a2.25 2.25 0 1 1 0-4.5 2.25 2.25 0 0 1 0 4.5ZM15.75 15a2.25 2.25 0 1 0 4.5 0 2.25 2.25 0 0 0-4.5 0Z" />
                                                </svg>
                                                Налаштування
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/logout">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="size-6">
                                                    <path fill-rule="evenodd"
                                                        d="M16.5 3.75a1.5 1.5 0 0 1 1.5 1.5v13.5a1.5 1.5 0 0 1-1.5 1.5h-6a1.5 1.5 0 0 1-1.5-1.5V15a.75.75 0 0 0-1.5 0v3.75a3 3 0 0 0 3 3h6a3 3 0 0 0 3-3V5.25a3 3 0 0 0-3-3h-6a3 3 0 0 0-3 3V9A.75.75 0 1 0 9 9V5.25a1.5 1.5 0 0 1 1.5-1.5h6Zm-5.03 4.72a.75.75 0 0 0 0 1.06l1.72 1.72H2.25a.75.75 0 0 0 0 1.5h10.94l-1.72 1.72a.75.75 0 1 0 1.06 1.06l3-3a.75.75 0 0 0 0-1.06l-3-3a.75.75 0 0 0-1.06 0Z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                Вийти
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="drawer-side isolate overflow-hidden">
                        <label for="my-drawer-3" aria-label="close sidebar" class="drawer-overlay"></label>
                        <div class="menu bg-base-300 text-base-content min-h-full w-80 p-4">
                            <!-- Sidebar content here -->
                            @foreach ($navLinks as $item => $val)
                                @if (is_array($val))
                                    <li>
                                        <span>{{ $item }}</span>
                                        <ul class="p-2">
                                            @foreach ($val as $name => $link)
                                                <li><a href="{{ $link }}">{{ $name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @else
                                    <li><a href="{{ $val }}">{{ $item }}</a></li>
                                @endif
                            @endforeach
                            <li class="relative mt-auto">
                                <a href="/notifications">
                                    <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                                        <div class="w-10 rounded-full">
                                            <img alt="Tailwind CSS Navbar component"
                                                src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp">
                                        </div>
                                    </div>
                                    <div>
                                        <div class="break-all font-bold">Адміністратор</div>
                                        <div class="break-all font-light">khid-korolevy@email.com</div>
                                    </div>
                                    <span class="badge badge-error font-bold">2</span>
                                </a>
                                <a href="/setting" class="w-[48%] text-xs">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-6">
                                        <path
                                            d="M6 12a.75.75 0 0 1-.75-.75v-7.5a.75.75 0 1 1 1.5 0v7.5A.75.75 0 0 1 6 12ZM18 12a.75.75 0 0 1-.75-.75v-7.5a.75.75 0 0 1 1.5 0v7.5A.75.75 0 0 1 18 12ZM6.75 20.25v-1.5a.75.75 0 0 0-1.5 0v1.5a.75.75 0 0 0 1.5 0ZM18.75 18.75v1.5a.75.75 0 0 1-1.5 0v-1.5a.75.75 0 0 1 1.5 0ZM12.75 5.25v-1.5a.75.75 0 0 0-1.5 0v1.5a.75.75 0 0 0 1.5 0ZM12 21a.75.75 0 0 1-.75-.75v-7.5a.75.75 0 0 1 1.5 0v7.5A.75.75 0 0 1 12 21ZM3.75 15a2.25 2.25 0 1 0 4.5 0 2.25 2.25 0 0 0-4.5 0ZM12 11.25a2.25 2.25 0 1 1 0-4.5 2.25 2.25 0 0 1 0 4.5ZM15.75 15a2.25 2.25 0 1 0 4.5 0 2.25 2.25 0 0 0-4.5 0Z" />
                                    </svg>
                                    Налаштування
                                </a>
                                <a href="/logout" class="absolute bottom-0 left-[50%] w-[48%] text-xs">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="size-6">
                                        <path fill-rule="evenodd"
                                            d="M16.5 3.75a1.5 1.5 0 0 1 1.5 1.5v13.5a1.5 1.5 0 0 1-1.5 1.5h-6a1.5 1.5 0 0 1-1.5-1.5V15a.75.75 0 0 0-1.5 0v3.75a3 3 0 0 0 3 3h6a3 3 0 0 0 3-3V5.25a3 3 0 0 0-3-3h-6a3 3 0 0 0-3 3V9A.75.75 0 1 0 9 9V5.25a1.5 1.5 0 0 1 1.5-1.5h6Zm-5.03 4.72a.75.75 0 0 0 0 1.06l1.72 1.72H2.25a.75.75 0 0 0 0 1.5h10.94l-1.72 1.72a.75.75 0 1 0 1.06 1.06l3-3a.75.75 0 0 0 0-1.06l-3-3a.75.75 0 0 0-1.06 0Z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    Вийти
                                </a>
                            </li>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <h2 class="hidden pb-5 pt-10 max-md:block">
        <i class="mx-auto block text-center text-2xl">Спортивно-інтелектуальний клуб шахів</i>
        <strong class="mx-auto block text-center text-3xl">«ХІД КОРОЛЕВИ»</strong>
    </h2>
</div>
