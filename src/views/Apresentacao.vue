<template>
  <div class="min-h-screen bg-gradient-to-b from-[#f3fafc] via-white to-[#f6fbfd]">
    <Header />

    <main class="overflow-hidden">
      <section class="relative border-b border-primary/10 pb-16 pt-12 md:pb-20 md:pt-16">
        <div class="pointer-events-none absolute inset-0 overflow-hidden" aria-hidden="true">
          <LogoWatermark
            img-class="absolute -left-[6rem] -top-[4rem] w-[min(92vw,36rem)] max-w-none md:-left-[5rem] md:w-[40rem] lg:w-[44rem]"
          />
        </div>

        <div class="container relative">
          <div class="grid items-center gap-10 lg:grid-cols-[1.1fr_0.9fr] lg:gap-14">
            <div>
              <span class="inline-flex items-center gap-2 rounded-full border border-primary/20 bg-white/75 px-4 py-1.5 shadow-sm backdrop-blur-md">
                <Landmark class="h-3.5 w-3.5 text-primary" />
                <span class="font-accent text-xs font-semibold uppercase tracking-[0.2em] text-primary">Institucional</span>
              </span>

              <h1 class="mt-7 max-w-3xl text-4xl font-bold leading-tight text-slate-900 md:text-5xl lg:text-[3.5rem] lg:leading-[1.06]">
                Apresentação do
                <span class="text-primary">ProEnSP</span>
              </h1>
              <p class="mt-6 max-w-2xl text-base leading-relaxed text-slate-600 md:text-lg">
                O Programa de Pós-graduação em Enfermagem em Saúde Pública forma profissionais para atuar com inovação,
                compromisso social e impacto real nos serviços de saúde da região amazônica.
              </p>

              <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                <a
                  href="#proensp"
                  class="inline-flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-[#0f9fb5] to-[#23c0c8] px-6 py-3.5 text-sm font-semibold text-white shadow-lg shadow-cyan-200/50 transition-all duration-300 hover:-translate-y-0.5 hover:shadow-xl hover:shadow-cyan-300/55"
                >
                  Conheça o Programa
                  <ArrowRight class="h-4 w-4" />
                </a>
                <a
                  href="#processos-seletivos"
                  class="inline-flex items-center justify-center gap-2 rounded-xl border border-primary/25 bg-white/80 px-6 py-3.5 text-sm font-semibold text-primary shadow-sm backdrop-blur-sm transition-all duration-300 hover:border-primary/40 hover:bg-primary/5"
                >
                  Processos Seletivos
                </a>
              </div>
            </div>

            <HeroVisual />
          </div>
        </div>
      </section>

      <section id="proensp" class="container py-14 md:py-20">
        <div class="grid gap-6 xl:grid-cols-[1.35fr_0.95fr]">
          <article class="rounded-3xl border border-primary/10 bg-white p-7 shadow-[0_16px_40px_rgba(15,108,119,0.09)] md:p-10">
            <div class="flex items-center gap-3">
              <div class="rounded-xl bg-primary/10 p-2.5 text-primary">
                <Landmark class="h-5 w-5" />
              </div>
              <h2 class="text-2xl font-bold text-slate-900 md:text-3xl">O ProEnSP</h2>
            </div>
            <div class="mt-6 space-y-4 text-sm leading-7 text-slate-600 md:text-base">
              <p>
                A região amazônica é marcada pela heterogeneidade, com diferenças sociais, geográficas, culturais e de acessibilidade. Esse cenário impõe desafios na operacionalização da assistência à saúde e exige formação qualificada para enfrentar problemas prioritários de saúde pública.
              </p>
              <p>
                A Enfermagem, presente em toda a rede de atenção do SUS, é essencial para orientar práticas assistenciais, educacionais, de pesquisa e de gestão, em consonância com integralidade, universalidade e equidade.
              </p>
              <p>
                Com a aprovação do Programa de Pós-graduação em Enfermagem em Saúde Pública (ProEnSP), inicialmente com o curso de Mestrado Profissional, a proposta de formação se orienta para transformações concretas nos serviços de saúde, conectando investigação científica e inovação tecnológica aos desafios reais do território.
              </p>
              <p>
                O programa também coopera para o desenvolvimento local, regional e nacional, contribuindo para o fortalecimento da pós-graduação em Enfermagem, redução de assimetrias regionais e consolidação do SUS.
              </p>
              <p>
                Espera-se ampliar a massa crítica de mestres e, futuramente, doutores, aliando assistência de excelência à pesquisa aplicada para geração de produtos, processos e instrumentos com impacto direto na qualidade da atenção em Enfermagem e Saúde.
              </p>
            </div>
            <a
              href="#areas-atuacao"
              class="mt-7 inline-flex items-center gap-2 text-sm font-semibold text-primary transition-colors hover:text-primary/80"
            >
              Saiba mais sobre o Programa
              <ArrowRight class="h-4 w-4" />
            </a>
          </article>

          <aside class="rounded-3xl border border-primary/10 bg-white p-7 shadow-[0_16px_40px_rgba(15,108,119,0.09)] md:p-8">
            <h3 class="text-2xl font-bold text-slate-900">Nossos Objetivos</h3>
            <ul class="mt-6 space-y-4">
              <li
                v-for="objective in objectives"
                :key="objective.text"
                class="group rounded-2xl border border-slate-100 bg-gradient-to-br from-white to-[#f4fbfd] p-4 transition-all duration-300 hover:-translate-y-0.5 hover:border-primary/25 hover:shadow-md"
              >
                <div class="flex gap-3">
                  <span class="mt-1 flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-primary/12 text-primary transition group-hover:bg-primary group-hover:text-white">
                    <component :is="objective.icon" class="h-5 w-5" />
                  </span>
                  <p class="text-sm leading-6 text-slate-600">
                    {{ objective.text }}
                  </p>
                </div>
              </li>
            </ul>
          </aside>
        </div>
      </section>

      <section class="border-y border-primary/15 bg-gradient-to-r from-[#067787] via-[#1196a5] to-[#1cb8c4]">
        <div class="container py-8">
          <ul class="grid gap-4 text-white sm:grid-cols-2 lg:grid-cols-4">
            <li
              v-for="indicator in indicators"
              :key="indicator.label"
              class="rounded-2xl border border-white/25 bg-white/10 px-5 py-4 shadow-sm backdrop-blur-sm"
            >
              <p class="text-3xl font-bold leading-none">{{ indicator.value }}</p>
              <p class="mt-2 text-sm text-white/90">{{ indicator.label }}</p>
            </li>
          </ul>
        </div>
      </section>

      <section id="areas-atuacao" class="container py-14 md:py-20">
        <div class="mb-8 flex flex-col items-start justify-between gap-4 md:flex-row md:items-end">
          <div>
            <p class="font-accent text-xs font-semibold uppercase tracking-[0.2em] text-primary">Atuação</p>
            <h2 class="mt-3 text-3xl font-bold text-slate-900 md:text-4xl">Áreas de Atuação</h2>
          </div>
        </div>

        <div class="grid gap-6 lg:grid-cols-[1.2fr_0.8fr]">
          <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-3">
            <article
              v-for="area in areas"
              :key="area.title"
              class="group rounded-2xl border border-primary/10 bg-white p-5 shadow-sm transition-all duration-300 hover:-translate-y-0.5 hover:border-primary/30 hover:shadow-md"
            >
              <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-primary/10 text-primary transition-colors group-hover:bg-primary group-hover:text-white">
                <component :is="area.icon" class="h-5 w-5" />
              </span>
              <h3 class="mt-4 text-lg font-semibold leading-snug text-slate-900">
                {{ area.title }}
              </h3>
            </article>
          </div>

          <article
            id="processos-seletivos"
            class="relative overflow-hidden rounded-3xl border border-primary/10 bg-gradient-to-br from-[#0c8ca0] via-[#14a9b5] to-[#2dbf95] p-7 text-white shadow-[0_20px_45px_rgba(10,121,137,0.35)] md:p-8"
          >
            <div class="absolute -right-8 -top-8 h-28 w-28 rounded-full border border-white/30 bg-white/15" />
            <div class="absolute -bottom-12 -left-8 h-32 w-32 rounded-full border border-white/20 bg-white/10" />
            <p class="font-accent text-xs font-semibold uppercase tracking-[0.2em] text-white/85">Inscrições</p>
            <h3 class="mt-3 text-3xl font-bold">Processos Seletivos</h3>
            <p class="mt-4 max-w-sm text-sm leading-7 text-white/95">
              Acompanhe editais, inscrições e etapas do processo seletivo.
            </p>
            <a
              href="#"
              class="mt-7 inline-flex items-center gap-2 rounded-xl border border-white/35 bg-white/15 px-5 py-3 text-sm font-semibold text-white backdrop-blur-sm transition-all duration-300 hover:-translate-y-0.5 hover:bg-white hover:text-[#0e8ea0]"
            >
              Acessar
              <ArrowRight class="h-4 w-4" />
            </a>
          </article>
        </div>
      </section>
    </main>
  </div>
</template>

<script setup lang="ts">
import Header from '@/components/Header.vue';
import HeroVisual from '@/components/HeroVisual.vue';
import LogoWatermark from '@/components/LogoWatermark.vue';
import { ArrowRight, Award, CalendarDays, GraduationCap, Landmark, UsersRound } from 'lucide-vue-next';
import type { Component } from 'vue';

interface ObjectiveItem {
  text: string;
  icon: Component;
}

interface IndicatorItem {
  value: string;
  label: string;
}

interface AreaItem {
  title: string;
  icon: Component;
}

const objectives: ObjectiveItem[] = [
  {
    text: 'Preparar profissionais stricto sensu com alta competência científica e técnico-profissional.',
    icon: GraduationCap,
  },
  {
    text: 'Formar para uma prática transformadora, inovadora e socialmente comprometida no SUS.',
    icon: Award,
  },
  {
    text: 'Capacitar recursos humanos para estudos aplicáveis em cenários multiculturais amazônicos.',
    icon: UsersRound,
  },
  {
    text: 'Produzir e transferir conhecimento e tecnologias para problemas prioritários de saúde pública.',
    icon: Landmark,
  },
];

const indicators: IndicatorItem[] = [
  { value: '+20', label: 'Anos de história' },
  { value: '+200', label: 'Discentes formados' },
  { value: '+150', label: 'Produções científicas' },
  { value: '100%', label: 'Compromisso com o SUS' },
];

const areas: AreaItem[] = [
  { title: 'Assistência em Saúde', icon: GraduationCap },
  { title: 'Gestão em Saúde', icon: Landmark },
  { title: 'Educação em Saúde', icon: Award },
  { title: 'Pesquisa e Inovação', icon: CalendarDays },
  { title: 'Saúde Coletiva e Políticas Públicas', icon: UsersRound },
];
</script>
