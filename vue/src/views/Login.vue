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
      Log in
    </h2>
    <div class="mt-12">
      <form>
        <div>
          <div class="text-sm font-bold text-gray-700 tracking-wide">
            Email Address
          </div>
          <input
            class="
              w-full
              text-lg
              py-2
              border-b border-gray-300
              focus:outline-none focus:border-indigo-500
            "
            type=""
            placeholder="Enter your email"
          />
        </div>
        <div class="mt-8">
          <div class="flex justify-between items-center">
            <div class="text-sm font-bold text-gray-700 tracking-wide">
              Password
            </div>
            <div>
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
            </div>
          </div>
          <input
            class="
              w-full
              text-lg
              py-2
              border-b border-gray-300
              focus:outline-none focus:border-indigo-500
            "
            type=""
            placeholder="Enter your password"
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
          >
            Log In
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
        Don't have an account ?
        <router-link
          :to="{ name: 'Register' }"
          class="cursor-pointer text-indigo-600 hover:text-indigo-800"
          >Sign up</router-link
        >
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Login",
};
</script>
<style scoped>
</style>
