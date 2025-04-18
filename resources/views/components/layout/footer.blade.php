<footer class="bg-base-300 text-base-300-content p-10">
    <div
        class="footer sm:footer-horizontal container mx-auto max-md:grid-cols-2 max-sm:grid-cols-1 max-sm:justify-items-center">
        <aside>
            <div>
                <a href="/">
                    <x-assets.logos.small class="mx-auto px-5 pb-3" background="var(--color-base-300)" pieces="black"
                        primary="black" secondary="#FFFF00" />
                </a>
                <p class="text-center">
                    <i>СІКШ</i>
                    <br />
                    <strong>«ХІД КОРОЛЕВИ»</strong>
                    <br />
                    <span>2021</span>
                </p>
            </div>
            {{-- TODO: add social links #1 --}}
            <nav class="my-4 hidden w-full max-lg:block">
                <div class="grid grid-flow-col gap-4">
                    <a href="#">
                        <x-assets.icons.socials.twitter />
                    </a>
                    <a href="#">
                        <x-assets.icons.socials.youtube />
                    </a>
                    <a href="#">
                        <x-assets.icons.socials.facebook />
                    </a>
                </div>
            </nav>
        </aside>
        {{-- TODO: add social links #2 --}}
        <nav class="max-lg:hidden">
            <h6 class="footer-title">СОЦІАЛЬНІ МЕРЕЖІ</h6>
            <div class="grid grid-flow-col gap-4">
                <a href="#">
                    <x-assets.icons.socials.twitter />
                </a>
                <a href="#">
                    <x-assets.icons.socials.youtube />
                </a>
                <a href="#">
                    <x-assets.icons.socials.facebook />
                </a>
            </div>
        </nav>
        {{-- TODO: add these pages --}}
        <nav class="max-lg:order-2">
            <h6 class="footer-title inline-block max-sm:mx-auto">Legal</h6>
            <a href="/terms_of_use" class="link link-hover">Умови використання</a>
            <a href="/private_policy" class="link link-hover">Політика конфіденційності</a>
            <a href="/cookies" class="link link-hover">Cookies</a>
        </nav>
        <div>
            <h6 class="footer-title inline-block max-sm:mx-auto">Контакти</h6>
            <div class="mb-2">
                <x-assets.icons.contacts.map-marker />
                <a class="link" href="https://maps.app.goo.gl/Dbb1h2Uetaz2zxRB8">
                    м. Васильків, вул. Декабристів, 777
                </a>
            </div>
            <div class="mb-2">
                <x-assets.icons.contacts.phone />
                <a class="link inline" href="tel:+380998887766">
                    +380 99 888 77 66
                </a>
                (адміністратор)
            </div>
            <div class="mb-2">
                <x-assets.icons.contacts.email />
                <a class="link" href="mailto:khid-korolevy@email.com">
                    khid-korolevy@email.com
                </a>
            </div>
        </div>
    </div>
</footer>
