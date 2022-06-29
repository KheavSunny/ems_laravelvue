<template>
  <div>
    <div class="text-5xl">View loan lists</div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
      <table>
        <thead>
          <tr>
            <th v-for="thead in theads" :key="thead.id">{{ thead }}</th>
          </tr>
        </thead>
        <tbody v-if="loans.data.length">
          <tr v-for="loan in loans.data" :key="loan.id">
            <td>{{ loan.id }}</td>
            <td>{{ loan.employee.firstname }}</td>
            <td>{{ loan.amount }}</td>
            <td>{{ loan.repay }}</td>
            <td>{{ loan.remain }}</td>
          </tr>
        </tbody>
        <tbody v-else>
          <tr>
            <td class="text-center" :colspan="theads.length">No Data !!!</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div v-if="loans.data.length">
      <pagination :links="loans.links" :dispatch="'getLoans'"></pagination>
    </div>
  </div>
</template>
<script setup>
import { computed } from "@vue/runtime-core";
import { useStore } from "vuex";
import Pagination from "../../components/Pagination.vue";

const theads = ["ID", "Employee", "Amount", "Repay", "Remian"];

const store = useStore();

store.dispatch("getLoanDetails");

const loans = computed(() => store.state.loans_details);
</script>
<style scoped>
</style>
