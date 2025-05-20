import axios from "axios";
import Alpine from "alpinejs";
import { injectDataToForm, toRaw } from "./helpers.js";

window.injectDataToForm = injectDataToForm;
window.toRaw = toRaw;
window.axios = axios;
window.Alpine = Alpine;

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
Alpine.start();
