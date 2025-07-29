<div x-data="{
    ...{{ json_encode($props) }},
    editing: {
        title: false,
        description: false,
        date: false,
    }
}"
    x-effect="() => {
        const dispatchedData = toRaw($data);
        delete dispatchedData.editing;
        $dispatch('update-data', toRaw(dispatchedData))
    }"
    class="card lg:card-side bg-base-100 static mb-5 p-5 shadow-sm md:grid md:grid-cols-[1fr_3fr]">

    <x-blocks.cards.add-image />

    <div class="card-body lg:pt-0">
        <h2 class="card-title relative cursor-pointer" x-show="!editing.title" @click="editing.title = true"
            @touchstart="editing.title = true">
            <span x-text="title"></span>
            <x-assets.icons.editor-buttons.pencil-svg class="absolute right-0 inline cursor-pointer" />
        </h2>
        <div x-show="editing.title" class="join">
            <input x-model="title" @blur="editing.title = false" @keydown.enter="editing.title = false"
                class="input join-item w-full">
            <button class="btn btn-accent join-item" @click="editing.title = false">зберегти</button>
        </div>

        <i x-show="!editing.date" class="badge badge-sm cursor-pointer" @click="editing.date = true"
            @touchstart="editing.date = true">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="inline size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                </svg>
                Опубліковано:
                <time class="font-bold"
                    x-text="(new Date(date).toLocaleDateString('uk-UA', { day: 'numeric', month: 'numeric', year: 'numeric' }))"></time>
                <x-assets.icons.editor-buttons.pencil-svg class="inline cursor-pointer" />
            </span>
        </i>

        <div x-show="editing.date" class="join w-65">
            <input type="date" class="input input-sm join-item" @blur="editing.date = false"
                @keydown.enter="editing.date = false" x-model="date" />
            <button class="btn btn-accent btn-sm join-item" @click="editing.date = false">зберегти</button>
        </div>

        <p x-show="!editing.description" @click="editing.description = true" @touchstart="editing.description = true">
            <span class="cursor-pointer" x-text="description"></span>
            <x-assets.icons.editor-buttons.pencil-svg class="inline cursor-pointer" />
        </p>
        <div x-show="editing.description" class="bg-base-300 rounded-box">
            <textarea x-model="description" @blur="editing.description = false" @keydown.enter="editing.description = false"
                class="textarea join-item w-full resize-y"></textarea>
            <button class="btn btn-accent m-2 rounded-b-lg" @click="editing.description = false">зберегти</button>
        </div>

        <div class="card-actions justify-end">
            <a href="{{ "/article/" . $props["id"] }}" class="btn btn-sm btn-info">
                Читати
                <x-assets.icons.button-icons.navigate />
            </a>
        </div>
    </div>
</div>
