<script lang="ts">
import { Component, Vue } from 'vue-facing-decorator'
@Component({
})
export default class LoginScreen extends Vue {
  onLogin() {
    localStorage.isLoginScreen = true;
  }
}
</script>

<template>
  <div class="px-6 h-full text-gray-800 pt-16">
    <h1 class="font-sans text-5xl font-medium">Welcome to ...</h1>
    <div
      class="xl:justify-center lg:justify-between justify-center items-center flex-wrap h-full g-6"
    >
      <div>
        <img
          src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
          class="w-1/2 mx-auto"
          alt="Sample image"
        />
      </div>
      <div class="!justify-center !text-center !mx-auto">
        <form>
          <div
            class="flex flex-row items-center justify-center lg:justify-start"
          >
            <a
              class="login-button font-sans !text-center mx-auto mt-8 flex flex-row rounded-full outline-violet-900 outline-offset-2 outline outline-2 !w-80 !text-black py-2 bg-white focus:ring-2 focus:ring-violet-200"
              href="/home"
              role="button"
              style="text-transform: none"
              @click="onLogin()"
            >
              <svg
                aria-hidden="true"
                class="basis-1/6 native svg-icon iconGoogle"
                width="24"
                height="24"
                viewBox="0 0 18 18"
              >
                <path
                  d="M16.51 8H8.98v3h4.3c-.18 1-.74 1.48-1.6 2.04v2.01h2.6a7.8 7.8 0 0 0 2.38-5.88c0-.57-.05-.66-.15-1.18Z"
                  fill="#4285F4"
                ></path>
                <path
                  d="M8.98 17c2.16 0 3.97-.72 5.3-1.94l-2.6-2a4.8 4.8 0 0 1-7.18-2.54H1.83v2.07A8 8 0 0 0 8.98 17Z"
                  fill="#34A853"
                ></path>
                <path
                  d="M4.5 10.52a4.8 4.8 0 0 1 0-3.04V5.41H1.83a8 8 0 0 0 0 7.18l2.67-2.07Z"
                  fill="#FBBC05"
                ></path>
                <path
                  d="M8.98 4.18c1.17 0 2.23.4 3.06 1.2l2.3-2.3A8 8 0 0 0 1.83 5.4L4.5 7.49a4.77 4.77 0 0 1 4.48-3.3Z"
                  fill="#EA4335"
                ></path>
              </svg>
              <div class="basis-3/4 justify-center text-lg">
                Login with Google
              </div>
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<style scoped>
.login-button:hover svg {
  --tw-scale-x: 1.1 !important;
  --tw-scale-y: 1.1 !important;
  transform: translate(var(--tw-translate-x), var(--tw-translate-y))
    rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y))
    scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y)) !important;
  transform: rotate(45deg) !important;
  transition-duration: 300ms !important;
}
</style>
