import axios from "axios";
import Alpine from "alpinejs";
import { injectDataToForm, toRaw, isNotAnnouncementDay } from "./helpers.js";

window.injectDataToForm = injectDataToForm;
window.isNotAnnouncementDay = isNotAnnouncementDay;
window.toRaw = toRaw;
window.axios = axios;
window.Alpine = Alpine;

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
Alpine.start();
