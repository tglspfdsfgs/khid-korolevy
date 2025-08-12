@extends("layouts.admin")

@section("title", $title)

@section("content")

    @php
        use Illuminate\Support\Facades\Auth;

        $navLinks = [
            "📷 Завантаження фото" => route("index"),
            "👥️ Управління обл. записами" => route("index"),
            "🌐 Соц. мережі" => route("index"),
            "✉️ Контактні данні" => route("index"),
            "Сайд-бар" => [
                "🆕 Нове на сайті" => route("index"),
                "📢 Реклама" => route("index"),
                "🤝 Наші партнери" => route("index"),
                "📺 Цікаві ресурси" => route("index"),
            ],
        ];

        //

        $user = Auth::user();

        $account = [
            "Облікові данні" => [
                "Ім'я" => $user?->name,
                "Емейл" => "$user?->email",
            ],
            "Вихід" => route("auth.destroy"),
            "Налаштування" => "/setting",
        ];
    @endphp
    <!-- ========== HEADER ========== -->
    <header class="bg-accent text-accent-content">
        <div class="w-full">
            <div class="drawer bg-accent text-accent-content">
                <input id="my-drawer-3" type="checkbox" class="drawer-toggle" />
                <div class="drawer-content flex flex-col">
                    <!-- Navbar -->
                    <div class="navbar mx-auto">
                        <div class="flex-none lg:hidden">
                            <label for="my-drawer-3" aria-label="open sidebar" class="btn btn-circle btn-ghost">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    class="inline-block h-6 w-6 stroke-current">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16"></path>
                                </svg>
                            </label>

                        </div>
                        <a href="{{ route("index") }}">
                            <x-assets.logos.small class="px-5" background="oklch(0% 0 0)" pieces="white" primary="black"
                                secondary="#FFFF00" />
                        </a>
                        <div class="ml-auto mr-3 flex flex-none">
                            <button class="btn btn-circle tooltip tooltip-info tooltip-left mr-2" data-tip="Документація">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                                </svg>
                            </button>
                            <div class="dropdown dropdown-end tooltip tooltip-warning tooltip-left"
                                data-tip='{{ $account["Облікові данні"]["Ім'я"] }}'>
                                <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                                    <div class="w-10 rounded-full">
                                        <img alt="Tailwind CSS Navbar component"
                                            src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" />
                                    </div>
                                </div>
                                <form method="post" action='{{ $account["Вихід"] }}'>
                                    @csrf
                                    <ul tabindex="0"
                                        class="menu menu-sm dropdown-content text-base-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
                                        <li>
                                            <a href='{{ $account["Налаштування"] }}'>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="size-6">
                                                    <path
                                                        d="M6 12a.75.75 0 0 1-.75-.75v-7.5a.75.75 0 1 1 1.5 0v7.5A.75.75 0 0 1 6 12ZM18 12a.75.75 0 0 1-.75-.75v-7.5a.75.75 0 0 1 1.5 0v7.5A.75.75 0 0 1 18 12ZM6.75 20.25v-1.5a.75.75 0 0 0-1.5 0v1.5a.75.75 0 0 0 1.5 0ZM18.75 18.75v1.5a.75.75 0 0 1-1.5 0v-1.5a.75.75 0 0 1 1.5 0ZM12.75 5.25v-1.5a.75.75 0 0 0-1.5 0v1.5a.75.75 0 0 0 1.5 0ZM12 21a.75.75 0 0 1-.75-.75v-7.5a.75.75 0 0 1 1.5 0v7.5A.75.75 0 0 1 12 21ZM3.75 15a2.25 2.25 0 1 0 4.5 0 2.25 2.25 0 0 0-4.5 0ZM12 11.25a2.25 2.25 0 1 1 0-4.5 2.25 2.25 0 0 1 0 4.5ZM15.75 15a2.25 2.25 0 1 0 4.5 0 2.25 2.25 0 0 0-4.5 0Z" />
                                                </svg>
                                                Налаштування
                                            </a>
                                        </li>
                                        <li>
                                            <button type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="size-6">
                                                    <path fill-rule="evenodd"
                                                        d="M16.5 3.75a1.5 1.5 0 0 1 1.5 1.5v13.5a1.5 1.5 0 0 1-1.5 1.5h-6a1.5 1.5 0 0 1-1.5-1.5V15a.75.75 0 0 0-1.5 0v3.75a3 3 0 0 0 3 3h6a3 3 0 0 0 3-3V5.25a3 3 0 0 0-3-3h-6a3 3 0 0 0-3 3V9A.75.75 0 1 0 9 9V5.25a1.5 1.5 0 0 1 1.5-1.5h6Zm-5.03 4.72a.75.75 0 0 0 0 1.06l1.72 1.72H2.25a.75.75 0 0 0 0 1.5h10.94l-1.72 1.72a.75.75 0 1 0 1.06 1.06l3-3a.75.75 0 0 0 0-1.06l-3-3a.75.75 0 0 0-1.06 0Z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                Вийти
                                            </button>
                                        </li>
                                    </ul>
                                </form>
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
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ========== END HEADER ========== -->

    <!-- ========== MAIN CONTENT ========== -->
    <div class="bg-gray-100 px-3 pb-3 pt-7 dark:bg-neutral-900">
        <div
            class="shadow-xs bg-base-200 relative h-screen overflow-scroll rounded-lg border border-gray-200 dark:border-neutral-700 dark:bg-neutral-800">
            <div class="drawer lg:drawer-open absolute">
                <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
                <div class="drawer-content flex flex-col items-center justify-center">
                    <!-- Page content here -->
                    <label for="my-drawer-2" class="btn btn-primary drawer-button hidden">
                        Open drawer
                    </label>
                </div>
                <div class="drawer-side bg-base-200">
                    <label for="my-drawer-2" aria-label="close sidebar" class="drawer-overlay"></label>
                    <ul class="menu text-base-content w-65 p-4">
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
                    </ul>
                </div>
            </div>
            <!-- Body -->
            <main class="lg:ml-65 z-100 relative min-h-screen bg-white p-5">
                <x-dynamic-component :component="$page" />
            </main>
            <!-- End Body -->
        </div>
    </div>
    <!-- ========== END MAIN CONTENT ========== -->
@endsection
