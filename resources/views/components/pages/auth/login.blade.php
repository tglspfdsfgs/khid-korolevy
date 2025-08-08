<section class="">
    <div class="mx-auto my-8 flex flex-col items-center justify-center px-6 py-8 lg:py-0">
        <div
            class="w-full rounded-lg bg-white shadow sm:max-w-md md:mt-0 xl:p-0 dark:border dark:border-gray-700 dark:bg-gray-800">
            <div class="space-y-4 p-6 sm:p-8 md:space-y-6">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                    Вхід в обліковий запис
                </h1>
                <form class="space-y-4 md:space-y-6" method="post" action="{{ route("auth.store") }}">
                    @csrf

                    <div class="relative">
                        <label class="input validator mb-2.5 w-full">
                            <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none"
                                    stroke="currentColor">
                                    <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                                    <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                                </g>
                            </svg>
                            <input class="input-bordered focus:outline-none focus:ring-0" type="email"
                                placeholder="mail@site.com" name="email" required />
                        </label>
                        <div class="validator-hint absolute bottom-[-0.80rem] mb-1 hidden">Введіть дійсну адресу
                            електронної пошти</div>
                    </div>

                    <div>
                        <label class="input validator w-full">
                            <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none"
                                    stroke="currentColor">
                                    <path
                                        d="M2.586 17.414A2 2 0 0 0 2 18.828V21a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h1a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h.172a2 2 0 0 0 1.414-.586l.814-.814a6.5 6.5 0 1 0-4-4z">
                                    </path>
                                    <circle cx="16.5" cy="7.5" r=".5" fill="currentColor"></circle>
                                </g>
                            </svg>
                            <input class="input-bordered focus:outline-none focus:ring-0" name="password"
                                type="password" required placeholder="Пароль" minlength="8"
                                pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                title="Має бути більше 8 символів, включаючи цифру, малу літеру, велику літеру" />
                        </label>
                        <p class="validator-hint mb-0 mt-2 hidden">
                            Має бути більше 8 символів, включаючи
                            <br />Принаймні одну цифру <br />Принаймні одну малу літеру <br />Принаймні одну велику
                            літеру
                        </p>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-start">
                            <div class="flex h-5 items-center">
                                <input name="remember" checked id="remember" type="checkbox"
                                    class="h-5 w-5 rounded-full border-gray-300 bg-gray-100 text-yellow-400 focus:ring-2 focus:ring-yellow-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-yellow-600">
                            </div>
                            <div class="text-md ml-1">
                                <label for="remember"
                                    class="ms-2 font-medium text-gray-900 dark:text-gray-300">Запамʼятати мене</label>
                            </div>
                        </div>
                        <a href="#"
                            class="text-md text-primary-600 dark:text-primary-500 font-medium hover:underline">Забули
                            пароль?</a>
                    </div>
                    <button type="submit" class="btn btn-primary w-full">Увійти</button>
                    {{--
                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                        Немає облікового запису? <a href="#" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Зареєструватися</a>
                    </p>
                    --}}
                </form>
            </div>
        </div>
    </div>
</section>
