<template>
  <div>
    <pre>{{ attendance.employee_id }}</pre>
    <div class="tabs mb-6 flex justify-center w-auto">
      <a
        class="tab text-black"
        :class="{ 'bg-blue-400 rounded-md': selectEmployee == 1 }"
        @click="selectTab(1)"
        >One Attendance</a
      >
      <a
        class="tab text-black"
        :class="{ 'bg-blue-400 rounded-md': selectEmployee == 2 }"
        @click="selectTab(2)"
        >Many Attendances</a
      >
    </div>
    <form @submit.prevent="createAttendance">
      <div class="grid xl:gap-6">
        <div class="relative z-0 w-full mb-6 group">
          <select
            class="
              select
              border-2 border-blue-400
              focus:outline-none focus:border-blue-600
              w-full
            "
            multiple
            :class="{
              hidden: selectEmployee !== 1,
              block: selectEmployee === 1,
            }"
            required
            v-model="attendance.employee_id"
          >
            <option disabled selected value="">Select Employees</option>
            <option
              v-for="employee in employees"
              :key="employee.id"
              :value="employee.id"
            >
              {{ employee.firstname }}
            </option>
          </select>
          <multiselect
            v-model="selected"
            label="firstname"
            open-direction="top"
            placeholder="Type to search employees"
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
            class="
              border border-blue-400
              rounded
              focus:outline-none focus:border-blue-600
            "
            :class="{
              hidden: selectEmployee !== 2,
              block: selectEmployee === 2,
            }"
          >
          </multiselect>
        </div>
        <div class="relative z-0 w-full mb-6 group">
          <input
            type="datetime-local"
            placeholder="Type here"
            class="
              input
              border-2 border-blue-400
              focus:outline-none focus:border-blue-600
              cursor-pointer
              w-full
            "
            required
            v-model="attendance.date"
          />
        </div>
        <div class="relative z-0 w-full mb-6 group">
          <textarea
            class="
              w-full
              peer
              border-2 border-blue-400
              text-gray-900
              placeholder-transparent
              focus:outline-none focus:border-blue-600
              p-4
              rounded-lg
            "
            cols="30"
            rows="5"
            placeholder="Input Note"
            v-model="attendance.note"
          ></textarea>
          <label
            for="Input Note"
            class="
              absolute
              left-2
              -top-5
              text-gray-600 text-sm
              transition-all
              peer-placeholder-shown:text-base
              peer-placeholder-shown:text-gray-400
              peer-placeholder-shown:top-2
              peer-focus:-top-5
              peer-focus:text-gray-600
              peer-focus:text-sm
              peer-focus:left-2
            "
            >Input Note</label
          >
        </div>
        <div>
          <button
            type="submit"
            class="
              btn
              bg-blue-600
              border-blue-600
              hover:bg-blue-700 hover:border-blue-700
            "
          >
            Create
          </button>
        </div>
      </div>
    </form>
  </div>
</template>

<script setup>
import { ref } from "@vue/reactivity";
import { computed } from "@vue/runtime-core";
import { useRouter } from "vue-router";
import { useStore } from "vuex";
import multiselect from "vue-multiselect";

const store = useStore();
const router = useRouter();

const selected = ref([]);
let selectEmployee = ref(1);

function selectTab(howmany) {
  selectEmployee.value = howmany;
}

const attendance = ref({
  employee_id: [],
  date: "",
  note: "",
});

store.dispatch("getEmployees");

const employees = computed(() => store.state.employees.data);

function createAttendance() {
  store.dispatch("createAttendance", attendance.value).then(() => {
    router.push({ name: "ViewAttendances" });
  });
}

function limitText(count) {
  return `and ${count} other employees`;
}

function clearAll() {
  selected = ref([]);
}
</script>

<style src="vue-multiselect/dist/vue-multiselect.css"></style>
