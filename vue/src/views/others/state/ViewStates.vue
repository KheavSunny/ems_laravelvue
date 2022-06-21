<template>
  <div>
    <div class="flex justify-between">
      <div class="text-5xl">Views State</div>
      <div>
        <router-link :to="{ name: 'CreateState' }">
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
            Add new state
          </button>
        </router-link>
      </div>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
      <table>
        <thead>
          <tr>
            <th>State ID</th>
            <th>Country Name</th>
            <th>State Name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(state, index) in states.data" :key="index">
            <td>{{ state.id }}</td>
            <td v-if="state.country" class="capitalize">
              {{ state.country.name }}
            </td>
            <td class="capitalize">{{ state.name }}</td>
            <td v-if="state.id">
              <router-link
                :to="{
                  name: 'UpdateState',
                  params: { id: state.id },
                }"
                ><button class="badge badge-accent">Edit</button></router-link
              >
              <button
                @click.prevent="deleteState(state.id)"
                class="badge badge-error ml-2"
              >
                Delete
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div v-if="states.links" class="flex justify-center mt-5 btn-group">
      <button
        v-for="(link, i) of states.links"
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

store.dispatch("getStates");

const states = computed(() => store.state.states);

function getForPage(link) {
  if (!link.url || link.active) {
    return;
  }
  store.dispatch("getStates", { url: link.url });
}

function deleteState(id) {
  store.dispatch("deleteState", id).then(() => {
    store.dispatch("getStates");
  });
}
</script>
