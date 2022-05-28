<template>
  <div>
    <div class="flex justify-between">
      <div class="text-5xl">Views Countries</div>
      <div>
        <router-link :to="{ name: 'CreateCountry' }">
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
            Add new country
          </button>
        </router-link>
      </div>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
      <table>
        <thead>
          <tr>
            <th>Country ID</th>
            <th>Country Code</th>
            <th>Country Name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="country in countries" :key="country.id">
            <td>{{ country.country_id }}</td>
            <td>{{ country.country_code }}</td>
            <td class="capitalize">{{ country.country_name }}</td>
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
store.dispatch("getCountries");
const countries = computed(() => store.state.countries.data);
console.log(countries);
</script>
