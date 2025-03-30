import {createRouter, createWebHistory} from 'vue-router'
import type { RouteRecordRaw } from "vue-router";
import HomeView from '@/views/HomeView.vue'
import CatalogView from "@/views/CatalogView.vue";
import AuthView from "@/views/AuthView.vue";
import {guard, adminGuard} from "@/router/middleware";
import WelcomeView from "@/views/WelcomeView.vue";
import NotFoundView from "@/views/NotFoundView.vue"

const routes: Array<RouteRecordRaw> = [
  {
    path: '/',
    name: 'home',
    component: HomeView,
    children: [
      {
        path: '/',
        name: 'welcome',
        component: WelcomeView
      },
      {
        path: '/catalog',
        name: 'catalog_all',
        component: CatalogView
      },
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
        beforeEnter: (to, from, next) => {
          guard(next)
        },
        component: () => import('../views/ReservationsView.vue'),
      },
      {
        path: '/profile',
        name: 'profile',
        beforeEnter: (to, from, next) => {
          guard(next)
        },
        component: () => import('../views/ProfileView.vue'),
      },
      {
        path: '/favorites',
        name: 'favorites',
        beforeEnter: (to, from, next) => {
          guard(next)
        },
        component: () => import('../views/FavoritesView.vue'),
      },
      {
        path: '/booking',
        name: 'booking',
        beforeEnter: (to, from, next) => {
          guard(next)
        },
        component: () => import('../views/BookView.vue'),
      },
    ],
  },
  {
    path: '/auth',
    name: 'auth',
    component: AuthView,
  },
  { path: '/:pathMatch(.*)*',
    name: '404',
    component: NotFoundView
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
