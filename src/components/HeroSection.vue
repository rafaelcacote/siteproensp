<template>
  <section class="relative bg-white overflow-hidden">
    <!-- Background Gradient Accent -->
    <div class="absolute top-0 right-0 w-96 h-96 bg-gradient-to-br from-primary/10 to-primary/5 rounded-full blur-3xl -z-10" />
    <div class="absolute bottom-0 left-0 w-72 h-72 bg-gradient-to-tr from-primary/10 to-primary/5 rounded-full blur-3xl -z-10" />

    <div class="container py-20 md:py-32 lg:py-40">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">
        <!-- Left Content -->
        <div class="flex flex-col gap-8">
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
          <div class="flex flex-col sm:flex-row gap-4 pt-4">
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

        <!-- Right Visual -->
        <div class="relative hidden lg:block">
          <!-- Decorative Elements -->
          <div class="absolute inset-0 bg-gradient-to-br from-primary/10 to-secondary/10 rounded-2xl" />
          
          <!-- Main Image Placeholder with Elegant Design -->
          <div class="relative bg-gradient-to-br from-primary to-secondary rounded-2xl p-8 shadow-lg overflow-hidden">
            <!-- Overlay Pattern -->
            <div class="absolute inset-0 opacity-10">
              <svg class="w-full h-full" viewBox="0 0 400 400" xmlns="http://www.w3.org/2000/svg">
                <defs>
                  <pattern id="pattern" x="0" y="0" width="40" height="40" patternUnits="userSpaceOnUse">
                    <circle cx="20" cy="20" r="2" fill="white" />
                  </pattern>
                </defs>
                <rect width="400" height="400" fill="url(#pattern)" />
              </svg>
            </div>

            <!-- Content -->
            <div class="relative z-10 flex flex-col items-center justify-center h-96 text-center">
              <div class="w-24 h-24 rounded-full bg-white/20 flex items-center justify-center mb-6 backdrop-blur-sm">
                <GraduationCap class="w-12 h-12 text-white" />
              </div>
              <h3 class="text-2xl font-display font-bold text-white mb-2">
                Excelência Acadêmica
              </h3>
              <p class="text-white/80 text-sm max-w-xs">
                Formação de qualidade com foco em pesquisa e prática profissional
              </p>
            </div>

            <!-- Floating Cards -->
            <div class="absolute top-4 right-4 bg-white/95 backdrop-blur-sm rounded-lg p-4 shadow-md w-40">
              <p class="text-xs font-medium text-muted-foreground">Reconhecimento</p>
              <p class="text-sm font-bold text-primary mt-1">CAPES A</p>
            </div>

            <div class="absolute bottom-4 left-4 bg-white/95 backdrop-blur-sm rounded-lg p-4 shadow-md w-40">
              <p class="text-xs font-medium text-muted-foreground">Localização</p>
              <p class="text-sm font-bold text-primary mt-1">Manaus - AM</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Bottom Accent Line -->
      <div class="mt-16 pt-12 border-t border-border">
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
