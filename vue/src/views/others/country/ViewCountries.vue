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
            <th v-for="thead in theads" :key="thead.id">{{ thead }}</th>
          </tr>
        </thead>
        <tbody v-if="countries.data.length">
          <tr v-for="country in countries.data" :key="country.id">
            <td>{{ country.id }}</td>
            <td>{{ country.code }}</td>
            <td class="capitalize">{{ country.name }}</td>
            <td v-if="country.id">
              <router-link
                :to="{ name: 'UpdateCountry', params: { id: country.id } }"
                ><button class="badge badge-accent">Edit</button></router-link
              ><button
                class="badge badge-error ml-2"
                @click.prevent="deleteCountry(country.id)"
              >
                Delete
              </button>
            </td>
          </tr>
        </tbody>
        <tbody v-else>
          <tr>
            <td :colspan="theads.length">No Data !!!</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div v-if="countries.data.length">
      <pagination
        :links="countries.links"
        :dispatch="'getCountries'"
      ></pagination>
    </div>
  </div>
</template>

<script setup>
import { computed } from "@vue/runtime-core";
import { useStore } from "vuex";
import Pagination from "../../../components/Pagination.vue";

const store = useStore();
const theads = ["Country ID", "Country Code", "Country Name", "Action"];

store.dispatch("getCountries");
const countries = computed(() => store.state.countries);

function deleteCountry(id) {
  store.dispatch("deleteCountry", id).then(() => {
    store.dispatch("getCountries");
  });
}
</script>
