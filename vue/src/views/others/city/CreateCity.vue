<template>
  <div>
    <div class="text-5xl">
      {{ route.params.id ? city.name : "Create City" }}
    </div>
    <div class="mt-5">
      <form @submit.prevent="createCity">
        <div class="relative z-0 w-full mb-6 group">
          <input
            type="text"
            name="country_code"
            class="
              block
              py-2.5
              px-0
              w-full
              text-sm text-gray-900
              bg-transparent
              border-0 border-b-2 border-gray-300
              appearance-none
              dark:text-white dark:border-gray-600 dark:focus:border-blue-500
              focus:outline-none focus:ring-0 focus:border-blue-600
              peer
            "
            placeholder=" "
            required
            v-model="city.name"
          />
          <label
            for="floating_city_name"
            class="
              peer-focus:font-medium
              absolute
              text-sm text-gray-500
              dark:text-gray-400
              duration-300
              transform
              -translate-y-6
              scale-75
              top-3
              -z-10
              origin-[0]
              peer-focus:left-0
              peer-focus:text-blue-600
              peer-focus:dark:text-blue-500
              peer-placeholder-shown:scale-100
              peer-placeholder-shown:translate-y-0
              peer-focus:scale-75 peer-focus:-translate-y-6
            "
            >City Name</label
          >
        </div>
        <div class="relative z-0 w-full mb-6 group">
          <select
            class="
              select
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
            <option disabled value="">Select States</option>
            <option
              v-for="(state, index) in states"
              :key="index == 0"
              :value="state.id"
            >
              {{ state.name }}
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
          {{ route.params.id ? "Save" : "Create" }}
        </button>
      </form>
    </div>
  </div>
</template>

<script setup>
import { useStore } from "vuex";
import { computed, ref, watch } from "vue";
import { useRoute, useRouter } from "vue-router";

const store = useStore();
const router = useRouter();
const route = useRoute();
const city = ref({
  name: "",
  state_id: "",
  state: "",
});

store.dispatch("getStates");

watch(
  () => store.state.city.data,
  (newVal, oldVal) => {
    city.value = {
      ...JSON.parse(JSON.stringify(newVal)),
    };
    city.value.state_id = newVal.state.id;
  }
);

if (route.params.id) {
  store.dispatch("getCity", route.params.id);
}

const states = computed(() => store.state.states.data);

function createCity() {
  store.dispatch("createCity", city.value).then(() => {
    router.push({ name: "ViewCities" });
  });
}
</script>
