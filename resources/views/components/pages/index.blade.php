<div class="bg-bottom-right bg-size-[30%] bg-[url('http://127.0.0.1:8000/storage/corner-image.png')] bg-no-repeat">
    <main class="container mx-auto mt-7 lg:flex">
        <section class="grow-3">
            {{--
            wide img:
            src="http://127.0.0.1:8000/storage/chess(1).jpg"
            tall img: --}}
            {{-- src="http://127.0.0.1:8000/storage/chess(1).jpg" --}}

            <x-cards.event image-src="http://127.0.0.1:8000/storage/chess(1).jpg" link="#"
                title="Відкритий шаховий турнір 'Король дошки' – реєструйся та вигравай!"
                description="Шановні шахисти! Реєструйтесь на турнір 'Король дошки'!"></x-cards.event>
            <x-cards.article image-src="http://127.0.0.1:8000/storage/chess(2).jpg" link="#"
                title="Шахи: правила, стратегії та цікаві факти для початківців і професіоналів"
                description="Все про шахи: від основ до просунутих тактик. Читайте!"></x-cards.article>
            <x-cards.event image-src="http://127.0.0.1:8000/storage/chess(1).jpg" link="#"
                title="Відкритий шаховий турнір 'Король дошки' – реєструйся та вигравай!"
                description="Шановні шахисти! Реєструйтесь на турнір 'Король дошки'!"></x-cards.event>
            <x-cards.article image-src="http://127.0.0.1:8000/storage/chess(2).jpg" link="#"
                title="Шахи: правила, стратегії та цікаві факти для початківців і професіоналів"
                description="Все про шахи: від основ до просунутих тактик. Читайте!"></x-cards.article>
            <div class="join my-5 flex justify-center">
                <a href="#" class="join-item btn btn-disabled">«</a>
                <a class="join-item btn btn-active btn-primary">1</a>
                <a href="#" class="join-item btn">2</a>
                <a href="#" class="join-item btn btn-disabled">...</a>
                <a href="#" class="join-item btn">99</a>
                <a href="#" class="join-item btn">100</a>
                <a href="#" class="join-item btn">»</a>
            </div>
        </section>
        <aside class="max-lg:pb-15 lg:w-[30%]">
            <div class="overflow-x-auto">
                <x-sidebar.table />
            </div>
        </aside>
    </main>
</div>
