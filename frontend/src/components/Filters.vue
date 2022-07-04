<script lang="ts">
import { Component, Vue } from "vue-facing-decorator";
@Component({})
export default class Filters extends Vue {
  get authors() {
    return ["A", "B", "C"];
  }
  get publishers() {
    return ["X", "Y", "Z"];
  }
  get years() {
    return [2017, 2018, 2019];
  } 
}
</script>

<template>
  <div class="flex">
    <!-- Author Filter -->
    <div class="mx-1">
      <button
        id="dropdownDefault"
        data-dropdown-toggle="authorfilter"
        class="h-11 text-white bg-fuchsia-700 focus:ring-4 focus:outline-none focus:ring-fuchsia-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center hover:scale-105 shadow-md"
        type="button"
      >
        Author
        <svg
          class="w-4 h-4 ml-2"
          fill="none"
          stroke="currentColor"
          viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M19 9l-7 7-7-7"
          ></path>
        </svg>
      </button>
      <!-- Dropdown menu -->
      <div
        id="authorfilter"
        class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-44"
      >
        <ul
          class="py-1 text-sm text-gray-700"
          aria-labelledby="dropdownDefault"
        >
          <li v-for="author in authors" :key="author">
            <a href="#" class="block px-4 py-2 hover:bg-gray-100">{{
              author
            }}</a>
          </li>
        </ul>
      </div>
    </div>

    <!-- Publisher Filter -->
    <div class="mx-1">
      <button
        id="dropdownDefault"
        data-dropdown-toggle="publisherfilter"
        class="h-11 text-white bg-violet-600 focus:ring-4 focus:outline-none focus:ring-violet-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center hover:scale-105 shadow-md"
        type="button"
      >
        Publisher
        <svg
          class="w-4 h-4 ml-2"
          fill="none"
          stroke="currentColor"
          viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M19 9l-7 7-7-7"
          ></path>
        </svg>
      </button>
      <!-- Dropdown menu -->
      <div
        id="publisherfilter"
        class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-44"
      >
        <ul
          class="py-1 text-sm text-gray-700"
          aria-labelledby="dropdownDefault"
        >
          <li v-for="publisher in publishers" :key="publisher">
            <a href="#" class="block px-4 py-2 hover:bg-gray-100">{{
              publisher
            }}</a>
          </li>
        </ul>
      </div>
    </div>

    <!-- Year Filter -->
    <div class="mx-1">
      <button
        id="dropdownDefault"
        data-dropdown-toggle="yearfilter"
        class="h-11 text-white bg-blue-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center hover:scale-105 shadow-md"
        type="button"
      >
        Year
        <svg
          class="w-4 h-4 ml-2"
          fill="none"
          stroke="currentColor"
          viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M19 9l-7 7-7-7"
          ></path>
        </svg>
      </button>
      <!-- Dropdown menu -->
      <div
        id="yearfilter"
        class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-44"
      >
        <ul
          class="py-1 text-sm text-gray-700"
          aria-labelledby="dropdownDefault"
        >
          <li v-for="year in years" :key="year">
            <a href="#" class="block px-4 py-2 hover:bg-gray-100">{{ year }}</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<style scoped></style>
