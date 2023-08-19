// app.js

import { createApp } from "vue"

import App from './App.vue'
import router from "./router"
import store from "./store";
import './interception'
import ToastPlugin from "vue-toast-notification";

const app = createApp(App)
app.use(store)
    .use(router)
    .use(ToastPlugin, {
        position: 'top-right'
    })
    .mount('#app')

import './plugin/menu'
