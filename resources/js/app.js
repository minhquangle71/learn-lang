// app.js

import { createApp } from "vue"

import App from './App.vue'
import router from "./router"
import store from "./store";
import './interception'

// Package
import ToastPlugin from "vue-toast-notification";
import VueAwesomePaginate  from "vue-awesome-paginate";


const app = createApp(App)
app.use(store)
    .use(router)
    .use(ToastPlugin, {
        position: 'top-right'
    })
    .use(VueAwesomePaginate)
    .mount('#app')

import './plugin/menu'
