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

                    <dl class="mt-6 grid gap-5 sm:grid-cols-2">
                      <div v-if="term.coord" class="rounded-xl bg-muted/40 p-4">
                        <dt class="font-accent text-[11px] font-semibold uppercase tracking-wider text-muted-foreground">
                          Coordenação
                        </dt>
                        <dd class="mt-2 space-y-1 text-sm leading-relaxed text-foreground">
                          <p v-if="term.coord">
                            <span class="text-muted-foreground">Coordenadora:</span>
                            {{ term.coord }}
                          </p>
                          <p v-if="term.vice">
                            <span class="text-muted-foreground">Vice-coordenador:</span>
                            {{ term.vice }}
                          </p>
                        </dd>
                      </div>
                      <div v-if="term.docentes?.length" class="rounded-xl bg-muted/40 p-4">
                        <dt class="font-accent text-[11px] font-semibold uppercase tracking-wider text-muted-foreground">
                          Membros docentes permanentes
                        </dt>
                        <dd class="mt-2 space-y-1.5 text-sm leading-relaxed text-foreground">
                          <p v-for="d in term.docentes" :key="d">
                            {{ d }}
                          </p>
                        </dd>
                      </div>
                      <div v-if="term.admin || term.discente" class="sm:col-span-2">
                        <div class="grid gap-4 sm:grid-cols-2">
                          <div v-if="term.admin" class="rounded-xl border border-border/80 bg-background p-4">
                            <dt class="font-accent text-[11px] font-semibold uppercase tracking-wider text-muted-foreground">
                              Representante administrativo
                            </dt>
                            <dd class="mt-2 text-sm text-foreground">
                              {{ term.admin }}
                            </dd>
                          </div>
                          <div v-if="term.discente" class="rounded-xl border border-border/80 bg-background p-4">
                            <dt class="font-accent text-[11px] font-semibold uppercase tracking-wider text-muted-foreground">
                              Representante discente
                            </dt>
                            <dd class="mt-2 text-sm text-foreground">
                              {{ term.discente }}
                            </dd>
                          </div>
                        </div>
                      </div>
                    </dl>
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
                    v-for="name in colegiadoDocentes"
                    :key="name"
                    class="flex items-center gap-3 rounded-xl border border-transparent bg-muted/30 px-3 py-2.5 text-sm text-foreground transition hover:border-primary/15 hover:bg-primary/[0.04]"
                  >
                    <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-primary/10 text-primary" aria-hidden="true">
                      <User class="h-4 w-4" />
                    </span>
                    <span class="leading-snug">{{ name }}</span>
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
import { Award, CalendarDays, Landmark, User, UsersRound } from 'lucide-vue-next';

const toc = [
  { id: 'coordenacao', label: 'Coordenação do ProEnSP', short: 'Coordenação' },
  { id: 'comissao-bolsas', label: 'Comissão de bolsas', short: 'Bolsas' },
  { id: 'colegiado', label: 'Colegiado', short: 'Colegiado' },
  { id: 'cronograma', label: 'Cronograma de reuniões', short: 'Reuniões' },
] as const;

interface CoordTerm {
  period: string;
  portaria: string;
  coord?: string;
  vice?: string;
  docentes?: string[];
  admin?: string;
  discente?: string;
}

const coordinationTerms: CoordTerm[] = [
  {
    period: 'Ano 2025–2027',
    portaria: 'Portaria nº 516/2025 — GR/UEA',
    coord: 'Dra. Maria de Nazaré de Souza Ribeiro',
    vice: 'Dr. Wagner Ferreira Monteiro',
    docentes: [
      'Dra. Amélia Nunes Sicsú',
      'Dr. Darlisom Sousa Ferreira',
    ],
    admin: 'Miracele Godinho Guimarães',
    discente: 'Adriana Raquel Nunes de Souza',
  },
  {
    period: 'Ano 2023–2025',
    portaria: 'Portaria nº 217/2023 — GR/UEA',
    coord: 'Dra. Amélia Nunes Sicsú',
    vice: 'Dra. Maria de Nazaré de Souza Ribeiro',
    docentes: [
      'Dra. Edinilza Ribeiro dos Santos',
      'Dra. Aldalice Aguiar de Souza',
    ],
  },
  {
    period: 'Ano 2020–2022',
    portaria: 'Portaria nº 0390/2020 — GR/UEA',
    coord: 'Dra. Amélia Nunes Sicsú',
    vice: 'Dra. Maria de Nazaré de Souza Ribeiro',
    docentes: [
      'Dra. Edinilza Ribeiro dos Santos',
      'Dra. Elizabeth Teixeira',
    ],
    discente: 'Lara Bezerra de Oliveira (Turma 2019)',
  },
  {
    period: 'Ano 2018–2020',
    portaria: 'Portaria nº 795/2018 — GR/UEA',
    coord: 'Dra. Amélia Nunes Sicsú',
    vice: 'Dr. Leonardo Naves dos Reis',
    docentes: [
      'Dra. Edinilza Ribeiro dos Santos',
      'Dra. Elizabeth Teixeira',
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

const colegiadoDocentes = [
  'Dra. Aldalice Pinto de Aguiar',
  'Dra. Amélia Nunes Sicsú',
  'Dra. Cleisiane Xavier Diniz',
  'Dra. Denise Maria Guerreiro Vieira da Silva',
  'Dr. Darlisom Sousa Ferreira',
  'Dra. Edinilza Ribeiro dos Santos',
  'Dra. Elielza Guerreiro Menezes',
  'Dra. Flávia Regina Souza Ramos',
  'Dra. Giane Zupellari dos Santos Melo',
  'Dra. Gisele dos Santos Rocha',
  'Dra. Jacqueline de Almeida Gonçalves Sachett',
  'Dra. Lihsieh Marrero',
  'Dra. Maria de Nazaré de Souza Ribeiro',
  'Dr. Wagner Ferreira Monteiro',
];

const colegiadoDiscente = 'Adriana Raquel Nunes de Souza (Turma 2023), eleita por seus pares.';

const cronogramaYears = ['2019', '2020', '2021', '2022', '2023'];
</script>
