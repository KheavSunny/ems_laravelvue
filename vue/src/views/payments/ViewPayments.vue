<template>
  <div>
    <div class="text-5xl">View payments</div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
      <table>
        <thead>
          <tr class="text-center">
            <th v-for="thead in theads" :key="thead.id">{{ thead }}</th>
          </tr>
        </thead>
        <tbody v-if="payments.data.length">
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
            <!-- Modal payment -->

            <div
              class="modal modal-bottom sm:modal-middle"
              :id="`mymodal${payment.id}`"
            >
              <form
                @submit.prevent="paid(payment.id)"
                class="w-full flex justify-center"
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
                        <div class="text-lg">Salary :</div>
                        <div class="text-lg">
                          {{ payment.employee.salary }} $
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
                      <div
                        v-if="payment.loan_limit > 0"
                        class="text-left flex justify-between"
                      >
                        <div class="text-lg">
                          Loan Repay
                          <small v-if="payment.status == false" class="text-warning"
                            >({{ payment.loan_limit }})</small
                          >
                          :
                        </div>
                        <div v-if="payment.status == true" class="text-lg">
                          {{ payment.loan_repay }} $
                        </div>
                        <input
                          v-else
                          type="number"
                          class="text-black p-2 w-auto"
                          name="loan_repay"
                          v-model="loan_repay"
                          min="0"
                          :max="
                            payment.loan_limit >= payment.subtotal
                              ? payment.subtotal
                              : payment.loan_limit
                          "
                          required
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
                    <button
                      v-if="payment.status == false"
                      type="submit"
                      class="
                        btn btn-sm btn-success
                        rounded
                        hover:bg-green-700 hover:text-white
                      "
                    >
                      Pay
                    </button>
                  </div>
                </div>
              </form>
            </div>

            <!-- /Modal payment -->
          </tr>
        </tbody>
        <tbody v-else>
          <tr>
            <td :colspan="theads.length" class="text-center">No Data !!!</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div v-if="payments.data.length">
      <pagination
        :links="payments.links"
        :dispatch="'getPayments'"
      ></pagination>
    </div>
    <div v-else></div>
  </div>
</template>
<script setup>
import { computed, ref } from "@vue/runtime-core";
import { useStore } from "vuex";
import moment from "moment";
import Pagination from "../../components/Pagination.vue";

function formatDate(date) {
  return moment(date).format("DD/MM/YYYY");
}

const theads = ["Ref_no", "Name", "Date From", "Date To", "Status", ""];

const store = useStore();

store.dispatch("getPayments");
const payments = computed(() => store.state.payments);

function deletePayment(id) {
  store.dispatch("deletePayment", id).then(() => {
    store.dispatch("getPayments");
  });
}

const loan_repay = ref(0);
function paid(id) {
  store
    .dispatch("changeToPaid", { id: id, loan_repay: loan_repay.value })
    .then(() => {
      store.dispatch("getPayments");
    });
}
</script>
<style scoped>
</style>
