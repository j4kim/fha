import { createWebHistory, createRouter } from "vue-router";

import Dashboard from "./pages/Dashboard.vue";
import Funds from "./pages/Funds/index.vue";

const routes = [
    {
        path: "/",
        component: Dashboard,
        name: "Dashboard",
    },
    {
        path: "/funds/",
        component: Funds,
        name: "Funds",
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
