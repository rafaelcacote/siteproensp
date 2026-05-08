import { createRouter, createWebHistory } from 'vue-router';
import Home from '../views/Home.vue';
import NotFound from '../views/NotFound.vue';
import Apresentacao from '../views/Apresentacao.vue';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/apresentacao',
      name: 'apresentacao',
      component: Apresentacao
    },
    {
      path: '/:pathMatch(.*)*',
      name: 'not-found',
      component: NotFound
    }
  ]
});

export default router;
