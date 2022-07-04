<script lang="ts">
import { Component, Vue } from 'vue-facing-decorator'
import NavigationComponent from "../../components/NavigationComponent.vue";
import BookList from "../../components/BookList.vue";
@Component({
  components: {
    NavigationComponent,
    BookList,
  }
})
export default class HomeScreen extends Vue {

  mounted() {
  }
}

</script>

<template>
  <div>
    <NavigationComponent />
    <div class="pt-4">
      <BookList />
      <PaginationComponent />
    </div>
  </div>
</template>

<style scoped></style>
