<script lang="ts">
import { Component, Vue } from "vue-facing-decorator";
import UserInfo from "../../components/UserInfo.vue";
import BorrowedBooks from "../../components/BorrowedBooks.vue";
import StatusModal from "../../components/StatusModal.vue";
@Component({
  components: {
    UserInfo,
    BorrowedBooks,
    StatusModal,
  },
})
export default class ProfileScreen extends Vue {
  get user() {
    return {
      id: "215529249",
      email: "tan@polarisec.com",
      name: "Pham Ngoc Tan",
      avatar:
        "https://symbols.vn/wp-content/uploads/2021/11/Hinh-Avatar-Free-Fire-cuc-ngau.jpg",
      books: [
        {
          name: "ABC",
          quantity: 20,
          startDate: "01/07/2022",
          endDate: "15/07/2022",
          fee: 0,
          hasButton: true,
        },
        {
          name: "XYZ",
          quantity: 15,
          startDate: "26/06/2022",
          endDate: "10/07/2022",
          fee: 0,
          hasButton: false,
        },
      ],
    };
  }
}
</script>

<template>
  <div>
    <div class="pt-4">
      <UserInfo :id="user.id" :email="user.email" :name="user.name" :avatar="user.avatar"/>
      <BorrowedBooks :books="user.books"/>
    </div>
  </div>
</template>

<style scoped></style>
