<template>
  <div class="hero-visual-root relative w-full min-w-0" aria-label="Campus da Escola Superior de Ciências da Saúde — UEA">

    <div class="relative overflow-hidden">
      <div
        class="hero-campus-frame relative overflow-hidden rounded-2xl bg-gradient-to-br from-[#e8f6f8] to-white shadow-[0_24px_56px_rgba(15,108,119,0.18)] ring-1 ring-primary/10"
      >
        <img
          :src="campusPhoto"
          alt="Fachada da Escola Superior de Ciências da Saúde — UEA"
          class="hero-campus-photo block w-full object-contain object-center"
          loading="eager"
          fetchpriority="high"
          decoding="async"
          draggable="false"
        />

        <div
          class="pointer-events-none absolute inset-y-0 left-0 w-[28%] max-w-[9rem] bg-gradient-to-r from-[#f0f9fb] via-[#f0f9fb]/85 to-transparent sm:max-w-[11rem] lg:w-[32%] lg:max-w-[13rem]"
          aria-hidden="true"
        />
        <div class="pointer-events-none absolute inset-0 bg-gradient-to-t from-[#0a6878]/20 via-transparent to-transparent" aria-hidden="true" />
        <div class="pointer-events-none absolute bottom-0 inset-x-0 h-1 bg-gradient-to-r from-transparent via-primary/80 to-transparent" aria-hidden="true" />
      </div>

      <div class="pointer-events-none absolute -bottom-8 -left-8 h-40 w-40 rounded-full bg-[#9ad06d]/30 blur-3xl" aria-hidden="true" />
      <div class="pointer-events-none absolute -right-6 top-1/2 h-48 w-48 -translate-y-1/2 rounded-full bg-primary/15 blur-3xl" aria-hidden="true" />
    </div>

    <div
      class="absolute right-2 top-[18%] z-10 flex max-w-[14.5rem] items-start gap-3 rounded-3xl border border-white/95 bg-white/97 px-4 py-3.5 shadow-[0_14px_36px_rgba(15,108,119,0.16)] backdrop-blur-md sm:right-4 sm:max-w-[15rem] sm:px-5 sm:py-4 lg:right-6 lg:top-[22%]"
    >
      <div class="mt-0.5 flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-primary/10 text-primary">
        <UsersRound class="h-5 w-5" />
      </div>
      <div class="min-w-0">
        <p class="text-xl font-bold leading-none text-slate-900 sm:text-2xl">+7</p>
        <p class="mt-1 text-xs font-semibold text-slate-700">Anos de história</p>
        <p class="mt-1 text-[11px] leading-relaxed text-slate-500">Formando profissionais e gerando impacto</p>
      </div>
    </div>

    <div
      class="absolute bottom-[8%] right-2 z-10 max-w-[14.5rem] rounded-3xl border border-white/95 bg-white/97 p-4 shadow-[0_14px_36px_rgba(15,108,119,0.16)] backdrop-blur-md sm:right-6 sm:max-w-[15rem] sm:p-5 lg:bottom-[10%]"
    >
      <div class="flex h-9 w-9 items-center justify-center rounded-full bg-primary/10 text-primary">
        <Award class="h-4 w-4" />
      </div>
      <p class="mt-3 text-sm font-semibold leading-snug text-slate-800">
        Excelência em Ensino, Pesquisa e Impacto Social
      </p>
      <p class="mt-2 text-[11px] leading-relaxed text-slate-500">
        Compromisso com a saúde da Amazônia
      </p>
    </div>
  </div>
</template>

<script setup lang="ts">
import { Award, UsersRound } from 'lucide-vue-next';

const campusPhoto = '/uea.png';
</script>

<style scoped>
.hero-visual-root {
  max-width: 100%;
}

.hero-campus-frame {
  width: 100%;
  max-width: 100%;
}

.hero-campus-photo {
  aspect-ratio: 1693 / 929;
  height: auto;
  width: 100%;
  max-width: 100%;
}

/* ~30% maior que o tamanho anterior, sem ultrapassar o hero */
@media (min-width: 640px) {
  .hero-campus-photo {
    max-height: clamp(19.5rem, 57vw, 25.5rem);
  }
}

@media (min-width: 1024px) {
  .hero-campus-photo {
    max-height: clamp(24.5rem, 39vw, 31rem);
  }
}

@media (min-width: 1280px) {
  .hero-campus-photo {
    max-height: clamp(26rem, 36vw, 33rem);
  }
}
</style>
