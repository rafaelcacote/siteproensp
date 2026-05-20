<template>
  <div class="min-h-screen bg-gradient-to-b from-[#f0f9fb] via-white to-[#f6fbfd]">
    <Header />

    <main class="overflow-x-hidden">

      <!-- ═══════════ HERO ═══════════ -->
      <section class="relative overflow-hidden border-b border-primary/10 pb-16 pt-10 md:pb-20 md:pt-14">
        <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(circle_at_80%_60%,rgba(22,174,195,0.16),transparent_45%)]" aria-hidden="true" />
        <div class="pointer-events-none absolute inset-0 bg-[radial-gradient(circle_at_70%_95%,rgba(144,214,129,0.26),transparent_35%)]" aria-hidden="true" />

        <!-- Marca d'água — restrita à coluna de texto -->
        <div class="pointer-events-none absolute inset-0 overflow-hidden lg:right-1/2" aria-hidden="true">
          <LogoWatermark
            :src="logoHero"
            img-class="logo-watermark-hero absolute -left-[6rem] -top-[4rem] w-[min(92vw,36rem)] max-w-none md:-left-[5rem] md:w-[40rem] lg:w-[38rem]"
          />
        </div>

        <div class="container relative">
          <div class="grid items-center gap-10 lg:grid-cols-[0.82fr_1.18fr] lg:gap-12 xl:gap-14">

            <div class="order-2 lg:order-1">
              <span class="inline-flex items-center gap-2 rounded-full border border-primary/20 bg-white/85 px-4 py-1.5 text-xs font-semibold uppercase tracking-[0.2em] text-primary shadow-sm backdrop-blur-md">
                <Landmark class="h-3.5 w-3.5 shrink-0" />
                Institucional
              </span>

              <h1 class="mt-7 max-w-2xl text-[2.4rem] font-bold leading-[1.12] text-slate-900 md:text-5xl lg:text-[3.15rem] lg:leading-[1.08]">
                Formar para transformar
                <br>
                a <span class="text-primary">saúde</span> e a <span class="text-primary">sociedade</span>.
              </h1>

              <div class="mt-5 h-1 w-14 rounded-full bg-primary" />

              <p class="mt-6 max-w-xl text-base leading-relaxed text-slate-600 md:text-lg">
                O Programa de Pós-graduação em Enfermagem em Saúde Pública forma profissionais
                para atuar com inovação, compromisso social e impacto real nos serviços de saúde
                da região amazônica.
              </p>

              <div class="mt-8 flex flex-col gap-3 sm:flex-row sm:flex-wrap">
                <RouterLink
                  to="/apresentacao"
                  class="inline-flex items-center justify-center gap-2 rounded-full bg-gradient-to-r from-[#0f9fb5] to-[#23c0c8] px-7 py-3.5 text-sm font-semibold text-white shadow-lg shadow-cyan-200/50 transition-all duration-300 hover:-translate-y-0.5 hover:shadow-xl hover:shadow-cyan-300/55"
                >
                  Conheça o Programa
                  <ArrowRight class="h-4 w-4" />
                </RouterLink>
                <RouterLink
                  to="/apresentacao#processos-seletivos"
                  class="inline-flex items-center justify-center gap-2 rounded-full border border-primary/35 bg-white/85 px-7 py-3.5 text-sm font-semibold text-slate-700 shadow-sm backdrop-blur-sm transition-all duration-300 hover:-translate-y-0.5 hover:border-primary/50 hover:text-primary"
                >
                  Processos Seletivos
                  <ArrowRight class="h-4 w-4" />
                </RouterLink>
              </div>
            </div>

            <div class="order-1 min-w-0 lg:order-2">
              <HeroVisual />
            </div>

          </div>
        </div>
      </section>


      <!-- ═══════════ INDICADORES ═══════════ -->
      <section class="bg-gradient-to-r from-[#0a6878] via-[#0e8fa0] to-[#14a8b4]">
        <div class="container py-10">
          <ul class="grid gap-6 text-white sm:grid-cols-2 lg:grid-cols-4">
            <li
              v-for="indicator in indicators"
              :key="indicator.label"
              class="flex items-start gap-4"
            >
              <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl border border-white/25 bg-white/15">
                <component :is="indicator.icon" class="h-5 w-5 text-white/90" />
              </div>
              <div>
                <p class="text-3xl font-bold leading-none">{{ indicator.value }}</p>
                <p class="mt-1 text-sm font-semibold text-white/95">{{ indicator.label }}</p>
                <p class="mt-0.5 text-xs text-white/70">{{ indicator.sub }}</p>
              </div>
            </li>
          </ul>
        </div>
      </section>

      <!-- ═══════════ ÁREAS DE ATUAÇÃO ═══════════ -->
      <section id="areas-atuacao" class="bg-white">
        <div class="container py-14 md:py-20">

          <div class="mb-10 text-center">
            <p class="font-accent text-xs font-semibold uppercase tracking-[0.22em] text-primary">Atuação —</p>
            <h2 class="mt-3 text-3xl font-bold text-slate-900 md:text-4xl">Áreas de Atuação</h2>
          </div>

          <ul class="mx-auto flex max-w-4xl flex-wrap justify-center gap-8 md:gap-10">
              <li
                v-for="area in areas"
                :key="area.title"
                class="group flex w-[7.5rem] flex-col items-center gap-3 text-center sm:w-[8.5rem]"
              >
                <div class="flex h-14 w-14 items-center justify-center rounded-2xl border border-primary/15 bg-[#f0fafc] text-primary transition-all duration-300 group-hover:bg-primary group-hover:text-white group-hover:shadow-md">
                  <component :is="area.icon" class="h-6 w-6" />
                </div>
                <p class="text-xs font-semibold leading-snug text-slate-700 sm:text-sm">{{ area.title }}</p>
              </li>
          </ul>
        </div>
      </section>

    </main>

    <LatestNewsSection />
  </div>
</template>

<script setup lang="ts">
import Header from '@/components/Header.vue';
import HeroVisual from '@/components/HeroVisual.vue';
import LogoWatermark from '@/components/LogoWatermark.vue';
import logoHero from '@/assets/logo_hero.svg';
import LatestNewsSection from '@/components/news/LatestNewsSection.vue';
import {
  ArrowRight,
  BookOpen,
  CalendarDays,
  GraduationCap,
  Heart,
  Landmark,
  UsersRound,
} from 'lucide-vue-next';
import type { Component } from 'vue';

interface IndicatorItem { value: string; label: string; sub: string; icon: Component }
interface AreaItem { title: string; icon: Component }

const indicators: IndicatorItem[] = [
  { value: '+20',  label: 'Anos de história',        sub: 'Formando profissionais',    icon: UsersRound },
  { value: '+200', label: 'Discentes formados',       sub: 'Mestres e especialistas',   icon: GraduationCap },
  { value: '+150', label: 'Produções científicas',    sub: 'Impacto na Amazônia',       icon: BookOpen },
  { value: '100%', label: 'Compromisso com o SUS',   sub: 'Ética, equidade e inclusão', icon: Heart },
];

const areas: AreaItem[] = [
  { title: 'Assistência em Saúde',              icon: Heart },
  { title: 'Gestão em Saúde',                   icon: Landmark },
  { title: 'Educação em Saúde',                 icon: BookOpen },
  { title: 'Pesquisa e Inovação',               icon: CalendarDays },
  { title: 'Saúde Coletiva e Políticas Públicas', icon: UsersRound },
];
</script>
