<template>
  <div>
    <div class="text-5xl">Edit Atttendance Records</div>

    <div class="mt-5 p-20 bg-white shadow-xl rounded-xl">
      <div class="relative overflow-x-auto shadow-md sm:rounded-lg mb-5">
        <table v-if="attendance">
          <thead>
            <tr>
              <th>ID</th>
              <th>Time</th>
              <th>Note</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="i in [1, 2, 3, 4, 5, 6]" :key="i">
              <td v-if="attendance?.[`t${i}`]">
                {{ attendance?.[`t${i}`]?.id ?? "" }}
              </td>
              <td v-if="attendance?.[`t${i}`]">
                {{ attendance?.[`t${i}`]?.time ?? "" }}
              </td>
              <td v-if="attendance?.[`t${i}`]">
                {{ attendance?.[`t${i}`]?.note ?? "" }}
              </td>
              <td v-if="attendance?.[`t${i}`]">
                <label
                  :for="'editModal' + attendance?.[`t${i}`]?.id"
                  class="btn btn-sm btn-primary modal-button mr-2"
                  @click="editAttendanceRecord(attendance?.[`t${i}`]?.id)"
                  >Edit</label
                >
                <!-- Modal Update -->
                <input
                  type="checkbox"
                  :id="'editModal' + attendance?.[`t${i}`]?.id"
                  class="modal-toggle"
                />
                <div class="modal modal-bottom sm:modal-middle">
                  <div class="modal-box h-auto relative">
                    <label
                      :for="'editModal' + attendance?.[`t${i}`]?.id"
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
                          :for="'editModal' + attendance?.[`t${i}`]?.id"
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
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>
<script setup>
import { computed, ref, watch } from "@vue/runtime-core";
import { useRoute } from "vue-router";
import { useStore } from "vuex";

const store = useStore();
const route = useRoute();

let attendance_record = ref({
  id: "",
  time: "",
  note: "",
});

// let attendance_records = ref([]);

store.dispatch("getAttendance", route.params.id);

// watch(
//   () => store.state.attendance.data,
//   (newVal, oldVal) => {
//     attendance_records.value.push(newVal);
//   }
// );

const attendance = computed(() => store.state.attendance.data);

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
    store.dispatch("getAttendance", route.params.id);
  });
}
</script>
<style scoped>
</style>
