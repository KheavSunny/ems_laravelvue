<template>
  <div>
    <div class=" text-3xl lg:text-5xl">
      Create
      <span class=" text-2xl lg:text-4xl">{{
        openTab === 1 ? "Attendance" : "Permission & Absent"
      }}</span>
    </div>
    <div class="flex flex-wrap">
      <div class="w-full">
        <ul class="flex mb-0 list-none flex-wrap pt-3 pb-4 flex-row">
          <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
            <a
              class="
                text-xs
                font-bold
                uppercase
                px-5
                py-3
                shadow-lg
                rounded
                block
                leading-normal
                cursor-pointer
              "
              @click="toggleTabs(1)"
              :class="{
                'text-blue-400 bg-white border border-blue-400': openTab !== 1,
                'text-white bg-blue-400': openTab === 1,
              }"
            >
              <i class="fas fa-space-shuttle text-base mr-1"></i> Attendance
            </a>
          </li>
          <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
            <a
              class="
                text-xs
                font-bold
                uppercase
                px-5
                py-3
                shadow-lg
                rounded
                block
                leading-normal
                cursor-pointer
              "
              @click="toggleTabs(2)"
              :class="{
                'text-blue-400 bg-white border border-blue-400': openTab !== 2,
                'text-white bg-blue-400': openTab === 2,
              }"
            >
              <i class="fas fa-cog text-base mr-1"></i> Permission & Absent
            </a>
          </li>
        </ul>
        <div
          class="
            relative
            flex flex-col
            min-w-0
            break-words
            bg-white
            w-full
            mb-6
            shadow-lg
            rounded-xl
            p-20
          "
        >
          <div class="px-4 py-5 flex-auto">
            <div class="tab-content tab-space">
              <div :class="{ hidden: openTab !== 1, block: openTab === 1 }">
                <create-attendance-tab
                  :createAttendance="createAttendance"
                  :employees="employees"
                  :attendance="attendance"
                ></create-attendance-tab>
              </div>
              <div :class="{ hidden: openTab !== 2, block: openTab === 2 }">
                <create-permission-absent-tab></create-permission-absent-tab>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { computed, ref } from "@vue/runtime-core";
import { useRouter } from "vue-router";
import { useStore } from "vuex";
import CreateAttendanceTab from "../../components/tabAttendance/CreateAttendanceTab.vue";
import CreatePermissionAbsentTab from "../../components/tabAttendance/CreatePermissionAbsentTab.vue";

let openTab = ref(1);

function toggleTabs(tabNumber) {
  openTab.value = tabNumber;
}

const store = useStore();
const router = useRouter();
const attendance = {
  employee_id: "",
  date: "",
  note: "",
};

store.dispatch("getEmployees");

const employees = computed(() => store.state.employees.data);

function createAttendance() {
  store.dispatch("createAttendance", attendance).then(() => {
    router.push({ name: "ViewAttendances" });
  });
}
</script>

<style scoped>
</style>
