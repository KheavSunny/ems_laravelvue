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
            <th>Department ID</th>
            <th>Department Name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
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
      </table>
    </div>
    <div v-if="departments.links" class="flex justify-center mt-5 btn-group">
      <button
        v-for="(link, i) of departments.links"
        :key="i"
        :disabled="!link.url"
        v-html="link.label"
        @click.prevent="getForPage(link)"
        aria-current="page"
        class="btn"
        :class="[link.active ? 'btn-active' : '']"
      ></button>
    </div>
  </div>
</template>

<script setup>
import { computed } from "@vue/runtime-core";
import store from "../../../store";

store.dispatch("getDepartments");

const departments = computed(() => store.state.departments);

function getForPage(link) {
  if (!link.url || link.active) {
    return;
  }
  store.dispatch("getDepartments", { url: link.url });
}

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

