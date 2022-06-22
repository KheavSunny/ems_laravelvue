<template>
  <div>
    <div class="text-5xl">
      {{ route.params.id ? loan.name : "Create Loan" }}
    </div>
    <div class="mt-5">
      <form @submit.prevent="saveLoan">
        <div class="relative z-0 mb-3 w-full">
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
            v-model="loan.employee_id"
            v-if="employees"
            required
          >
            <option disabled value="">Select Employees</option>
            <option
              v-for="(employee, index) in employees"
              :key="index"
              :value="employee.id"
            >
              {{ employee.firstname }}
            </option>
          </select>
        </div>
        <div class="relative z-0 mb-3 w-full">
          <input
            type="text"
            name="amount"
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
            v-model="loan.amount"
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
            >Amount</label
          >
        </div>
        <div class="relative z-0 mb-3 w-full">
          <input
            type="date"
            class="input w-full"
            v-model="loan.date"
            required
          />
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
import { ref } from "@vue/reactivity";
import { computed, watch } from "@vue/runtime-core";
import { useRoute, useRouter } from "vue-router";
import { useStore } from "vuex";

const router = useRouter();
const route = useRoute();
const store = useStore();

const loan = ref({
  employee_id: "",
  amount: "",
  date: "",
  employee: "",
});

if (route.params.id) {
  store.dispatch("getLoan", route.params.id);
}

watch(
  () => store.state.loan.data,
  (newVal, oldVal) => {
    loan.value = {
      ...JSON.parse(JSON.stringify(newVal)),
    };
    loan.value.employee_id = newVal.employee.id;
  }
);

watch(
  () => route.name == "CreateLoan",
  () => {
    loan.value.employee_id = "";
    loan.value.amount = "";
    loan.value.date = "";
  }
);

store.dispatch("getEmployees");

const employees = computed(() => store.state.employees.data);

function saveLoan() {
  store.dispatch("saveLoan", loan.value).then(() => {
    router.push({ name: "ViewLoans" });
  });
}
</script>
<style scoped>
</style>
