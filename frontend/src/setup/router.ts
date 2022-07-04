import { createRouter, createWebHistory } from 'vue-router'
import LoginScreen from '../modules/auth/LoginScreen.vue'
import HomeScreen from '../modules/auth/HomeScreen.vue'
import DetailScreen from '../modules/auth/DetailScreen.vue'
import ProfileScreen from '../modules/auth/ProfileScreen.vue'
import CartScreen from '../modules/auth/CartScreen.vue'

const routes = [

  {
    path: '',
    redirect: '/login'
  },

  {
    path: '/login',
    component: LoginScreen,
  },

  {
    path: '/home',
    component: HomeScreen
  },

  {
    path: '/detail',
    component: DetailScreen
  },

  {
    path: '/me',
    component: ProfileScreen
  },

  {
    path: '/cart',
    component: CartScreen
  }
]

const router = createRouter({
  history: createWebHistory(),
  routes: routes
})


export default router
