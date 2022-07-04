<script lang="ts">
import { Component, Vue } from "vue-facing-decorator";
import HeaderComponent from "./components/HeaderComponent.vue";
import LoginScreen from "./modules/auth/LoginScreen.vue";
import HomeScreen from "./modules/auth/HomeScreen.vue";
import DetailScreen from "./modules/auth/DetailScreen.vue";
import ProfileScreen from "./modules/auth/ProfileScreen.vue";
import CartScreen from "./modules/auth/CartScreen.vue";
@Component({
  components: {
    HeaderComponent,
    LoginScreen,
    HomeScreen,
    DetailScreen,
    ProfileScreen,
    CartScreen,
  },
})
export default class App extends Vue {
  get isLogin() {
    return !!localStorage.isLoginScreen;
  }
  mounted() {
    localStorage.isLoginScreen = true;
    //   // console.log(localStorage.isLogin);
  }
}
</script>

<template>
  <HeaderComponent v-if="isLogin" />
  <router-view />
</template>

<style>
#app {
  font-family: ui-sans-serif system-ui !important;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
</style>
