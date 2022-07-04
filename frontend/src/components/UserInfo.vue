<script lang="ts">
import { Prop, Component, Vue } from "vue-facing-decorator";
@Component({})
export default class UserInfo extends Vue {
  @Prop
  id!: string
  @Prop
  email!: string
  @Prop
  name!: string
  @Prop
  avatar!: string
}
</script>

<template>
  <div
    class="grid grid-cols-12 !font-sans text-black main-container mx-auto rounded-lg bg-gradient-to-r from-blue-100 via-violet-200 to-fuchsia-300 shadow-lg"
  >
    <div class="col-span-4 px-12">
      <img
        class="rounded-lg my-6 border-solid border-4 border-black"
        :src="avatar"
        alt=""
      />
    </div>

    <div class="col-span-8 pt-6 pr-10 text-left">
      <div class="mb-2 text-2xl font-bold tracking-tight text-gray-900">
        My Profile
      </div>
      <div class="bg-black h-1 mb-4"></div>
      <form action="#">
        <div class="text-lg my-2 col-span-3 grid grid-cols-4">
          <div class="font-semibold flex self-center">
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

            ID:
          </div>
          <input
            type="text"
            name="name"
            id="name"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block h-8 w-full col-span-2 p-2.5 focus:border-violet-700"
            :value="id"
            disabled
          />
        </div>

        <div class="text-lg my-2 col-span-3 grid grid-cols-4">
          <div class="font-semibold flex self-center">
            <svg
              class="h-6 w-6 text-black mr-2"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
            >
              <path
                d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"
              />
              <polyline points="22,6 12,13 2,6" />
            </svg>

            Email:
          </div>
          <input
            type="email"
            name="email"
            id="email"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block h-8 w-full col-span-2 p-2.5 focus:border-violet-700"
            :value="email"
            disabled
          />
        </div>

        <div class="text-lg my-2 col-span-3 grid grid-cols-4">
          <div class="font-semibold flex self-center">
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

            Name:
          </div>
          <input
            type="text"
            name="name"
            id="name"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block h-8 w-full col-span-2 p-2.5 focus:border-violet-700"
            :value="name"
          />
        </div>

        <div class="text-lg my-2 col-span-3 grid grid-cols-4">
          <div class="font-semibold flex self-center">
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
                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
              />
            </svg>

            Avatar:
          </div>
          <input
            type="text"
            name="name"
            id="name"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block h-8 w-full col-span-2 p-2.5 focus:border-violet-700"
            :value="avatar"
          />
        </div>

        <div class="grid grid-cols-4 my-2">
          <button
            type="button"
            data-modal-toggle="profile-modal"
            class="inline-flex items-center py-2 px-3 h-8 text-sm font-medium justify-center text-white bg-black rounded-lg hover:scale-110 shadow-md focus:ring-4 focus:outline-none focus:ring-zinc-400 col-start-2 col-end-4"
          >
            Update
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
                d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12"
              />
            </svg>
          </button>
        </div>
      </form>
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
