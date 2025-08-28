import axios from "axios";
import Alpine from "alpinejs";
import Clipboard from "@ryangjchandler/alpine-clipboard";
import { injectDataToForm, toRaw, isNotAnnouncementDay } from "./helpers.js";

window.injectDataToForm = injectDataToForm;
window.isNotAnnouncementDay = isNotAnnouncementDay;
window.toRaw = toRaw;
window.Alpine = Alpine;
window.axios = axios;

Alpine.plugin(Clipboard);

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
Alpine.start();
