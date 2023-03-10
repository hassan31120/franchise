import { createRouter, createWebHistory } from "vue-router";
import axios from "axios";
import homePage from "../pages/HomePage.vue";
import usersPage from "../pages/usersPage.vue";
import add_userPage from "../pages/users/add_userPage.vue";
import edit_userPage from "../pages/users/edit_userPage.vue";
import countriesPage from "../pages/countries/countriesPage.vue";
import add_countryPage from "../pages/countries/add_countryPage.vue";
import edit_countryPage from "../pages/countries/edit_countryPage.vue";
import catsPage from "../pages/cats/catsPage.vue";
import add_catPage from "../pages/cats/add_catPage.vue";
import edit_catPage from "../pages/cats/edit_catPage.vue";
import chancesPage from "../pages/chances/chancesPage.vue";
import add_chancePage from "../pages/chances/add_chancePage.vue";
import edit_chancePage from "../pages/chances/edit_chancePage.vue";
import show_chancePage from "../pages/chances/show_chancePage.vue";
import login from "../components/auth/login.vue";
import notiPage from "../pages/noti/notiPage.vue";
import error404 from "../components/errors/error404.vue";
import error500 from "../components/errors/error500.vue";
import settingsPage from "../pages/settings/settingsPage.vue";
import edit_settingsPage from "../pages/settings/edit_settingsPage.vue";
import about from "../components/settings/about.vue";
import terms from "../components/settings/terms.vue";
import support from "../components/settings/support.vue";
import privacy from "../components/settings/privacy.vue";
import contact from "../components/settings/contact.vue";
import adminsPage from "../pages/admins/adminsPage.vue";
import ordersPage from "../pages/orders/ordersPage.vue";
import add_adminPage from "../pages/admins/add_adminPage.vue";
import edit_adminPage from "../pages/admins/edit_adminPage.vue";
import articlesPage from "../pages/articles/articlesPage.vue";
import add_articlePage from "../pages/articles/add_articlePage.vue";
import edit_articlePage from "../pages/articles/edit_articlePage.vue";

const routes = [
    {
        path: "/",
        name: "home",
        component: homePage,
        beforeEnter: (to, from, next) => {
            axios
                .get(`api/authenticated`)
                .then(() => {
                    next();
                })
                .catch((err) => {
                    return next({ name: "login" });
                });
        },
    },
    {
        path: "/:catchAll(.*)*",
        name: "error404",
        component: error404,
    },
    {
        path: "/serverErr",
        name: "error500",
        component: error500,
    },
    {
        path: "/login",
        name: "login",
        component: login,
        beforeEnter: (to, from, next) => {
            axios
                .get(`api/authenticated`)
                .then(() => {
                    return next({ name: "home" });
                })
                .catch((err) => {
                    next();
                });
        },
    },
    {
        path: "/users",
        name: "users",
        component: usersPage,
        beforeEnter: (to, from, next) => {
            axios
                .get(`api/authenticated`)
                .then(() => {
                    next();
                })
                .catch((err) => {
                    return next({ name: "login" });
                });
        },
    },
    {
        path: "/add_user",
        name: "add_user",
        component: add_userPage,
        beforeEnter: (to, from, next) => {
            axios
                .get(`api/authenticated`)
                .then(() => {
                    next();
                })
                .catch((err) => {
                    return next({ name: "login" });
                });
        },
    },
    {
        path: "/countries",
        name: "countries",
        component: countriesPage,
        beforeEnter: (to, from, next) => {
            axios
                .get(`api/authenticated`)
                .then(() => {
                    next();
                })
                .catch((err) => {
                    return next({ name: "login" });
                });
        },
    },
    {
        path: "/add_country",
        name: "add_country",
        component: add_countryPage,
        beforeEnter: (to, from, next) => {
            axios
                .get(`api/authenticated`)
                .then(() => {
                    next();
                })
                .catch((err) => {
                    return next({ name: "login" });
                });
        },
    },
    {
        path: "/cats",
        name: "cats",
        component: catsPage,
        beforeEnter: (to, from, next) => {
            axios
                .get(`api/authenticated`)
                .then(() => {
                    next();
                })
                .catch((err) => {
                    return next({ name: "login" });
                });
        },
    },
    {
        path: "/add_cat",
        name: "add_cat",
        component: add_catPage,
        beforeEnter: (to, from, next) => {
            axios
                .get(`api/authenticated`)
                .then(() => {
                    next();
                })
                .catch((err) => {
                    return next({ name: "login" });
                });
        },
    },
    {
        path: "/chances",
        name: "chances",
        component: chancesPage,
        beforeEnter: (to, from, next) => {
            axios
                .get(`api/authenticated`)
                .then(() => {
                    next();
                })
                .catch((err) => {
                    return next({ name: "login" });
                });
        },
    },
    {
        path: "/add_chance",
        name: "add_chance",
        component: add_chancePage,
        beforeEnter: (to, from, next) => {
            axios
                .get(`api/authenticated`)
                .then(() => {
                    next();
                })
                .catch((err) => {
                    return next({ name: "login" });
                });
        },
    },
    {
        path: "/show/:id",
        name: "show_chance",
        component: show_chancePage,
        beforeEnter: (to, from, next) => {
            axios
                .get(`api/authenticated`)
                .then(() => {
                    next();
                })
                .catch(() => {
                    return next({ name: "login" });
                });
        },
    },
    {
        path: "/edit_chance/:id",
        name: "edit_chance",
        component: edit_chancePage,
        beforeEnter: (to, from, next) => {
            axios
                .get(`api/authenticated`)
                .then(() => {
                    next();
                })
                .catch(() => {
                    return next({ name: "login" });
                });
        },
    },
    {
        path: "/edit_country/:id",
        name: "edit_country",
        component: edit_countryPage,
        beforeEnter: (to, from, next) => {
            axios
                .get(`api/authenticated`)
                .then(() => {
                    next();
                })
                .catch(() => {
                    return next({ name: "login" });
                });
        },
    },
    {
        path: "/edit_cat/:id",
        name: "edit_cat",
        component: edit_catPage,
        beforeEnter: (to, from, next) => {
            axios
                .get(`api/authenticated`)
                .then(() => {
                    next();
                })
                .catch(() => {
                    return next({ name: "login" });
                });
        },
    },
    {
        path: "/edit_user/:id",
        name: "edit_user",
        component: edit_userPage,
        beforeEnter: (to, from, next) => {
            axios
                .get(`api/authenticated`)
                .then(() => {
                    next();
                })
                .catch(() => {
                    return next({ name: "login" });
                });
        },
    },
    {
        path: "/noti",
        name: "noti",
        component: notiPage,
        beforeEnter: (to, from, next) => {
            axios
                .get(`api/authenticated`)
                .then(() => {
                    next();
                })
                .catch((err) => {
                    return next({ name: "login" });
                });
        },
    },
    {
        path: "/settings",
        name: "settings",
        component: settingsPage,
        children: [
            {
                path: "/about",
                name: "about",
                component: about,
            },
            {
                path: "/contact",
                name: "contact",
                component: contact,
            },
            {
                path: "/privacy",
                name: "privacy",
                component: privacy,
            },
            {
                path: "/terms",
                name: "terms",
                component: terms,
            },
            {
                path: "/support",
                name: "support",
                component: support,
            },
        ],
        beforeEnter: (to, from, next) => {
            axios
                .get(`api/authenticated`)
                .then(() => {
                    next();
                })
                .catch((err) => {
                    return next({ name: "login" });
                });
        },
    },
    {
        path: "/edit_settings",
        name: "edit_settings",
        component: edit_settingsPage,
        beforeEnter: (to, from, next) => {
            axios
                .get(`api/authenticated`)
                .then(() => {
                    next();
                })
                .catch((err) => {
                    return next({ name: "login" });
                });
        },
    },
    {
        path: "/admins",
        name: "admins",
        component: adminsPage,
        beforeEnter: (to, from, next) => {
            axios
                .get(`api/authenticated`)
                .then(() => {
                    next();
                })
                .catch((err) => {
                    return next({ name: "login" });
                });
        },
    },
    {
        path: "/add_admin",
        name: "add_admin",
        component: add_adminPage,
        beforeEnter: (to, from, next) => {
            axios
                .get(`api/authenticated`)
                .then(() => {
                    next();
                })
                .catch((err) => {
                    return next({ name: "login" });
                });
        },
    },
    {
        path: "/edit_admin/:id",
        name: "edit_admin",
        component: edit_adminPage,
        beforeEnter: (to, from, next) => {
            axios
                .get(`api/authenticated`)
                .then(() => {
                    next();
                })
                .catch(() => {
                    return next({ name: "login" });
                });
        },
    },
    {
        path: "/articles",
        name: "articles",
        component: articlesPage,
        beforeEnter: (to, from, next) => {
            axios
                .get(`api/authenticated`)
                .then(() => {
                    next();
                })
                .catch((err) => {
                    return next({ name: "login" });
                });
        },
    },
    {
        path: "/add_article",
        name: "add_article",
        component: add_articlePage,
        beforeEnter: (to, from, next) => {
            axios
                .get(`api/authenticated`)
                .then(() => {
                    next();
                })
                .catch((err) => {
                    return next({ name: "login" });
                });
        },
    },
    {
        path: "/edit_article/:id",
        name: "edit_article",
        component: edit_articlePage,
        beforeEnter: (to, from, next) => {
            axios
                .get(`api/authenticated`)
                .then(() => {
                    next();
                })
                .catch(() => {
                    return next({ name: "login" });
                });
        },
    },
    {
        path: "/orders",
        name: "orders",
        component: ordersPage,
        beforeEnter: (to, from, next) => {
            axios
                .get(`api/authenticated`)
                .then(() => {
                    next();
                })
                .catch((err) => {
                    return next({ name: "login" });
                });
        },
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
