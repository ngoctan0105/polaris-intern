<script lang="ts">
import { Prop, Component, Vue } from "vue-facing-decorator";
@Component({
})
export default class Description extends Vue {
  @Prop
  description!: string
}
</script>

<template>
  <div
    class="mx-auto my-4 text-2xl font-sans text-black font-bold tracking-tight text-center description-title"
  >
    Description
  </div>

  <div
    class="!font-sans main-container text-black mx-auto rounded-lg border-dashed border-black border-4 px-12 py-12 text-left"
  >{{ description }}</div>
</template>

<style scoped>
@media screen and (min-width: 992px) {
  .main-container,
  .description-title {
    width: 992px;
  }
}

.description-title:before,
.description-title:after {
  background-color: #000;
  content: "";
  display: inline-block;
  height: 3px;
  position: relative;
  vertical-align: middle;
  width: 42%;
}

.description-title:before {
  right: 0.5em;
  margin-left: -50%;
}

.description-title:after {
  left: 0.5em;
  margin-right: -50%;
}
</style>
