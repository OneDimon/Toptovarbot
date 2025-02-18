import { createRouter, createWebHistory } from 'vue-router'

// Импортируем компоненты для маршрутов
import MyCatalog from '../views/MyCatalog.vue'
import ContactsSeller from '../views/ContactsSeller.vue'
import ReferralUser from '../views/ReferralUser.vue'

const routes = [
  {
    path: '/catalog',
    name: 'MyCatalog',
    component: MyCatalog
  },
  {
    path: '/contact',
    name: 'ContactsSeller',
    component: ContactsSeller
  },
  {
    path: '/referral',
    name: 'referralUser',
    component: ReferralUser
  }
]

// Создаем роутер с историей навигации (можно использовать createWebHashHistory для хеш-маршрутов)
const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router
