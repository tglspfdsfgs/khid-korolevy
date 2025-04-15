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
        <div>
            <strong class="badge badge-secondary">АНОНС!</strong>
            <strong class="badge badge-primary">Дата: 01.01.1970</strong>
        </div>
        <p>{{ $description }}</p>
        <div class="card-actions justify-end">
            <a href="#" class="btn btn-primary">Записатися</a>
            <a href="#" class="btn btn-outline btn-primary" disabled>Результати</a>
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
