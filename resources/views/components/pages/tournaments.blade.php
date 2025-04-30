<div class="bg-bottom-right bg-size-[30%] bg-no-repeat" style="background-image: url('/storage/corner-image.png')">
    <main class="container mx-auto mt-7 lg:flex">
        <section class="grow-3 lg:mr-10">
            <x-blocks.cards.create text="Натисни щоб створити турнір" />
            <x-blocks.cards.event image-src="storage/chess(1).jpg" link="#"
                title="Відкритий шаховий турнір 'Король дошки' – реєструйся та вигравай!"
                description="Шановні шахисти! Реєструйтесь на турнір 'Король дошки'!"></x-blocks.cards.event>
            <x-blocks.cards.article image-src="storage/chess(2).jpg" link="#"
                title="Шахи: правила, стратегії та цікаві факти для початківців і професіоналів"
                description="Все про шахи: від основ до просунутих тактик. Читайте!"></x-blocks.cards.article>
            <x-blocks.cards.event image-src="storage/chess(1).jpg" link="#"
                title="Відкритий шаховий турнір 'Король дошки' – реєструйся та вигравай!"
                description="Шановні шахисти! Реєструйтесь на турнір 'Король дошки'!"></x-blocks.cards.event>
            <x-blocks.cards.article image-src="storage/chess(2).jpg" link="#"
                title="Шахи: правила, стратегії та цікаві факти для початківців і професіоналів"
                description="Все про шахи: від основ до просунутих тактик. Читайте!"></x-blocks.cards.article>
            {{-- pagination --}}
            <x-blocks.pagination />
        </section>
        <x-blocks.sidebar.right />
    </main>
</div>
