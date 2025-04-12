<header class="bg-[url('http://127.0.0.1:8000/storage/header-image.jpg')] bg-cover bg-center bg-no-repeat max-md:h-auto">
    <div class="mx-auto hidden md:container md:flex">
        <a href="#">
            <x-logo background="white" pieces="black" primary="black" secondary="#FFFF00" />
        </a>
        <div class="text-base-content mb-5 ml-5 mt-5 flex-col content-center">
            <div class="text-3xl font-bold lg:text-5xl">«ХІД КОРОЛЕВИ»</div>
            <div class="text-lg lg:text-3xl">Спортивно-інтелектуальний клуб шахів</div>
        </div>
    </div>
    <div class="bg-neutral w-full">
        <div class="mx-auto md:container">
            <div class="navbar bg-neutral text-primary-content shadow-sm">
                <!-- mobile nav: -->
                <div class="flex-none md:hidden">
                    <div class="dropdown">
                        <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h7" />
                            </svg>
                        </div>
                        <ul tabindex="0"
                            class="menu menu-sm dropdown-content text-base-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
                            <li><a>Item 1</a></li>
                            <li>
                                <a>Parent</a>
                                <ul class="p-2">
                                    <li><a>Submenu 1</a></li>
                                    <li><a>Submenu 2</a></li>
                                </ul>
                            </li>
                            <li><a>Item 3</a></li>
                        </ul>
                    </div>
                </div>
                <a href="#" class="flex-1 md:hidden">
                    <x-small-logo background="black" pieces="white" primary="black" secondary="#FFFF00" small />
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
                            <a class="btn btn-ghost rounded-field">Button</a>
                            <div class="dropdown">
                                <div tabindex="0" role="button" class="btn btn-ghost rounded-field">Dropdown</div>
                                <ul tabindex="0"
                                    class="menu dropdown-content bg-base-200 text-base-content rounded-box z-1 mt-4 w-52 p-2 shadow-sm">
                                    <li><a>Item 1</a></li>
                                    <li><a>Item 2</a></li>
                                </ul>
                            </div>
                            <a class="btn btn-ghost rounded-field">Button</a>
                        </div>
                    </div>
                </div>
                <div class="hidden flex-none md:block">
                    <button class="btn btn-ghost btn-circle">
                        <div class="indicator">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                            <span class="badge badge-xs badge-secondary indicator-item"></span>
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
