import { createApp } from "vue";
import App from "./App.vue";
import "./index.css";
import "flowbite";
import router from "./setup/router";
import vue3GoogleLogin from "vue3-google-login";

const app = createApp(App);
app.use(router).mount("#app");
app.use(vue3GoogleLogin, {
  clientId:
    "731063662764-23tj67prilidnhov0hs65oehvgm80lp6.apps.googleusercontent.com",
});
