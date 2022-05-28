import { createApp } from "vue";
import store from "./store";
import router from "./router";
import "./index.css";
import App from "./App.vue";
import "flowbite";

createApp(App).use(store).use(router).mount("#app");
