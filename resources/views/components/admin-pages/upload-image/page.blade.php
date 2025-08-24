@props(["mainFolder", "inner"])

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
        <x-admin-pages.upload-image.blocks.add-image :$mainFolder />
        @foreach ($inner["data"] as $image)
            <x-admin-pages.upload-image.blocks.image :$image />
        @endforeach
        <x-admin-pages.upload-image.blocks.pagnation :paginator='$inner["paginator"]' />
    </span>
</form>
