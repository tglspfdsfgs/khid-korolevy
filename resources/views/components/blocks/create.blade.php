@props(["text", "link"])

<a href="{{ $link }}"
    class="card lg:card-side bg-base-200 border-base-300 border-3 p-15 static mb-5 block border-dashed">
    <div class="">
        <svg class="mx-auto block size-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke-width="1.5" stroke="var(--color-base-content)" stroke-opacity="0.75">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
        </svg>

        <h2 class="text-base-content/75 mx-auto block w-[280px] text-lg font-bold">{{ $text }}</h2>
    </div>
</a>
