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
                :for="'editModal' + attendance.id"
                class="btn btn-sm btn-primary modal-button mr-2"
                @click="editAttendanceRecord(attendance.id)"
                >Edit</label
              >
              <label
                for="deleteModal"
                class="btn btn-sm btn-error modal-button mr-2"
                @click.prevent="deleteAttendanceRecord(attendance.id)"
                >Delete</label
              >
            </td>
            <!-- Modal Update -->
            <input
              type="checkbox"
              :id="'editModal' + attendance.id"
              class="modal-toggle"
            />
            <div class="modal modal-bottom sm:modal-middle">
              <div class="modal-box h-auto relative">
                <label
                  :for="'editModal' + attendance.id"
                  class="btn btn-sm btn-circle absolute right-2 top-2"
                  >✕</label
                >
                <h3 class="text-lg font-bold mb-2">
                  Edit Attendance Record {{ attendance.time }}
                </h3>
                <form>
                  <div class="relative">
                    <input
                      class="
                        input
                        w-full
                        border border-blue-400
                        mb-2
                        focus:border-blue-600
                      "
                      type="time"
                      step="2"
                      v-model="attendance_record.time"
                    />
                    <textarea
                      cols="10"
                      rows="5"
                      class="
                        w-full
                        border border-blue-400
                        text-gray-900
                        focus:border-blue-600
                        p-4
                        rounded-lg
                      "
                      placeholder="Input Note"
                      v-model="attendance_record.note"
                    ></textarea>
                  </div>
                  <div class="modal-action">
                    <label
                      :for="'editModal' + attendance.id"
                      class="btn btn-accent cursor-pointer"
                      @click="saveAttendanceRecord"
                    >
                      Save
                    </label>
                  </div>
                </form>
              </div>
            </div>
            <!-- / Modal Update -->
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
import { computed, ref, watch } from "@vue/runtime-core";
import { useRoute, useRouter } from "vue-router";
import { useStore } from "vuex";

const store = useStore();
const route = useRoute();
const router = useRouter();

const attendance_record = ref({
  id: "",
  time: "",
  note: "",
});

store.dispatch("getAttendanceRecords");

let attendance_records = ref([]);

attendance_records = computed(() => store.state.attendance_records);

function getForPage(link) {
  if (!link.url || link.active) {
    return;
  }
  store.dispatch("getAttendanceRecords", { url: link.url });
}

function editAttendanceRecord(id) {
  store.dispatch("getAttendanceRecord", id);
}

watch(
  () => store.state.attendance_record.data,
  (newVal, oldVal) => {
    attendance_record.value = {
      ...JSON.parse(JSON.stringify(newVal)),
    };
  }
);

function saveAttendanceRecord() {
  store.dispatch("saveAttendanceRecord", attendance_record.value).then(() => {
    store.dispatch("getAttendanceRecords");
  });
}

function deleteAttendanceRecord(id) {
  store.dispatch("deleteAttendanceRecord", id).then(() => {
    store.dispatch("getAttendanceRecords");
  });
}
</script>

<style scoped>
</style>
