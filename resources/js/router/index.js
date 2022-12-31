import { createRouter, createWebHistory } from "vue-router";
import homePage from "../pages/HomePage.vue";

const routes = [
    {
        path: "/",
        name: "home",
        component: homePage,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
