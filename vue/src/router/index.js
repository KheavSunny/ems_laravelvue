import { createRouter, createWebHistory } from "vue-router";
import DefaultLayout from "../components/DefaultLayout.vue";
import AuthLayout from "../components/AuthLayout.vue";
import store from "../store";
import Dashboard from "../views/Dashboard.vue";
import ViewEmployees from "../views/employees/ViewEmployees.vue";
import CreateEmployee from "../views/employees/CreateEmployee.vue";
import ViewAttendances from "../views/attendances/ViewAttendances.vue";
import ViewAttendanceRecords from "../views/attendances/ViewAttendanceRecords.vue";
import EditAttendanceRecords from "../views/attendances/EditAttendanceRecords.vue";
import CreateAttendance from "../views/attendances/CreateAttendance.vue";
import ViewPayments from "../views/payments/ViewPayments.vue";
import CreatePayment from "../views/payments/CreatePayment.vue";
import EditPayment from "../views/payments/EditPayment.vue";
import ViewLoans from "../views/loans/ViewLoans.vue";
import CreateLoan from "../views/loans/CreateLoan.vue";
import ViewLoanRecords from "../views/loans/ViewLoanRecords.vue";
import ViewDepartments from "../views/others/departments/ViewDepartments.vue";
import SaveDepartment from "../views/others/departments/SaveDepartment.vue";
import ViewCountries from "../views/others/country/ViewCountries.vue";
import CreateCountry from "../views/others/country/CreateCountry.vue";
import ViewStates from "../views/others/state/ViewStates.vue";
import CreateState from "../views/others/state/CreateState.vue";
import ViewCities from "../views/others/city/ViewCities.vue";
import CreateCity from "../views/others/city/CreateCity.vue";
import Login from "../views/Login.vue";
import Register from "../views/Register.vue";
import Nothing from "../components/Nothing.vue";

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
            },
            {
                path: "/employees",
                component: Nothing,
                children: [{
                        path: "views",
                        name: "ViewEmployees",
                        component: ViewEmployees,
                    },
                    {
                        path: "create",
                        name: "CreateEmployee",
                        component: CreateEmployee,
                    },
                    {
                        path: ":id",
                        name: "UpdateEmployee",
                        component: CreateEmployee,
                    },
                ],
            },
            {
                path: "/attendances",
                component: Nothing,
                children: [{
                        path: "views",
                        name: "ViewAttendances",
                        component: ViewAttendances,
                    },
                    {
                        path: "create",
                        name: "CreateAttendance",
                        component: CreateAttendance,
                    },
                    {
                        path: ":id",
                        name: "EditAttendanceRecords",
                        component: EditAttendanceRecords,
                    },
                    {
                        path: "records",
                        name: "ViewAttendanceRecords",
                        component: ViewAttendanceRecords,
                    },
                ],
            },
            {
                path: "/payments",
                component: Nothing,
                children: [{
                        path: "views",
                        name: "ViewPayments",
                        component: ViewPayments,
                    },
                    {
                        path: "create",
                        name: "CreatePayment",
                        component: CreatePayment,
                    },
                    {
                        path: ":id",
                        name: "EditPayment",
                        component: EditPayment,
                    },
                ],
            },
            {
                path: "/loans",
                component: Nothing,
                children: [{
                        path: "views",
                        name: "ViewLoans",
                        component: ViewLoans,
                    },
                    {
                        path: "create",
                        name: "CreateLoan",
                        component: CreateLoan,
                    },
                    {
                        path: ":id",
                        name: "UpdateLoan",
                        component: CreateLoan,
                    },
                    {
                        path: "records",
                        name: "ViewLoanRecords",
                        component: ViewLoanRecords,
                    },
                ],
            },
            {
                path: "/departments",
                component: Nothing,
                children: [{
                        path: "views",
                        name: "ViewDepartments",
                        component: ViewDepartments,
                    },
                    {
                        path: "create",
                        name: "CreateDepartment",
                        component: SaveDepartment,
                    },
                    {
                        path: ":id",
                        name: "UpdateDepartment",
                        component: SaveDepartment,
                    },
                ],
            },
            {
                path: "/countries",
                component: Nothing,
                children: [{
                        path: "views",
                        name: "ViewCountries",
                        component: ViewCountries,
                    },
                    {
                        path: "create",
                        name: "CreateCountry",
                        component: CreateCountry,
                    },
                    {
                        path: ":id",
                        name: "UpdateCountry",
                        component: CreateCountry,
                    },
                ],
            },
            {
                path: "/states",
                component: Nothing,
                children: [{
                        path: "views",
                        name: "ViewStates",
                        component: ViewStates,
                    },
                    {
                        path: "create",
                        name: "CreateState",
                        component: CreateState,
                    },
                    {
                        path: ":id",
                        name: "UpdateState",
                        component: CreateState,
                    },
                ],
            },
            {
                path: "/cities",
                component: Nothing,
                children: [{
                        path: "views",
                        name: "ViewCities",
                        component: ViewCities,
                    },
                    {
                        path: "create",
                        name: "CreateCity",
                        component: CreateCity,
                    },
                    {
                        path: ":id",
                        name: "UpdateCity",
                        component: CreateCity,
                    },
                ],
            },
        ],
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