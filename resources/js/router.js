import { createWebHistory, createRouter } from "vue-router";

import Dashboard from "./views/Dashboard.vue";

const routes = [
    {
        path: "/dashboard",
        component: Dashboard,
        meta: { breadcrumbs: [{ text: "Dashboard", href: "/dashboard" }] },
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
