import { createRouter, createWebHistory } from "vue-router";
import HomePage from "./pages/HomePage.vue";
import ContactPage from "./pages/ContactPage.vue";
import AboutPage from "./pages/AboutPage.vue";
const routes = [
    {
        path: '/',
        name: 'Home',
        component: HomePage
    },
    {
        path: '/contact',
        name: 'Contact',
        component: ContactPage
    },
    {
        path: '/about',
        name: 'About',
        component: AboutPage
    },
]



const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});


export default router;
