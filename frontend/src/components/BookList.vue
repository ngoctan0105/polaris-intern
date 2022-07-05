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
        isbn: "1",
        name: "ABC",
        cover:
          "https://images-na.ssl-images-amazon.com/images/I/71NFcRl66bL.jpg",
        author: "J.K. Rowling",
        publisher: "Scholastic Inc.",
        quantity: 10,
        description: `There is a door at the end of a silent corridor. And it's haunting Harry
        Potter's dreams. Why else would he be waking in the middle of the night,
        screaming in terror? It's not just the upcoming O.W.L. exams; a new teacher
        with a personality like poisoned honey; a venomous, disgruntled house-elf;
        or even the growing threat of He-Who-Must-Not-Be-Named. Now Harry Potter is
        faced with the unreliability of the very government of the magical world and
        the impotence of the authorities at Hogwarts. Despite this (or perhaps
        because of it), he finds depth and strength in his friends, beyond what even
        he knew; boundless loyalty; and unbearable sacrifice.
        This stunning illustrated edition brings together the talents of award-winning artists Jim
        Kay and Neil Packer in a visual feast, featuring iconic scenes and much
        loved characters -- Tonks, Luna Lovegood, and many more -- as the Order of
        the Phoenix keeps watch over Harry Potter’s fifth year at Hogwarts. With its
        oversized format, high-quality paper, ribbon bookmark, and color on nearly
        every page, this edition is the perfect gift for Harry Potter fans and book
        lovers of all ages.`,
      },

      {
        isbn: "2",
        name: "DEF",
        cover:
          "https://images-na.ssl-images-amazon.com/images/I/71NFcRl66bL.jpg",
        author: "J.K. Rowling",
        publisher: "Scholastic Inc.",
        quantity: 20,
        description: `There is a door at the end of a silent corridor. And it's haunting Harry
        Potter's dreams. Why else would he be waking in the middle of the night,
        screaming in terror? It's not just the upcoming O.W.L. exams; a new teacher
        with a personality like poisoned honey; a venomous, disgruntled house-elf;
        or even the growing threat of He-Who-Must-Not-Be-Named. Now Harry Potter is
        faced with the unreliability of the very government of the magical world and
        the impotence of the authorities at Hogwarts. Despite this (or perhaps
        because of it), he finds depth and strength in his friends, beyond what even
        he knew; boundless loyalty; and unbearable sacrifice.
        This stunning illustrated edition brings together the talents of award-winning artists Jim
        Kay and Neil Packer in a visual feast, featuring iconic scenes and much
        loved characters -- Tonks, Luna Lovegood, and many more -- as the Order of
        the Phoenix keeps watch over Harry Potter’s fifth year at Hogwarts. With its
        oversized format, high-quality paper, ribbon bookmark, and color on nearly
        every page, this edition is the perfect gift for Harry Potter fans and book
        lovers of all ages.`,
      },

      {
        isbn: "3",
        name: "PQR",
        cover:
          "https://images-na.ssl-images-amazon.com/images/I/71NFcRl66bL.jpg",
        author: "J.K. Rowling",
        publisher: "Scholastic Inc.",
        quantity: 30,
        description: `There is a door at the end of a silent corridor. And it's haunting Harry
        Potter's dreams. Why else would he be waking in the middle of the night,
        screaming in terror? It's not just the upcoming O.W.L. exams; a new teacher
        with a personality like poisoned honey; a venomous, disgruntled house-elf;
        or even the growing threat of He-Who-Must-Not-Be-Named. Now Harry Potter is
        faced with the unreliability of the very government of the magical world and
        the impotence of the authorities at Hogwarts. Despite this (or perhaps
        because of it), he finds depth and strength in his friends, beyond what even
        he knew; boundless loyalty; and unbearable sacrifice.
        This stunning illustrated edition brings together the talents of award-winning artists Jim
        Kay and Neil Packer in a visual feast, featuring iconic scenes and much
        loved characters -- Tonks, Luna Lovegood, and many more -- as the Order of
        the Phoenix keeps watch over Harry Potter’s fifth year at Hogwarts. With its
        oversized format, high-quality paper, ribbon bookmark, and color on nearly
        every page, this edition is the perfect gift for Harry Potter fans and book
        lovers of all ages.`,
      },

      {
        isbn: "4",
        name: "XYZ",
        cover:
          "https://images-na.ssl-images-amazon.com/images/I/71NFcRl66bL.jpg",
        author: "J.K. Rowling",
        publisher: "Scholastic Inc.",
        quantity: 40,
        description: `There is a door at the end of a silent corridor. And it's haunting Harry
        Potter's dreams. Why else would he be waking in the middle of the night,
        screaming in terror? It's not just the upcoming O.W.L. exams; a new teacher
        with a personality like poisoned honey; a venomous, disgruntled house-elf;
        or even the growing threat of He-Who-Must-Not-Be-Named. Now Harry Potter is
        faced with the unreliability of the very government of the magical world and
        the impotence of the authorities at Hogwarts. Despite this (or perhaps
        because of it), he finds depth and strength in his friends, beyond what even
        he knew; boundless loyalty; and unbearable sacrifice.
        This stunning illustrated edition brings together the talents of award-winning artists Jim
        Kay and Neil Packer in a visual feast, featuring iconic scenes and much
        loved characters -- Tonks, Luna Lovegood, and many more -- as the Order of
        the Phoenix keeps watch over Harry Potter’s fifth year at Hogwarts. With its
        oversized format, high-quality paper, ribbon bookmark, and color on nearly
        every page, this edition is the perfect gift for Harry Potter fans and book
        lovers of all ages.`,
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
      :isbn="book.isbn"
      :name="book.name"
      :cover="book.cover"
      :author="book.author"
      :publisher="book.publisher"
      :quantity="book.quantity"
      :description="book.description"
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
