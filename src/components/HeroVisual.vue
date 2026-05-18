<template>
  <div class="relative hidden lg:block">
    <!-- Foto institucional com recorte orgânico (como na referência) -->
    <div
      class="relative h-[26rem] w-full overflow-hidden shadow-[0_28px_64px_rgba(10,90,100,0.22)]"
      style="clip-path: url(#hero-blob-clip)"
    >
      <img
        :src="buildingPhoto"
        alt="Campus universitário — Escola Superior de Ciências da Saúde"
        class="h-full w-full object-cover"
        loading="eager"
        decoding="async"
      />
      <div class="absolute inset-0 bg-gradient-to-t from-[#0a6878]/35 via-transparent to-transparent" />
    </div>

    <!-- SVG clip-path orgânico -->
    <svg class="absolute h-0 w-0" aria-hidden="true">
      <defs>
        <clipPath id="hero-blob-clip" clipPathUnits="objectBoundingBox">
          <path d="M 0.08,0.02 C 0.35,0 0.65,0.04 0.98,0.08 L 1,0.92 C 0.72,1 0.38,0.98 0.05,0.94 L 0.02,0.45 Q 0,0.2 0.08,0.02 Z" />
        </clipPath>
      </defs>
    </svg>

    <!-- Card: +20 anos -->
    <div class="absolute -left-8 top-8 flex items-center gap-3 rounded-2xl border border-white/80 bg-white/95 px-5 py-4 shadow-xl backdrop-blur-md">
      <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-primary/10 text-primary">
        <UsersRound class="h-5 w-5" />
      </div>
      <div>
        <p class="text-xl font-bold leading-none text-slate-900">+20</p>
        <p class="mt-0.5 text-xs font-medium text-slate-500">Anos de história</p>
      </div>
    </div>

    <!-- Card: excelência -->
    <div class="absolute -bottom-5 right-4 max-w-[14rem] rounded-2xl border border-white/80 bg-white/95 p-4 shadow-xl backdrop-blur-md">
      <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-primary/10 text-primary">
        <Award class="h-4 w-4" />
      </div>
      <p class="mt-3 text-sm font-semibold leading-snug text-slate-800">
        Excelência em Ensino, Pesquisa e Impacto Social
      </p>
    </div>
  </div>
</template>

<script setup lang="ts">
import { Award, UsersRound } from 'lucide-vue-next';

/**
 * Foto institucional de campus (placeholder).
 * Substitua por imagem oficial da ESCS/UEA quando disponível.
 */
const buildingPhoto =
  'https://images.unsplash.com/photo-1562774053-701939374585?auto=format&fit=crop&w=1200&q=85';
</script>
