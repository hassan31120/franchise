import { createRouter, createWebHistory } from "vue-router";
import homePage from "../pages/HomePage.vue";
import usersPage from "../pages/usersPage.vue";
import add_userPage from "../pages/users/add_userPage.vue";
import countriesPage from "../pages/countries/countriesPage.vue";
import add_countryPage from "../pages/countries/add_countryPage.vue";
import catsPage from "../pages/cats/catsPage.vue";
import add_catPage from "../pages/cats/add_catPage.vue";
import chancesPage from "../pages/chances/chancesPage.vue";
import add_chancePage from "../pages/chances/add_chancePage.vue";
import login from "../components/auth/login.vue";
import notiPage from "../pages/noti/notiPage.vue";

const routes = [
    {
        path: "/",
        name: "home",
        component: homePage,
    },
    {
        path: "/login",
        name: "login",
        component: login,
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
    {
        path: "/cats",
        name: "cats",
        component: catsPage,
    },
    {
        path: "/add_cat",
        name: "add_cat",
        component: add_catPage,
    },
    {
        path: "/chances",
        name: "chances",
        component: chancesPage,
    },
    {
        path: "/add_chance",
        name: "add_chance",
        component: add_chancePage,
    },
    {
        path: "/noti",
        name: "noti",
        component: notiPage,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
