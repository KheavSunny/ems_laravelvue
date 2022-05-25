import { createRouter, createWebHistory } from "vue-router";
import DefaultLayout from "../components/DefaultLayout.vue";
import AuthLayout from "../components/AuthLayout.vue";
import store from "../store";
import Dashboard from "../views/Dashboard.vue";
import Login from "../views/Login.vue";
import Register from "../views/Register.vue";

const routes = [{
        path: "/",
        redirect: "/dashboard",
        name: "Dashboard",
        meta: { requireAuth: true },
        component: DefaultLayout,
        children: [{
            path: "/dashboard",
            name: "Dashboard",
            component: Dashboard,
        }, ],
    },
    {
        path: "/login",
        redirect: "/login",
        name: "Login",
        component: AuthLayout,
        children: [{
                path: "/login",
                name: "Login",
                component: Login,
            },
            {
                path: "/register",
                name: "Register",
                component: Register,
            },
        ],
    },
];
const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach((to, from, next) => {
    if (to.meta.requireAuth && !store.state.user.token) {
        next({ name: "Login" });
    } else if (
        store.state.user.token &&
        (to.name === "Login" || to.name === "Register")
    ) {
        next({ name: "Dashboard" });
    } else {
        next();
    }
});

export default router;
