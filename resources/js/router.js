import { createWebHistory, createRouter } from "vue-router";

const routes = [
    {
        path: "/",
        component: () => import("./pages/Dashboard.vue"),
        name: "Dashboard",
    },
    {
        path: "/funds/",
        children: [
            {
                path: "",
                name: "FundsIndex",
                component: () => import("./pages/Funds/Index.vue"),
            },
            {
                path: "create",
                name: "FundsCreate",
                component: () => import("./pages/Funds/Create.vue"),
            },
            {
                path: ":fundId",
                children: [
                    {
                        path: "",
                        component: () => import("./pages/Funds/Show.vue"),
                        name: "FundsShow",
                        props: true,
                        meta: {
                            getBreadcrumbs: (fund) => [
                                { text: "Funds", route: "/funds/" },
                                { text: fund.ref, route: `/funds/${fund.id}` },
                            ],
                        },
                    },
                    {
                        path: "lots/:lotId",
                        component: () => import("./pages/Lots/Show.vue"),
                        name: "LotsShow",
                        props: true,
                    },
                ],
            },
        ],
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
