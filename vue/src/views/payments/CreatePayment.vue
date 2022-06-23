<template>
  <div>
    <div class="text-5xl">Create payments</div>
    <form @submit.prevent="createPayment">
      <div class="mt-5 p-20 bg-white shadow-xl rounded-xl">
        <div class="form-control mb-5">
          <select
            class="select border-blue-400 focus:input-accent w-full"
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
            class="input border-blue-400 focus:input-accent w-full"
            v-model="payment.date_from"
            required
          />
        </div>
        <div class="form-control mb-5">
          <label class="label"><span class="label-text">Date To</span></label>
          <input
            type="date"
            placeholder="Type here"
            class="input border-blue-400 focus:input-accent w-full"
            v-model="payment.date_to"
            required
          />
        </div>
        <div class="text-right">
          <button class="btn bg-blue-400 btn-accent">Save</button>
        </div>
      </div>
    </form>
  </div>
</template>
<script setup>
import { computed } from "@vue/runtime-core";
import { useRouter } from "vue-router";
import { useStore } from "vuex";

const store = useStore();
const router = useRouter();

const payment = {
  employee_id: "",
  date_from: "",
  date_to: "",
  employee: "",
};
store.dispatch("getEmployees");
const employees = computed(() => store.state.employees.data);

function createPayment() {
  store.dispatch("savePayment", payment).then(() => {
    router.push({ name: "ViewPayments" });
  });
}
</script>
<style scoped>
</style>
