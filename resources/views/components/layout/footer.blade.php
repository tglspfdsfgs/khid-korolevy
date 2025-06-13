@props([
    "isResponsive" => false,
])

<footer class="bg-base-300 text-base-300-content p-10">
    <div> {{ $isResponsive ? "Responsive" : "NOT Responsive " }} </div>
    <div
        class="footer sm:footer-horizontal container mx-auto max-md:grid-cols-2 max-sm:grid-cols-1 max-sm:justify-items-center">
        <aside>
            <div>
                <a href='{{ route("index") }}'>
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
            <nav class="my-4 hidden w-full max-lg:block">
                <x-blocks.socials />
            </nav>
        </aside>
        <nav class="max-lg:hidden">
            <h6 class="footer-title">СОЦІАЛЬНІ МЕРЕЖІ</h6>
            <x-blocks.socials />
        </nav>
        <nav class="max-lg:order-2">
            <h6 class="footer-title inline-block max-sm:mx-auto">Legal</h6>
            <a href="/terms_of_use" class="link link-hover">Умови використання</a>
            <a href="/private_policy" class="link link-hover">Політика конфіденційності</a>
        </nav>
        <div>
            <h6 class="footer-title inline-block max-sm:mx-auto">Контакти</h6>
            <div class="mb-2">
                <x-assets.icons.contacts.map-marker />
                <a class="link" href="https://maps.app.goo.gl/xYRGDaawMR6XrQ7F6">
                    м. Васильків, вул. Керамічна
                </a>
            </div>
            <div class="mb-2">
                <x-assets.icons.contacts.phone />
                <a class="link inline" href="tel:+380685950516">
                    +38 (068) 595 05 16
                </a>
            </div>
            <div class="mb-2">
                <x-assets.icons.contacts.phone />
                <a class="link inline" href="tel:+380937146067">
                    +38 (093) 714 60 67
                </a>
            </div>
            {{-- <div class="mb-2">
                <x-assets.icons.contacts.email />
                <a class="link" href="mailto:khid-korolevy@email.com">
                    khid-korolevy@email.com
                </a>
            </div> --}}
        </div>
    </div>
</footer>
