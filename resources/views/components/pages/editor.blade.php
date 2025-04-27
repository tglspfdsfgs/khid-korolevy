<div class="bg-bottom-right bg-size-[30%] bg-no-repeat"
    style="background-image: url('{{ asset("storage/corner-image.png", $secureAssets) }}')">
    <main class="container mx-auto mt-7 lg:flex">
        <section class="grow-3 lg:mr-10">
            <x-blocks.cards.create-article image-src='{{ asset("storage/chess(2).jpg", $secureAssets) }}' link="#"
                title="Шахи: правила, стратегії та цікаві факти для початківців і професіоналів"
                description="Все про шахи: від основ до просунутих тактик. Читайте!"></x-blocks.cards.create-article>
            <x-blocks.text-editor />
        </section>
        <x-blocks.sidebar.right />
    </main>
</div>
