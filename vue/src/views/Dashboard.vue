<template>
  <div id="home">
    <div class="lg:flex justify-between items-center mb-6">
      <p class="text-2xl font-semibold mb-2 lg:mb-0">
        Good afternoon, {{ user.username }}
      </p>
      <button
        class="
          bg-blue-500
          hover:bg-blue-600
          focus:outline-none
          rounded-lg
          px-6
          py-2
          text-white
          font-semibold
          shadow
        "
      >
        View Logs
      </button>
    </div>

    <div class="flex flex-wrap -mx-3 mb-20">
      <div class="w-1/2 xl:w-1/4 px-3">
        <div
          class="
            w-full
            bg-white
            border
            text-blue-400
            rounded-lg
            flex
            items-center
            p-6
            mb-6
            xl:mb-0
          "
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="w-16 h-16 mr-4 hidden lg:block"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="1"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"
            />
          </svg>

          <div class="text-gray-700">
            <p class="font-semibold text-3xl">{{ dashbaord.users }}</p>
            <p>Total Users</p>
          </div>
        </div>
      </div>

      <div class="w-1/2 xl:w-1/4 px-3">
        <div
          class="
            w-full
            bg-white
            border
            text-blue-400
            rounded-lg
            flex
            items-center
            p-6
            mb-6
            xl:mb-0
          "
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-16 w-16 mr-4 hidden lg:block"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="1"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
            />
          </svg>

          <div class="text-gray-700">
            <p class="font-semibold text-3xl">{{ dashbaord.employees }}</p>
            <p>Total Employees</p>
          </div>
        </div>
      </div>

      <div class="w-1/2 xl:w-1/4 px-3">
        <div
          class="
            w-full
            bg-white
            border
            text-blue-400
            rounded-lg
            flex
            items-center
            p-6
          "
        >
          <svg
            class="w-16 h-16 fill-current mr-4 hidden lg:block"
            viewBox="0 0 20 20"
          >
            <path
              d="M14.999,8.543c0,0.229-0.188,0.417-0.416,0.417H5.417C5.187,8.959,5,8.772,5,8.543s0.188-0.417,0.417-0.417h9.167C14.812,8.126,14.999,8.314,14.999,8.543 M12.037,10.213H5.417C5.187,10.213,5,10.4,5,10.63c0,0.229,0.188,0.416,0.417,0.416h6.621c0.229,0,0.416-0.188,0.416-0.416C12.453,10.4,12.266,10.213,12.037,10.213 M14.583,6.046H5.417C5.187,6.046,5,6.233,5,6.463c0,0.229,0.188,0.417,0.417,0.417h9.167c0.229,0,0.416-0.188,0.416-0.417C14.999,6.233,14.812,6.046,14.583,6.046 M17.916,3.542v10c0,0.229-0.188,0.417-0.417,0.417H9.373l-2.829,2.796c-0.117,0.116-0.71,0.297-0.71-0.296v-2.5H2.5c-0.229,0-0.417-0.188-0.417-0.417v-10c0-0.229,0.188-0.417,0.417-0.417h15C17.729,3.126,17.916,3.313,17.916,3.542 M17.083,3.959H2.917v9.167H6.25c0.229,0,0.417,0.187,0.417,0.416v1.919l2.242-2.215c0.079-0.077,0.184-0.12,0.294-0.12h7.881V3.959z"
            ></path>
          </svg>

          <div class="text-gray-700">
            <p class="font-semibold text-3xl">31</p>
            <p>New Enquiries</p>
          </div>
        </div>
      </div>

      <div class="w-1/2 xl:w-1/4 px-3">
        <div
          class="
            w-full
            bg-white
            border
            text-blue-400
            rounded-lg
            flex
            items-center
            p-6
          "
        >
          <svg
            class="w-16 h-16 fill-current mr-4 hidden lg:block"
            viewBox="0 0 20 20"
          >
            <path
              d="M17.431,2.156h-3.715c-0.228,0-0.413,0.186-0.413,0.413v6.973h-2.89V6.687c0-0.229-0.186-0.413-0.413-0.413H6.285c-0.228,0-0.413,0.184-0.413,0.413v6.388H2.569c-0.227,0-0.413,0.187-0.413,0.413v3.942c0,0.228,0.186,0.413,0.413,0.413h14.862c0.228,0,0.413-0.186,0.413-0.413V2.569C17.844,2.342,17.658,2.156,17.431,2.156 M5.872,17.019h-2.89v-3.117h2.89V17.019zM9.587,17.019h-2.89V7.1h2.89V17.019z M13.303,17.019h-2.89v-6.651h2.89V17.019z M17.019,17.019h-2.891V2.982h2.891V17.019z"
            ></path>
          </svg>

          <div class="text-gray-700">
            <p class="font-semibold text-3xl">1,653</p>
            <p>Product Views</p>
          </div>
        </div>
      </div>
    </div>

    <div class="flex flex-wrap -mx-3">
      <div class="w-full xl:w-1/3 px-3">
        <p class="text-xl font-semibold mb-4">Recent Employees</p>

        <div
          class="
            w-full
            bg-white
            border
            rounded-lg
            pr-6
            pt-6
            pl-6
            pb-10
            mb-8
            xl:mb-0
          "
        >
          <div class="relative overflow-x-auto shadow-xl sm:rounded-lg">
            <table>
              <thead>
                <tr>
                  <th v-for="thead in theads" :key="thead.id">{{ thead }}</th>
                </tr>
              </thead>
              <tbody v-if="dashbaord.employee_lists">
                <tr
                  v-for="employee in dashbaord.employee_lists"
                  :key="employee.id"
                >
                  <td>{{ employee.id }}</td>
                  <td class="capitalize">
                    {{ employee.lastname }} {{ employee.firstname }}
                  </td>
                  <td>
                    {{
                      employee.time_work == "08:00:00" ? "Office" : "Industry"
                    }}
                  </td>
                  <td>{{ employee.created_at }}</td>
                </tr>
              </tbody>
              <tbody v-else>
                <tr>
                  <td
                    v-if="theads.length"
                    :colspan="theads.length"
                    class="text-center"
                  >
                    No Data !!!
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="w-full xl:w-1/3 px-3">
        <p class="text-xl font-semibold mb-4">Recent Reviews</p>

        <div class="w-full bg-white border rounded-lg p-4 mb-8 xl:mb-0">
          <canvas id="reviews-chart" width="600" height="400"></canvas>
        </div>
      </div>

      <div class="w-full xl:w-1/3 px-3">
        <p class="text-xl font-semibold mb-4">Recent Transactions</p>
        <div class="w-full bg-white border rounded-lg p-4">
          <div
            class="
              w-full
              bg-gray-100
              border
              rounded-lg
              flex
              justify-between
              items-center
              px-4
              py-2
              mb-4
            "
          >
            <div>
              <p class="font-semibold text-xl">Trent Murphy</p>
              <p>Product 1</p>
            </div>
            <span class="text-green-500 font-semibold text-lg">$25.00</span>
          </div>

          <div
            class="
              w-full
              bg-gray-100
              border
              rounded-lg
              flex
              justify-between
              items-center
              px-4
              py-2
              mb-4
            "
          >
            <div>
              <p class="font-semibold text-xl">Joseph Brent</p>
              <p>Product 34</p>
            </div>
            <span class="text-red-500 font-semibold text-lg">$74.99</span>
          </div>

          <div
            class="
              w-full
              bg-gray-100
              border
              rounded-lg
              flex
              justify-between
              items-center
              px-4
              py-2
              mb-4
            "
          >
            <div>
              <p class="font-semibold text-xl">Jacob Bator</p>
              <p>Product 23</p>
            </div>
            <span class="text-green-500 font-semibold text-lg">$14.95</span>
          </div>

          <div
            class="
              w-full
              bg-gray-100
              border
              rounded-lg
              flex
              justify-between
              items-center
              px-4
              py-2
            "
          >
            <div>
              <p class="font-semibold text-xl">Alex Mason</p>
              <p>Product 66</p>
            </div>
            <span class="text-green-500 font-semibold text-lg">$44.99</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { computed } from "@vue/runtime-core";
import store from "../store";

const user = computed(() => store.state.currentUser.data);
store.dispatch("getOneUser");

const theads = ["ID", "Name", "Type", "Join Date"];

store.dispatch("getDashbaord");

const dashbaord = computed(() => store.state.dashbaord);
</script>

<style scoped>
</style>
