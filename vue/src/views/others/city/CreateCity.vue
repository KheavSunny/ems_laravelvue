<template>
  <div>
    <div class="text-5xl">Create State</div>
    <div class="mt-5">
      <form @submit.prevent="createCity">
        <div class="form-floating mb-3 xl:w-96">
          <input
            type="text"
            class="
              form-control
              block
              w-full
              px-3S
              py-1.5
              text-base
              font-normal
              text-gray-700
              bg-white bg-clip-padding
              border border-solid border-gray-300
              rounded
              transition
              ease-in-out
              m-0
              focus:text-gray-700
              focus:bg-white
              focus:border-blue-600
              focus:outline-none
            "
            required
            v-model="city.name"
            id="floatingInput"
            placeholder="name@example.com"
          />
          <label for="floatingInput" class="text-gray-700">City Name</label>
        </div>
        <div class="form-floating mb-3 xl:w-96">
          <select
            class="
              form-select
              mb-3
              appearance-none
              block
              w-full
              px-4
              py-2
              text-base
              font-normal
              text-gray-700
              bg-white bg-clip-padding bg-no-repeat
              border border-solid border-gray-300
              rounded
              transition
              ease-in-out
              m-0
              focus:text-gray-700
              focus:bg-white
              focus:border-blue-600
              focus:outline-none
            "
            v-model="city.state_id"
          >
            <option disabled selected>Select State</option>
            <option
              v-for="(state, index) in states"
              :key="index"
              :value="state.state_id"
            >
              {{ state.state_name }}
            </option>
          </select>
        </div>
        <button
          type="submit"
          class="
            text-white
            bg-blue-700
            hover:bg-blue-800
            focus:ring-4 focus:outline-none focus:ring-blue-300
            font-medium
            rounded-lg
            text-sm
            w-full
            sm:w-auto
            px-5
            py-2.5
            text-center
            dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800
          "
        >
          Create
        </button>
      </form>
    </div>
  </div>
</template>

<script setup>
import { useStore } from "vuex";
import { computed } from "vue";
import { useRouter } from "vue-router";

const store = useStore();
const router = useRouter();
const city = {
  name: "",
  state_id: "",
};

store.dispatch("getStates");

const states = computed(() => store.state.states.data);

function createCity() {
  store.dispatch("createCity", city).then(() => {
    router.push({ name: "ViewCities" });
  });
}
</script>
