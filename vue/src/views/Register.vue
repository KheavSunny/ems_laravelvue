<template>
  <div>
    <h2
      class="
        text-center text-4xl text-indigo-900
        font-display font-semibold
        lg:text-left
        xl:text-5xl xl:text-bold
      "
    >
      Register
    </h2>
    <div class="mt-12">
      <form @submit="register">
        <div>
          <div class="text-sm font-bold text-gray-700 tracking-wide">
            Username
          </div>
          <input
            class="
              w-full
              text-lg
              py-2
              border-b border-gray-300
              focus:outline-none focus:border-indigo-500
            "
            name="uname"
            type=""
            required
            placeholder="Enter your name"
            v-model="user.uname"
          />
        </div>
        <div class="mt-8">
          <div class="flex justify-between items-center">
            <div class="text-sm font-bold text-gray-700 tracking-wide">
              First Name
            </div>
            <!-- <div>
                  <a
                    class="
                      text-xs
                      font-display font-semibold
                      text-indigo-600
                      hover:text-indigo-800
                      cursor-pointer
                    "
                  >
                    Forgot Password?
                  </a>
                </div> -->
          </div>
          <input
            class="
              w-full
              text-lg
              py-2
              border-b border-gray-300
              focus:outline-none focus:border-indigo-500
            "
            name="fname"
            type=""
            placeholder="Enter your firstname"
            required
            v-model="user.fname"
          />
        </div>
        <div class="mt-8">
          <div class="flex justify-between items-center">
            <div class="text-sm font-bold text-gray-700 tracking-wide">
              Last Name
            </div>
            <!-- <div>
                  <a
                    class="
                      text-xs
                      font-display font-semibold
                      text-indigo-600
                      hover:text-indigo-800
                      cursor-pointer
                    "
                  >
                    Forgot Password?
                  </a>
                </div> -->
          </div>
          <input
            class="
              w-full
              text-lg
              py-2
              border-b border-gray-300
              focus:outline-none focus:border-indigo-500
            "
            name="lname"
            type=""
            required
            placeholder="Enter your lastname"
            v-model="user.lname"
          />
        </div>
        <div class="mt-8">
          <div class="flex justify-between items-center">
            <div class="text-sm font-bold text-gray-700 tracking-wide">
              Emial Address
            </div>
            <!-- <div>
                  <a
                    class="
                      text-xs
                      font-display font-semibold
                      text-indigo-600
                      hover:text-indigo-800
                      cursor-pointer
                    "
                  >
                    Forgot Password?
                  </a>
                </div> -->
          </div>
          <input
            class="
              w-full
              text-lg
              py-2
              border-b border-gray-300
              focus:outline-none focus:border-indigo-500
            "
            name="email"
            type=""
            required
            placeholder="Enter your email"
            v-model="user.email"
          />
        </div>
        <div class="mt-8">
          <div class="flex justify-between items-center">
            <div class="text-sm font-bold text-gray-700 tracking-wide">
              Password
            </div>
            <!-- <div>
                  <a
                    class="
                      text-xs
                      font-display font-semibold
                      text-indigo-600
                      hover:text-indigo-800
                      cursor-pointer
                    "
                  >
                    Forgot Password?
                  </a>
                </div> -->
          </div>
          <input
            class="
              w-full
              text-lg
              py-2
              border-b border-gray-300
              focus:outline-none focus:border-indigo-500
            "
            name="password"
            type=""
            required
            placeholder="Enter your password"
            v-model="user.password"
          />
        </div>
        <div class="mt-8">
          <div class="flex justify-between items-center">
            <div class="text-sm font-bold text-gray-700 tracking-wide">
              Confirm Password
            </div>
            <!-- <div>
                  <a
                    class="
                      text-xs
                      font-display font-semibold
                      text-indigo-600
                      hover:text-indigo-800
                      cursor-pointer
                    "
                  >
                    Forgot Password?
                  </a>
                </div> -->
          </div>
          <input
            class="
              w-full
              text-lg
              py-2
              border-b border-gray-300
              focus:outline-none focus:border-indigo-500
            "
            name="password_confirmation"
            type=""
            required
            placeholder="Enter your password confirmation"
            v-model="user.password_confirmation"
          />
        </div>
        <div class="mt-10">
          <button
            class="
              bg-indigo-500
              text-gray-100
              p-4
              w-full
              rounded-full
              tracking-wide
              font-semibold font-display
              focus:outline-none focus:shadow-outline
              hover:bg-indigo-600
              shadow-lg
            "
            type="submit"
          >
            Register
          </button>
        </div>
      </form>
      <div
        class="
          mt-12
          text-sm
          font-display font-semibold
          text-gray-700 text-center
        "
      >
        Already have an account ?
        <router-link
          :to="{ name: 'Login' }"
          class="cursor-pointer text-indigo-600 hover:text-indigo-800"
          >Sign in</router-link
        >
      </div>
    </div>
  </div>
</template>

<script setup>
import store from "../store";
import { useRouter } from "vue-router";
const router = useRouter();

const user = {
  uname: "",
  fname: "",
  lname: "",
  email: "",
  password: "",
  password_confirmation: "",
};

function register(ev) {
  ev.preventDefault();
  store.dispatch("register", user).then(() => {
    router.push({
      name: "Dashboard",
    });
  });
}
</script>
<style scoped>
</style>

