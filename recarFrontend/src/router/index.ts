import {createRouter, createWebHistory} from 'vue-router'
import type { RouteRecordRaw } from "vue-router";
import HomeView from '@/views/HomeView.vue'
import CatalogView from "@/views/CatalogView.vue";
import AuthView from "@/views/AuthView.vue";

const routes: Array<RouteRecordRaw> = [
  {
    path: '/',
    name: 'home',
    component: HomeView,
    children: [
      {
        path: '/catalog/:brand',
        name: 'catalog',
        component: CatalogView
      },
      {
        path: '/catalog/:brand/:slug',
        name: 'car',
        component: () => import('../views/CarView.vue'),
      },
      {
        path: '/reservations',
        name: 'reservations',
        component: () => import('../views/ReservationsView.vue'),
      },
      {
        path: '/profile',
        name: 'profile',
        component: () => import('../views/ProfileView.vue'),
      },
      {
        path: '/favorites',
        name: 'favorites',
        component: () => import('../views/FavoritesView.vue'),
      }
    ],
  },
  {
    path: '/auth',
    name: 'auth',
    component: AuthView
  }
]

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes
})

router.beforeEach((to, from, next) => {
  window.scrollTo(0, 0)
  next()
})

export default router
