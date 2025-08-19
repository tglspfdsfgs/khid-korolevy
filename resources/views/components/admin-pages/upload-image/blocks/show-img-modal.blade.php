<dialog id="show_img" class="modal">
    <div class="modal-box w-auto">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <div>
            <img class="mx-auto h-auto max-w-full cursor-pointer rounded-lg" x-ref="showImage" data-clipboard=""
                src=""
                @click="
                         $clipboard($refs.showImage.getAttribute('data-clipboard'));
                         toggleCBToast();" />
        </div>
        <div x-show="openCBToast"
            x-effect="if(openCBToast) {
                            const timer = setTimeout(() => openCBToast = false, 2000);
                            return () => clearTimeout(timer);
                        }"
            class="toast toast-top toast-center">
            <div class="alert alert-success">
                <span>✓ URL зображення скопійовано</span>
            </div>
        </div>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>
