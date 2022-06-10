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
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="attendance in attendance_records.data"
            :key="attendance.id"
          >
            <td>{{ attendance.id }}</td>
            <td>{{ attendance.time }}</td>
            <td>{{ attendance.note }}</td>
            <td>
              <button class="btn-sm rounded-lg btn-primary mr-2">Edit</button>
              <button class="btn-sm rounded-lg btn-error">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="flex justify-center mt-5 btn-group">
      <button
        v-for="(link, i) of attendance_records.links"
        :key="i"
        :disabled="!link.url"
        v-html="link.label"
        @click="getForPage(link)"
        aria-current="page"
        class="btn"
        :class="[link.active ? 'btn-active' : '']"
      ></button>
    </div>
  </div>
</template>

<script setup>
import { computed } from "@vue/runtime-core";
import { useStore } from "vuex";

const store = useStore();

store.dispatch("getAttendanceRecords");
const attendance_records = computed(() => store.state.attendance_records);

function getForPage(link) {
  if (!link.url || link.active) {
    return;
  }
  store.dispatch("getAttendanceRecords", { url: link.url });
}
</script>

<style scoped>
</style>
