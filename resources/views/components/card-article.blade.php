@props([
    "imageSrc" => "",
    "title",
    "description",
])

<div class="card lg:card-side bg-base-100 p-5 shadow-sm md:grid md:grid-cols-[1fr_3fr]">
    <figure class="h-auto">
        <img class="h-full w-full object-cover object-center" src="{{ $imageSrc }}" alt="{{ $title }}" />
    </figure>
    <div class="card-body lg:pt-0">
        <h2 class="card-title">
            {{ $title }}

        </h2>
        <i class="badge">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-calendar-check" viewBox="0 0 16 16">
                <path
                    d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0" />
                <path
                    d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
            </svg>
            Оприлюднено: 01.01.1970
        </i>
        <p>{{ $description }}</p>
        <div class="card-actions justify-end">
            <a href="#" class="btn btn-primary">Читати</a>
        </div>
    </div>
</div>

{{--

<div class="card lg:card-side bg-base-100 shadow-sm p-5 flex-row">
    <figure class="min-w-[30%]">
        <img
                src="https://kpi.ua/files/images/925-8_2.jpg"
                alt="" />
    </figure>
    <div class="card-body">
        <h2 class="card-title">Кваліфікаційний турнір з нормою 1-го та 2-го розряду</h2>
        <p>Проводимо турнір з класичних шахів для шахістів 1-го та 2-го розряду. 10 турів, контроль часу 40 хвилин + 30 секунд додавання за зроблений хід.
            Проводимо турнір з класичних шахів для шахістів 1-го та 2-го розряду. 10 турів, контроль часу 40 хвилин + 30 секунд додавання за зроблений хід.
            Проводимо турнір з класичних шахів для шахістів 1-го та 2-го розряду. 10 турів, контроль часу 40 хвилин + 30 секунд додавання за зроблений хід.
            Проводимо турнір з класичних шахів для шахістів 1-го та 2-го розряду. 10 турів, контроль часу 40 хвилин + 30 секунд додавання за зроблений хід.</p>
        <div class="card-actions justify-end">
            <button class="btn btn-primary">Записатися</button>
            <button class="btn btn-outline btn-primary" disabled>Результати</button>
        </div>
    </div>
</div>


--}}
