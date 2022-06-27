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
            <td
              :class="
                attendance.t1 === null
                  ? ''
                  : attendance.t1.status == 'late'
                  ? 'text-red-700'
                  : ''
              "
            >
              {{ attendance.t1 === null ? "" : attendance.t1.time }}
            </td>
            <td>
              {{ attendance.t2 === null ? "" : attendance.t2.time }}
            </td>
            <td
              :class="
                attendance.t3 === null
                  ? ''
                  : attendance.t3.status == 'late'
                  ? 'text-red-700'
                  : ''
              "
            >
              {{ attendance.t3 === null ? "" : attendance.t3.time }}
            </td>
            <td>
              {{ attendance.t4 === null ? "" : attendance.t4.time }}
            </td>
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
    <div v-if="attendances.links" class="flex justify-center mt-5 btn-group">
      <button
        v-for="(link, i) of attendances.links"
        :key="i"
        :disabled="!link.url"
        v-html="link.label"
        @click.prevent="getForPage(link)"
        aria-current="page"
        class="btn"
        :class="[link.active ? 'btn-active' : '']"
      ></button>
    </div>
  </div>
</template>

<script setup>
import { computed, ref } from "@vue/runtime-core";
import { useRouter } from "vue-router";
import { useStore } from "vuex";

const store = useStore();
const router = useRouter();
store.dispatch("getAttendances");

// let attendances = ref({});

const attendances = computed(() => store.state.attendances);

function getForPage(link) {
  if (!link.url || link.active) {
    return;
  }
  store.dispatch("getAttendances", { url: link.url });
}

function attendance_records_edit(id) {
  router.push({ name: "EditAttendanceRecords", params: { id: id } });
}
</script>

<style scoped>
</style>
