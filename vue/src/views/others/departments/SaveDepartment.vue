<template>
  <div>
    <div class="text-5xl">
      {{ route.params.id ? department.name : "Create Department" }}
    </div>
    <div class="mt-5 p-20 bg-white shadow-xl rounded-xl">
      <form @submit.prevent="saveDepartment">
        <div class="relative z-0 w-full mb-6 group">
          <input
            type="text"
            name="name"
            class="
              block
              py-2.5
              px-0
              w-full
              text-sm text-gray-900
              bg-transparent
              border-0 border-b-2 border-blue-400
              appearance-none
              dark:text-white dark:border-gray-600 dark:focus:border-blue-500
              focus:outline-none focus:ring-0 focus:border-blue-600
              peer
            "
            placeholder=" "
            required
            v-model="department.name"
          />
          <label
            for="floating_email"
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
            >Department Name</label
          >
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
import { useRoute, useRouter } from "vue-router";
import { useStore } from "vuex";
import { ref, watch } from "vue";

const store = useStore();
const route = useRoute();
const router = useRouter();

let department = ref({
  name: "",
});
watch(
  () => store.state.department.data,
  (newVal, oldVal) => {
    department.value = {
      ...JSON.parse(JSON.stringify(newVal)),
    };
  }
);

if (route.params.id) {
  store.dispatch("getDepartment", route.params.id);
}

function saveDepartment() {
  store.dispatch("saveDepartment", department.value).then(() => {
    router.push({ name: "ViewDepartments" });
  });
}
</script>
