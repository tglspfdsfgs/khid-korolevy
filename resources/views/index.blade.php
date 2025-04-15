<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title ?? "Хід королеви - головна" }}</title>
        @vite(["resources/css/app.css", "resources/js/app.js"])
    </head>
    <body>
        {{-- TODO: bind links to contoller actions --}}
        <x-header></x-header>
        <main class="container mx-auto mt-5 lg:flex">
            <section class="grow-3 mb-5">
                {{--
                wide img:
                src="http://127.0.0.1:8000/storage/chess(1).jpg"
                tall img: --}}
                {{-- src="http://127.0.0.1:8000/storage/chess(1).jpg" --}}

                <x-card-event image-src="http://127.0.0.1:8000/storage/chess(1).jpg"
                    title="Відкритий шаховий турнір 'Король дошки' – реєструйся та вигравай!"
                    description="Шановні шахисти! Реєструйтесь на турнір 'Король дошки'!"></x-card-event>
                <x-card-article image-src="http://127.0.0.1:8000/storage/chess(2).jpg"
                    title="Шахи: правила, стратегії та цікаві факти для початківців і професіоналів"
                    description="Все про шахи: від основ до просунутих тактик. Читайте!"></x-card-article>
                <x-card-event image-src="http://127.0.0.1:8000/storage/chess(1).jpg"
                    title="Відкритий шаховий турнір 'Король дошки' – реєструйся та вигравай!"
                    description="Шановні шахисти! Реєструйтесь на турнір 'Король дошки'!"></x-card-event>
                <x-card-article image-src="http://127.0.0.1:8000/storage/chess(2).jpg"
                    title="Шахи: правила, стратегії та цікаві факти для початківців і професіоналів"
                    description="Все про шахи: від основ до просунутих тактик. Читайте!"></x-card-article>
                <div class="join mt-5 flex justify-center">
                    <a href="#" class="join-item btn btn-disabled">«</a>
                    <a class="join-item btn btn-active btn-primary">1</a>
                    <a href="#" class="join-item btn">2</a>
                    <a href="#" class="join-item btn btn-disabled">...</a>
                    <a href="#" class="join-item btn">99</a>
                    <a href="#" class="join-item btn">100</a>
                    <a href="#" class="join-item btn">»</a>
                </div>

            </section>
            <aside class="lg:w-[30%]">
                <div class="overflow-x-auto">
                    <table class="table-zebra table break-words">
                        <caption class="font-semibold">
                            Топ українців шахістів за рейтингом ФІДЕ
                        </caption>
                        <!-- head -->
                        <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Rating</th>
                                <th>Word<br />rank</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- row 1 -->
                            <tr>
                                <th>1</th>
                                <td>Ельянов, Павло Володимирович</td>
                                <td>2676</td>
                                <td>59</td>
                            </tr>
                            <!-- row 2 -->
                            <tr>
                                <th>2</th>
                                <td>Волокітін, Андрій Олександрович</td>
                                <td>2667</td>
                                <td>69</td>
                            </tr>
                            <!-- row 3 -->
                            <tr>
                                <th>3</th>
                                <td>Криворучко, Юрій Григорович</td>
                                <td>2650</td>
                                <td>89</td>
                            </tr>
                            <!-- row 1 -->
                            <tr>
                                <th>1</th>
                                <td>Ельянов, Павло Володимирович</td>
                                <td>2676</td>
                                <td>59</td>
                            </tr>
                            <!-- row 2 -->
                            <tr>
                                <th>2</th>
                                <td>Волокітін, Андрій Олександрович</td>
                                <td>2667</td>
                                <td>69</td>
                            </tr>
                            <!-- row 3 -->
                            <tr>
                                <th>3</th>
                                <td>Криворучко, Юрій Григорович</td>
                                <td>2650</td>
                                <td>89</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </aside>
        </main>
        <footer class="footer">
            #Footer
        </footer>
        @vite("resources/js/app.js")
    </body>
</html>
