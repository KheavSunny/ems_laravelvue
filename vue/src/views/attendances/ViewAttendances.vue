<template>
  <div>
    <div class="text-5xl">View Attendances</div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
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
        <tbody>
          <tr v-for="(attendance, index) in attendances" :key="index">
            <td>{{ attendance.id }}</td>
            <td>
              {{ attendance.employee.firstname }}
              {{ attendance.employee.lastname }}
            </td>
            <td>{{ attendance.date }}</td>
            <td :class="attendance.t1.time > '08:15:00' ? 'text-red-700' : ''">
              {{ attendance.t1.time }}
            </td>
            <td>{{ attendance.t2.time }}</td>
            <td :class="attendance.t3.time > '12:15:00' ? 'text-red-700' : ''">
              {{ attendance.t3.time }}
            </td>
            <td>{{ attendance.t4.time }}</td>
            <td>{{ attendance.t5.time }}</td>
            <td>{{ attendance.t6.time }}</td>
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
</script>

<style scoped>
</style>
