<template>
  <div>
    <div class="text-5xl">ViewEmployees</div>
    <div
      class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5"
      v-if="employees"
    >
      <table>
        <thead>
          <tr>
            <th scope="col" v-for="thead in theads" :key="thead.id">
              {{ thead }}
            </th>
            <th scope="col">
              <span class="sr-only">Edit</span>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="employee in employees.data" :key="employee.id">
            <td>
              {{ employee.id }}
            </td>
            <td>
              {{ employee.firstname }}
            </td>
            <td>
              {{ employee.lastname }}
            </td>
            <td v-if="employee.time_work == '08:00:00'">Office</td>
            <td v-else>Industry</td>
            <td>
              {{ employee.phone }}
            </td>
            <td>
              {{ employee.address }}
            </td>
            <td>{{ employee.salary }}</td>
            <td v-if="employee.id" class="text-center">
              <router-link
                :to="{ name: 'UpdateEmployee', params: { id: employee.id } }"
                ><button class="badge badge-accent">Edit</button></router-link
              ><button
                @click.prevent="deleteEmployee(employee.id)"
                class="badge badge-error ml-2"
              >
                Delete
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div v-if="employees.links">
      <pagination
        :links="employees.links"
        :dispatch="'getEmployees'"
      ></pagination>
    </div>
  </div>
</template>

<script setup>
import { computed } from "@vue/runtime-core";
import store from "../../store";
import Pagination from "../../components/Pagination.vue";

store.dispatch("getEmployees");

const employees = computed(() => store.state.employees);

const theads = [
  "ID",
  "Firstname",
  "Lastname",
  "Type",
  "Phone",
  "Address",
  "Salary",
];

function deleteEmployee(id) {
  store.dispatch("deleteEmployee", id).then(() => {
    store.dispatch("getEmployees");
  });
}
</script>

<style scoped>
</style>
