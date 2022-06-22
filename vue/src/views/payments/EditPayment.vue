<template>
  <div>
    <div class="text-5xl">Edit payments</div>
    <form @submit.prevent="savePayment">
      <div class="mt-5 p-20 bg-white shadow-xl rounded-xl">
        <div class="form-control mb-5">
          <select
            class="select select-accent focus:input-primary w-full"
            v-model="payment.employee_id"
            required
          >
            <option value="" disabled>Select Employee</option>
            <option
              v-for="employee in employees"
              :key="employee.id"
              :value="employee.id"
            >
              {{ employee.firstname }}
            </option>
          </select>
        </div>
        <div class="form-control mb-5">
          <label class="label"><span class="label-text">Date From</span></label>
          <input
            type="date"
            placeholder="Type here"
            class="input input-accent focus:input-primary w-full"
            v-model="payment.date_from"
            required
          />
        </div>
        <div class="form-control mb-5">
          <label class="label"><span class="label-text">Date To</span></label>
          <input
            type="date"
            placeholder="Type here"
            class="input input-accent focus:input-primary w-full"
            v-model="payment.date_to"
            required
          />
        </div>
        <div class="text-right">
          <button class="btn btn-primary">Save</button>
        </div>
      </div>
    </form>
  </div>
</template>
<script setup>
import { computed, ref, watch } from "@vue/runtime-core";
import { useRoute, useRouter } from "vue-router";
import { useStore } from "vuex";

const store = useStore();
const router = useRouter();
const route = useRoute();

const payment = ref({
  employee_id: "",
  date_from: "",
  date_to: "",
  employee: "",
});
store.dispatch("getEmployees");
const employees = computed(() => store.state.employees.data);

store.dispatch("getPayment", route.params.id);

watch(
  () => store.state.payment.data,
  (newVal, oldVal) => {
    payment.value = newVal;

    payment.value.employee_id = newVal.employee.id;
  }
);

function savePayment() {
  store.dispatch("savePayment", payment.value).then(() => {
    router.push({ name: "ViewPayments" });
  });
}
</script>
<style scoped>
</style>
