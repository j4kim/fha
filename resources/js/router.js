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
                        meta: {
                            getBreadcrumbs: (fund) => [
                                { text: "Funds", route: "/funds/" },
                                { text: fund.ref, route: `/funds/${fund.id}` },
                            ],
                            getMenu: (fund) => [
                                {
                                    text: "Update fund",
                                    route: `/funds/${fund.id}/update`,
                                },
                                {
                                    text: "Delete fund",
                                    route: `/funds/${fund.id}/delete`,
                                },
                            ],
                        },
                    },
                    {
                        path: "update",
                        component: () => import("./pages/Funds/Update.vue"),
                        name: "FundsUpdate",
                        meta: {
                            getBreadcrumbs: (fund) => [
                                { text: "Funds", route: "/funds/" },
                                { text: fund.ref, route: `/funds/${fund.id}` },
                                { text: "Update" },
                            ],
                            getMenu: (fund) => [
                                {
                                    text: "Delete fund",
                                    route: `/funds/${fund.id}/delete`,
                                },
                            ],
                        },
                    },
                    {
                        path: "delete",
                        component: () => import("./pages/Funds/Delete.vue"),
                        name: "FundsDelete",
                        meta: {
                            getBreadcrumbs: (fund) => [
                                { text: "Funds", route: "/funds/" },
                                { text: fund.ref, route: `/funds/${fund.id}` },
                                { text: "Delete" },
                            ],
                        },
                    },
                    {
                        path: "lots/:lotId",
                        component: () => import("./pages/Lots/Show.vue"),
                        name: "LotsShow",
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
