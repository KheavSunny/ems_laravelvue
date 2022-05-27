<template>
  <div>
    <div class="text-5xl">ViewEmployees</div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
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
          <tr v-for="employee in employees" :key="employee.id">
            <td>
              {{ employee.id }}
            </td>
            <td>
              {{ employee.firstname }}
            </td>
            <td>
              {{ employee.lastname }}
            </td>
            <td>
              {{ employee.phone }}
            </td>
            <td>
              {{ employee.address }}
            </td>
            <td class="text-right">
              <a
                href="#"
                class="
                  font-medium
                  text-blue-600
                  dark:text-blue-500
                  hover:underline
                "
                >Edit</a
              >
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script setup>
import { computed } from "@vue/runtime-core";
import store from "../../store";

store.dispatch("getEmployees");

const employees = computed(() => store.state.employees.data);

const theads = ["ID", "Firstname", "Lastname", "Phone", "Address"];
</script>

<style scoped>
</style>
