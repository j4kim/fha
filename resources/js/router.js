import { createWebHistory, createRouter } from "vue-router";

import Dashboard from "./views/Dashboard.vue";

const routes = [
    {
        path: "/dashboard",
        component: Dashboard,
        name: "Dashboard",
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
