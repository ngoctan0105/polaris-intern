<script lang="ts">
import { Prop, Component, Vue } from "vue-facing-decorator";
import BookInfo from "../../components/BookInfo.vue";
import Description from "../../components/Description.vue";
@Component({
  components: {
    BookInfo,
    Description,
  },
})
export default class DetailScreen extends Vue {
  @Prop
  isbn!: string;
  @Prop
  name!: string;
  @Prop
  cover!: string;
  @Prop
  author!: string;
  @Prop
  publisher!: string;
  @Prop
  quantity!: number;
  @Prop
  description!: string;
}
</script>

<template>
  <div>
    <div class="mt-4">
      <BookInfo :isbn="isbn" :name="name" :cover="cover" :author="author" :publisher="publisher" :quantity="quantity"/>
      <Description :description="description"/>
    </div>
  </div>
</template>

<style scoped></style>
