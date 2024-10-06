import { createWebHistory, createRouter } from "vue-router";

const Dashboard = {
    path: "/",
    component: () => import("./pages/Dashboard.vue"),
    name: "Dashboard",
};

const FundsIndex = {
    path: "/funds/",
    component: () => import("./pages/Funds/index.vue"),
    name: "FundsIndex",
};

const FundsShow = {
    path: "/funds/:id",
    component: () => import("./pages/Funds/Show.vue"),
    name: "FundsShow",
    props: true,
    meta: { parent: FundsIndex },
};

const router = createRouter({
    history: createWebHistory(),
    routes: [Dashboard, FundsIndex, FundsShow],
});

export default router;
