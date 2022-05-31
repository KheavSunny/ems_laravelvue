import { createStore } from "vuex";
import axiosClient from "../axios";

const store = createStore({
    state: {
        sideBarOpen: false,
        user: {
            data: {},
            token: sessionStorage.getItem("TOKEN"),
        },
        employees: {
            data: [],
        },
        departments: {
            data: [],
        },
        countries: {
            data: [],
        },
        states: {
            data: [],
        },
        cities: {
            data: [],
        },
        currentUser: { data: {} },
    },
    getters: {
        sideBarOpen: (state) => {
            return state.sideBarOpen;
        },
    },
    actions: {
        toggleSidebar(context) {
            context.commit("toggleSidebar");
        },
        register({ commit }, user) {
            return axiosClient.post("/register", user).then(({ data }) => {
                commit("setUser", data);
                return data;
            });
        },
        login({ commit }, user) {
            return axiosClient.post("/login", user).then(({ data }) => {
                commit("setUser", data);
                return data;
            });
        },
        logout({ commit }) {
            return axiosClient.post("/logout").then((response) => {
                commit("logout");
                return response;
            });
        },
        getOneUser({ commit }) {
            return axiosClient.get("/user").then((response) => {
                commit("setCurrentUser", response.data);
                return response;
            });
        },
        getEmployees({ commit }) {
            return axiosClient.get("/employees").then((res) => {
                commit("setEmployees", res.data);
                return res;
            });
        },
        createEmployee({ commit }, data) {
            return axiosClient.post("/employees", data).then((res) => {
                commit("setEmployees", res.data);
                return res;
            });
        },
        updateEmployee({ commit }, data) {
            return axiosClient
                .put(`/employees/${data.id}`, data)
                .then((res) => {
                    commit("setEmployees", res.data);
                    return res;
                });
        },
        getDepartments({ commit }) {
            return axiosClient.get("/departments").then((res) => {
                commit("setDepartments", res.data);
                return res;
            });
        },

        createDepartment({ commit }, data) {
            return axiosClient.post("/departments", data).then((res) => {
                commit("setDepartments", res.data);
                return res;
            });
        },

        getCountries({ commit }) {
            return axiosClient.get("/countries").then((res) => {
                commit("setCountries", res.data);
                return res;
            });
        },
        createCountry({ commit }, data) {
            return axiosClient.post("/countries", data).then((res) => {
                commit("setCountries", res.data);
                return res;
            });
        },
        getStates({ commit }) {
            return axiosClient.get("/states").then((res) => {
                commit("setStates", res.data);
                return res;
            });
        },
        createState({ commit }, data) {
            return axiosClient.post("/states", data).then((res) => {
                commit("setStates", res.data);
                return res;
            });
        },
        getCities({ commit }) {
            return axiosClient.get("/cities").then((res) => {
                commit("setCities", res.data);
                return res;
            });
        },
        createCity({ commit }, data) {
            return axiosClient.post("/cities", data).then((res) => {
                commit("setCities", res.data);
                return res;
            });
        },
    },
    mutations: {
        toggleSidebar(state) {
            state.sideBarOpen = !state.sideBarOpen;
        },
        logout: (state) => {
            state.user.token = null;
            state.user.data = {};
            sessionStorage.removeItem("TOKEN");
        },
        setUser: (state, userData) => {
            state.user.token = userData.token;
            state.user.data = userData.user;
            sessionStorage.setItem("TOKEN", userData.token);
        },
        setCurrentUser(state, data) {
            state.currentUser.data = data;
        },
        setEmployees(state, data) {
            state.employees.data = data.data;
        },
        setDepartments(state, data) {
            state.departments.data = data.data;
        },
        setCountries(state, data) {
            state.countries.data = data.data;
        },
        setStates(state, data) {
            state.states.data = data.data;
        },
        setCities(state, data) {
            state.cities.data = data.data;
        },
    },
    modules: {},
});

export default store;
