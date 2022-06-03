<template>
  <!-- give the sidebar z-50 class so its higher than the navbar if you want to see the logo -->
  <!-- you will need to add a little "X" button next to the logo in order to close it though -->
  <div
    class="
      w-1/2
      md:w-1/3
      lg:w-64
      fixed
      md:top-0 md:left-0
      h-screen
      lg:block
      bg-gray-100
      border-r
      z-30
    "
    :class="sideBarOpen ? '' : 'hidden'"
    id="main-nav"
  >
    <div class="w-full h-20 border-b flex px-4 items-center mb-8">
      <p class="font-semibold text-2xl text-blue-400 pl-4">
        <router-link :to="{ name: 'Dashboard' }"
          >EMPLOYEE MANAGEMENT</router-link
        >
      </p>
    </div>

    <div class="mb-4 px-4">
      <p class="pl-4 text-sm font-semibold mb-1">DASHBOARD</p>
      <router-link :to="{ name: 'Dashboard' }">
        <div
          class="
            w-full
            flex
            items-center
            text-blue-400
            h-10
            pl-4
            rounded-lg
            cursor-pointer
          "
          :class="[$route.name === 'Dashboard' ? active : inactive]"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-6 w-6 mr-2"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="1.5"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
            />
          </svg>
          <span class="text-gray-700">Dashboard</span>
        </div>
      </router-link>
      <p class="pl-4 text-sm font-semibold mb-1">EMPLOYEES</p>
      <router-link :to="{ name: 'ViewEmployees' }">
        <div
          class="
            w-full
            flex
            items-center
            text-blue-400
            h-10
            pl-4
            rounded-lg
            cursor-pointer
          "
          :class="[$route.name === 'ViewEmployees' ? active : inactive]"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-6 w-6 mr-2"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="1.5"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"
            />
          </svg>
          <span class="text-gray-700">Veiw Employees</span>
        </div>
      </router-link>
      <router-link :to="{ name: 'CreateEmployee' }">
        <div
          class="
            w-full
            flex
            items-center
            text-blue-400
            h-10
            pl-4
            rounded-lg
            cursor-pointer
          "
          :class="[$route.name === 'CreateEmployee' ? active : inactive]"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-6 w-6 mr-2"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="1.5"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"
            />
          </svg>
          <span class="text-gray-700">Add Emplpoyee</span>
        </div>
      </router-link>
      <p class="pl-4 text-sm font-semibold mb-1">ATTENDANCES</p>
      <router-link :to="{ name: 'ViewAttendances' }">
        <div
          class="
            w-full
            flex
            items-center
            text-blue-400
            h-10
            pl-4
            rounded-lg
            cursor-pointer
          "
          :class="[$route.name === 'ViewAttendances' ? active : inactive]"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-6 w-6 mr-2"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="1.5"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"
            />
          </svg>
          <span class="text-gray-700">View Attendances</span>
        </div>
      </router-link>
      <router-link :to="{ name: 'CreateAttendance' }">
        <div
          class="
            w-full
            flex
            items-center
            text-blue-400
            h-10
            pl-4
            rounded-lg
            cursor-pointer
          "
          :class="[$route.name === 'CreateAttendance' ? active : inactive]"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-6 w-6 mr-2"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="1.5"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"
            />
          </svg>
          <span class="text-gray-700">Add Attendance</span>
        </div>
      </router-link>
    </div>

    <div class="mb-4 px-4">
      <p class="pl-4 text-sm font-semibold mb-1">PAYMENTS</p>
      <router-link :to="{ name: 'ViewPayments' }">
        <div
          class="
            w-full
            flex
            items-center
            text-blue-400
            h-10
            pl-4
            rounded-lg
            cursor-pointer
          "
          :class="[$route.name === 'ViewPayments' ? active : inactive]"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-6 w-6 mr-2"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="1.5"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"
            />
          </svg>
          <span class="text-gray-700">View Payment</span>
        </div>
      </router-link>
      <router-link :to="{ name: 'CreatePayment' }">
        <div
          class="
            w-full
            flex
            items-center
            text-blue-400
            h-10
            pl-4
            rounded-lg
            cursor-pointer
          "
          :class="[$route.name === 'CreatePayment' ? active : inactive]"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-6 w-6 mr-2"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="1.5"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"
            />
          </svg>
          <span class="text-gray-700">Add Payment</span>
        </div>
      </router-link>
    </div>

    <div class="mb-4 px-4">
      <p class="pl-4 text-sm font-semibold mb-1">LOANS</p>
      <router-link :to="{ name: 'ViewLoans' }"
        ><div
          class="
            w-full
            flex
            items-center
            text-blue-400
            h-10
            pl-4
            rounded-lg
            cursor-pointer
          "
          :class="[$route.name === 'ViewLoans' ? active : inactive]"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-6 w-6 mr-2"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="1.5"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"
            />
          </svg>
          <span class="text-gray-700">View Loans</span>
        </div></router-link
      >
      <router-link :to="{ name: 'CreateLoan' }"
        ><div
          class="
            w-full
            flex
            items-center
            text-blue-400
            h-10
            pl-4
            rounded-lg
            cursor-pointer
          "
          :class="[$route.name === 'CreateLoan' ? active : inactive]"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-6 w-6 mr-2"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="1.5"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"
            />
          </svg>
          <span class="text-gray-700">Add Loan</span>
        </div></router-link
      >
    </div>
    <div class="mb-4 px-4">
      <p class="pl-4 text-sm font-semibold mb-1 uppercase">Others</p>
      <router-link :to="{ name: 'ViewDepartments' }"
        ><div
          class="
            w-full
            flex
            items-center
            text-blue-400
            h-10
            pl-4
            rounded-lg
            cursor-pointer
          "
          :class="[
            $route.name === 'ViewDepartments' ||
            $route.name === 'CreateDepartment' ||
            $route.name === 'UpdateDepartment'
              ? active
              : inactive,
          ]"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-6 w-6 mr-2"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="1.5"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"
            />
          </svg>
          <span class="text-gray-700">Department</span>
        </div></router-link
      >
      <router-link :to="{ name: 'ViewStates' }"
        ><div
          class="
            w-full
            flex
            items-center
            text-blue-400
            h-10
            pl-4
            rounded-lg
            cursor-pointer
          "
          :class="[
            $route.name === 'ViewStates' ||
            $route.name === 'CreateState' ||
            $route.name === 'UpdateState'
              ? active
              : inactive,
          ]"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-6 w-6 mr-2"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="1.5"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
            />
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"
            />
          </svg>
          <span class="text-gray-700">State</span>
        </div></router-link
      >
      <router-link :to="{ name: 'ViewCities' }"
        ><div
          class="
            w-full
            flex
            items-center
            text-blue-400
            h-10
            pl-4
            rounded-lg
            cursor-pointer
          "
          :class="[
            $route.name === 'ViewCities' ||
            $route.name === 'CreateCity' ||
            $route.name === 'UpdateCity'
              ? active
              : inactive,
          ]"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-6 w-6 mr-2"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="1.5"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
            />
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"
            />
          </svg>
          <span class="text-gray-700">City</span>
        </div></router-link
      >
      <router-link :to="{ name: 'ViewCountries' }"
        ><div
          class="
            w-full
            flex
            items-center
            text-blue-400
            h-10
            pl-4
            rounded-lg
            cursor-pointer
          "
          :class="[
            $route.name === 'ViewCountries' ||
            $route.name === 'CreateCountry' ||
            $route.name === 'UpdateCountry'
              ? active
              : inactive,
          ]"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-6 w-6 mr-2"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="1.5"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
            />
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"
            />
          </svg>
          <span class="text-gray-700">Country</span>
        </div></router-link
      >
    </div>
  </div>
</template>

<script setup>
import { computed, ref } from "@vue/runtime-core";
import { mapState, useStore } from "vuex";

const store = useStore();

const sideBarOpen = computed(() => store.state.sideBarOpen);

const active = ref("bg-gray-600 bg-opacity-25 border-gray-100");
const inactive = ref(
  "border-gray-900 hover:bg-gray-600 hover:bg-opacity-25 hover:text-gray-100"
);
</script>
