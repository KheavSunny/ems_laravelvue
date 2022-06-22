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
        <tbody>
          <tr v-for="loan in loans" :key="loan.id">
            <td>{{ loan.id }}</td>
            <td>{{ loan.employee.firstname }}</td>
            <td>{{ loan.amount }}</td>
            <td>{{ loan.repay }}</td>
            <td>{{ loan.remain }}</td>
          </tr>
        </tbody>
      </table>
    </div>
    <!-- <div v-if="loans.links" class="flex justify-center mt-5 btn-group">
      <button
        v-for="(link, i) of loans.links"
        :key="i"
        :disabled="!link.url"
        v-html="link.label"
        @click.prevent="getForPage(link)"
        aria-current="page"
        class="btn"
        :class="[link.active ? 'btn-active' : '']"
      ></button>
    </div> -->
  </div>
</template>
<script setup>
import { computed } from "@vue/runtime-core";
import { useStore } from "vuex";

const theads = ["ID", "Employee", "Amount", "Repay", "Remian"];

const store = useStore();

store.dispatch("getLoanDetails");

const loans = computed(() => store.state.loans_details.data);
</script>
<style scoped>
</style>
