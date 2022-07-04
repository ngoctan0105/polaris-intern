<script lang="ts">
import { Component, Vue } from "vue-facing-decorator";
import ProfileButton from "./ProfileButton.vue";
import CartButton from "./CartButton.vue";
@Component({
  components: {
    ProfileButton,
    CartButton,
  },
})
export default class HeaderComponent extends Vue {
  get user() {
    return {
      id: "215529249",
      email: "tan@polarisec.com",
      name: "Pham Ngoc Tan",
      avatar:
        "https://symbols.vn/wp-content/uploads/2021/11/Hinh-Avatar-Free-Fire-cuc-ngau.jpg",
    };
  }
  onLogout() {
    localStorage.isLoginScreen = '';
  }
  // mounted() {
  //   localStorage.isLogin = true;
  // }
}
</script>

<template>
  <div
    class="h-16 bg-black flex justify-between font-sans items-center px-4 sticky top-0 z-10"
  >
    <div class="flex">
      <a
        class="self-center mx-2 hover:scale-110 hover:duration-500"
        href="/home"
      >
        <svg
          class="h-10 w-10 text-white"
          width="24"
          height="24"
          viewBox="0 0 24 24"
          stroke-width="2"
          stroke="currentColor"
          fill="none"
          stroke-linecap="round"
          stroke-linejoin="round"
        >
          <path stroke="none" d="M0 0h24v24H0z" />
          <polyline points="5 12 3 12 12 3 21 12 19 12" />
          <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
          <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
        </svg>
      </a>

      <div class="text-white self-center">Hello, Ngoc Tan!</div>
    </div>

    <div class="flex">
      <ProfileButton :avatar="user.avatar"/>

      <CartButton />
      <a
        class="self-center mx-2 hover:scale-110 hover:duration-500"
        href="/login"
        @click="onLogout()"
      >
        <svg
          class="h-10 w-10 text-white"
          width="24"
          height="24"
          viewBox="0 0 24 24"
          stroke-width="2"
          stroke="currentColor"
          fill="none"
          stroke-linecap="round"
          stroke-linejoin="round"
        >
          <path stroke="none" d="M0 0h24v24H0z" />
          <path
            d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2"
          />
          <path d="M7 12h14l-3 -3m0 6l3 -3" />
        </svg>
      </a>
    </div>
  </div>
</template>

<style scoped></style>
