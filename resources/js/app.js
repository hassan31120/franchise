import "./bootstrap";
import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import VueSweetalert2 from "vue-sweetalert2";
import "sweetalert2/dist/sweetalert2.min.css";
import { QuillEditor } from "@vueup/vue-quill";
import "@vueup/vue-quill/dist/vue-quill.snow.css";
import loadingPage from "./components/layouts/loading.vue";

createApp(App)
    .use(router)
    .use(VueSweetalert2)
    .component("QuillEditor", QuillEditor)
    .component("loadingPage", loadingPage)
    .mount("#app");
