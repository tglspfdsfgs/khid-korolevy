@props(["mainFolder", "inner"])

@php
    use App\Helpers;
    $paginator = null;
@endphp

<form x-data="{ loading: false, openInners: {}, }" class="relative" action='{{ route("upload-image.show", ["mainFolder" => $mainFolder]) }}'
    method="get"
    @submit.prevent="() => {
        loading = true;

        const url = new URL($el.action, window.location.origin);
        url.searchParams.set('page', $event.submitter.value);

        (async () => {
          try {
            const response = await fetch(url, {
              headers: { 'X-Requested-With': 'XMLHttpRequest' }
            });

            const data = await response.json();
            $el.innerHTML = data.html;

          } catch (err) {
            console.error('Loading error:', err);
          } finally {
            loading = false;
          }
        })();

    }">
    <span class="loading loading-spinner text-info absolute left-1/2 top-1/2" x-cloak x-show="loading"></span>
    <span :class="{ 'blur-sm': loading, 'pointer-events-none': loading }">
        @if (empty($inner) || array_key_exists("__data", $inner))
            <x-admin-pages.upload-image.blocks.add-image :$mainFolder />
            @php
                $paginator = Helpers::extractPaginator($inner);
            @endphp
            @if (!empty($inner))
                @foreach ($inner["__data"] as $image)
                    <x-admin-pages.upload-image.blocks.image :$image />
                @endforeach
            @endif
            <x-admin-pages.upload-image.blocks.pagnation :$paginator />
            @php
                $paginator = null;
            @endphp
        @else
            @php
                $paginator = Helpers::extractPaginator($inner);
            @endphp
            @foreach ($inner as $innerFolder => $content)
                <div x-data>
                    <span class="ml-2 inline-block select-none text-lg">|</span>
                    <x-assets.icons.admin-icons.upload-img.inner-folder open="openInners[`{{ $innerFolder }}`]" />
                    <span @click.self="openInners[`{{ $innerFolder }}`] = !openInners[`{{ $innerFolder }}`];">
                        {{ $innerFolder }}
                    </span>
                    <div x-show="openInners[`{{ $innerFolder }}`]" x-cloak class="flex flex-col">
                        <x-admin-pages.upload-image.blocks.add-image :$mainFolder :$innerFolder />
                        @foreach ($content as $image)
                            <x-admin-pages.upload-image.blocks.image :$image />
                        @endforeach
                    </div>
                </div>
            @endforeach
            <x-admin-pages.upload-image.blocks.pagnation :$paginator />
            @php
                $paginator = null;
            @endphp
        @endif
    </span>
</form>
