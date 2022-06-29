<template>
  <div>
    <div class="text-5xl">View Attendances</div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th class="w-2/10">Employee Name</th>
            <th>Date</th>
            <th v-for="num in 6" :key="num">T{{ num }}</th>
            <th>Total</th>
            <th>Overtimes</th>
          </tr>
        </thead>
        <tbody v-if="attendances">
          <tr
            v-for="attendance in attendances.data"
            :key="attendance.id"
            class="cursor-pointer"
            @click="attendance_records_edit(attendance.id)"
          >
            <td>{{ attendance.id }}</td>
            <td>
              {{ attendance.employee.lastname }}
              {{ attendance.employee.firstname }}
            </td>
            <td>{{ attendance.date }}</td>
            <td v-if="attendance.t1">
              <div
                v-if="attendance.t1.status == 'permission'"
                class="badge badge-sm badge-warning gap-2"
              >
                Permission
              </div>
              <div
                v-else-if="attendance.t1.status == 'absent'"
                class="badge badge-sm badge-error gap-2"
              >
                Absent
              </div>
              <div
                v-else
                :class="
                  attendance.t1 === null
                    ? ''
                    : attendance.t1.status == 'late'
                    ? 'text-red-700'
                    : ''
                "
              >
                {{ attendance.t1 === null ? "" : attendance.t1.time }}
              </div>
            </td>
            <td v-else></td>
            <td v-if="attendance.t2">
              <div
                v-if="attendance.t1.status == 'permission'"
                class="badge badge-sm badge-warning"
              >
                Permission
              </div>
              <div
                v-else-if="attendance.t1.status == 'absent'"
                class="badge badge-sm badge-error"
              >
                Absent
              </div>
              <div v-else>
                {{ attendance.t2 === null ? "" : attendance.t2.time }}
              </div>
            </td>
            <td v-else></td>
            <td v-if="attendance.t3">
              <div
                v-if="attendance.t3.status == 'permission'"
                class="badge badge-sm badge-warning gap-2"
              >
                Permission
              </div>
              <div
                v-else-if="attendance.t3.status == 'absent'"
                class="badge badge-sm badge-error gap-2"
              >
                Absent
              </div>
              <div
                v-else
                :class="
                  attendance.t3 === null
                    ? ''
                    : attendance.t3.status == 'late'
                    ? 'text-red-700'
                    : ''
                "
              >
                {{ attendance.t3 === null ? "" : attendance.t3.time }}
              </div>
            </td>
            <td v-else></td>
            <td v-if="attendance.t4">
              <div
                v-if="attendance.t3.status == 'permission'"
                class="badge badge-sm badge-warning"
              >
                Permission
              </div>
              <div
                v-else-if="attendance.t3.status == 'absent'"
                class="badge badge-sm badge-error"
              >
                Absent
              </div>
              <div v-else>
                {{ attendance.t4 === null ? "" : attendance.t4.time }}
              </div>
            </td>
            <td v-else></td>
            <td>
              {{ attendance.t5 === null ? "" : attendance.t5.time }}
            </td>
            <td>
              {{ attendance.t6 === null ? "" : attendance.t6.time }}
            </td>
            <td>{{ attendance.total }}</td>
            <td>{{ attendance.overtime }}</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div v-if="attendances.links">
      <pagination
        :links="attendances.links"
        :dispatch="'getAttendances'"
      ></pagination>
    </div>
  </div>
</template>

<script setup>
import { computed, ref } from "@vue/runtime-core";
import { useRouter } from "vue-router";
import { useStore } from "vuex";
import Pagination from "../../components/Pagination.vue";

const store = useStore();
const router = useRouter();
store.dispatch("getAttendances");

const attendances = computed(() => store.state.attendances);

function attendance_records_edit(id) {
  router.push({ name: "EditAttendanceRecords", params: { id: id } });
}
</script>

<style scoped>
</style>
