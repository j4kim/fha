import { createWebHistory, createRouter } from "vue-router";

const routes = [
    {
        path: "/",
        component: () => import("./pages/Dashboard.vue"),
    },
    {
        path: "/funds/",
        children: [
            {
                path: "",
                component: () => import("./pages/Funds/Index.vue"),
            },
            {
                path: "create",
                component: () => import("./pages/Funds/Create.vue"),
            },
            {
                path: ":fundId",
                children: [
                    {
                        path: "",
                        component: () => import("./pages/Funds/Show.vue"),
                    },
                    {
                        path: "update",
                        component: () => import("./pages/Funds/Update.vue"),
                    },
                    {
                        path: "delete",
                        component: () => import("./pages/Funds/Delete.vue"),
                    },
                    {
                        path: "lots/:lotId",
                        component: () => import("./pages/Lots/Show.vue"),
                    },
                ],
            },
        ],
    },
    {
        path: "/:pathMatch(.*)*",
        name: "NotFound",
        component: () => import("./pages/NotFound.vue"),
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
