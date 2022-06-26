<template>
  <div>
    <div class="text-5xl">
      {{ route.params.id ? employee.firstname : "Create Employee" }}
    </div>
    <div class="mt-6 p-20 bg-white shadow-xl rounded-xl">
      <form @submit.prevent="createEmployee">
        <div class="grid xl:gap-6">
          <div class="relative z-0 w-full mb-6 group">
            <input
              type="text"
              name="floating_first_name"
              id="floating_first_name"
              class="
                block
                py-2.5
                px-0
                w-full
                text-sm text-gray-900
                bg-transparent
                border-0 border-b-2 border-blue-400
                appearance-none
                dark:text-white dark:border-gray-600 dark:focus:border-blue-500
                focus:outline-none focus:ring-0 focus:border-blue-600
                peer
              "
              placeholder=" "
              required=""
              v-model="employee.firstname"
            />
            <label
              for="floating_first_name"
              class="
                peer-focus:font-medium
                absolute
                text-sm text-gray-500
                dark:text-gray-400
                duration-300
                transform
                -translate-y-6
                scale-75
                top-3
                -z-10
                origin-[0]
                peer-focus:left-0
                peer-focus:text-blue-600
                peer-focus:dark:text-blue-500
                peer-placeholder-shown:scale-100
                peer-placeholder-shown:translate-y-0
                peer-focus:scale-75 peer-focus:-translate-y-6
              "
              >First name <span class="text-red-500">*</span></label
            >
          </div>
          <div class="relative z-0 w-full mb-6 group">
            <input
              type="text"
              name="floating_last_name"
              id="floating_last_name"
              class="
                block
                py-2.5
                px-0
                w-full
                text-sm text-gray-900
                bg-transparent
                border-0 border-b-2 border-blue-400
                appearance-none
                dark:text-white dark:border-gray-600 dark:focus:border-blue-500
                focus:outline-none focus:ring-0 focus:border-blue-600
                peer
              "
              placeholder=" "
              v-model="employee.middlename"
            />
            <label
              for="floating_last_name"
              class="
                peer-focus:font-medium
                absolute
                text-sm text-gray-500
                dark:text-gray-400
                duration-300
                transform
                -translate-y-6
                scale-75
                top-3
                -z-10
                origin-[0]
                peer-focus:left-0
                peer-focus:text-blue-600
                peer-focus:dark:text-blue-500
                peer-placeholder-shown:scale-100
                peer-placeholder-shown:translate-y-0
                peer-focus:scale-75 peer-focus:-translate-y-6
              "
              >Middle name</label
            >
          </div>
          <div class="relative z-0 w-full mb-6 group">
            <input
              type="text"
              name="floating_last_name"
              id="floating_last_name"
              class="
                block
                py-2.5
                px-0
                w-full
                text-sm text-gray-900
                bg-transparent
                border-0 border-b-2 border-blue-400
                appearance-none
                dark:text-white dark:border-gray-600 dark:focus:border-blue-500
                focus:outline-none focus:ring-0 focus:border-blue-600
                peer
              "
              placeholder=" "
              required=""
              v-model="employee.lastname"
            />
            <label
              for="floating_last_name"
              class="
                peer-focus:font-medium
                absolute
                text-sm text-gray-500
                dark:text-gray-400
                duration-300
                transform
                -translate-y-6
                scale-75
                top-3
                -z-10
                origin-[0]
                peer-focus:left-0
                peer-focus:text-blue-600
                peer-focus:dark:text-blue-500
                peer-placeholder-shown:scale-100
                peer-placeholder-shown:translate-y-0
                peer-focus:scale-75 peer-focus:-translate-y-6
              "
              >Last name <span class="text-red-700">*</span></label
            >
          </div>
          <div class="relative z-0 w-full mb-6 group">
            <input
              type="text"
              name="floating_last_name"
              id="floating_last_name"
              class="
                block
                py-2.5
                px-0
                w-full
                text-sm text-gray-900
                bg-transparent
                border-0 border-b-2 border-blue-400
                appearance-none
                dark:text-white dark:border-gray-600 dark:focus:border-blue-500
                focus:outline-none focus:ring-0 focus:border-blue-600
                peer
              "
              placeholder=" "
              required=""
              v-model="employee.phone"
            />
            <label
              for="floating_last_name"
              class="
                peer-focus:font-medium
                absolute
                text-sm text-gray-500
                dark:text-gray-400
                duration-300
                transform
                -translate-y-6
                scale-75
                top-3
                -z-10
                origin-[0]
                peer-focus:left-0
                peer-focus:text-blue-600
                peer-focus:dark:text-blue-500
                peer-placeholder-shown:scale-100
                peer-placeholder-shown:translate-y-0
                peer-focus:scale-75 peer-focus:-translate-y-6
              "
              >Phone Number <span class="text-red-500">*</span></label
            >
          </div>
          <div class="relative z-0 w-full mb-6 group">
            <input
              type="text"
              name="salary"
              id="floating_last_name"
              class="
                block
                py-2.5
                px-0
                w-full
                text-sm text-gray-900
                bg-transparent
                border-0 border-b-2 border-blue-400
                appearance-none
                dark:text-white dark:border-gray-600 dark:focus:border-blue-500
                focus:outline-none focus:ring-0 focus:border-blue-600
                peer
              "
              placeholder=" "
              required=""
              v-model="employee.salary"
            />
            <label
              for="floating_last_name"
              class="
                peer-focus:font-medium
                absolute
                text-sm text-gray-500
                dark:text-gray-400
                duration-300
                transform
                -translate-y-6
                scale-75
                top-3
                -z-10
                origin-[0]
                peer-focus:left-0
                peer-focus:text-blue-600
                peer-focus:dark:text-blue-500
                peer-placeholder-shown:scale-100
                peer-placeholder-shown:translate-y-0
                peer-focus:scale-75 peer-focus:-translate-y-6
              "
              >Salary <span class="text-red-500">*</span></label
            >
          </div>
          <div class="relative z-0 w-full mb-6 group">
            <textarea
              name="address"
              id="address"
              class="
                block
                py-2.5
                px-0
                w-full
                text-sm text-gray-900
                bg-transparent
                border-0 border-b-2 border-blue-400
                appearance-none
                dark:text-white dark:border-gray-600 dark:focus:border-blue-500
                focus:outline-none focus:ring-0 focus:border-blue-600
                peer
              "
              placeholder=" "
              v-model="employee.address"
            >
            </textarea>
            <label
              for="floating_last_name"
              class="
                peer-focus:font-medium
                absolute
                text-sm text-gray-500
                dark:text-gray-400
                duration-300
                transform
                -translate-y-6
                scale-75
                top-1
                -z-10
                origin-[0]
                peer-focus:left-0
                peer-focus:text-blue-600
                peer-focus:dark:text-blue-500
                peer-placeholder-shown:scale-100
                peer-placeholder-shown:translate-y-0
                peer-focus:scale-75 peer-focus:-translate-y-6
              "
              >Address</label
            >
          </div>
          <div class="relative z-0 w-full mb-6 group">
            <input
              type="text"
              name="floating_last_name"
              id="floating_last_name"
              class="
                block
                py-2.5
                px-0
                w-full
                text-sm text-gray-900
                bg-transparent
                border-0 border-b-2 border-blue-400
                appearance-none
                dark:text-white dark:border-gray-600 dark:focus:border-blue-500
                focus:outline-none focus:ring-0 focus:border-blue-600
                peer
              "
              placeholder=" "
              required=""
              v-model="employee.zip_code"
            />
            <label
              for="floating_last_name"
              class="
                peer-focus:font-medium
                absolute
                text-sm text-gray-500
                dark:text-gray-400
                duration-300
                transform
                -translate-y-6
                scale-75
                top-3
                -z-10
                origin-[0]
                peer-focus:left-0
                peer-focus:text-blue-600
                peer-focus:dark:text-blue-500
                peer-placeholder-shown:scale-100
                peer-placeholder-shown:translate-y-0
                peer-focus:scale-75 peer-focus:-translate-y-6
              "
              >Zip Code <span class="text-red-500">*</span></label
            >
          </div>
          <div class="relative z-0 w-full mb-6 group">
            <input
              type="date"
              name="floating_last_name"
              id="floating_last_name"
              class="
                block
                py-2.5
                px-0
                w-full
                text-sm text-gray-900
                bg-transparent
                border-0 border-b-2 border-blue-400
                appearance-none
                dark:text-white dark:border-gray-600 dark:focus:border-blue-500
                focus:outline-none focus:ring-0 focus:border-blue-600
                peer
              "
              placeholder=" "
              required=""
              v-model="employee.birthdate"
            />
            <label
              for="floating_last_name"
              class="
                peer-focus:font-medium
                absolute
                text-sm text-gray-500
                dark:text-gray-400
                duration-300
                transform
                -translate-y-6
                scale-75
                top-3
                -z-10
                origin-[0]
                peer-focus:left-0
                peer-focus:text-blue-600
                peer-focus:dark:text-blue-500
                peer-placeholder-shown:scale-100
                peer-placeholder-shown:translate-y-0
                peer-focus:scale-75 peer-focus:-translate-y-6
              "
              >Birthdate <span class="text-red-500">*</span></label
            >
          </div>
          <div class="relative z-0 w-full group">
            <select
              class="
                select
                mb-3
                appearance-none
                block
                w-full
                px-4
                py-2
                text-base
                font-normal
                text-gray-700
                bg-white bg-clip-padding bg-no-repeat
                border border-solid border-blue-400
                rounded
                transition
                ease-in-out
                m-0
                focus:text-gray-700
                focus:bg-white
                focus:border-blue-600
                focus:outline-none
              "
              v-model="employee.time_work"
            >
              <option disabled selected value="">Select Type Of Employee</option>
              <option value="office">Office</option>
              <option value="industry">Industry</option>
            </select>
          </div>
          <div class="relative z-0 w-full group">
            <select
              class="
                select
                mb-3
                appearance-none
                block
                w-full
                px-4
                py-2
                text-base
                font-normal
                text-gray-700
                bg-white bg-clip-padding bg-no-repeat
                border border-solid border-blue-400
                rounded
                transition
                ease-in-out
                m-0
                focus:text-gray-700
                focus:bg-white
                focus:border-blue-600
                focus:outline-none
              "
              v-model="employee.city_id"
            >
              <option disabled selected value="">Select City</option>
              <option v-for="city in cities" :key="city.id" :value="city.id">
                {{ city.name }}
              </option>
            </select>
          </div>
          <div class="relative z-0 w-full group">
            <select
              class="
                select
                mb-3
                appearance-none
                block
                w-full
                px-4
                py-2
                text-base
                font-normal
                text-gray-700
                bg-white bg-clip-padding bg-no-repeat
                border border-solid border-blue-400
                rounded
                transition
                ease-in-out
                m-0
                focus:text-gray-700
                focus:bg-white
                focus:border-blue-600
                focus:outline-none
              "
              v-model="employee.state_id"
            >
              <option disabled selected value="">Select States</option>
              <option v-for="state in states" :key="state.id" :value="state.id">
                {{ state.name }}
              </option>
            </select>
          </div>
          <div class="relative z-0 w-full group">
            <select
              class="
                select
                mb-3
                appearance-none
                block
                w-full
                px-4
                py-2
                text-base
                font-normal
                text-gray-700
                bg-white bg-clip-padding bg-no-repeat
                border border-solid border-blue-400
                rounded
                transition
                ease-in-out
                m-0
                focus:text-gray-700
                focus:bg-white
                focus:border-blue-600
                focus:outline-none
              "
              v-model="employee.country_id"
            >
              <option disabled selected value="">Select Country</option>
              <option
                v-for="country in countries"
                :key="country.id"
                :value="country.id"
              >
                {{ country.name }}
              </option>
            </select>
          </div>
          <div class="relative z-0 w-full group">
            <select
              class="
                select
                mb-3
                appearance-none
                block
                w-full
                px-4
                py-2
                text-base
                font-normal
                text-gray-700
                bg-white bg-clip-padding bg-no-repeat
                border border-solid border-blue-400
                rounded
                transition
                ease-in-out
                m-0
                focus:text-gray-700
                focus:bg-white
                focus:border-blue-600
                focus:outline-none
              "
              v-model="employee.department_id"
            >
              <option disabled selected value="">Select Departments</option>
              <option
                v-for="(department, index) in departments"
                :key="index"
                :value="department.id"
              >
                {{ department.name }}
              </option>
            </select>
          </div>
        </div>
        <button
          type="submit"
          class="
            text-white
            bg-blue-700
            hover:bg-blue-800
            focus:ring-4 focus:outline-none focus:ring-blue-300
            font-medium
            rounded-lg
            text-sm
            w-full
            sm:w-auto
            px-5
            py-2.5
            text-center
            dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800
          "
        >
          {{ route.params.id ? "Save" : "Create" }}
        </button>
      </form>
    </div>
  </div>
</template>


<script setup>
import { computed, ref, watch } from "@vue/runtime-core";
import { useRoute, useRouter } from "vue-router";
import store from "../../store";

const employee = ref({
  firstname: "",
  lastname: "",
  middlename: "",
  phone: "",
  address: "",
  salary: "",
  zip_code: "",
  birthdate: "",
  time_work: "",
  city_id: "",
  state_id: "",
  country_id: "",
  department_id: "",
});
const router = useRouter();
const route = useRoute();

store.dispatch("getCities");
store.dispatch("getStates");
store.dispatch("getCountries");
store.dispatch("getDepartments");

if (route.params.id) {
  store.dispatch("getEmployee", route.params.id);
}

watch(
  () => store.state.employee.data,
  (newVal, oldVal) =>
    (employee.value = {
      ...JSON.parse(JSON.stringify(newVal)),
    })
);

const cities = computed(() => store.state.cities.data);
const states = computed(() => store.state.states.data);
const countries = computed(() => store.state.countries.data);
const departments = computed(() => store.state.departments.data);

function createEmployee() {
  store.dispatch("createEmployee", employee.value).then(() => {
    router.push({ name: "ViewEmployees" });
  });
}
</script>
<style scoped></style>;
