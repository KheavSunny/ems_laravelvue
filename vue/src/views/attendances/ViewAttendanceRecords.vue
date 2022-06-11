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
              <label
                for="editModal"
                class="btn btn-sm btn-primary modal-button mr-2"
                >Edit</label
              >
              <label
                for="deleteModal"
                class="btn btn-sm btn-error modal-button mr-2"
                >Delete</label
              >
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <!-- Modal Update -->
    <input type="checkbox" id="editModal" class="modal-toggle" />
    <div class="modal modal-bottom sm:modal-middle">
      <div class="modal-box relative">
        <label
          for="editModal"
          class="btn btn-sm btn-circle absolute right-2 top-2"
          >✕</label
        >
        <h3 class="text-lg font-bold">Congratulations random Interner user!</h3>
        <p class="py-4">
          You've been selected for a chance to get one year of subscription to
          use Wikipedia for free!
        </p>
        <div class="modal-action">
          <label for="editModal" class="btn btn-accent">Save</label>
        </div>
      </div>
    </div>
    <!-- / Modal Update -->
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
