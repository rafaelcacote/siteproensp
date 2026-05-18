import { createRouter, createWebHistory } from 'vue-router';
import Home from '../views/Home.vue';
import NotFound from '../views/NotFound.vue';
import Apresentacao from '../views/Apresentacao.vue';
import ColegiadoView from '../views/ColegiadoView.vue';
import LegislacaoView from '../views/LegislacaoView.vue';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  scrollBehavior(to, _from, savedPosition) {
    if (savedPosition) return savedPosition;

    if (to.hash) {
      return new Promise((resolve) => {
        requestAnimationFrame(() => {
          resolve({
            el: to.hash,
            behavior: 'smooth',
            top: 132,
          });
        });
      });
    }

    return { top: 0 };
  },
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
      path: '/colegiado',
      name: 'colegiado',
      component: ColegiadoView
    },
    {
      path: '/legislacao',
      name: 'legislacao',
      component: LegislacaoView
    },
    {
      path: '/noticias/:slug',
      name: 'noticia',
      component: () => import('../views/NoticiaView.vue')
    },
    {
      path: '/:pathMatch(.*)*',
      name: 'not-found',
      component: NotFound
    }
  ]
});

export default router;
