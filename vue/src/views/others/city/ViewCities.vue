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
          <tr v-for="city in cities.data" :key="city.id">
            <td>{{ city.id }}</td>
            <td v-if="city.state" class="capitalize">{{ city.state.name }}</td>
            <td class="capitalize">{{ city.name }}</td>
            <td v-if="city.id">
              <router-link
                :to="{ name: 'UpdateCity', params: { id: city.id } }"
              >
                <button class="badge badge-accent">Edit</button>
              </router-link>
              <button
                @click.prevent="deleteCity(city.id)"
                class="badge badge-error ml-2"
              >
                Delete
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div v-if="cities.links" class="flex justify-center mt-5 btn-group">
      <button
        v-for="(link, i) of cities.links"
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
import { useStore } from "vuex";

const store = useStore();
const cities = computed(() => store.state.cities);
function getForPage(link) {
  if (!link.url || link.active) {
    return;
  }
  store.dispatch("getCities", { url: link.url });
}
store.dispatch("getCities");

function deleteCity(id) {
  store.dispatch("deleteCity", id).then(() => {
    store.dispatch("getCities");
  });
}
</script>
