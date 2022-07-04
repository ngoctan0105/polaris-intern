<script lang="ts">
import { Prop, Component, Vue } from "vue-facing-decorator";
import StatusModal from "./StatusModal.vue";
@Component({
  components: {
    StatusModal
  },
})
export default class BorrowedBooks extends Vue {
  @Prop
  books!: object
}
</script>

<template>
  <div
    class="mx-auto my-4 text-2xl font-sans text-black font-bold tracking-tight text-center borrowedbooks-title"
  >
    Borrowed books
  </div>

  <div
    class="!font-sans main-container text-black mx-auto rounded-lg border-dashed border-black border-4 px-4 py-1 text-left"
  >
    <div
      v-for="book in books"
      :key="book"
      class="my-3 text-black mx-auto rounded-lg border-solid border-black border-2 pt-2 px-10 text-left"
    >
      <div class="flex justify-between items-center p-1 rounded-t border-b">
        <div class="mb-2 text-2xl font-bold tracking-tight text-gray-900">
          {{ book.name }}
        </div>

        <button
          v-if="book.hasButton"
          type="button"
          data-modal-toggle="large-modal"
          class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-gradient-to-r from-fuchsia-600 via-violet-500 to-blue-400 rounded-lg hover:scale-110 shadow-md focus:ring-4 focus:outline-none focus:ring-violet-300"
        >
          Return/Extend
        </button>
        <div v-else class="text-slate-500">Returned</div>
        <StatusModal />
      </div>

      <div class="bg-black h-1 mb-4"></div>

      <div class="text-lg my-2 grid grid-cols-5">
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
            <rect x="4" y="5" width="16" height="16" rx="2" />
            <line x1="16" y1="3" x2="16" y2="7" />
            <line x1="8" y1="3" x2="8" y2="7" />
            <line x1="4" y1="11" x2="20" y2="11" />
            <line x1="11" y1="15" x2="12" y2="15" />
            <line x1="12" y1="15" x2="12" y2="18" />
          </svg>

          From:
        </div>
        <div>{{ book.startDate }}</div>
        <div class="font-semibold">To:</div>
        <div>{{ book.endDate }}</div>
      </div>

      <div class="text-lg my-2 grid grid-cols-5">
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
        <div>{{ book.quantity }}</div>

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
              d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
            />
          </svg>

          Fee:
        </div>
        <div>${{ book.fee }}</div>
      </div>
    </div>
  </div>
</template>

<style scoped>
@media screen and (min-width: 992px) {
  .main-container,
  .borrowedbooks-title {
    width: 992px;
  }
}

.borrowedbooks-title:before,
.borrowedbooks-title:after {
  background-color: #000;
  content: "";
  display: inline-block;
  height: 3px;
  position: relative;
  vertical-align: middle;
  width: 39%;
}

.borrowedbooks-title:before {
  right: 0.5em;
  margin-left: -50%;
}

.borrowedbooks-title:after {
  left: 0.5em;
  margin-right: -50%;
}
</style>
