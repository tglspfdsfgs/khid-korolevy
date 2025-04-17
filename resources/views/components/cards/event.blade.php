@props([
    "imageSrc" => "",
    "title",
    "description",
    "link",
])

<div class="card lg:card-side bg-base-100 p-5 shadow-sm md:grid md:grid-cols-[1fr_3fr]">
    <a href="{{ $link }}" class="block h-auto">
        <img class="h-full w-full rounded-xl object-cover object-center" src="{{ $imageSrc }}"
            alt="{{ $title }}" />
    </a>
    <div class="card-body lg:pt-0">
        <h2 class="card-title">
            <a href="{{ $link }}">{{ $title }}</a>
        </h2>
        <div>
            <strong class="badge badge-sm badge-secondary">АНОНС!</strong>
            <strong class="badge badge-sm badge-primary">Дата: 01.01.1970</strong>
        </div>
        <p>{{ $description }}</p>
        <div class="card-actions justify-end">
            <a href="#" class="btn btn-sm btn-outline btn-primary" disabled>
                Результати
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-table" viewBox="0 0 16 16">
                    <path
                        d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm15 2h-4v3h4zm0 4h-4v3h4zm0 4h-4v3h3a1 1 0 0 0 1-1zm-5 3v-3H6v3zm-5 0v-3H1v2a1 1 0 0 0 1 1zm-4-4h4V8H1zm0-4h4V4H1zm5-3v3h4V4zm4 4H6v3h4z" />
                </svg>
            </a>
            <a href="#" class="btn btn-sm btn-primary">
                Записатися
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-vector-pen" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M10.646.646a.5.5 0 0 1 .708 0l4 4a.5.5 0 0 1 0 .708l-1.902 1.902-.829 3.313a1.5 1.5 0 0 1-1.024 1.073L1.254 14.746 4.358 4.4A1.5 1.5 0 0 1 5.43 3.377l3.313-.828zm-1.8 2.908-3.173.793a.5.5 0 0 0-.358.342l-2.57 8.565 8.567-2.57a.5.5 0 0 0 .34-.357l.794-3.174-3.6-3.6z" />
                    <path fill-rule="evenodd" d="M2.832 13.228 8 9a1 1 0 1 0-1-1l-4.228 5.168-.026.086z" />
                </svg>
            </a>
            <a href="#" class="btn btn-sm btn-info">
                Детальніше
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
