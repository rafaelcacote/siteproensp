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
              Coordenação e
              <span class="text-primary"> Colegiado</span>
            </h1>

            <div class="mt-4 h-0.5 w-10 rounded-full bg-primary" aria-hidden="true" />

            <p class="mt-6 max-w-2xl text-base leading-relaxed text-slate-600 md:text-lg">
              Composição da coordenação, comissão de bolsas e colegiado do Programa de Pós-graduação em
              Enfermagem em Saúde Pública (ProEnSP), conforme portarias e mandatos vigentes na UEA.
            </p>
          </div>
        </div>
      </section>

      <!-- Equipe de Coordenação Atual -->
      <section class="border-b border-primary/10 bg-gradient-to-b from-white to-[#f0f9fb] py-14 md:py-20">
        <div class="container">
          <div class="mb-10 flex flex-col items-start gap-2">
            <span class="inline-flex items-center gap-2 rounded-full border border-primary/20 bg-primary/5 px-4 py-1.5 text-xs font-semibold uppercase tracking-[0.18em] text-primary">
              <span class="h-1.5 w-1.5 rounded-full bg-primary" aria-hidden="true" />
              Gestão 2025–2027
            </span>
            <h2 class="font-display text-2xl font-bold text-slate-900 md:text-3xl">
              Equipe de Coordenação Atual
            </h2>
            <p class="max-w-xl text-sm leading-relaxed text-slate-500">
              Docentes responsáveis pela gestão didático-científica e administrativa do ProEnSP no mandato vigente.
            </p>
          </div>

          <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            <article
              v-for="d in coordinationTerms[0].membros"
              :key="d.name"
              class="group relative flex flex-col items-center overflow-hidden rounded-3xl border border-primary/10 bg-white p-6 text-center shadow-[0_8px_30px_rgba(15,108,119,0.07)] transition-all duration-300 hover:-translate-y-1 hover:border-primary/25 hover:shadow-[0_16px_40px_rgba(15,108,119,0.13)]"
            >
              <!-- Anel decorativo -->
              <div class="relative mb-5">
                <div class="absolute inset-0 rounded-full bg-gradient-to-br from-primary/30 to-cyan-300/20 blur-md scale-110" aria-hidden="true" />
                <div class="relative h-28 w-28 overflow-hidden rounded-full ring-4 ring-white shadow-lg">
                  <img
                    v-if="d.photo"
                    :src="d.photo"
                    :alt="d.name"
                    class="h-full w-full object-cover object-top transition-transform duration-500 group-hover:scale-105"
                    loading="lazy"
                    decoding="async"
                  />
                  <div
                    v-else
                    class="flex h-full w-full items-center justify-center bg-gradient-to-br from-primary/20 to-cyan-300/20"
                  >
                    <span class="text-2xl font-bold text-primary">{{ getInitials(d.name) }}</span>
                  </div>
                </div>
              </div>

              <!-- Badge de papel -->
              <span class="mb-3 inline-flex items-center rounded-full bg-primary/10 px-3 py-1 font-accent text-[10px] font-bold uppercase tracking-wider text-primary">
                {{ d.roleTag }}
              </span>

              <!-- Nome -->
              <h3 class="text-sm font-bold leading-snug text-slate-900 md:text-base">
                {{ d.name }}
              </h3>
              <p class="mt-1.5 text-xs leading-relaxed text-slate-500">
                {{ d.role }}
              </p>

              <!-- Linha decorativa inferior -->
              <div
                class="absolute bottom-0 left-0 h-0.5 w-0 bg-gradient-to-r from-primary to-cyan-400 transition-all duration-300 group-hover:w-full"
                aria-hidden="true"
              />
            </article>
          </div>
        </div>
      </section>

      <div class="container py-10 md:py-14">
        <ColegiadoSectionNav :sections="toc" />

        <div class="space-y-16 md:space-y-20">

            <!-- Coordenação -->
            <section :id="toc[0].id" class="scroll-mt-36">
              <div class="flex items-end justify-between gap-4 border-b border-border pb-4">
                <div>
                  <h2 class="font-display text-2xl font-bold text-foreground md:text-3xl">
                    Coordenação do ProEnSP
                  </h2>
                  <p class="mt-1 text-sm text-muted-foreground">
                    Gestão didático-científica e administrativa do curso.
                  </p>
                </div>
                <div class="hidden h-12 w-12 shrink-0 rounded-2xl bg-primary/10 p-2.5 text-primary sm:flex sm:items-center sm:justify-center" aria-hidden="true">
                  <UsersRound class="h-6 w-6" />
                </div>
              </div>

              <div class="mt-8 space-y-6">
                <article
                  v-for="(term, idx) in coordinationTerms"
                  :key="term.period"
                  class="group relative overflow-hidden rounded-2xl border border-primary/10 bg-white shadow-[0_8px_24px_rgba(15,108,119,0.06)] transition hover:border-primary/25 hover:shadow-md"
                >
                  <div
                    class="absolute left-0 top-0 h-full w-1 bg-gradient-to-b from-primary to-primary/60"
                    aria-hidden="true"
                  />
                  <div class="pl-6 pr-5 pb-6 pt-5 sm:pl-7 sm:pr-6 sm:pt-6">
                    <div class="flex flex-wrap items-start justify-between gap-3">
                      <div>
                        <div class="flex flex-wrap items-center gap-2">
                          <h3 class="text-lg font-bold text-foreground md:text-xl">
                            {{ term.period }}
                          </h3>
                          <span
                            v-if="idx === 0"
                            class="rounded-full bg-primary/15 px-2.5 py-0.5 font-accent text-[10px] font-bold uppercase tracking-wider text-primary"
                          >
                            Atual
                          </span>
                        </div>
                        <p class="mt-1 text-sm font-medium text-primary/90">
                          {{ term.portaria }}
                        </p>
                      </div>
                    </div>

                    <!-- Member cards -->
                    <div class="mt-6 grid gap-3 sm:grid-cols-2 lg:grid-cols-4">
                      <div
                        v-for="m in term.membros"
                        :key="m.name"
                        class="group/card flex items-center gap-3 rounded-xl border border-transparent bg-muted/30 p-3 transition-all hover:border-primary/15 hover:bg-primary/[0.04]"
                      >
                        <!-- Foto ou iniciais -->
                        <div class="relative h-16 w-16 shrink-0">
                          <img
                            v-if="m.photo"
                            :src="m.photo"
                            :alt="m.name"
                            class="h-full w-full rounded-full object-cover object-top ring-2 ring-white shadow-sm transition-transform duration-300 group-hover/card:scale-105"
                            loading="lazy"
                            decoding="async"
                          />
                          <div
                            v-else
                            class="flex h-full w-full items-center justify-center rounded-full bg-gradient-to-br from-primary/20 to-cyan-200/40 ring-2 ring-white shadow-sm"
                          >
                            <span class="text-sm font-bold text-primary">{{ getInitials(m.name) }}</span>
                          </div>
                        </div>
                        <div class="min-w-0">
                          <p class="truncate text-xs font-semibold leading-snug text-foreground">{{ m.name }}</p>
                          <span class="mt-1 inline-flex items-center rounded-full bg-primary/10 px-2 py-0.5 font-accent text-[9px] font-bold uppercase tracking-wide text-primary">
                            {{ m.roleTag }}
                          </span>
                        </div>
                      </div>
                    </div>

                    <!-- Representantes -->
                    <div v-if="term.admin || term.discente" class="mt-4 grid gap-3 sm:grid-cols-2">
                      <div v-if="term.admin" class="rounded-xl border border-border/60 bg-background px-4 py-3">
                        <p class="font-accent text-[10px] font-semibold uppercase tracking-wider text-muted-foreground">Representante administrativo</p>
                        <p class="mt-1.5 text-sm text-foreground">{{ term.admin }}</p>
                      </div>
                      <div v-if="term.discente" class="rounded-xl border border-border/60 bg-background px-4 py-3">
                        <p class="font-accent text-[10px] font-semibold uppercase tracking-wider text-muted-foreground">Representante discente</p>
                        <p class="mt-1.5 text-sm text-foreground">{{ term.discente }}</p>
                      </div>
                    </div>
                  </div>
                </article>
              </div>
            </section>

            <!-- Comissão de bolsas -->
            <section :id="toc[1].id" class="scroll-mt-36">
              <div class="flex items-end justify-between gap-4 border-b border-border pb-4">
                <div>
                  <h2 class="font-display text-2xl font-bold text-foreground md:text-3xl">
                    Comissão de bolsas
                  </h2>
                  <p class="mt-1 text-sm text-muted-foreground">
                    Composição por período letivo.
                  </p>
                </div>
                <div class="hidden h-12 w-12 shrink-0 rounded-2xl bg-primary/10 p-2.5 text-primary sm:flex sm:items-center sm:justify-center" aria-hidden="true">
                  <Award class="h-6 w-6" />
                </div>
              </div>

              <ul class="mt-8 grid gap-4 sm:grid-cols-2">
                <li
                  v-for="(c, i) in commissionTerms"
                  :key="c.period"
                  class="rounded-2xl border border-border bg-gradient-to-b from-card to-muted/20 p-5 shadow-sm transition hover:border-primary/20"
                >
                  <p class="font-accent text-[11px] font-semibold uppercase tracking-wider text-primary">
                    {{ c.period }}
                    <span v-if="i === 0" class="ml-2 rounded-md bg-primary/15 px-1.5 py-0.5 text-[10px] font-bold text-primary">Atual</span>
                  </p>
                  <ul class="mt-4 space-y-2.5 text-sm leading-relaxed text-foreground">
                    <li v-for="line in c.lines" :key="line" class="flex gap-2">
                      <span class="mt-2 h-1 w-1 shrink-0 rounded-full bg-primary/70" aria-hidden="true" />
                      <span>{{ line }}</span>
                    </li>
                  </ul>
                </li>
              </ul>
            </section>

            <!-- Colegiado -->
            <section :id="toc[2].id" class="scroll-mt-36">
              <div class="flex items-end justify-between gap-4 border-b border-border pb-4">
                <div>
                  <h2 class="font-display text-2xl font-bold text-foreground md:text-3xl">
                    Colegiado do ProEnSP
                  </h2>
                  <p class="mt-1 max-w-3xl text-sm leading-relaxed text-muted-foreground">
                    Instância máxima deliberativa do programa, composta por docentes credenciados como permanentes e representação discente.
                  </p>
                </div>
                <div class="hidden h-12 w-12 shrink-0 rounded-2xl bg-primary/10 p-2.5 text-primary sm:flex sm:items-center sm:justify-center" aria-hidden="true">
                  <Landmark class="h-6 w-6" />
                </div>
              </div>

              <div class="mt-8 rounded-2xl border border-border bg-card p-6 shadow-sm md:p-8">
                <h3 class="font-accent text-xs font-semibold uppercase tracking-wider text-muted-foreground">
                  Docentes permanentes
                </h3>
                <ul class="mt-6 grid gap-3 sm:grid-cols-2 lg:grid-cols-3">
                  <li
                    v-for="doc in colegiadoDocentes"
                    :key="doc.name"
                    class="group/doc flex items-center gap-3 rounded-xl border border-transparent bg-muted/30 px-3 py-2.5 transition hover:border-primary/15 hover:bg-primary/[0.04]"
                  >
                    <div class="relative h-14 w-14 shrink-0">
                      <img
                        v-if="doc.photo"
                        :src="doc.photo"
                        :alt="doc.name"
                        class="h-full w-full rounded-full object-cover object-top ring-2 ring-white shadow-sm transition-transform duration-300 group-hover/doc:scale-105"
                        loading="lazy"
                        decoding="async"
                      />
                      <div
                        v-else
                        class="flex h-full w-full items-center justify-center rounded-full bg-gradient-to-br from-primary/20 to-cyan-200/40 ring-2 ring-white shadow-sm"
                      >
                        <span class="text-xs font-bold text-primary">{{ getInitials(doc.name) }}</span>
                      </div>
                    </div>
                    <span class="text-sm leading-snug text-foreground">{{ doc.name }}</span>
                  </li>
                </ul>

                <div class="mt-8 border-t border-border pt-8">
                  <h3 class="font-accent text-xs font-semibold uppercase tracking-wider text-muted-foreground">
                    Representante discente
                  </h3>
                  <p class="mt-3 max-w-xl text-sm leading-relaxed text-foreground">
                    {{ colegiadoDiscente }}
                  </p>
                </div>
              </div>
            </section>

            <!-- Cronograma -->
            <section :id="toc[3].id" class="scroll-mt-36">
              <div class="flex items-end justify-between gap-4 border-b border-border pb-4">
                <div>
                  <h2 class="font-display text-2xl font-bold text-foreground md:text-3xl">
                    Cronograma de reuniões
                  </h2>
                  <p class="mt-1 text-sm text-muted-foreground">
                    Calendários do colegiado por ano.
                  </p>
                </div>
                <div class="hidden h-12 w-12 shrink-0 rounded-2xl bg-primary/10 p-2.5 text-primary sm:flex sm:items-center sm:justify-center" aria-hidden="true">
                  <CalendarDays class="h-6 w-6" />
                </div>
              </div>

              <div class="mt-8 rounded-2xl border border-dashed border-primary/30 bg-primary/[0.03] p-6 md:p-8">
                <p class="text-sm leading-relaxed text-muted-foreground">
                  Referência aos anos em que há calendário de reuniões do colegiado. Os documentos podem ser solicitados à secretaria do programa.
                </p>
                <ul class="mt-5 flex flex-wrap gap-2">
                  <li
                    v-for="y in cronogramaYears"
                    :key="y"
                    class="rounded-lg border border-border bg-white px-3 py-1.5 font-accent text-xs font-semibold text-foreground/80"
                  >
                    {{ y }}
                  </li>
                </ul>
              </div>
            </section>
        </div>
      </div>

    <ScrollTop icon="pi pi-arrow-up" :threshold="320" class="!bottom-6 !right-6" />
    </main>
  </div>
</template>

<script setup lang="ts">
import ColegiadoSectionNav from '@/components/colegiado/ColegiadoSectionNav.vue';
import Header from '@/components/Header.vue';
import ScrollTop from 'primevue/scrolltop';
import LogoWatermark from '@/components/LogoWatermark.vue';
import logoHero from '@/assets/logo_hero.svg';
import { Award, CalendarDays, Landmark, UsersRound } from 'lucide-vue-next';

const profNazare = '/img/professores/prof_nazare.jpeg';
const profWagner = '/img/professores/prof_wagner.jpeg';
const profAmelia = '/img/professores/prof_amelia.jpeg';
const profDarlisom = '/img/professores/prof_Darlisom.jpeg';

function getInitials(name: string): string {
  const cleaned = name.replace(/^(Dra?\.|Prof\.?a?)\s*/i, '').trim();
  const parts = cleaned.split(' ').filter((p) => p.length > 2);
  return parts.slice(0, 2).map((p) => p[0].toUpperCase()).join('');
}

const toc = [
  { id: 'coordenacao', label: 'Coordenação do ProEnSP', short: 'Coordenação' },
  { id: 'comissao-bolsas', label: 'Comissão de bolsas', short: 'Bolsas' },
  { id: 'colegiado', label: 'Colegiado', short: 'Colegiado' },
  { id: 'cronograma', label: 'Cronograma de reuniões', short: 'Reuniões' },
] as const;

interface Membro {
  name: string;
  role: string;
  roleTag: string;
  photo?: string;
}

interface CoordTerm {
  period: string;
  portaria: string;
  membros: Membro[];
  admin?: string;
  discente?: string;
}

const coordinationTerms: CoordTerm[] = [
  {
    period: 'Ano 2025–2027',
    portaria: 'Portaria nº 516/2025 — GR/UEA',
    membros: [
      { name: 'Dra. Maria de Nazaré de Souza Ribeiro', role: 'Coordenadora', roleTag: 'Coordenação', photo: profNazare },
      { name: 'Dr. Wagner Ferreira Monteiro', role: 'Vice-coordenador', roleTag: 'Vice-coord.', photo: profWagner },
      { name: 'Dra. Amélia Nunes Sicsú', role: 'Docente Permanente', roleTag: 'Docente', photo: profAmelia },
      { name: 'Dr. Darlisom Sousa Ferreira', role: 'Docente Permanente', roleTag: 'Docente', photo: profDarlisom },
    ],
    admin: 'Miracele Godinho Guimarães',
    discente: 'Adriana Raquel Nunes de Souza',
  },
  {
    period: 'Ano 2023–2025',
    portaria: 'Portaria nº 217/2023 — GR/UEA',
    membros: [
      { name: 'Dra. Amélia Nunes Sicsú', role: 'Coordenadora', roleTag: 'Coordenação', photo: profAmelia },
      { name: 'Dra. Maria de Nazaré de Souza Ribeiro', role: 'Vice-coordenadora', roleTag: 'Vice-coord.', photo: profNazare },
      { name: 'Dra. Edinilza Ribeiro dos Santos', role: 'Docente Permanente', roleTag: 'Docente' },
      { name: 'Dra. Aldalice Aguiar de Souza', role: 'Docente Permanente', roleTag: 'Docente' },
    ],
  },
  {
    period: 'Ano 2020–2022',
    portaria: 'Portaria nº 0390/2020 — GR/UEA',
    membros: [
      { name: 'Dra. Amélia Nunes Sicsú', role: 'Coordenadora', roleTag: 'Coordenação', photo: profAmelia },
      { name: 'Dra. Maria de Nazaré de Souza Ribeiro', role: 'Vice-coordenadora', roleTag: 'Vice-coord.', photo: profNazare },
      { name: 'Dra. Edinilza Ribeiro dos Santos', role: 'Docente Permanente', roleTag: 'Docente' },
      { name: 'Dra. Elizabeth Teixeira', role: 'Docente Permanente', roleTag: 'Docente' },
    ],
    discente: 'Lara Bezerra de Oliveira (Turma 2019)',
  },
  {
    period: 'Ano 2018–2020',
    portaria: 'Portaria nº 795/2018 — GR/UEA',
    membros: [
      { name: 'Dra. Amélia Nunes Sicsú', role: 'Coordenadora', roleTag: 'Coordenação', photo: profAmelia },
      { name: 'Dr. Leonardo Naves dos Reis', role: 'Vice-coordenador', roleTag: 'Vice-coord.' },
      { name: 'Dra. Edinilza Ribeiro dos Santos', role: 'Docente Permanente', roleTag: 'Docente' },
      { name: 'Dra. Elizabeth Teixeira', role: 'Docente Permanente', roleTag: 'Docente' },
    ],
  },
];

interface CommissionTerm {
  period: string;
  lines: string[];
}

const commissionTerms: CommissionTerm[] = [
  {
    period: '2024–2025',
    lines: [
      'Dra. Elielza Guerreiro Menezes — Presidente',
      'Dra. Maria de Nazaré de Souza Ribeiro — Membro efetivo',
      'Dra. Cleisiane Xavier Diniz — Membro suplente',
      'Adriana Raquel Nunes de Souza — Representante discente (Turma 2023)',
    ],
  },
  {
    period: '2022–2023',
    lines: [
      'Dra. Elielza Guerreiro Menezes — Presidente',
      'Dra. Maria de Nazaré de Souza Ribeiro — Membro efetivo',
      'Dra. Cleisiane Xavier Diniz — Membro suplente',
      'Alex Araújo Rodrigues — Representante discente (Turma 2021)',
    ],
  },
  {
    period: '2021',
    lines: [
      'Dra. Elielza Guerreiro Menezes — Presidente',
      'Dra. Maria de Nazaré de Souza Ribeiro — Membro efetivo',
      'Dra. Cleisiane Xavier Diniz — Membro suplente',
      'Bianca Jardim Vilhena — Representante discente (Turma 2021)',
    ],
  },
  {
    period: '2019–2020',
    lines: [
      'Dra. Elielza Guerreiro Menezes — Presidente',
      'Dr. Leonardo Naves dos Reis — Membro efetivo',
      'Dra. Cleisiane Xavier Diniz — Membro suplente',
      'Bianca Jardim Vilhena — Representante discente (Turma 2019)',
    ],
  },
];

interface ColegiadoDocente {
  name: string;
  photo?: string;
}

const colegiadoDocentes: ColegiadoDocente[] = [
  { name: 'Dra. Aldalice Pinto de Aguiar' },
  { name: 'Dra. Amélia Nunes Sicsú', photo: profAmelia },
  { name: 'Dra. Cleisiane Xavier Diniz' },
  { name: 'Dra. Denise Maria Guerreiro Vieira da Silva' },
  { name: 'Dr. Darlisom Sousa Ferreira', photo: profDarlisom },
  { name: 'Dra. Edinilza Ribeiro dos Santos' },
  { name: 'Dra. Elielza Guerreiro Menezes' },
  { name: 'Dra. Flávia Regina Souza Ramos' },
  { name: 'Dra. Giane Zupellari dos Santos Melo' },
  { name: 'Dra. Gisele dos Santos Rocha' },
  { name: 'Dra. Jacqueline de Almeida Gonçalves Sachett' },
  { name: 'Dra. Lihsieh Marrero' },
  { name: 'Dra. Maria de Nazaré de Souza Ribeiro', photo: profNazare },
  { name: 'Dr. Wagner Ferreira Monteiro', photo: profWagner },
];

const colegiadoDiscente = 'Adriana Raquel Nunes de Souza (Turma 2023), eleita por seus pares.';

const cronogramaYears = ['2019', '2020', '2021', '2022', '2023'];
</script>
