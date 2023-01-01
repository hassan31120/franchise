import { createRouter, createWebHistory } from "vue-router";
import homePage from "../pages/HomePage.vue";
import usersPage from "../pages/usersPage.vue";

const routes = [
    {
        path: "/",
        name: "home",
        component: homePage,
    },
    {
        path: "/users",
        name: "users",
        component: usersPage,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
