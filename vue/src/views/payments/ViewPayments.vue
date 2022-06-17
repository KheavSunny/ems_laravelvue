<template>
  <div>
    <div class="text-5xl">View payments</div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
      <table>
        <thead>
          <tr class="text-center">
            <th>Ref_No</th>
            <th>Firstname</th>
            <th>Date From</th>
            <th>Date To</th>
            <th>Status</th>
            <th></th>
          </tr>
        </thead>
        <tbody v-if="payments">
          <tr v-for="payment in payments" :key="payment.id" class="text-center">
            <td>{{ payment.ref_no }}</td>
            <td v-if="payment.employee">{{ payment.employee.firstname }}</td>
            <td>{{ formatDate(payment.date_from) }}</td>
            <td>{{ formatDate(payment.date_to) }}</td>
            <td v-if="payment.status == false" class="text-center">
              <span class="badge badge-error badge-sm py-3 px-5">pending</span>
            </td>
            <td v-else class="text-center">
              <span class="badge badge-primary badge-sm py-3 px-5">paid</span>
            </td>
            <td>
              <div class="btn-group">
                <a
                  href="#my-modal"
                  v-if="payment.status == false"
                  class="
                    btn-sm
                    mr-2
                    btn-primary
                    hover:btn-secondary
                    rounded
                    pt-1.5
                  "
                >
                  Pay
                </a>
                <router-link
                  :to="{ name: 'EditPayment', params: { id: payment.id } }"
                >
                  <button class="btn-sm btn-accent rounded mr-2">Edit</button>
                </router-link>
                <button
                  @click.prevent="deletePayment(payment.id)"
                  class="
                    btn-sm btn-error
                    rounded
                    hover:bg-red-900 hover:text-white
                  "
                >
                  Delete
                </button>
              </div>
            </td>
            <div class="modal" id="my-modal">
              <div class="modal-box">
                <h3 class="font-bold text-lg">
                  Payments ( {{ formatDate(payment.date_from) }} -
                  {{ formatDate(payment.date_to) }} )
                </h3>
                <p class="py-4">Payments Pending</p>
                <div class="modal-action">
                  <a
                    href="#"
                    class="
                      btn btn-sm btn-error
                      hover:bg-red-900 hover:text-white
                    "
                    >Cancel</a
                  >
                  <a
                    @click="paid(payment.id)"
                    class="
                      btn btn-sm btn-success
                      rounded
                      hover:bg-green-700 hover:text-white
                    "
                  >
                    Paid
                  </a>
                </div>
              </div>
            </div>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>
<script setup>
import { computed } from "@vue/runtime-core";
import { useStore } from "vuex";
import moment from "moment";

function formatDate(date) {
  return moment(date).format("DD/MM/YYYY");
}

const store = useStore();

store.dispatch("getPayments");
const payments = computed(() => store.state.payments.data);

function deletePayment(id) {
  store.dispatch("deletePayment", id).then(() => {
    store.dispatch("getPayments");
  });
}

function paid(id) {
  store.dispatch("changeToPaid", id).then(() => {
    store.dispatch("getPayments");
  });
}
</script>
<style scoped>
</style>
