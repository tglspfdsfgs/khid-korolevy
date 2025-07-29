<div x-data="{
    ...{{ json_encode($props) }},
    editing: {
        title: false,
        description: false,
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

        <b class="badge badge-sm tooltip" data-tip="Відобразиться після публікації">
            [ 📦❓ Тип навчання ]
        </b>

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
            <div class="relative">
                <a :disabled="!Boolean(linkToForm)" :href="linkToForm" target="_blank"
                    class="btn btn-sm btn-primary">
                    Реєстрація
                    <x-assets.icons.button-icons.sign-up />
                </a>
                <button type="button" class="absolute right-[-7px] top-[-7px] cursor-pointer rounded-full bg-white"
                    x-on:click="linkToForm = Boolean(linkToForm) ? '' : (linkToForm = prompt('Додати форму за посиланням:', ''))">
                    <span x-show="!Boolean(linkToForm)">
                        <x-assets.icons.editor-buttons.add-svg />
                    </span>
                    <span x-show="Boolean(linkToForm)">
                        <x-assets.icons.editor-buttons.remove-svg />
                    </span>
                </button>
            </div>

            <a href="{{ "/education/" . $props["id"] }}" class="btn btn-sm btn-info">
                Графік занять
                <x-assets.icons.button-icons.schedule />
            </a>
        </div>
    </div>
</div>
