<template>
  <section class="relative bg-white overflow-hidden">
    <!-- Background Gradient Accent -->
    <div class="absolute top-0 right-0 w-96 h-96 bg-gradient-to-br from-primary/10 to-primary/5 rounded-full blur-3xl -z-10" />
    <div class="absolute bottom-0 left-0 w-72 h-72 bg-gradient-to-tr from-primary/10 to-primary/5 rounded-full blur-3xl -z-10" />

    <div class="container py-16 md:py-28 lg:py-36">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-16 items-center">

        <!-- Left Content -->
        <div class="flex flex-col gap-8 order-2 lg:order-1">
          <!-- Badge -->
          <div class="inline-flex items-center gap-2 w-fit">
            <div class="w-2 h-2 rounded-full bg-primary" />
            <span class="text-sm font-medium text-primary font-accent">
              Educação em Saúde Pública
            </span>
          </div>

          <!-- Main Heading -->
          <div class="space-y-4">
            <h1 class="font-display font-bold text-foreground leading-tight">
              Programa de Pós-graduação em
              <span class="block text-primary">Enfermagem em Saúde Pública</span>
            </h1>
            <p class="text-lg text-muted-foreground leading-relaxed max-w-lg">
              Formando profissionais qualificados para atuar no cuidado e na gestão em saúde pública,
              com excelência acadêmica e responsabilidade social.
            </p>
          </div>

          <!-- CTA Buttons -->
          <div class="flex flex-col sm:flex-row gap-4 pt-2">
            <button class="btn-primary inline-flex items-center justify-center gap-2 group">
              Conheça o Programa
              <ArrowRight class="w-4 h-4 group-hover:translate-x-1 transition-transform duration-200" />
            </button>
            <button class="btn-outline inline-flex items-center justify-center gap-2">
              <GraduationCap class="w-4 h-4" />
              Inscrições
            </button>
          </div>

          <!-- Stats Section -->
          <div class="grid grid-cols-3 gap-6 pt-8 border-t border-border">
            <div class="space-y-2">
              <p class="text-2xl font-display font-bold text-primary">20+</p>
              <p class="text-sm text-muted-foreground">Anos de Tradição</p>
            </div>
            <div class="space-y-2">
              <p class="text-2xl font-display font-bold text-primary">500+</p>
              <p class="text-sm text-muted-foreground">Profissionais Formados</p>
            </div>
            <div class="space-y-2">
              <p class="text-2xl font-display font-bold text-primary">Mestrado</p>
              <p class="text-sm text-muted-foreground">Programas Ativos</p>
            </div>
          </div>
        </div>

        <!-- Right Visual — UEA Campus -->
        <div class="relative order-1 lg:order-2">
          <!-- Decorative glow behind image -->
          <div class="absolute -inset-3 rounded-3xl bg-gradient-to-br from-primary/20 via-cyan-400/10 to-transparent blur-sm" />

          <!-- Image frame -->
          <div class="relative rounded-2xl overflow-hidden shadow-[0_20px_60px_rgba(22,174,195,0.22)] ring-1 ring-primary/15 aspect-[4/3] lg:aspect-auto lg:h-[420px]">
            <img
              src="/uea.png"
              alt="Escola Superior de Ciências da Saúde — UEA, Manaus"
              class="absolute inset-0 h-full w-full object-cover object-[30%_38%]"
              draggable="false"
            />

            <!-- Subtle vignette for depth -->
            <div class="absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-white/5 pointer-events-none" />
            <div class="absolute inset-0 bg-gradient-to-r from-primary/10 via-transparent to-transparent pointer-events-none" />

            <!-- Bottom caption strip -->
            <div class="absolute bottom-0 inset-x-0 px-5 py-4 bg-gradient-to-t from-black/60 to-transparent pointer-events-none">
              <p class="text-white text-sm font-semibold drop-shadow leading-snug">
                Escola Superior de Ciências da Saúde
              </p>
              <p class="text-white/75 text-xs mt-0.5 drop-shadow">
                Universidade do Estado do Amazonas — Manaus, AM
              </p>
            </div>

            <!-- Teal accent line -->
            <div class="absolute bottom-0 inset-x-0 h-1 bg-gradient-to-r from-primary/0 via-primary to-primary/0 pointer-events-none" />
          </div>

          <!-- Floating Cards -->
          <div class="absolute -top-3 -right-3 bg-white/95 backdrop-blur-sm rounded-xl p-4 shadow-lg ring-1 ring-border/60 w-36 z-10">
            <p class="text-xs font-medium text-muted-foreground">Reconhecimento</p>
            <p class="text-sm font-bold text-primary mt-1">CAPES A</p>
          </div>

          <div class="absolute -bottom-3 -left-3 bg-white/95 backdrop-blur-sm rounded-xl p-4 shadow-lg ring-1 ring-border/60 w-36 z-10">
            <p class="text-xs font-medium text-muted-foreground">Localização</p>
            <p class="text-sm font-bold text-primary mt-1">Manaus - AM</p>
          </div>
        </div>

      </div>

      <!-- Bottom Accent Line -->
      <div class="mt-14 pt-10 border-t border-border">
        <p class="text-sm text-muted-foreground text-center">
          Parte da Universidade do Estado do Amazonas (UEA)
        </p>
      </div>
    </div>
  </section>
</template>

<script setup lang="ts">
import { ArrowRight, GraduationCap } from 'lucide-vue-next';
</script>
