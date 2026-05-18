import PrimeVue from 'primevue/config';
import Aura from '@primeuix/themes/aura';
import type { App } from 'vue';

/** Tema Aura com identidade turquesa ProEnSP */
export function setupPrimeVue(app: App): void {
  app.use(PrimeVue, {
    theme: {
      preset: Aura,
      options: {
        darkModeSelector: '.dark',
      },
    },
  });
}
