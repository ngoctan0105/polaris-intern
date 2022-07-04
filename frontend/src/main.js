import { createApp } from 'vue'
import App from './App.vue'
import './index.css'
import 'flowbite';
import router from "./setup/router";

createApp(App)
    .use(router)
    .mount('#app')
