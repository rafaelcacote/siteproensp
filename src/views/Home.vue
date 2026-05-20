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
                <a
                  href="#processos-seletivos"
                  class="inline-flex items-center justify-center gap-2 rounded-full border border-primary/35 bg-white/85 px-7 py-3.5 text-sm font-semibold text-slate-700 shadow-sm backdrop-blur-sm transition-all duration-300 hover:-translate-y-0.5 hover:border-primary/50 hover:text-primary"
                >
                  Processos Seletivos
                  <ArrowRight class="h-4 w-4" />
                </a>
              </div>
            </div>

            <div class="order-1 min-w-0 lg:order-2">
              <HeroVisual />
            </div>

          </div>
        </div>
      </section>

      <!-- ═══════════ O PROENSP + OBJETIVOS ═══════════ -->
      <section id="proensp" class="border-t border-slate-100 bg-white">
        <div class="container py-14 md:py-20">
          <div class="grid gap-8 xl:grid-cols-[1.35fr_0.95fr]">

            <!-- O ProEnSP -->
            <article class="rounded-3xl border border-slate-100 bg-white p-7 shadow-[0_12px_36px_rgba(15,108,119,0.08)] md:p-10">
              <div class="flex items-center gap-3">
                <div class="rounded-xl bg-primary/10 p-2.5 text-primary">
                  <Landmark class="h-5 w-5" />
                </div>
                <h2 class="text-2xl font-bold text-slate-900 md:text-3xl">O ProEnSP</h2>
              </div>
              <div class="mt-6 space-y-4 text-[0.925rem] leading-[1.8] text-slate-600 md:text-base">
                <p>A região amazônica é marcada pela heterogeneidade, com diferenças sociais, geográficas, culturais e de acessibilidade. Esse cenário impõe desafios na operacionalização da assistência à saúde e exige formação qualificada para enfrentar problemas prioritários de saúde pública.</p>
                <p>A Enfermagem, presente em toda a rede de atenção do SUS, é essencial para orientar práticas assistenciais, educacionais, de pesquisa e de gestão, em consonância com integralidade, universalidade e equidade.</p>
                <p>Com a aprovação do Programa de Pós-graduação em Enfermagem em Saúde Pública (ProEnSP), inicialmente com o curso de Mestrado Profissional, a proposta de formação se orienta para transformações concretas nos serviços de saúde, conectando investigação científica e inovação tecnológica aos desafios reais do território.</p>
                <p>O programa também coopera para o desenvolvimento local, regional e nacional, contribuindo para o fortalecimento da pós-graduação em Enfermagem, redução de assimetrias regionais e consolidação do SUS.</p>
                <p>Espera-se ampliar a massa crítica de mestres e, futuramente, doutores, aliando assistência de excelência à pesquisa aplicada para geração de produtos, processos e instrumentos com impacto direto na qualidade da atenção em Enfermagem e Saúde.</p>
              </div>
              <RouterLink
                to="/apresentacao"
                class="mt-7 inline-flex items-center gap-2 text-sm font-semibold text-primary transition-colors hover:text-primary/75"
              >
                Saiba mais sobre o Programa
                <ArrowRight class="h-4 w-4" />
              </RouterLink>
            </article>

            <!-- Nossos Objetivos -->
            <aside class="rounded-3xl border border-slate-100 bg-white p-7 shadow-[0_12px_36px_rgba(15,108,119,0.08)] md:p-8">
              <div class="flex items-center gap-3">
                <div class="rounded-xl bg-primary/10 p-2.5 text-primary">
                  <Target class="h-5 w-5" />
                </div>
                <h2 class="text-2xl font-bold text-slate-900">Nossos Objetivos</h2>
              </div>
              <ul class="mt-6 space-y-3">
                <li
                  v-for="objective in objectives"
                  :key="objective.text"
                  class="group flex items-start gap-3 rounded-2xl border border-slate-100 bg-[#fafcfd] p-4 transition-all duration-300 hover:-translate-y-0.5 hover:border-primary/20 hover:shadow-md"
                >
                  <span class="mt-0.5 flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-primary/10 text-primary transition-colors group-hover:bg-primary group-hover:text-white">
                    <component :is="objective.icon" class="h-4 w-4" />
                  </span>
                  <p class="text-[0.85rem] leading-relaxed text-slate-600">{{ objective.text }}</p>
                </li>
              </ul>
            </aside>

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

          <div class="mb-10">
            <p class="font-accent text-xs font-semibold uppercase tracking-[0.22em] text-primary">Atuação —</p>
            <h2 class="mt-3 text-3xl font-bold text-slate-900 md:text-4xl">Áreas de Atuação</h2>
          </div>

          <div class="grid gap-6 lg:grid-cols-[1fr_auto]">

            <!-- Áreas: compact row -->
            <ul class="flex flex-wrap gap-6">
              <li
                v-for="area in areas"
                :key="area.title"
                class="group flex flex-col items-center gap-3 text-center"
              >
                <div class="flex h-14 w-14 items-center justify-center rounded-2xl border border-primary/15 bg-[#f0fafc] text-primary transition-all duration-300 group-hover:bg-primary group-hover:text-white group-hover:shadow-md">
                  <component :is="area.icon" class="h-6 w-6" />
                </div>
                <p class="max-w-[6.5rem] text-xs font-semibold leading-snug text-slate-700">{{ area.title }}</p>
              </li>
            </ul>

            <!-- Processos Seletivos card -->
            <article
              id="processos-seletivos"
              class="relative w-full overflow-hidden rounded-3xl bg-gradient-to-br from-[#0d8fa3] via-[#12a5b2] to-[#22bc9e] p-7 text-white shadow-[0_18px_42px_rgba(10,121,137,0.32)] lg:w-72"
            >
              <div class="absolute -right-6 -top-6 h-24 w-24 rounded-full border border-white/25 bg-white/10" />
              <div class="absolute -bottom-8 -left-6 h-28 w-28 rounded-full border border-white/15 bg-white/8" />
              <div class="relative flex h-12 w-12 items-center justify-center rounded-2xl border border-white/30 bg-white/15 backdrop-blur-sm">
                <CalendarDays class="h-6 w-6" />
              </div>
              <h3 class="relative mt-5 text-xl font-bold">Processos Seletivos</h3>
              <p class="relative mt-3 text-sm leading-relaxed text-white/90">
                Acompanhe editais, inscrições e etapas do processo seletivo.
              </p>
              <a
                href="#"
                class="relative mt-6 inline-flex items-center gap-2 rounded-xl border border-white/30 bg-white/15 px-5 py-2.5 text-sm font-semibold text-white backdrop-blur-sm transition-all duration-300 hover:-translate-y-0.5 hover:bg-white hover:text-[#0e8ea0]"
              >
                Acessar
                <ArrowRight class="h-4 w-4" />
              </a>
            </article>

          </div>
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
  Award,
  BookOpen,
  CalendarDays,
  GraduationCap,
  Heart,
  Landmark,
  Target,
  UsersRound,
} from 'lucide-vue-next';
import type { Component } from 'vue';

interface ObjectiveItem { text: string; icon: Component }
interface IndicatorItem { value: string; label: string; sub: string; icon: Component }
interface AreaItem { title: string; icon: Component }

const objectives: ObjectiveItem[] = [
  { text: 'Preparar profissionais stricto sensu com alta competência científica e técnico-profissional.', icon: GraduationCap },
  { text: 'Formar para uma prática transformadora, inovadora e socialmente comprometida no SUS.', icon: Award },
  { text: 'Capacitar recursos humanos para estudos aplicáveis em cenários multiculturais amazônicos.', icon: UsersRound },
  { text: 'Produzir e transferir conhecimento e tecnologias para problemas prioritários de saúde pública.', icon: Landmark },
];

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
