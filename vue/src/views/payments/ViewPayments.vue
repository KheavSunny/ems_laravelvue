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
        <tbody>
          <tr
            v-for="(payment, index) in payments.data"
            :key="index"
            class="text-center"
          >
            <td>{{ payment.ref_no }}</td>
            <td>{{ payment.employee.firstname }}</td>
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
                  :href="`#mymodal${payment.id}`"
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
                  Pay </a
                ><a
                  :href="`#mymodal${payment.id}`"
                  v-else
                  class="
                    btn-sm
                    mr-2
                    bg-green-800
                    text-white
                    hover:btn-secondary
                    rounded
                    pt-1.5
                  "
                >
                  View
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
            <div
              class="modal modal-bottom sm:modal-middle"
              :id="`mymodal${payment.id}`"
            >
              <div class="modal-box bg-base-300">
                <h3 class="font-bold text-lg mb-3">
                  Payments ( {{ formatDate(payment.date_from) }} -
                  {{ formatDate(payment.date_to) }} )
                </h3>
                <div class="card w-auto bg-slate-500 text-white">
                  <div class="card-body">
                    <h2 class="card-title items-center justify-center">
                      {{
                        payment.status == -false
                          ? "Not yet to pay!"
                          : "Paid already!"
                      }}
                    </h2>
                    <div class="text-left flex justify-between">
                      <div class="text-lg">Name :</div>
                      <div class="text-lg">
                        {{ payment.employee.firstname }}
                        {{ payment.employee.lastname }}
                      </div>
                    </div>
                    <div class="text-left flex justify-between">
                      <div class="text-lg">Phone :</div>
                      <div class="text-lg">
                        {{ payment.employee.phone }}
                      </div>
                    </div>
                    <div class="text-left flex justify-between">
                      <div class="text-lg">Day Work :</div>
                      <div class="text-lg">
                        {{ payment.working_day }} day(s)
                      </div>
                    </div>
                    <div class="text-left flex justify-between">
                      <div class="text-lg">Overtime :</div>
                      <div class="text-lg">
                        {{ payment.overtime }}
                      </div>
                    </div>
                    <div class="text-left flex justify-between">
                      <div class="text-lg">Loan Repay :</div>
                      <div v-if="payment.status == true" class="text-lg">
                        {{ payment.loan_repay }} $
                      </div>
                      <input
                        v-else
                        type="number"
                        class="text-black p-2"
                        name="loan_repay"
                        value="0"
                      />
                    </div>
                    <div class="text-left flex justify-between">
                      <div class="text-lg">SubTotal :</div>
                      <div class="text-lg">{{ payment.subtotal }} $</div>
                    </div>
                  </div>
                </div>
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
                    v-if="payment.status == false"
                    href="#"
                    @click="paid(payment.id)"
                    class="
                      btn btn-sm btn-success
                      rounded
                      hover:bg-green-700 hover:text-white
                    "
                  >
                    Pay
                  </a>
                </div>
              </div>
            </div>
          </tr>
        </tbody>
      </table>
    </div>
    <div v-if="payments.links" class="flex justify-center mt-5 btn-group">
      <button
        v-for="(link, i) of payments.links"
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
import { computed } from "@vue/runtime-core";
import { useStore } from "vuex";
import moment from "moment";

function formatDate(date) {
  return moment(date).format("DD/MM/YYYY");
}

const store = useStore();

store.dispatch("getPayments");
const payments = computed(() => store.state.payments);

function getForPage(link) {
  if (!link.url || link.active) {
    return;
  }

  store.dispatch("getPayments", { url: link.url });
}

function deletePayment(id) {
  store.dispatch("deletePayment", id).then(() => {
    store.dispatch("getPayments");
  });
}

const loan_repay = function paid(id) {
  store.dispatch("changeToPaid", id).then(() => {
    store.dispatch("getPayments");
  });
};
</script>
<style scoped>
</style>
