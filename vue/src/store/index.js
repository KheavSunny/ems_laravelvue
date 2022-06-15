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
        attendances: {
            data: [],
        },
        attendance_records: {
            data: [],
            links: [],
        },
        attendance_record: {
            data: [],
        },
        loans: {
            data: [],
        },
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
            let response;
            return axiosClient.get("/employees").then((res) => {
                commit("setEmployees", res.data);
                return res;
            });
        },
        getEmployee({ commit }, id) {
            return axiosClient.get(`/employees/${id}`).then((res) => {
                commit("setEmployees", res.data);
                return res;
            });
        },
        createEmployee({ commit }, data) {
            let response;
            if (data.id) {
                return axiosClient
                    .put(`/employees/${data.id}`, data)
                    .then((res) => {
                        commit("setEmployees", res.data);
                        return res;
                    });
            } else {
                return axiosClient.post("/employees", data).then((res) => {
                    commit("setEmployees", res.data);
                    return res;
                });
            }
            return response;
        },
        deleteEmployee({ commit }, id) {
            return axiosClient.delete(`/employees/${id}`);
        },
        getDepartments({ commit }) {
            return axiosClient.get("/departments").then((res) => {
                commit("setDepartments", res.data);
                return res;
            });
        },

        getDepartment({ commit }, id) {
            return axiosClient.get(`/departments/${id}`).then((res) => {
                commit("setDepartments", res.data);
                return res;
            });
        },
        saveDepartment({ commit }, data) {
            let response;
            if (data.id) {
                response = axiosClient
                    .put(`/departments/${data.id}`, data)
                    .then((res) => {
                        commit("setDepartments", res.data);
                        return res;
                    });
            } else {
                response = axiosClient
                    .post("/departments", data)
                    .then((res) => {
                        commit("setDepartments", res.data);
                        return res;
                    });
            }

            return response;
        },

        deleteDepartment({ commit }, id) {
            return axiosClient.delete(`/departments/${id}`);
        },

        getCountries({ commit }) {
            return axiosClient.get("/countries").then((res) => {
                commit("setCountries", res.data);
                return res;
            });
        },
        getCountry({ commit }, id) {
            return axiosClient.get(`/countries/${id}`).then((res) => {
                commit("setCountries", res.data);
                return res;
            });
        },
        createCountry({ commit }, data) {
            let response;
            if (data.id) {
                response = axiosClient
                    .put(`/countries/${data.id}`, data)
                    .then((res) => {
                        commit("setCountries", res.data);
                        return res;
                    });
            } else {
                response = axiosClient.post("/countries", data).then((res) => {
                    commit("setCountries", res.data);
                    return res;
                });
            }
            return response;
        },
        deleteCountry({ commit }, id) {
            return axiosClient.delete(`/countries/${id}`);
        },
        getStates({ commit }) {
            return axiosClient.get("/states").then((res) => {
                commit("setStates", res.data);
                return res;
            });
        },
        getState({ commit }, id) {
            return axiosClient.get(`/states/${id}`).then((res) => {
                commit("setStates", res.data);
                return res;
            });
        },
        createState({ commit }, data) {
            let response;
            if (data.id) {
                response = axiosClient
                    .put(`/states/${data.id}`, data)
                    .then((res) => {
                        commit("setStates", res.data);
                        return res;
                    });
            } else {
                response = axiosClient.post("/states", data).then((res) => {
                    commit("setStates", res.data);
                    return res;
                });
            }

            return response;
        },
        deleteState({ commit }, id) {
            return axiosClient.delete(`/states/${id}`);
        },
        getCities({ commit }) {
            return axiosClient.get("/cities").then((res) => {
                commit("setCities", res.data);
                return res;
            });
        },
        getCity({ commit }, id) {
            return axiosClient.get(`/cities/${id}`).then((res) => {
                commit("setCities", res.data);
                return res;
            });
        },
        createCity({ commit }, data) {
            let response;

            if (data.id) {
                return axiosClient
                    .put(`/cities/${data.id}`, data)
                    .then((res) => {
                        commit("setCities", res.data);
                        return res;
                    });
            } else {
                return axiosClient.post("/cities", data).then((res) => {
                    commit("setCities", res.data);
                    return res;
                });
            }
        },
        deleteCity({ commit }, id) {
            return axiosClient.delete(`/cities/${id}`);
        },
        getAttendances({ commit }) {
            return axiosClient.get("/attendances").then((res) => {
                commit("setAttendances", res.data);
                return res;
            });
        },
        createAttendance({ commit }, data) {
            return axiosClient.post("/attendances", data).then((res) => {
                commit("setAttendances", res.data);
                return res;
            });
        },
        getAttendanceRecords({ commit }, { url = null } = {}) {
            url = url || "/attendance-records";
            return axiosClient.get(url).then((res) => {
                commit("setAttendanceRecords", res.data);
                return res;
            });
        },
        getAttendanceRecord({ commit }, id) {
            return axiosClient.get(`/attendance-records/${id}`).then((res) => {
                commit("setAttendanceRecord", res.data);
                return res;
            });
        },
        saveAttendanceRecord({ commit }, data) {
            return axiosClient
                .put(`/attendance-records/${data.id}`, data)
                .then((res) => {
                    commit("setAttendanceRecord", res.data);
                    return res;
                });
        },
        deleteAttendanceRecord({ commit }, id) {
            return axiosClient.delete(`/attendance-records/${id}`);
        },
        getLoans({ commit }) {
            return axiosClient.get("/loans").then((res) => {
                commit("setLoans", res.data);
                return res;
            });
        },
        getLoan({ commit }, id) {
            return axiosClient.get(`/loans/${id}`).then((res) => {
                commit("setLoans", res.data);
                return res;
            });
        },
        saveLoan({ commit }, data) {
            let response;

            if (data.id) {
                response = axiosClient
                    .put(`/loans/${data.id}`, data)
                    .then((res) => {
                        commit("setLoans", res.data);
                        return res;
                    });
            } else {
                response = axiosClient.post("/loans", data).then((res) => {
                    commit("setLoans", res.data);
                    return res;
                });
            }

            return response;
        },
        deleteLoan({ commit }, id) {
            return axiosClient.delete(`/loans/${id}`);
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
        setAttendances(state, data) {
            state.attendances.data = data.data;
        },
        setAttendanceRecords(state, data) {
            state.attendance_records.data = data.data;
            state.attendance_records.links = data.meta.links;
        },
        setAttendanceRecord(state, data) {
            state.attendance_record.data = data.data;
        },
        setLoans(state, data) {
            state.loans.data = data.data;
        },
    },
    modules: {},
});

export default store;