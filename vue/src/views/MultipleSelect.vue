<template>
  <div>
    <label class="typo__label" for="ajax">Select Employee</label>
    <multiselect
      v-model="selected"
      label="firstname"
      track-by="id"
      placeholder="Type to search"
      open-direction="bottom"
      :options="employees"
      :multiple="true"
      :searchable="selected.length === employees.length ? false : true"
      :internal-search="true"
      :clear-on-select="true"
      :close-on-select="false"
      :limit="3"
      :max-height="600"
      :limitText="limitText"
      :hide-selected="true"
    >
      <span slot="noResult"
        >Oops! No elements found. Consider changing the search query.</span
      >
    </multiselect>
    <pre>{{ result }}</pre>
  </div>
</template>

<script setup>
import { ref } from "@vue/reactivity";
import { computed, onMounted } from "@vue/runtime-core";
import multiselect from "vue-multiselect";
import { useStore } from "vuex";

const store = useStore();

store.dispatch("getEmployees");

const selected = ref([]);
const employees = computed(() => store.state.employees.data);

console.log(selected.value);

const ages = [
  { id: 1, name: "s1" },
  { id: 2, name: "s2" },
  { id: 3, name: "s3" },
  { id: 4, name: "s4" },
];

// console.log(selected.value);

const result = computed(() => selected.value.map((e) => e.id));

function button() {
  console.log(result.value);
}

function limitText(count) {
  return `and ${count} other employees`;
}

function clearAll() {
  selected = ref([]);
}
</script>

<style src="vue-multiselect/dist/vue-multiselect.css"></style>
