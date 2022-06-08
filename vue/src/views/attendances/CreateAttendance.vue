<template>
  <div>
    <div class="text-5xl">Create Attendances</div>
    <div class="mt-6">
      <form>
        <div class="grid xl:gap-6">
          <div class="relative z-0 w-full mb-6 group">
            <select class="select w-full" v-model="attendance.employee_id">
              <option disabled selected value="">Select Employees</option>
              <option
                v-for="employee in employees"
                :key="employee.id"
                :value="employee.id"
              >
                {{ employee.firstname }}
              </option>
            </select>
          </div>
          <div class="relative z-0 w-full mb-6 group">
            <input
              type="datetime-local"
              placeholder="Type here"
              class="input w-full"
            />
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup>
import { computed } from "@vue/runtime-core";
import { useStore } from "vuex";

const store = useStore();
const attendance = {
  employee_id: "",
  date: "",
  note: "",
};

store.dispatch("getEmployees");

const employees = computed(() => store.state.employees.data);
</script>

<style scoped>
</style>
