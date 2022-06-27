<template>
  <form>
    <div class="relative z-0 w-full mb-6 group">
      <select
        class="
          select
          border-2 border-blue-400
          focus:outline-none focus:border-blue-600
          w-full
        "
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
    </div>
    <div class="relative z-0 w-full mb-6 group">
      <select
        class="
          select
          border-2 border-blue-400
          focus:outline-none focus:border-blue-600
          w-full
        "
        v-model="attendance.half_or_full"
      >
        <option disabled selected value="">Select Half or Full</option>
        <option value="2">Half Day</option>
        <option value="4">Full Day</option>
      </select>
    </div>
    <div class="relative z-0 w-full mb-6 group">
      <select
        class="
          select
          border-2 border-blue-400
          focus:outline-none focus:border-blue-600
          w-full
        "
        v-model="attendance.status"
      >
        <option disabled selected value="">Select Status</option>
        <option value="permission">Permission</option>
        <option value="absent">Absent</option>
      </select>
    </div>
    <div class="relative z-0 w-full mb-6 lg:mb-3 group">
      <div class="flex flex-col lg:flex-row">
        <div class="form-control w-full mr-2 mb-6">
          <label class="input-group">
            <span class="bg-blue-400">From</span>
            <input
              type="date"
              placeholder="Type here"
              class="
                input
                border-2 border-blue-400
                focus:outline-none focus:border-blue-600
                cursor-pointer
                w-full
              "
              v-model="attendance.date_from"
            />
          </label>
        </div>
        <div class="form-control w-full">
          <label class="input-group">
            <span class="bg-blue-400">To</span>
            <input
              type="date"
              placeholder="Type here"
              class="
                input
                border-2 border-blue-400
                focus:outline-none focus:border-blue-600
                cursor-pointer
                w-full
              "
              v-model="attendance.date_to"
            />
          </label>
        </div>
      </div>
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
  </form>
</template>

<script setup>
import { computed, ref } from "@vue/runtime-core";
import { useStore } from "vuex";

const store = useStore();

const attendance = ref({
  employee_id: "",
  half_or_full: "",
  status: "",
  date_from: "",
  date_to: "",
  note: "",
});

store.dispatch("getEmployees");

const employees = computed(() => store.state.employees.data);
</script>
