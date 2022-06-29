<template>
  <div>
    <div class="text-5xl">View Loan Records</div>
    <div
      class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5"
      v-if="loans"
    >
      <table>
        <thead>
          <tr>
            <th v-for="thead in theads" :key="thead.id">{{ thead }}</th>
          </tr>
        </thead>
        <tbody v-if="loans.data.length">
          <tr v-for="loan in loans.data" :key="loan.id">
            <td>{{ loan.id }}</td>
            <td v-if="loan.employee">{{ loan.employee.firstname }}</td>
            <td>{{ loan.amount }}</td>
            <td>{{ loan.date }}</td>
            <td v-if="loan.id">
              <router-link :to="{ name: 'UpdateLoan', params: { id: loan.id } }"
                ><button
                  class="btn-xs btn-accent rounded hover:btn-primary mr-2"
                >
                  Edit
                </button></router-link
              >
              <button
                @click.prevent="deleteLoan(loan.id)"
                class="btn-xs btn-error rounded hover:bg-red-700"
              >
                Delete
              </button>
            </td>
          </tr>
        </tbody>
        <tbody v-else>
          <tr>
            <td :colspan="theads.length" class="text-center">No Data !!!</td>
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

const theads = ["Id", "Name", "Amount", "Date", "Action"];
const store = useStore();

store.dispatch("getLoans");

const loans = computed(() => store.state.loans);

function deleteLoan(id) {
  store.dispatch("deleteLoan", id).then(() => {
    store.dispatch("getLoans");
  });
}
</script>

<style scoped>
</style>
