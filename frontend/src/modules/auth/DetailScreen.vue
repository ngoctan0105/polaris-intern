<script lang="ts">
import { Component, Vue } from "vue-facing-decorator";
import BookInfo from "../../components/BookInfo.vue";
import Description from "../../components/Description.vue";
@Component({
  components: {
    BookInfo,
    Description,
  },
})
export default class DetailScreen extends Vue {
  get book() {
    return {
      isbn: "0123456789",
      name: "Harry Potter and the Order of the Phoenix",
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
    };
  }
}
</script>

<template>
  <div>
    <div class="mt-4">
      <BookInfo :isbn="book.isbn" :name="book.name" :author="book.author" :publisher="book.publisher" :quantity="book.quantity"/>
      <Description :description="book.description"/>
    </div>
  </div>
</template>

<style scoped></style>
