<script lang="ts">
import { Component, Vue } from "vue-facing-decorator";
import Filters from "./Filters.vue";
import SearchBar from "./SearchBar.vue";
@Component({
  components: {
    Filters,
    SearchBar,
  }
})
export default class NavigationComponent extends Vue {
}

</script>
<template>
  <div
    class="h-16 font-sans sticky top-16 shadow-md z-10 items-center w-full bg-neutral-100"
  >
    <div class="main-container flex mx-auto justify-between items-center h-full">
      <Filters />
      <SearchBar />
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
