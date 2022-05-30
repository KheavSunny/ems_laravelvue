<template>
  <div>
    <div class="text-5xl">Create Employee</div>
    <div class="mt-6">
      <form>
        <div class="grid xl:grid-cols-2 xl:gap-6">
          <div class="relative z-0 w-full mb-6 group">
            <input
              type="text"
              name="floating_first_name"
              id="floating_first_name"
              class="
                block
                py-2.5
                px-0
                w-full
                text-sm text-gray-900
                bg-transparent
                border-0 border-b-2 border-gray-300
                appearance-none
                dark:text-white dark:border-gray-600 dark:focus:border-blue-500
                focus:outline-none focus:ring-0 focus:border-blue-600
                peer
              "
              placeholder=" "
              required=""
              v-model="employee.firstname"
            />
            <label
              for="floating_first_name"
              class="
                peer-focus:font-medium
                absolute
                text-sm text-gray-500
                dark:text-gray-400
                duration-300
                transform
                -translate-y-6
                scale-75
                top-3
                -z-10
                origin-[0]
                peer-focus:left-0
                peer-focus:text-blue-600
                peer-focus:dark:text-blue-500
                peer-placeholder-shown:scale-100
                peer-placeholder-shown:translate-y-0
                peer-focus:scale-75 peer-focus:-translate-y-6
              "
              >First name <span class="text-red-500">*</span></label
            >
          </div>
          <div class="relative z-0 w-full mb-6 group">
            <input
              type="text"
              name="floating_last_name"
              id="floating_last_name"
              class="
                block
                py-2.5
                px-0
                w-full
                text-sm text-gray-900
                bg-transparent
                border-0 border-b-2 border-gray-300
                appearance-none
                dark:text-white dark:border-gray-600 dark:focus:border-blue-500
                focus:outline-none focus:ring-0 focus:border-blue-600
                peer
              "
              placeholder=" "
              v-model="employee.middlename"
            />
            <label
              for="floating_last_name"
              class="
                peer-focus:font-medium
                absolute
                text-sm text-gray-500
                dark:text-gray-400
                duration-300
                transform
                -translate-y-6
                scale-75
                top-3
                -z-10
                origin-[0]
                peer-focus:left-0
                peer-focus:text-blue-600
                peer-focus:dark:text-blue-500
                peer-placeholder-shown:scale-100
                peer-placeholder-shown:translate-y-0
                peer-focus:scale-75 peer-focus:-translate-y-6
              "
              >Middle name</label
            >
          </div>
          <div class="relative z-0 w-full mb-6 group">
            <input
              type="text"
              name="floating_last_name"
              id="floating_last_name"
              class="
                block
                py-2.5
                px-0
                w-full
                text-sm text-gray-900
                bg-transparent
                border-0 border-b-2 border-gray-300
                appearance-none
                dark:text-white dark:border-gray-600 dark:focus:border-blue-500
                focus:outline-none focus:ring-0 focus:border-blue-600
                peer
              "
              placeholder=" "
              required=""
              v-model="employee.lastname"
            />
            <label
              for="floating_last_name"
              class="
                peer-focus:font-medium
                absolute
                text-sm text-gray-500
                dark:text-gray-400
                duration-300
                transform
                -translate-y-6
                scale-75
                top-3
                -z-10
                origin-[0]
                peer-focus:left-0
                peer-focus:text-blue-600
                peer-focus:dark:text-blue-500
                peer-placeholder-shown:scale-100
                peer-placeholder-shown:translate-y-0
                peer-focus:scale-75 peer-focus:-translate-y-6
              "
              >Last name <span class="text-red-700">*</span></label
            >
          </div>
          <div class="relative z-0 w-full mb-6 group">
            <input
              type="text"
              name="floating_last_name"
              id="floating_last_name"
              class="
                block
                py-2.5
                px-0
                w-full
                text-sm text-gray-900
                bg-transparent
                border-0 border-b-2 border-gray-300
                appearance-none
                dark:text-white dark:border-gray-600 dark:focus:border-blue-500
                focus:outline-none focus:ring-0 focus:border-blue-600
                peer
              "
              placeholder=" "
              required=""
              v-model="employee.phone"
            />
            <label
              for="floating_last_name"
              class="
                peer-focus:font-medium
                absolute
                text-sm text-gray-500
                dark:text-gray-400
                duration-300
                transform
                -translate-y-6
                scale-75
                top-3
                -z-10
                origin-[0]
                peer-focus:left-0
                peer-focus:text-blue-600
                peer-focus:dark:text-blue-500
                peer-placeholder-shown:scale-100
                peer-placeholder-shown:translate-y-0
                peer-focus:scale-75 peer-focus:-translate-y-6
              "
              >Phone Number <span class="text-red-500">*</span></label
            >
          </div>
          <div class="relative z-0 w-full mb-6 group">
            <textarea
              name="address"
              id="address"
              class="
                block
                py-2.5
                px-0
                w-full
                text-sm text-gray-900
                bg-transparent
                border-0 border-b-2 border-gray-300
                appearance-none
                dark:text-white dark:border-gray-600 dark:focus:border-blue-500
                focus:outline-none focus:ring-0 focus:border-blue-600
                peer
              "
              placeholder=" "
              v-model="employee.address"
            >
            </textarea>
            <label
              for="floating_last_name"
              class="
                peer-focus:font-medium
                absolute
                text-sm text-gray-500
                dark:text-gray-400
                duration-300
                transform
                -translate-y-6
                scale-75
                top-1
                -z-10
                origin-[0]
                peer-focus:left-0
                peer-focus:text-blue-600
                peer-focus:dark:text-blue-500
                peer-placeholder-shown:scale-100
                peer-placeholder-shown:translate-y-0
                peer-focus:scale-75 peer-focus:-translate-y-6
              "
              >Address</label
            >
          </div>
          <div
            class="datepicker relative form-floating mb-3 xl:w-96"
            data-mdb-toggle-button="false"
          >
            <input
              type="text"
              class="
                form-control
                block
                w-full
                px-3
                py-1.5
                text-base
                font-normal
                text-gray-700
                bg-white bg-clip-padding
                border border-solid border-gray-300
                rounded
                transition
                ease-in-out
                m-0
                focus:text-gray-700
                focus:bg-white
                focus:border-blue-600
                focus:outline-none
              "
              placeholder="Select a date"
              data-mdb-toggle="datepicker"
            />
            <label for="floatingInput" class="text-gray-700"
              >Select a date</label
            >
          </div>
        </div>
        <button
          type="submit"
          class="
            text-white
            bg-blue-700
            hover:bg-blue-800
            focus:ring-4 focus:outline-none focus:ring-blue-300
            font-medium
            rounded-lg
            text-sm
            w-full
            sm:w-auto
            px-5
            py-2.5
            text-center
            dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800
          "
        >
          Submit
        </button>
      </form>
    </div>
  </div>
</template>


<script setup>
import store from "../../store";

const employee = {
  firstname: "",
  lastname: "",
  middlename: "",
  phone: "",
  address: "",
  birthdate: "",
};
</script>
<style scoped></style>;
