<template>
  <form @submit.prevent="props.createAttendance">
    <div class="grid xl:gap-6">
      <div class="relative z-0 w-full mb-6 group">
        <select
          class="
            select
            border-2 border-blue-400
            focus:outline-none focus:border-blue-600
            w-full
          "
          v-model="props.attendance.employee_id"
        >
          <option disabled selected value="">Select Employees</option>
          <option
            v-for="employee in props.employees"
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
          class="
            input
            border-2 border-blue-400
            focus:outline-none focus:border-blue-600
            cursor-pointer
            w-full
          "
          v-model="props.attendance.date"
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
          v-model="props.attendance.note"
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
</template>

<script setup>
import { ref } from "@vue/reactivity";

const props = defineProps({
  employees: Array,
  createAttendance: Function,
  attendance: Object,
});
</script>
