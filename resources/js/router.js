import { createWebHistory,  createRouter } from "vue-router";

import login from '../views/pages/login.vue';
import register from '../views/pages/register.vue';
import dashboard from '../views/pages/dashboard.vue';
import products from '../views/pages/products.vue';

const routes = [
    { path : '/', name: 'Home', component : login},
    { path : '/login', name: 'Login', component : login},
    { path : '/register', name: 'Register', component : register},
    { path : '/dashboard', name: 'Dashboard', component : dashboard},
    { path : '/products', name: 'Products', component : products},
];

const router = createRouter({
    history : createWebHistory(),
    routes
});

export default router;