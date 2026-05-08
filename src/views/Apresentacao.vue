<template>
  <div class="min-h-screen bg-white">
    <Header />

    <main>
      <section class="relative overflow-hidden border-b border-border bg-gradient-to-b from-primary/5 to-white">
        <div class="absolute -top-20 right-0 h-64 w-64 rounded-full bg-primary/10 blur-3xl" />
        <div class="container py-16 md:py-20">
          <div class="inline-flex items-center gap-2 rounded-full border border-primary/20 bg-white px-4 py-1.5">
            <span class="h-2 w-2 rounded-full bg-primary" />
            <span class="text-xs font-semibold tracking-wide text-primary uppercase">Institucional</span>
          </div>

          <h1 class="mt-5 max-w-4xl text-4xl font-bold leading-tight text-foreground md:text-5xl">
            Apresentação do ProEnSP
          </h1>
          <p class="mt-5 max-w-3xl text-base leading-relaxed text-muted-foreground md:text-lg">
            O Programa de Pós-graduação em Enfermagem em Saúde Pública forma profissionais para atuar com
            inovação, compromisso social e impacto real nos serviços de saúde da região amazônica.
          </p>
        </div>
      </section>

      <section class="container py-12 md:py-16">
        <div class="grid gap-6 lg:grid-cols-3">
          <article class="card-elevated lg:col-span-2">
            <h2 class="text-2xl font-bold text-foreground">O ProEnSP</h2>
            <div class="mt-5 space-y-4 text-sm leading-7 text-muted-foreground md:text-base">
              <p>
                A região amazônica é marcada pela heterogeneidade, com diferenças sociais, geográficas, culturais e
                de acessibilidade. Esse cenário impõe desafios na operacionalização da assistência à saúde e exige
                formação qualificada para enfrentar problemas prioritários de saúde pública.
              </p>
              <p>
                A Enfermagem, presente em toda a rede de atenção do SUS, é essencial para orientar práticas
                assistenciais, educacionais, de pesquisa e de gestão, em consonância com integralidade, universalidade
                e equidade.
              </p>
              <p>
                Com a aprovação do Programa de Pós-graduação em Enfermagem em Saúde Pública (ProEnSP), inicialmente
                com o curso de Mestrado Profissional, a proposta de formação se orienta para transformações concretas
                nos serviços de saúde, conectando investigação científica e inovação tecnológica aos desafios reais do
                território.
              </p>
              <p>
                O programa também coopera para o desenvolvimento local, regional e nacional, contribuindo para o
                fortalecimento da pós-graduação em Enfermagem, redução de assimetrias regionais e consolidação do SUS.
              </p>
              <p>
                Espera-se ampliar a massa crítica de mestres e, futuramente, doutores, aliando assistência de
                excelência à pesquisa aplicada para geração de produtos, processos e instrumentos com impacto direto na
                qualidade da atenção em Enfermagem e Saúde.
              </p>
            </div>
          </article>

          <aside class="card-elevated">
            <h3 class="text-xl font-semibold text-foreground">Nossos Objetivos</h3>
            <ul class="mt-4 space-y-3 text-sm leading-6 text-muted-foreground">
              <li>Preparar profissionais stricto sensu com alta competência científica e técnico-profissional.</li>
              <li>Formar para uma prática transformadora, inovadora e socialmente comprometida no SUS.</li>
              <li>Capacitar recursos humanos para estudos aplicáveis em cenários multiculturais amazônicos.</li>
              <li>Produzir e transferir conhecimento e tecnologias para problemas prioritários de saúde pública.</li>
            </ul>
          </aside>
        </div>
      </section>

      <section class="container pb-12 md:pb-16">
        <div class="grid gap-6 md:grid-cols-2">
          <article class="card-elevated">
            <h3 class="text-xl font-semibold text-foreground">Missão</h3>
            <p class="mt-3 text-sm leading-7 text-muted-foreground md:text-base">
              Formar profissionais na área de Enfermagem em Saúde Pública com competência técnica, científica e ética
              para inovação e prática transformadora em sistemas de saúde.
            </p>
          </article>

          <article class="card-elevated">
            <h3 class="text-xl font-semibold text-foreground">Visão</h3>
            <p class="mt-3 text-sm leading-7 text-muted-foreground md:text-base">
              Ser referência regional e nacional na formação em Enfermagem em Saúde Pública e no desenvolvimento de
              tecnologias de cuidado, gestão, práticas sociais e educativas com impacto nas políticas de saúde e na
              qualidade de vida da população amazônica.
            </p>
          </article>
        </div>
      </section>

      <section class="container pb-16">
        <article class="card-elevated">
          <h3 class="text-xl font-semibold text-foreground">Valores</h3>
          <div class="mt-5 grid gap-3 sm:grid-cols-2 lg:grid-cols-3">
            <div
              v-for="value in values"
              :key="value"
              class="rounded-lg border border-border bg-muted/40 px-4 py-3 text-sm font-medium text-foreground"
            >
              {{ value }}
            </div>
          </div>
        </article>
      </section>
    </main>
  </div>
</template>

<script setup lang="ts">
import Header from '@/components/Header.vue';

const values = [
  'Inovação tecnológica',
  'Responsabilidade social',
  'Desenvolvimento profissional',
  'Enfermagem de excelência',
  'Cuidado baseado em evidências científicas',
  'Trabalho em equipe',
  'Prática transformadora',
  'Gestão em Enfermagem e Saúde',
];
</script>
