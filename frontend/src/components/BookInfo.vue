<script lang="ts">
import { Component, Vue } from "vue-facing-decorator";
@Component({
})
export default class BookInfo extends Vue {

}
</script>

<template>
  <div
    class="grid grid-cols-12 !font-sans text-black main-container mx-auto rounded-lg bg-gradient-to-r from-blue-100 via-violet-200 to-fuchsia-300 shadow-lg"
  >
    <div class="col-span-4 px-12">
      <img
        class="rounded-lg my-6 shadow-lg"
        src="https://images-na.ssl-images-amazon.com/images/I/71NFcRl66bL.jpg"
        alt=""
      />
    </div>

    <div class="col-span-8 pt-6 pr-10 text-left">
      <div
        class="mb-2 text-2xl font-bold tracking-tight text-gray-900"
      >
        Harry Potter and the Order of the Phoenix
      </div>
      <div class="bg-black h-1 mb-8"></div>
      <div class="text-lg my-2 grid grid-cols-3">
        <div class="flex font-semibold">
          <svg
            class="h-6 w-6 text-black mr-2"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"
            />
          </svg>

          ISBN:
        </div>

        <p class="col-span-2">0123456789</p>
      </div>

      <div class="text-lg my-2 grid grid-cols-3">
        <div class="flex font-semibold">
          <svg
            class="h-6 w-6 text-black mr-2"
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
            <circle cx="12" cy="7" r="4" />
            <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
          </svg>

          Author:
        </div>

        <p class="col-span-2">J.K. Rowling</p>
      </div>

      <div class="text-lg my-2 grid grid-cols-3">
        <div class="flex font-semibold">
          <svg
            class="h-6 w-6 text-black mr-2"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
          >
            <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z" />
            <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z" />
          </svg>

          Publisher:
        </div>

        <p class="col-span-2">Scholastic Inc.</p>
      </div>

      <div class="text-lg my-2 grid grid-cols-3">
        <div class="flex font-semibold">
          <svg
            class="h-6 w-6 text-black mr-2"
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
            <rect x="4" y="3" width="16" height="18" rx="2" />
            <rect x="8" y="7" width="8" height="3" rx="1" />
            <line x1="8" y1="14" x2="8" y2="14.01" />
            <line x1="12" y1="14" x2="12" y2="14.01" />
            <line x1="16" y1="14" x2="16" y2="14.01" />
            <line x1="8" y1="17" x2="8" y2="17.01" />
            <line x1="12" y1="17" x2="12" y2="17.01" />
            <line x1="16" y1="17" x2="16" y2="17.01" />
          </svg>

          Quantity:
        </div>

        <p class="col-span-2">20</p>
      </div>

      <button
        class="inline-flex items-center py-2 px-3 my-2 text-sm font-medium text-center text-white bg-black rounded-lg hover:scale-110 shadow-md focus:ring-4 focus:outline-none focus:ring-zinc-400"
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
  </div>
</template>

<style scoped>
@media screen and (min-width: 992px) {
  .main-container {
    width: 992px;
  }
}
</style>
