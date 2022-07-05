<script lang="ts">
import { Component, Vue } from "vue-facing-decorator";
@Component({
})
export default class StatusModal extends Vue {
}

</script>

<template>
  <!-- Main modal -->
  <div
    id="large-modal"
    tabindex="-1"
    
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full"
  >
    <div class="relative p-4 w-full max-w-4xl h-full md:h-auto">
      <!-- Modal content -->
      <div class="relative bg-white rounded-lg shadow">
        <!-- Modal header -->
        <div
          class="flex justify-between items-center p-2 rounded-t border-b"
        >
          <div class="text-xl font-medium text-gray-900 ml-2">
            Book Status
          </div>
          <button
            type="button"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
            data-modal-toggle="large-modal"
          >
            <svg
              class="w-5 h-5"
              fill="currentColor"
              viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                fill-rule="evenodd"
                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                clip-rule="evenodd"
              ></path>
            </svg>
          </button>
        </div>

        <div
          class="grid grid-cols-10 !font-sans text-black detail-container mx-auto rounded-lg"
        >
          <div class="col-span-3 px-4">
            <img
              class="rounded-lg my-6"
              src="https://images-na.ssl-images-amazon.com/images/I/71NFcRl66bL.jpg"
              alt=""
            />
          </div>

          <div class="col-span-7 pt-6 px-10 text-left">
            <div
              class="mb-2 text-2xl font-bold tracking-tight text-gray-900"
            >
              Harry Potter and the Order of the Phoenix
            </div>
            <div class="bg-black h-1 mb-8"></div>

            <div class="text-lg my-2 grid grid-cols-7">
              <div class="font-semibold flex col-span-2">
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

              <div class="col-span-2">01/07/2022</div>
              <div class="font-semibold">To:</div>
              <div class="col-span-2">15/07/2022</div>
            </div>

            <div class="text-lg my-2 grid grid-cols-7">
              <div class=" flex font-semibold col-span-2">
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
              <div class="col-span-5">20</div>
            </div>

            <div class="text-lg my-2 grid grid-cols-7">
              <div class=" flex font-semibold col-span-2">
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
              <div class="col-span-5">0 VND</div>
            </div>


            <div class="flex justify-around mt-12">
              <button
                href="#"
                class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-gradient-to-r from-fuchsia-600 via-violet-500 to-blue-400 rounded-lg hover:scale-110 shadow-md focus:ring-4 focus:outline-none focus:ring-violet-300"
              >
                Return
                <svg
                  class="ml-2 -mr-1 h-6 w-6 text-white"
                  viewBox="0 0 24 24"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                >
                  <polyline points="23 4 23 10 17 10" />
                  <path d="M20.49 15a9 9 0 1 1-2.12-9.36L23 10" />
                </svg>
              </button>
              <button
                href="#"
                class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-gradient-to-r from-fuchsia-600 via-violet-500 to-blue-400 rounded-lg hover:scale-110 shadow-md focus:ring-4 focus:outline-none focus:ring-violet-300"
              >
                Extend
                <svg
                  class="ml-2 -mr-1 h-6 w-6 text-white"
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
                  <polyline points="16 4 20 4 20 8" />
                  <line x1="14" y1="10" x2="20" y2="4" />
                  <polyline points="8 20 4 20 4 16" />
                  <line x1="4" y1="20" x2="10" y2="14" />
                </svg>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped></style>
