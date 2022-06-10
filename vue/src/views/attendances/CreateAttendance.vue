<template>
  <div>
    <div class="text-5xl">Create Attendances</div>
    <div class="mt-6">
      <form @submit.prevent="createAttendance">
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
              v-model="attendance.date"
            />
          </div>
          <div class="relative z-0 w-full mb-6 group">
            <textarea
              class="
                w-full
                peer
                border-b-2 border-gray-300
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
            <button type="submit" class="btn btn-primary">Create</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup>
import { computed } from "@vue/runtime-core";
import { useRouter } from "vue-router";
import { useStore } from "vuex";

const store = useStore();
const router = useRouter();
const attendance = {
  employee_id: "",
  date: "",
  note: "",
};

store.dispatch("getEmployees");

const employees = computed(() => store.state.employees.data);

function createAttendance() {
  store.dispatch("createAttendance", attendance).then(() => {
    router.push({ name: "ViewAttendances" });
  });
}
</script>

<style scoped>
</style>
