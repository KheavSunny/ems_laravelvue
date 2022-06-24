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
            links: [],
        },
        employee: {
            data: [],
        },
        departments: {
            data: [],
            links: [],
        },
        department: {
            data: [],
        },
        countries: {
            data: [],
            links: [],
        },
        country: {
            data: [],
        },
        states: {
            data: [],
            links: [],
        },
        state: {
            data: [],
        },
        cities: {
            data: [],
            links: [],
        },
        city: {
            data: [],
        },
        currentUser: { data: {} },
        attendances: {
            data: [],
            links: [],
        },
        attendance: {
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
            links: [],
        },
        loan: {
            data: [],
        },
        payments: {
            data: [],
            links: [],
        },
        payment: {
            data: [],
        },
        loans_details: {
            data: [],
            links: [],
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
        getEmployees({ commit }, { url = null } = {}) {
            url = url || "/employees";
            return axiosClient.get(url).then((res) => {
                commit("setEmployees", res.data);
                return res;
            });
        },
        getEmployee({ commit }, id) {
            return axiosClient.get(`/employees/${id}`).then((res) => {
                commit("setEmployee", res.data);
                return res;
            });
        },
        createEmployee({ commit }, data) {
            let response;
            if (data.id) {
                return axiosClient
                    .put(`/employees/${data.id}`, data)
                    .then((res) => {
                        commit("setEmployee", res.data);
                        return res;
                    });
            } else {
                return axiosClient.post("/employees", data).then((res) => {
                    commit("setEmployee", res.data);
                    return res;
                });
            }
            return response;
        },
        deleteEmployee({ commit }, id) {
            return axiosClient.delete(`/employees/${id}`);
        },
        getDepartments({ commit }, { url = null } = {}) {
            url = url || "/departments";
            return axiosClient.get(url).then((res) => {
                commit("setDepartments", res.data);
                return res;
            });
        },
        getDepartment({ commit }, id) {
            return axiosClient.get(`/departments/${id}`).then((res) => {
                commit("setDepartment", res.data);
                return res;
            });
        },
        saveDepartment({ commit }, data) {
            let response;
            if (data.id) {
                response = axiosClient
                    .put(`/departments/${data.id}`, data)
                    .then((res) => {
                        commit("setDepartment", res.data);
                        return res;
                    });
            } else {
                response = axiosClient
                    .post("/departments", data)
                    .then((res) => {
                        commit("setDepartment", res.data);
                        return res;
                    });
            }

            return response;
        },
        deleteDepartment({ commit }, id) {
            return axiosClient.delete(`/departments/${id}`);
        },
        getCountries({ commit }, { url = null } = {}) {
            url = url || "/countries";
            return axiosClient.get(url).then((res) => {
                commit("setCountries", res.data);
                return res;
            });
        },
        getCountry({ commit }, id) {
            return axiosClient.get(`/countries/${id}`).then((res) => {
                commit("setCountry", res.data);
                return res;
            });
        },
        createCountry({ commit }, data) {
            let response;
            if (data.id) {
                response = axiosClient
                    .put(`/countries/${data.id}`, data)
                    .then((res) => {
                        commit("setCountry", res.data);
                        return res;
                    });
            } else {
                response = axiosClient.post("/countries", data).then((res) => {
                    commit("setCountry", res.data);
                    return res;
                });
            }
            return response;
        },
        deleteCountry({ commit }, id) {
            return axiosClient.delete(`/countries/${id}`);
        },
        getStates({ commit }, { url = null } = {}) {
            url = url || "/states";
            return axiosClient.get(url).then((res) => {
                commit("setStates", res.data);
                return res;
            });
        },
        getState({ commit }, id) {
            return axiosClient.get(`/states/${id}`).then((res) => {
                commit("setState", res.data);
                return res;
            });
        },
        createState({ commit }, data) {
            let response;
            if (data.id) {
                response = axiosClient
                    .put(`/states/${data.id}`, data)
                    .then((res) => {
                        commit("setState", res.data);
                        return res;
                    });
            } else {
                response = axiosClient.post("/states", data).then((res) => {
                    commit("setState", res.data);
                    return res;
                });
            }

            return response;
        },
        deleteState({ commit }, id) {
            return axiosClient.delete(`/states/${id}`);
        },
        getCities({ commit }, { url = null } = {}) {
            url = url || "/cities";
            return axiosClient.get(url).then((res) => {
                commit("setCities", res.data);
                return res;
            });
        },
        getCity({ commit }, id) {
            return axiosClient.get(`/cities/${id}`).then((res) => {
                commit("setCity", res.data);
                return res;
            });
        },
        createCity({ commit }, data) {
            let response;

            if (data.id) {
                return axiosClient
                    .put(`/cities/${data.id}`, data)
                    .then((res) => {
                        commit("setCity", res.data);
                        return res;
                    });
            } else {
                return axiosClient.post("/cities", data).then((res) => {
                    commit("setCity", res.data);
                    return res;
                });
            }
        },
        deleteCity({ commit }, id) {
            return axiosClient.delete(`/cities/${id}`);
        },
        getAttendances({ commit }, { url = null } = {}) {
            url = url || "/attendances";
            return axiosClient.get(url).then((res) => {
                commit("setAttendances", res.data);
                return res;
            });
        },
        getAttendance({ commit }, id) {
            return axiosClient.get(`/attendances/${id}`).then((res) => {
                commit("setAttendance", res.data);
                return res;
            });
        },
        createAttendance({ commit }, data) {
            return axiosClient.post("/attendances", data).then((res) => {
                commit("setAttendance", res.data);
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
        getLoans({ commit }, { url = null } = {}) {
            url = url || "/loans";
            return axiosClient.get(url).then((res) => {
                commit("setLoans", res.data);
                return res;
            });
        },
        getLoan({ commit }, id) {
            return axiosClient.get(`/loans/${id}`).then((res) => {
                commit("setLoan", res.data);
                return res;
            });
        },
        saveLoan({ commit }, data) {
            let response;

            if (data.id) {
                response = axiosClient
                    .put(`/loans/${data.id}`, data)
                    .then((res) => {
                        commit("setLoan", res.data);
                        return res;
                    });
            } else {
                response = axiosClient.post("/loans", data).then((res) => {
                    commit("setLoan", res.data);
                    return res;
                });
            }

            return response;
        },
        deleteLoan({ commit }, id) {
            return axiosClient.delete(`/loans/${id}`);
        },
        getPayments({ commit }, { url = null } = {}) {
            url = url || "/payments";
            return axiosClient.get(url).then((res) => {
                commit("setPayments", res.data);
                return res;
            });
        },
        getPayment({ commit }, id) {
            return axiosClient.get(`/payments/${id}`).then((res) => {
                commit("setPayment", res.data);
                return res;
            });
        },
        savePayment({ commit }, data) {
            let response;
            if (data.id) {
                response = axiosClient
                    .put(`/payments/${data.id}`, data)
                    .then((res) => {
                        commit("setPayment", res.data);
                        return res;
                    });
            } else {
                response = axiosClient.post("/payments", data).then((res) => {
                    commit("setPayment", res.data);
                    return res;
                });
            }
        },
        deletePayment({ commit }, id) {
            return axiosClient.delete(`/payments/${id}`);
        },
        changeToPaid({ commit }, data) {
            return axiosClient
                .put(`/payments/${data.id}/paid`, data)
                .then((res) => {
                    commit("setPayment", res.data);
                    return res;
                });
        },
        getLoanDetails({ commit }, { url = null } = {}) {
            url = url || "/loan-details";
            return axiosClient.get(url).then((res) => {
                commit("setLoanDetails", res.data);
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
            state.employees.links = data.meta.links;
            state.employees.data = data.data;
        },
        setEmployee(state, data) {
            state.employee.data = data.data;
        },
        setDepartments(state, data) {
            state.departments.links = data.meta.links;
            state.departments.data = data.data;
        },
        setDepartment(state, data) {
            state.department.data = data.data;
        },
        setCountries(state, data) {
            state.countries.links = data.meta.links;
            state.countries.data = data.data;
        },
        setCountry(state, data) {
            state.country.data = data.data;
        },
        setStates(state, data) {
            state.states.links = data.meta.links;
            state.states.data = data.data;
        },
        setState(state, data) {
            state.state.data = data.data;
        },
        setCities(state, data) {
            state.cities.links = data.meta.links;
            state.cities.data = data.data;
        },
        setCity(state, data) {
            state.city.data = data.data;
        },
        setAttendances(state, data) {
            state.attendances.links = data.meta.links;
            state.attendances.data = data.data;
        },
        setAttendance(state, data) {
            state.attendance.data = data.data;
        },
        setAttendanceRecords(state, data) {
            state.attendance_records.links = data.meta.links;
            state.attendance_records.data = data.data;
        },
        setAttendanceRecord(state, data) {
            state.attendance_record.data = data.data;
        },
        setLoans(state, data) {
            state.loans.links = data.meta.links;
            state.loans.data = data.data;
        },
        setLoan(state, data) {
            state.loan.data = data.data;
        },
        setPayments(state, data) {
            state.payments.links = data.meta.links;
            state.payments.data = data.data;
        },
        setPayment(state, data) {
            state.payment.data = data.data;
        },
        setLoanDetails(state, data) {
            state.loans_details.links = data.meta.links;
            state.loans_details.data = data.data;
        },
    },
    modules: {},
});

export default store;