import { createRouter, createWebHistory } from "vue-router";

import ContactPage from "./pages/ContactPage.vue";
import AboutPage from "./pages/AboutPage.vue";
import Dashboard from "./components/Dashboard.vue";
import Users from "./components/Users.vue";



const routes = [
    {
        path: '/dashboard',
        name: 'Dashboard',
        component: Dashboard
    },
    {
        path: '/users',
        name: 'Users',
        component: Users
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
