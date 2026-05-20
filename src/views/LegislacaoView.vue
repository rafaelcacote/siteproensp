<template>
  <div class="min-h-screen bg-gradient-to-b from-[#f0f9fb] via-white to-[#f6fbfd]">
    <Header />

    <main class="overflow-hidden">
      <!-- Hero -->
      <section class="relative border-b border-primary/10 pb-14 pt-12 md:pb-20 md:pt-16">
        <div class="pointer-events-none absolute inset-0 overflow-hidden" aria-hidden="true">
          <LogoWatermark
            :src="logoHero"
            img-class="logo-watermark-hero absolute -left-[5rem] -top-[3rem] w-[min(88vw,34rem)] max-w-none md:-left-[4rem] md:w-[38rem] lg:w-[42rem]"
          />
          <div class="absolute -right-20 top-0 h-64 w-64 rounded-full bg-primary/[0.06] blur-3xl" />
        </div>

        <div class="container relative z-10">
          <div class="max-w-3xl">
            <span class="inline-flex items-center gap-2 rounded-full border border-primary/20 bg-white/80 px-4 py-1.5 text-xs font-semibold uppercase tracking-[0.2em] text-primary shadow-sm backdrop-blur-md">
              <span class="h-2 w-2 shrink-0 rounded-full bg-primary" aria-hidden="true" />
              Institucional
            </span>

            <h1 class="font-display mt-6 text-4xl font-bold leading-tight tracking-tight text-slate-900 md:text-5xl lg:text-[3.2rem] lg:leading-[1.08]">
              Legislação
              <span class="text-primary"> ProEnSP</span>
            </h1>

            <div class="mt-4 h-0.5 w-10 rounded-full bg-primary" aria-hidden="true" />

            <p class="mt-6 max-w-2xl text-base leading-relaxed text-slate-600 md:text-lg">
              Acesse portarias, resoluções, normas e documentos oficiais relacionados ao Programa de
              Pós-graduação em Enfermagem em Saúde Pública.
            </p>
          </div>
        </div>
      </section>

      <!-- ── Filtros ── -->
      <div class="border-b border-slate-100 bg-white shadow-sm">
        <div class="container py-5">
          <!-- Busca + contador + limpar -->
          <div class="flex items-center gap-3">
            <div class="relative flex-1 max-w-lg">
              <Search
                class="pointer-events-none absolute left-3.5 top-1/2 h-4 w-4 -translate-y-1/2 text-slate-400"
                aria-hidden="true"
              />
              <input
                id="search-legislacao"
                v-model="searchQuery"
                type="search"
                placeholder="Buscar por título, portaria, comissão..."
                class="w-full rounded-xl border border-slate-200 bg-slate-50/80 py-2.5 pl-10 pr-4 text-sm text-slate-800 outline-none transition focus:border-primary/40 focus:bg-white focus:ring-2 focus:ring-primary/15"
              />
            </div>
            <p class="hidden shrink-0 text-sm text-slate-500 sm:block" aria-live="polite">
              <span class="font-semibold text-primary">{{ filteredDocuments.length }}</span>
              {{ filteredDocuments.length === 1 ? 'documento' : 'documentos' }}
            </p>
            <button
              v-if="hasActiveFilters"
              type="button"
              class="inline-flex shrink-0 items-center gap-1.5 rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-xs font-semibold text-slate-600 transition hover:border-primary/30 hover:text-primary"
              @click="clearFilters"
            >
              <X class="h-3.5 w-3.5" aria-hidden="true" />
              Limpar
            </button>
          </div>

          <!-- Pills de ano -->
          <div class="mt-4 flex flex-wrap items-center gap-2">
            <span class="mr-0.5 text-[11px] font-semibold uppercase tracking-wide text-slate-400">Ano</span>
            <button
              type="button"
              class="rounded-full px-3 py-1 text-xs font-semibold transition"
              :class="
                selectedYear === ''
                  ? 'bg-primary text-white shadow-sm'
                  : 'bg-slate-100 text-slate-600 hover:bg-primary/10 hover:text-primary'
              "
              @click="selectedYear = ''"
            >
              Todos
            </button>
            <button
              v-for="year in availableYears"
              :key="year"
              type="button"
              class="rounded-full px-3 py-1 text-xs font-semibold transition"
              :class="
                selectedYear === String(year)
                  ? 'bg-primary text-white shadow-sm'
                  : 'bg-slate-100 text-slate-600 hover:bg-primary/10 hover:text-primary'
              "
              @click="selectedYear = selectedYear === String(year) ? '' : String(year)"
            >
              {{ year }}
            </button>
          </div>

          <!-- Pills de categoria -->
          <div class="mt-2.5 flex flex-wrap items-center gap-2">
            <span class="mr-0.5 text-[11px] font-semibold uppercase tracking-wide text-slate-400">Tipo</span>
            <button
              type="button"
              class="rounded-full border px-3 py-1 text-xs font-semibold transition"
              :class="
                selectedCategory === ''
                  ? 'border-slate-300 bg-slate-100 text-slate-700'
                  : 'border-transparent text-slate-500 hover:bg-slate-100'
              "
              @click="selectedCategory = ''"
            >
              Todos
            </button>
            <button
              v-for="cat in categoryOptions"
              :key="cat"
              type="button"
              class="rounded-full border px-3 py-1 text-xs font-semibold transition"
              :class="
                selectedCategory === cat
                  ? categoryActivePillClass(cat)
                  : 'border-transparent text-slate-500 hover:bg-slate-100'
              "
              @click="selectedCategory = selectedCategory === cat ? '' : cat"
            >
              {{ cat }}
            </button>
          </div>
        </div>
      </div>

      <!-- ── Listagem agrupada por ano ── -->
      <section class="container py-10 md:py-14" aria-labelledby="legislacao-heading">
        <h2 id="legislacao-heading" class="sr-only">Documentos de legislação</h2>

        <div v-if="documentsByYear.length" class="space-y-10 md:space-y-14">
          <div v-for="group in documentsByYear" :key="group.year">
            <!-- Cabeçalho do ano -->
            <div class="mb-4 flex items-center gap-4">
              <span
                class="inline-flex h-10 shrink-0 items-center rounded-2xl bg-gradient-to-r from-primary/15 to-primary/5 px-5 text-base font-bold text-primary"
              >
                {{ group.year }}
              </span>
              <div class="h-px flex-1 bg-gradient-to-r from-primary/15 to-transparent" />
              <span class="shrink-0 text-[11px] font-medium text-slate-400">
                {{ group.docs.length }}
                {{ group.docs.length === 1 ? 'documento' : 'documentos' }}
              </span>
            </div>

            <!-- Cards do ano -->
            <div class="space-y-2.5">
              <article v-for="doc in group.docs" :key="doc.id" class="group">
                <LegislationDocumentCard :doc="doc" />
              </article>
            </div>
          </div>
        </div>

        <!-- Estado vazio -->
        <div
          v-else
          class="flex flex-col items-center rounded-3xl border border-dashed border-primary/20 bg-white/80 px-8 py-20 text-center"
        >
          <span class="flex h-16 w-16 items-center justify-center rounded-2xl bg-primary/10">
            <FileText class="h-8 w-8 text-primary/60" aria-hidden="true" />
          </span>
          <p class="mt-5 text-lg font-semibold text-slate-800">Nenhum documento encontrado</p>
          <p class="mt-2 text-sm text-slate-500">Tente outros termos ou remova os filtros aplicados.</p>
          <button
            type="button"
            class="mt-6 rounded-xl bg-primary px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-primary/90"
            @click="clearFilters"
          >
            Limpar filtros
          </button>
        </div>

        <!-- CTA contato -->
        <aside
          class="relative mt-14 overflow-hidden rounded-3xl bg-gradient-to-br from-[#0c8ca0] via-[#14a9b5] to-[#1cb8c4] p-8 text-white shadow-[0_20px_45px_rgba(10,121,137,0.28)] md:p-10"
        >
          <div
            class="absolute -right-8 -top-8 h-32 w-32 rounded-full border border-white/25 bg-white/10"
            aria-hidden="true"
          />
          <div
            class="absolute -bottom-10 -left-6 h-40 w-40 rounded-full border border-white/15 bg-white/[0.07]"
            aria-hidden="true"
          />
          <div class="relative z-10 flex flex-col gap-6 md:flex-row md:items-center md:justify-between">
            <div class="max-w-xl">
              <Landmark class="h-7 w-7 text-white/80" aria-hidden="true" />
              <h3 class="mt-4 text-xl font-bold md:text-2xl">
                Não encontrou o documento que procura?
              </h3>
              <p class="mt-2.5 text-sm leading-relaxed text-white/90 md:text-base">
                Entre em contato com a coordenação do ProEnSP para solicitar informações ou cópias
                de documentos oficiais.
              </p>
            </div>
            <a
              href="mailto:proensp@uea.edu.br"
              class="inline-flex shrink-0 items-center justify-center gap-2 rounded-xl border border-white/35 bg-white/15 px-6 py-3.5 text-sm font-semibold text-white backdrop-blur-sm transition-all hover:-translate-y-0.5 hover:bg-white hover:text-[#0e8ea0]"
              aria-label="Entre em contato por e-mail com a coordenação do ProEnSP"
            >
              Entre em contato
              <ArrowRight class="h-4 w-4" aria-hidden="true" />
            </a>
          </div>
        </aside>
      </section>
    </main>
  </div>
</template>

<script setup lang="ts">
import { computed, ref } from 'vue';
import Header from '@/components/Header.vue';
import LogoWatermark from '@/components/LogoWatermark.vue';
import logoHero from '@/assets/logo_hero.svg';
import LegislationDocumentCard from '@/components/legislacao/LegislationDocumentCard.vue';
import type { LegislationCategory, LegislationDocument } from '@/types/legislacao';
import { ArrowRight, FileText, Landmark, Search, X } from 'lucide-vue-next';

const categoryOptions: LegislationCategory[] = ['Portaria', 'Resolução', 'Norma', 'Documento'];

const legislationDocuments: LegislationDocument[] = [
  // 2017
  {
    id: 'resolucao-10-2017-consuniv',
    title:
      'Resolução Nº 10-2017-CONSUNIV — Revalidação de diplomas de cursos de graduação e pós-graduação stricto sensu',
    year: 2017,
    category: 'Resolução',
    description: 'Normas da CONSUNIV/UEA sobre revalidação de diplomas de graduação e pós-graduação stricto sensu.',
    fileUrl: '/legislacao/2017/resolucao-10-2017-consuniv-revalidacao-diplomas.pdf',
  },
  // 2018
  {
    id: 'resolucao-61-2018-proensp',
    title:
      'Resolução Nº 61/2018 — Criação do Programa de Pós-Graduação em Enfermagem em Saúde Pública (ProEnSP) — Mestrado Profissional',
    year: 2018,
    category: 'Resolução',
    description: 'Criação do Programa de Pós-Graduação em Enfermagem em Saúde Pública (ProEnSP), nível Mestrado Profissional.',
    fileUrl: '/legislacao/2018/resolucao-61-2018-criacao-proensp.pdf',
  },
  {
    id: 'portaria-794-2018',
    title: 'Portaria Nº 794.2018 — Comissão de Seleção — ProEnSP/ESA/UEA',
    year: 2018,
    category: 'Portaria',
    description: 'Composição da Comissão de Seleção do programa.',
    fileUrl: '/legislacao/2018/portaria-794-2018-comissao-selecao.pdf',
  },
  {
    id: 'portaria-795-2018',
    title: 'Portaria Nº 795.2018 — Coordenação do ProEnSP — ProEnSP/ESA/UEA',
    year: 2018,
    category: 'Portaria',
    description: 'Designação da coordenação do ProEnSP.',
    fileUrl: '/legislacao/2018/portaria-795-2018-coordenacao.pdf',
  },
  // 2019
  {
    id: 'instrucao-normativa-001-2019',
    title:
      'Instrução Normativa Nº 001/2019 — ProEnSP — Processo de aproveitamento de disciplinas',
    year: 2019,
    category: 'Norma',
    description: 'Normas do ProEnSP sobre aproveitamento de disciplinas.',
    fileUrl: '/legislacao/2019/instrucao-normativa-001-2019-aproveitamento-disciplinas.pdf',
  },
  {
    id: 'instrucao-normativa-002-2019',
    title:
      'Instrução Normativa Nº 002/2019 — ProEnSP — Exame de Qualificação — ProEnSP/ESA/UEA',
    year: 2019,
    category: 'Norma',
    description: 'Normas do ProEnSP sobre exame de qualificação.',
    fileUrl: '#',
  },
  {
    id: 'portaria-002-2019-paes',
    title: 'Portaria Nº 002-2019 — PAES — ProEnSP/ESA/UEA',
    year: 2019,
    category: 'Portaria',
    description: 'Portaria PAES do ProEnSP.',
    fileUrl: '/legislacao/2019/portaria-002-2019-paes.pdf',
  },
  {
    id: 'portaria-915-2019',
    title: 'Portaria Nº 915-2019 — Comissão Processo Seletivo — ProEnSP/ESA/UEA',
    year: 2019,
    category: 'Portaria',
    description: 'Comissão do processo seletivo do ProEnSP.',
    fileUrl: '/legislacao/2019/portaria-915-2019-comissao-processo-seletivo.pdf',
  },
  // 2020
  {
    id: 'instrucao-normativa-001-2020',
    title:
      'Instrução Normativa Nº 001/2020 — ProEnSP — Apresentação dos trabalhos de conclusão',
    year: 2020,
    category: 'Norma',
    description: 'Normas sobre apresentação dos trabalhos de conclusão do curso.',
    fileUrl: '/legislacao/2020/instrucao-normativa-001-2020-trabalhos-conclusao.pdf',
  },
  {
    id: 'instrucao-normativa-003-2020',
    title: 'Instrução Normativa Nº 003/2020 — ProEnSP — Processo de credenciamento',
    year: 2020,
    category: 'Norma',
    description: 'Normas do processo de credenciamento no ProEnSP.',
    fileUrl: '/legislacao/2020/instrucao-normativa-003-2020-credenciamento.pdf',
  },
  {
    id: 'portaria-002-2020',
    title: 'Portaria Nº 002-2020 — Credenciamento de docente — ProEnSP/ESA/UEA',
    year: 2020,
    category: 'Portaria',
    description: 'Credenciamento de docente no programa.',
    fileUrl: '/legislacao/2020/portaria-002-2020-credenciamento-docente.pdf',
  },
  {
    id: 'portaria-0326-2020',
    title: 'Portaria Nº 0326-2020 — Processo Seletivo — ProEnSP/ESA/UEA',
    year: 2020,
    category: 'Portaria',
    description: 'Comissão e normas do processo seletivo.',
    fileUrl: '/legislacao/2020/portaria-0326-2020-processo-seletivo.pdf',
  },
  {
    id: 'portaria-0390-2020',
    title: 'Portaria Nº 0390-2020 — Coordenação do Programa — ProEnSP/ESA/UEA',
    year: 2020,
    category: 'Portaria',
    description: 'Designação da coordenação do programa.',
    fileUrl: '/legislacao/2020/portaria-0390-2020-coordenacao-programa.pdf',
  },
  {
    id: 'portaria-505-2020',
    title: 'Portaria Nº 505-2020 — Comissão de Autoavaliação — ProEnSP/ESA/UEA',
    year: 2020,
    category: 'Portaria',
    description: 'Comissão de autoavaliação do ProEnSP.',
    fileUrl: '/legislacao/2020/portaria-505-2020-comissao-autoavaliacao.pdf',
  },
  // 2021
  {
    id: 'portaria-001-2021',
    title: 'Portaria Nº 001-2021 — Comissão de Bolsa — ProEnSP/ESA/UEA',
    year: 2021,
    category: 'Portaria',
    description: 'Institui a Comissão de Bolsa do Programa de Pós-graduação em Enfermagem em Saúde Pública.',
    fileUrl: '/legislacao/2021/portaria-001-2021-comissao-bolsa.pdf',
  },
  {
    id: 'portaria-673-2021',
    title: 'Portaria Nº 673/2021 — GR/UEA — Comissão de Seleção ProEnSP — ProEnSP/ESA/UEA',
    year: 2021,
    category: 'Portaria',
    description: 'Comissão de Seleção do ProEnSP junto à GR/UEA.',
    fileUrl: '/legislacao/2021/portaria-673-2021-comissao-selecao.pdf',
  },
  // 2022
  {
    id: 'portaria-001-2022',
    title: 'Portaria Nº 001-2022 — Comissão de Bolsa — ProEnSP/ESA/UEA',
    year: 2022,
    category: 'Portaria',
    description: 'Comissão de Bolsa do ProEnSP.',
    fileUrl: '/legislacao/2022/portaria-001-2022-comissao-bolsa.pdf',
  },
  {
    id: 'portaria-002-2022',
    title: 'Portaria Nº 002-2022 — PAES — ProEnSP/ESA/UEA',
    year: 2022,
    category: 'Portaria',
    description: 'Programa de Apoio à Educação e ao Serviço Público (PAES) do ProEnSP.',
    fileUrl: '/legislacao/2022/portaria-002-2022-paes.pdf',
  },
  {
    id: 'portaria-003-2022',
    title: 'Portaria Nº 003-2022 — Comissão Organizadora do I SESPAM — ProEnSP/ESA/UEA',
    year: 2022,
    category: 'Portaria',
    description: 'Comissão organizadora do I Seminário em Saúde Pública do Amazonas (SESPAM).',
    fileUrl: '/legislacao/2022/portaria-003-2022-comissao-sespam.pdf',
  },
  {
    id: 'portaria-1088-2022',
    title: 'Portaria Nº 1088-2022 — GR/UEA — Comissão de Seleção ProEnSP',
    year: 2022,
    category: 'Portaria',
    description: 'Comissão de Seleção do ProEnSP junto à GR/UEA.',
    fileUrl: '/legislacao/2022/portaria-1088-2022-comissao-selecao.pdf',
  },
  // 2023
  {
    id: 'portaria-218-2023',
    title: 'Portaria Nº 218-2023 — GR/UEA — Comissão de Autoavaliação — ProEnSP/ESA/UEA',
    year: 2023,
    category: 'Portaria',
    description: 'Comissão de autoavaliação do ProEnSP.',
    fileUrl: '/legislacao/2023/portaria-218-2023-comissao-autoavaliacao.pdf',
  },
  {
    id: 'portaria-217-2023',
    title: 'Portaria Nº 217-2023 — GR/UEA — Coordenação do ProEnSP',
    year: 2023,
    category: 'Portaria',
    description: 'Designação da coordenação do ProEnSP.',
    fileUrl: '/legislacao/2023/portaria-217-2023-coordenacao.pdf',
  },
  {
    id: 'instrucao-normativa-003-2023',
    title: 'Instrução Normativa Nº 003-2023 — Defesa de Dissertação — ProEnSP/ESA/UEA',
    year: 2023,
    category: 'Norma',
    description: 'Normas sobre defesa de dissertação no ProEnSP.',
    fileUrl: '/legislacao/2023/instrucao-normativa-003-2023-defesa-dissertacao.pdf',
  },
  {
    id: 'instrucao-normativa-002-2023',
    title: 'Instrução Normativa Nº 002-2023 — Exame de Qualificação — ProEnSP/ESA/UEA',
    year: 2023,
    category: 'Norma',
    description: 'Normas sobre exame de qualificação no ProEnSP.',
    fileUrl: '/legislacao/2023/instrucao-normativa-002-2023-exame-qualificacao.pdf',
  },
  {
    id: 'portaria-002-2023',
    title: 'Portaria Nº 002-2023 — Comissão Organizadora do II SESPAM — ProEnSP/ESA/UEA',
    year: 2023,
    category: 'Portaria',
    description: 'Comissão organizadora do II Seminário em Saúde Pública do Amazonas (SESPAM).',
    fileUrl: '/legislacao/2023/portaria-002-2023-comissao-sespam.pdf',
  },
  {
    id: 'portaria-001-2023',
    title: 'Portaria Nº 001-2023 — Comissão de Credenciamento e Recredenciamento — ProEnSP/ESA/UEA',
    year: 2023,
    category: 'Portaria',
    description: 'Comissão de credenciamento e recredenciamento do programa.',
    fileUrl: '/legislacao/2023/portaria-001-2023-credenciamento.pdf',
  },
  {
    id: 'portaria-1026-2023',
    title: 'Portaria Nº 1026-2023 — GR/UEA — Comissão de Processo Seletivo — ProEnSP/ESA/UEA',
    year: 2023,
    category: 'Portaria',
    description: 'Comissão do processo seletivo do ProEnSP.',
    fileUrl: '/legislacao/2023/portaria-1026-2023-comissao-processo-seletivo.pdf',
  },
  // 2024
  {
    id: 'instrucao-normativa-001-2024',
    title:
      'Instrução Normativa Nº 001/2024 — ProEnSP/UEA — Credenciamento e recredenciamento de docentes',
    year: 2024,
    category: 'Norma',
    description: 'Normas para credenciamento e recredenciamento de docentes no ProEnSP.',
    fileUrl: '/legislacao/2024/instrucao-normativa-001-2024-credenciamento-docentes.pdf',
  },
  {
    id: 'portaria-001-2024',
    title: 'Portaria Nº 001-2024 — Comissão de Bolsa — ProEnSP/ESA/UEA',
    year: 2024,
    category: 'Portaria',
    description: 'Comissão de Bolsa do ProEnSP.',
    fileUrl: '/legislacao/2024/portaria-001-2024-comissao-bolsa.pdf',
  },
  {
    id: 'portaria-002-2024',
    title: 'Portaria Nº 002-2024 — Comissão de Credenciamento — ProEnSP/ESA/UEA',
    year: 2024,
    category: 'Portaria',
    description: 'Comissão de credenciamento do programa.',
    fileUrl: '/legislacao/2024/portaria-002-2024-credenciamento.pdf',
  },
  {
    id: 'portaria-907-2024',
    title: 'Portaria Nº 907-2024 — GR/UEA — Comissão de Seleção ProEnSP',
    year: 2024,
    category: 'Portaria',
    description: 'Comissão de Seleção para ingresso no Mestrado, ano acadêmico 2025.',
    fileUrl: '/legislacao/2024/portaria-907-2024-comissao-selecao.pdf',
  },
  // 2025
  {
    id: 'portaria-516-2025',
    title: 'Portaria Nº 516-2025 — GR/UEA — Coordenação do ProEnSP',
    year: 2025,
    category: 'Portaria',
    description: 'Designação da coordenação do ProEnSP (mandato 2025–2027).',
    fileUrl: '/legislacao/2025/portaria-516-2025-coordenacao.pdf',
  },
];

const searchQuery = ref('');
const selectedYear = ref('');
const selectedCategory = ref('');

const availableYears = computed(() =>
  [...new Set(legislationDocuments.map((d) => d.year))].sort((a, b) => b - a),
);

const filteredDocuments = computed(() => {
  const query = searchQuery.value.trim().toLowerCase();

  return legislationDocuments
    .filter((doc) => {
      const matchesSearch =
        !query ||
        doc.title.toLowerCase().includes(query) ||
        doc.description?.toLowerCase().includes(query);
      const matchesYear = !selectedYear.value || String(doc.year) === selectedYear.value;
      const matchesCategory = !selectedCategory.value || doc.category === selectedCategory.value;

      return matchesSearch && matchesYear && matchesCategory;
    })
    .sort((a, b) => b.year - a.year || a.title.localeCompare(b.title, 'pt-BR'));
});

const documentsByYear = computed(() => {
  const map = new Map<number, LegislationDocument[]>();
  for (const doc of filteredDocuments.value) {
    const arr = map.get(doc.year) ?? [];
    arr.push(doc);
    map.set(doc.year, arr);
  }
  return [...map.entries()]
    .sort(([a], [b]) => b - a)
    .map(([year, docs]) => ({ year, docs }));
});

const hasActiveFilters = computed(
  () => Boolean(searchQuery.value.trim() || selectedYear.value || selectedCategory.value),
);

function clearFilters() {
  searchQuery.value = '';
  selectedYear.value = '';
  selectedCategory.value = '';
}

function categoryActivePillClass(category: LegislationCategory): string {
  const map: Record<LegislationCategory, string> = {
    Portaria: 'border-cyan-200 bg-cyan-50 text-cyan-800',
    Resolução: 'border-violet-200 bg-violet-50 text-violet-800',
    Norma: 'border-amber-200 bg-amber-50 text-amber-800',
    Documento: 'border-slate-200 bg-slate-100 text-slate-700',
  };
  return map[category];
}
</script>
