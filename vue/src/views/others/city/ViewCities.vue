<template>
  <div>
    <div class="flex justify-between">
      <div class="text-5xl">Views City</div>
      <div>
        <router-link :to="{ name: 'CreateCity' }">
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
            Add new city
          </button>
        </router-link>
      </div>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
      <table>
        <thead>
          <tr>
            <th>City ID</th>
            <th>State Name</th>
            <th>City Name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="city in cities" :key="city.id">
            <td>{{ city.city_id }}</td>
            <td class="capitalize">{{ city.state.name }}</td>
            <td class="capitalize">{{ city.city_name }}</td>
            <td>Edit</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script setup>
import { computed } from "@vue/runtime-core";
import { useStore } from "vuex";

const store = useStore();
const cities = computed(() => store.state.cities.data);

store.dispatch("getCities");
</script>
