import LevelsComponent from '../components/page/levels/LevelsComponent.vue';
import HomeComponent from '../components/page/home/HomeComponent.vue';
import LoginComponent from '../components/page/auth/LoginComponent.vue';
import RegisterComponent from '../components/page/auth/RegisterComponent.vue';
import { createRouter, createWebHashHistory } from "vue-router";

const routes = [
    {
        name: 'Login',
        path: '/login',
        component: LoginComponent
    },
    {
        name: 'Register',
        path: '/register',
        component: RegisterComponent
    },
    {
        name: 'Levels',
        path: '/level',
        component: LevelsComponent,
        meta: { requiresAuth: false }
    },
    {
        name: 'Home',
        path: '/',
        component: HomeComponent,
        meta: { requiresAuth: false }
    },
];

const router = createRouter({
    history: createWebHashHistory(),
    routes,
})

export default router
