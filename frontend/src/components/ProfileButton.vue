<script lang="ts">
import { Prop, Component, Vue } from "vue-facing-decorator";
@Component({})
export default class ProfileButton extends Vue {
  @Prop
  avatar!: string
}
</script>

<template>
  <a
    href="/me"
    class="profile-button h-12 w-36 rounded-full inline-flex items-center py-2 pl-1 text-sm font-medium text-center text-black bg-gradient-to-r from-blue-100 via-violet-200 to-fuchsia-300 hover:scale-110"
  >
    <div class="h-10 w-10">
      <img
        class="rounded-full border-solid border-2 border-zinc-300"
        :src="avatar"
        alt=""
      />
    </div>

    <div class="pl-3">My Profile</div>
  </a>
</template>

<style scoped>
.profile-button:hover img {
  --tw-scale-x: 1.1 !important;
  --tw-scale-y: 1.1 !important;
  transform: translate(var(--tw-translate-x), var(--tw-translate-y))
    rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y))
    scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y)) !important;
  transform: rotate(45deg) !important;
  transition-duration: 500ms !important;
}
</style>
