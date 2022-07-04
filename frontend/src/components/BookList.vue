<script lang="ts">
import { Component, Vue } from "vue-facing-decorator";
import BookCard from "./BookCard.vue";
@Component({
  components: {
    BookCard,
  },
})
export default class BookList extends Vue {
  get books() {
    return [
      {
        name: "ABC",
        cover:
          "https://images-na.ssl-images-amazon.com/images/I/71NFcRl66bL.jpg",
      },

      {
        name: "DEF",
        cover:
          "https://images-na.ssl-images-amazon.com/images/I/71NFcRl66bL.jpg",
      },

      {
        name: "PQR",
        cover:
          "https://images-na.ssl-images-amazon.com/images/I/71NFcRl66bL.jpg",
      },

      {
        name: "XYZ",
        cover:
          "https://images-na.ssl-images-amazon.com/images/I/71NFcRl66bL.jpg",
      },
    ];
  }
}
</script>

<template>
  <div
    class="main-container justify-center mx-auto px-4 grid grid-cols-3 gap-3 bg-gradient-to-r from-blue-100 via-violet-200 to-fuchsia-300 rounded-lg shadow-lg"
  >
    <BookCard
      v-for="book in books"
      :key="book"
      :name="book.name"
      :cover="book.cover"
    />
  </div>
</template>

<style scoped>
@media screen and (min-width: 992px) {
  .main-container {
    width: 992px;
  }
}
</style>
