export function injectDataToForm(form, data, CSRF_token = true) {
    Object.entries(data).forEach(([key, value]) => {
        const input = document.createElement("input");
        input.type = "hidden";
        input.name = key;
        input.value = value;
        form.appendChild(input);
    });

    if (CSRF_token) {
        const token = document.querySelector('meta[name="csrf-token"]').content;
        injectDataToForm(form, { _token: token }, false);
    }
}
export let toRaw = (reactiveObject) => JSON.parse(JSON.stringify(reactiveObject));
