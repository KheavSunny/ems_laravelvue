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
            name="username"
            type=""
            required
            placeholder="Enter your name"
            v-model="user.username"
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
            name="firstname"
            type=""
            placeholder="Enter your firstname"
            required
            v-model="user.firstname"
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
            name="lastname"
            type=""
            required
            placeholder="Enter your lastname"
            v-model="user.lastname"
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
            :disabled="loading"
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
            <svg
              v-if="loading"
              role="status"
              class="
                inline
                w-5
                h-5
                mr-2
                text-gray-200
                animate-spin
                dark:text-gray-600
                fill-blue-600
              "
              viewBox="0 0 100 101"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                fill="currentColor"
              />
              <path
                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                fill="currentFill"
              />
            </svg>
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
import { ref } from "@vue/reactivity";
const router = useRouter();

const user = {
  username: "",
  firstname: "",
  lastname: "",
  email: "",
  password: "",
  password_confirmation: "",
};

const loading = ref(false);

function register(ev) {
  ev.preventDefault();
  loading.value = true;
  store.dispatch("register", user).then(() => {
    loading.value = false;
    router.push({
      name: "Dashboard",
    });
  });
}
</script>
<style scoped>
</style>

