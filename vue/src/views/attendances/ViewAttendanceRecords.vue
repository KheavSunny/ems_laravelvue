<template>
  <div>
    <div class="text-5xl">View Attendances Records</div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
      <table>
        <thead>
          <tr>
            <th v-for="thead in theads" :key="thead.id">{{ thead }}</th>
          </tr>
        </thead>
        <tbody v-if="attendance_records.data.length">
          <tr
            v-for="attendance in attendance_records.data"
            :key="attendance.id"
          >
            <td>{{ attendance.id }}</td>
            <td>{{ attendance.time }}</td>
            <td>{{ attendance.status }}</td>
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
        <tbody v-else>
          <tr>
            <td class="text-center" :colspan="theads.length">No Data !!!</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div v-if="attendance_records.data.length">
      <pagination
        :links="attendance_records.links"
        :dispatch="'getAttendanceRecords'"
      ></pagination>
    </div>
  </div>
</template>

<script setup>
import { computed, ref, watch } from "@vue/runtime-core";
import { useRoute, useRouter } from "vue-router";
import { useStore } from "vuex";
import Pagination from "../../components/Pagination.vue";

const theads = ["id", "time", "status", "note", "action"];

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
