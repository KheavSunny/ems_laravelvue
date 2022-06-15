<template>
  <div>
    <div class="text-5xl">View loans</div>
    <div
      class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5"
      v-if="loans"
    >
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Amount</th>
            <th>Date</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="loan in loans" :key="loan.id">
            <td>{{ loan.id }}</td>
            <td v-if="loan.employee">{{ loan.employee.firstname }}</td>
            <td>{{ loan.amount }}</td>
            <td>{{ loan.date }}</td>
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

store.dispatch("getLoans");

const loans = computed(() => store.state.loans.data);
</script>
<style scoped>
</style>
