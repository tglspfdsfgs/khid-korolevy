    <main class="container mx-auto mt-7 lg:flex">
        <section class="grow-3 lg:mr-10">
            <x-blocks.cards.tournament image-src="storage/chess(1).jpg" link="#"
                title="Відкритий шаховий турнір 'Король дошки' – реєструйся та вигравай!"
                description="Шановні шахисти! Реєструйтесь на турнір 'Король дошки'!"></x-blocks.cards.tournament>
            <x-blocks.cards.article image-src="storage/chess(2).jpg" link="#" date="2025-05-05"
                title="Шахи: правила, стратегії та цікаві факти для початківців і професіоналів"
                description="Все про шахи: від основ до просунутих тактик. Читайте!"></x-blocks.cards.article>
            <x-blocks.cards.tournament image-src="storage/chess(1).jpg" link="#"
                title="Відкритий шаховий турнір 'Король дошки' – реєструйся та вигравай!"
                description="Шановні шахисти! Реєструйтесь на турнір 'Король дошки'!"></x-blocks.cards.tournament>
            <x-blocks.cards.article image-src="storage/chess(2).jpg" link="#" date="2025-05-05"
                title="Шахи: правила, стратегії та цікаві факти для початківців і професіоналів"
                description="Все про шахи: від основ до просунутих тактик. Читайте!"></x-blocks.cards.article>
            {{-- pagination --}}
            <x-blocks.pagination />
        </section>
        <x-blocks.sidebar.right />
    </main>
