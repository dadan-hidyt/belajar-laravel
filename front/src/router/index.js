import { createRouter, createWebHistory } from 'vue-router'
const routes = [
  {
    path: '/',
    name: 'index',
    component: () => import('@/views/transaksi/index')
  },
  {
    path: '/tambah',
    name: 'tambah',
    component: () => import('@/views/transaksi/tambah')
  },{
    path: '/update/:id',
    name: 'update',
    component: () => import('@/views/transaksi/update')
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
