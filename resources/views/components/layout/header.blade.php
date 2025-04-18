@php
    $navLinks = [
        "Головна" => "/",
        "Турніри" => [
            "Шахові" => "#",
            "Настільні" => "#",
            "Спортивні" => "#",
        ],
        "Про нас" => "about_us",
    ];
@endphp

{{-- TODO: add About Us page --}}

<div>
    <header
        class="bg-[url('http://127.0.0.1:8000/storage/header-image.jpg')] bg-cover bg-center bg-no-repeat max-md:h-auto">
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
                <div class="navbar shadow-sm">
                    <!-- mobile nav: -->
                    <div class="flex-none md:hidden">
                        <div class="dropdown">
                            <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h7" />
                                </svg>
                            </div>
                            <ul tabindex="0"
                                class="menu menu-sm dropdown-content text-base-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
                                <li><a>Головна</a></li>
                                <li>
                                    <a>Турніри</a>
                                    <ul class="p-2">
                                        <li><a>Шахові</a></li>
                                        <li><a>Настільні</a></li>
                                        <li><a>Спортивні</a></li>
                                    </ul>
                                </li>
                                <li><a>Про нас</a></li>
                            </ul>
                        </div>
                    </div>
                    <a href="/" class="flex-1 md:hidden">
                        <x-assets.logos.small class="px-5" background="oklch(0% 0 0)" pieces="white" primary="black"
                            secondary="#FFFF00" />
                    </a>
                    <div class="flex-none md:hidden">
                        <button class="btn btn-square btn-ghost">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                class="inline-block h-5 w-5 stroke-current">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z">
                                </path>
                            </svg>
                        </button>
                    </div>
                    <!-- desktop nav:  -->
                    <div class="hidden flex-1 md:block">
                        <div class="flex grow justify-start px-2">
                            <div class="flex items-stretch">
                                @foreach ($navLinks as $item => $val)
                                    @if (is_array($val))
                                        <div class="dropdown">
                                            <div tabindex="0" role="button" class="btn btn-ghost rounded-field">
                                                {{ $item }}
                                            </div>
                                            <ul tabindex="0"
                                                class="menu dropdown-content bg-base-200 text-base-content rounded-box z-1 mt-4 w-52 p-2 shadow-sm">
                                                @foreach ($val as $name => $link)
                                                    <li><a href="{{ $link }}">{{ $name }}</a></li>
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
                        <button class="btn btn-ghost btn-circle">
                            <div class="indicator">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                </svg>
                                <span class="badge badge-xs badge-error indicator-item"></span>
                            </div>
                        </button>
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
                                    <a class="justify-between">
                                        Profile
                                        <span class="badge">New</span>
                                    </a>
                                </li>
                                <li><a>Settings</a></li>
                                <li><a>Logout</a></li>
                            </ul>
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
