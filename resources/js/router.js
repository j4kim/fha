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
                component: () => import("./pages/Funds/index.vue"),
            },
            {
                path: ":id",
                component: () => import("./pages/Funds/Show.vue"),
                name: "FundsShow",
                props: true,
                meta: {
                    getBreadcrumbs: (fund) => {
                        return [
                            { text: "Funds", route: "/funds/" },
                            { text: fund.ref, route: `/funds/${fund.id}` },
                        ];
                    },
                },
            },
        ],
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
