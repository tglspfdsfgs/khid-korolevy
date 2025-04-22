@props(["text"])

<a href="#" class="card lg:card-side bg-base-200 border-base-300 border-3 p-15 static mb-5 block border-dashed">
    <div class="">
        <svg class="mx-auto block size-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke-width="1.5" stroke="var(--color-base-content)" stroke-opacity="0.75">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
        </svg>

        <h2 class="text-base-content/75 mx-auto block w-[280px] text-lg font-bold">{{ $text }}</h2>
    </div>
</a>

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
