<template>
  <div>
    <div class="flex justify-between">
      <div class="text-5xl">Views Department</div>
      <div>
        <router-link :to="{ name: 'CreateDepartment' }">
          <button
            type="button"
            class="
              text-white
              bg-green-700
              hover:bg-green-800
              focus:outline-none focus:ring-4 focus:ring-green-300
              font-medium
              rounded-full
              text-sm
              px-5
              py-2.5
              text-center
              mr-2
              dark:bg-green-600
              dark:hover:bg-green-700
              dark:focus:ring-green-800
            "
          >
            Add new department
          </button>
        </router-link>
      </div>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
      <table>
        <thead>
          <tr>
            <th v-for="thead in theads" :key="thead.id">{{ thead }}</th>
          </tr>
        </thead>
        <tbody v-if="departments.data.length">
          <tr v-for="department in departments.data" :key="department.id">
            <td>{{ department.id }}</td>
            <td class="capitalize">{{ department.name }}</td>
            <td v-if="department.id">
              <router-link
                :to="{
                  name: 'UpdateDepartment',
                  params: { id: department.id },
                }"
                ><button class="badge badge-accent">Edit</button></router-link
              >
              <button
                @click.prevent="DeleteDepartment(department.id)"
                class="badge badge-error ml-2"
              >
                Delete
              </button>
            </td>
          </tr>
        </tbody>
        <tbody v-else>
          <tr>
            <td class="text-center" :colspan="theads.length">No Data !!!</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div v-if="departments.data.length">
      <pagination
        :links="departments.links"
        :dispatch="'getDepartments'"
      ></pagination>
    </div>
  </div>
</template>

<script setup>
import { computed } from "@vue/runtime-core";
import store from "../../../store";
import Pagination from "../../../components/Pagination.vue";

store.dispatch("getDepartments");

const theads = ["Department Id", "Department Name", "Action"];

const departments = computed(() => store.state.departments);

function DeleteDepartment(id) {
  if (confirm(`Are you sure to delete this department row ?`)) {
    store.dispatch("deleteDepartment", id).then(() => {
      store.dispatch("getDepartments");
    });
  }
}
</script>

<style scoped>
</style>

