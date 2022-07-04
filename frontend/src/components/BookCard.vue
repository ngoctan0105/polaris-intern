<script lang="ts">
import { Prop, Component, Vue } from "vue-facing-decorator";
@Component({
})
export default class BookCard extends Vue {
  @Prop
  name!: string
  @Prop
  cover!: string
}
</script>

<template>
  <a
    class="px-3 pt-3 book-card font-sans mx-6 my-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-lg hover:bg-gray-100"
    href="/detail"
  >
    <div href="#">
      <img class="rounded-lg hover:scale-110" :src="cover" alt="" />
    </div>
    <div class="p-5">
      <div href="#">
        <div class="my-3 text-lg font-bold tracking-tight text-gray-900">
          {{ name }}
        </div>
      </div>
      <button
        href="#"
        class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-gradient-to-r from-fuchsia-600 via-violet-500 to-blue-400 rounded-lg hover:scale-110 shadow-md focus:ring-4 focus:outline-none focus:ring-violet-300"
      >
        Add to cart
        <svg
          class="ml-2 -mr-1 h-6 w-6 text-white"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"
          />
        </svg>
      </button>
    </div>
  </a>
</template>

<style scoped></style>
