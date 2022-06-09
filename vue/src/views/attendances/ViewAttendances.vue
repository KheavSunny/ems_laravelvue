<template>
  <div>
    <div class="text-5xl">View Attendances</div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
      <pre>{{ attendances.data }}</pre>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Employee Name</th>
            <th>Date</th>
            <th v-for="num in 6" :key="num">T{{ num }}</th>
            <th>Total</th>
            <th>Overtimes</th>
          </tr>
        </thead>
        <tbody v-if="attendances">
          <tr v-for="(attendance, index) in attendances" :key="index">
            <td>{{ attendance.id }}</td>
            <td>
              {{ attendance.employee.firstname }}
              {{ attendance.employee.lastname }}
            </td>
            <td>{{ attendance.date }}</td>
            <td :class="attendance.t1.time > '08:15:00' ? 'text-red-700' : ''">
              {{ attendance.t1.time ?? "No Data" }}
            </td>
            <td>
              {{ attendance.t2 === null ? "" : attendance.t2.time }}
            </td>
            <td
              :class="
                attendance.t3 === null
                  ? ''
                  : attendance.t3.time > '13:15:00'
                  ? 'text-red-700'
                  : ''
              "
            >
              {{ attendance.t3 ?? "" }}
            </td>
            <td>{{ attendance.t4 ?? "" }}</td>
            <td>{{ attendance.t5 ?? "" }}</td>
            <td>{{ attendance.t6 ?? "" }}</td>
            <td>{{ attendance.total }}</td>
            <td>{{ attendance.overtime }}</td>
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
store.dispatch("getAttendances");
const attendances = computed(() => store.state.attendances.data);
console.log(attendances.value);
</script>

<style scoped>
</style>
