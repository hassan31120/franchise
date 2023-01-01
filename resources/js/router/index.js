import { createRouter, createWebHistory } from "vue-router";
import homePage from "../pages/HomePage.vue";
import usersPage from "../pages/usersPage.vue";
import add_userPage from "../pages/users/add_userPage.vue";
import countriesPage from "../pages/countries/countriesPage.vue";
import add_countryPage from "../pages/countries/add_countryPage.vue";

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
    {
        path: "/add_user",
        name: "add_user",
        component: add_userPage,
    },
    {
        path: "/countries",
        name: "countries",
        component: countriesPage,
    },
    {
        path: "/add_country",
        name: "add_country",
        component: add_countryPage,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
