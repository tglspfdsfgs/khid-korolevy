<div class="bg-bottom-right bg-size-[30%] bg-no-repeat"
    style="background-image: url('{{ asset("storage/corner-image.png", $secureAssets) }}')">
    <main class="container mx-auto mt-7 lg:flex">
        <section class="grow-3 lg:mr-10">
            <p>{!! "Hello, world!" !!}</p>
        </section>
        <x-blocks.sidebar.right />
    </main>
</div>
