<template>
  <div>
    <div class="text-5xl">View Attendances Records</div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Time</th>
            <th>Note</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="attendance in attendance_records" :key="attendance.id">
            <td>{{ attendance.id }}</td>
            <td>{{ attendance.time }}</td>
            <td>{{ attendance.note }}</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="flex justify-center mt-5 btn-group">
      <button class="btn">1</button>
      <button class="btn btn-active">2</button>
      <button class="btn">3</button>
      <button class="btn">4</button>
    </div>
  </div>
</template>

<script setup>
import { computed } from "@vue/runtime-core";
import { useStore } from "vuex";

const store = useStore();

store.dispatch("getAttendanceRecords");
const attendance_records = computed(() => store.state.attendance_records.data);
</script>

<style scoped>
</style>
