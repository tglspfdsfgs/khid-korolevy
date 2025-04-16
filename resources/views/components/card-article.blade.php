@props([
    "imageSrc" => "",
    "title",
    "description",
    "link",
])

<div class="card lg:card-side bg-base-100 p-5 shadow-sm md:grid md:grid-cols-[1fr_3fr]">
    <a href="{{ $link }}}" class="block h-auto">
        <img class="h-full w-full rounded-xl object-cover object-center" src="{{ $imageSrc }}"
            alt="{{ $title }}" />
    </a>
    <div class="card-body lg:pt-0">
        <h2 class="card-title">
            <a href="{{ $link }}">{{ $title }}</a>
        </h2>
        <i class="badge badge-sm">
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
            <a href="{{ $link }}" class="btn btn-sm btn-info">
                Читати
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5z" />
                </svg>
            </a>
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
