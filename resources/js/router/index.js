import LevelsComponent from '../components/page/levels/LevelsComponent.vue';
import HomeComponent from '../components/page/home/HomeComponent.vue';
import LessonComponent from '../components/page/lessons/LessonComponent.vue';
import LoginComponent from '../components/page/auth/LoginComponent.vue';
import RegisterComponent from '../components/page/auth/RegisterComponent.vue';
import WritingComponent from '../components/page/writing/WritingComponent.vue';
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
        meta: { requiresAuth: true }
    },
    {
        name: 'Home',
        path: '/',
        component: HomeComponent,
        meta: { requiresAuth: true }
    },
    {
        name: 'LessonDetail',
        path: '/lesson/:id',
        component: LessonComponent,
        meta: { requiresAuth: true }
    },
    {
        name: 'Writing',
        path: '/lesson/:lessonId/writing/:nodeId',
        component: WritingComponent,
        meta: { requiresAuth: true }
    },
];

const router = createRouter({
    history: createWebHashHistory(),
    routes,
})

export default router
