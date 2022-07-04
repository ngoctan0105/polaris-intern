<script lang="ts">
import { Component, Vue } from "vue-facing-decorator";
@Component({})
export default class CartScreen extends Vue {
  get books() {
    return [
      {
        cover:
          "https://images-na.ssl-images-amazon.com/images/I/71NFcRl66bL.jpg",
        name: "ABC",
        quantity: 20,
        startDate: "01/07/2022",
        endDate: "15/07/2022",
      },
      {
        cover:
          "https://images-na.ssl-images-amazon.com/images/I/71NFcRl66bL.jpg",
        name: "XYZ",
        quantity: 15,
        startDate: "26/06/2022",
        endDate: "10/07/2022",
      },
    ];
  }
}
</script>

<template>
  <div>
    <div class="font-sans mt-4">
      <div
        class="mx-auto my-4 text-2xl font-sans text-black font-bold tracking-tight text-center cart-title"
      >
        My Cart
      </div>

      <div
        class="!font-sans main-container text-black mx-auto rounded-lg border-dashed border-black border-4 px-4 py-1 text-left"
      >
        <div
          v-for="book in books"
          :key="book"
          class="grid grid-cols-12 !font-sans text-black mx-auto rounded-lg bg-gradient-to-r from-blue-100 via-violet-200 to-fuchsia-300 my-3 shadow-lg"
        >
          <div class="col-span-3 px-12">
            <img class="rounded-lg my-3 shadow-md" :src="book.cover" alt="" />
          </div>

          <div class="col-span-9 pr-10 text-left">
            <div class="flex justify-between">
              <div
                class="mb-2 mt-6 text-2xl font-bold tracking-tight text-gray-900"
              >
                {{ book.name }}
              </div>

              <button
                type="button"
                class="text-black relative top-0 bg-transparent hover:scale-125 rounded-lg text-sm ml-auto inline-flex items-center"
              >
                <svg
                  class="h-6 w-6 text-black"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                >
                  <line x1="18" y1="6" x2="6" y2="18" />
                  <line x1="6" y1="6" x2="18" y2="18" />
                </svg>
              </button>
            </div>

            <div class="bg-black h-1 mb-8"></div>

            <div class="text-lg my-2 grid grid-cols-7">
              <div class="col-span-2 font-semibold flex">
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
                  <rect x="4" y="5" width="16" height="16" rx="2" />
                  <line x1="16" y1="3" x2="16" y2="7" />
                  <line x1="8" y1="3" x2="8" y2="7" />
                  <line x1="4" y1="11" x2="20" y2="11" />
                  <line x1="11" y1="15" x2="12" y2="15" />
                  <line x1="12" y1="15" x2="12" y2="18" />
                </svg>

                From:
              </div>

              <div class="col-span-2">{{ book.startDate }}</div>

              <div class="font-semibold">To:</div>
              <div class="col-span-2">{{ book.endDate }}</div>
            </div>
            <div class="text-lg my-2 grid grid-cols-7">
              <div class="col-span-2 font-semibold flex">
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

              <div>{{ book.quantity }}</div>
            </div>
          </div>
        </div>
      </div>

      <button
        href="#"
        class="inline-flex items-center justify-center py-2 px-3 text-sm font-medium text-center text-white bg-gradient-to-r from-fuchsia-600 via-violet-500 to-blue-400 rounded-lg hover:scale-110 mt-4 shadow-md focus:ring-4 focus:outline-none focus:ring-violet-300"
      >
        Checkout
        <svg
          class="ml-2 -mr-1 h-6 w-6 text-white"
          viewBox="0 0 24 24"
          fill="none"
          stroke="currentColor"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
        >
          <polyline points="13 17 18 12 13 7" />
          <polyline points="6 17 11 12 6 7" />
        </svg>
      </button>
    </div>
  </div>
</template>

<style scoped>
@media screen and (min-width: 992px) {
  .main-container,
  .cart-title {
    width: 992px;
  }
}
</style>
