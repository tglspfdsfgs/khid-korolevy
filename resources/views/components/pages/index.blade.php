<div class="bg-bottom-right bg-size-[30%] bg-no-repeat"
    style="background-image: url('{{ asset("storage/corner-image.png", $secureAssets) }}')">
    <main class="container mx-auto mt-7 lg:flex">
        <section class="grow-3">
            <x-blocks.cards.event image-src='{{ asset("storage/chess(1).jpg", $secureAssets) }}' link="#"
                title="Відкритий шаховий турнір 'Король дошки' – реєструйся та вигравай!"
                description="Шановні шахисти! Реєструйтесь на турнір 'Король дошки'!"></x-blocks.cards.event>
            <x-blocks.cards.article image-src='{{ asset("storage/chess(2).jpg", $secureAssets) }}' link="#"
                title="Шахи: правила, стратегії та цікаві факти для початківців і професіоналів"
                description="Все про шахи: від основ до просунутих тактик. Читайте!"></x-blocks.cards.article>
            <x-blocks.cards.event image-src='{{ asset("storage/chess(1).jpg", $secureAssets) }}' link="#"
                title="Відкритий шаховий турнір 'Король дошки' – реєструйся та вигравай!"
                description="Шановні шахисти! Реєструйтесь на турнір 'Король дошки'!"></x-blocks.cards.event>
            <x-blocks.cards.article image-src='{{ asset("storage/chess(2).jpg", $secureAssets) }}' link="#"
                title="Шахи: правила, стратегії та цікаві факти для початківців і професіоналів"
                description="Все про шахи: від основ до просунутих тактик. Читайте!"></x-blocks.cards.article>
            {{-- pagination --}}
            <x-blocks.pagination />
        </section>
        <aside class="max-lg:pb-15 lg:w-[30%]">
            <div class="overflow-x-auto">
                <x-blocks.sidebar.table />
            </div>
        </aside>
    </main>
</div>
