<template>
  <footer class="relative mt-16 overflow-hidden border-t border-primary/20 bg-gradient-to-br from-[#0d6f7c] via-[#1092a4] to-[#16aec3] text-white">
    <div class="absolute -top-24 -right-24 h-72 w-72 rounded-full bg-white/10 blur-3xl" />
    <div class="absolute -bottom-28 -left-20 h-72 w-72 rounded-full bg-black/15 blur-3xl" />

    <div class="container relative py-12 md:py-14">
      <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-4">
        <article class="rounded-xl border border-white/20 bg-white/10 p-4 backdrop-blur-sm">
          <p class="text-xs font-semibold uppercase tracking-wide text-white/80">Contato</p>
          <a href="tel:+5592984733784" class="mt-3 inline-flex items-center gap-2 text-sm font-medium hover:text-white/80">
            <Phone class="h-4 w-4" />
            +55 (92) 98473-3784
          </a>
          <a href="mailto:proensp@uea.edu.br" class="mt-2 inline-flex items-center gap-2 text-sm text-white/90 hover:text-white/70">
            <Mail class="h-4 w-4" />
            proensp@uea.edu.br
          </a>
        </article>

        <article class="rounded-xl border border-white/20 bg-white/10 p-4 backdrop-blur-sm">
          <p class="text-xs font-semibold uppercase tracking-wide text-white/80">Funcionamento</p>
          <p class="mt-3 inline-flex items-start gap-2 text-sm leading-6 text-white/90">
            <Clock class="mt-1 h-4 w-4 shrink-0" />
            <span>
              08h às 12h e 13h às 17h
              <span class="block">Segunda à Sexta</span>
            </span>
          </p>
        </article>

        <article class="rounded-xl border border-white/20 bg-white/10 p-4 backdrop-blur-sm md:col-span-2">
          <p class="text-xs font-semibold uppercase tracking-wide text-white/80">Endereço</p>
          <p class="mt-3 inline-flex items-start gap-2 text-sm leading-6 text-white/90">
            <MapPin class="mt-1 h-4 w-4 shrink-0" />
            <span>
              Av. Carvalho Leal, 1777, Cachoeirinha, CEP: 69065-001 | Manaus-AM
              <span class="block">Escola Superior de Ciências da Saúde - Prédio Anexo, 1º andar</span>
            </span>
          </p>
        </article>
      </div>

      <div class="mt-10 grid gap-8 lg:grid-cols-12">
        <div class="lg:col-span-5">
          <img
            :src="logoProensp"
            alt="Logo ProEnSP e UEA"
            class="h-16 w-auto mix-blend-screen sm:h-20"
          >
          <p class="mt-4 max-w-md text-sm leading-6 text-white/85">
            Programa de Pós-graduação em Enfermagem em Saúde Pública da Universidade do Estado do Amazonas.
            Formação avançada com foco em inovação e impacto nos serviços de saúde.
          </p>

          <div class="mt-6 flex flex-wrap gap-2.5">
            <a
              v-for="social in socialLinks"
              :key="social.label"
              :href="social.href"
              target="_blank"
              rel="noopener noreferrer"
              class="inline-flex items-center gap-2 rounded-full border border-white/25 bg-white/10 px-3 py-1.5 text-xs font-medium text-white transition-all duration-200 hover:-translate-y-0.5 hover:bg-white hover:text-[#0d6f7c]"
            >
              <component :is="social.icon" class="h-3.5 w-3.5" />
              {{ social.label }}
            </a>
          </div>
        </div>

        <div class="lg:col-span-3">
          <h3 class="text-sm font-semibold uppercase tracking-wide text-white">Navegação Rápida</h3>
          <nav class="mt-3 grid gap-2">
            <RouterLink
              v-for="link in quickLinks"
              :key="link.label"
              :to="link.to"
              class="text-sm text-white/85 transition-colors hover:text-white"
            >
              {{ link.label }}
            </RouterLink>
          </nav>
        </div>

        <div class="lg:col-span-4">
          <h3 class="text-sm font-semibold uppercase tracking-wide text-white">Equipe de Apoio</h3>
          <ul class="mt-3 space-y-2 text-sm text-white/85">
            <li><span class="font-medium text-white">Secretária:</span> Miracele Godinho Guimarães</li>
            <li><span class="font-medium text-white">Apoio Técnico:</span> Deusiane Santos Costa</li>
            <li><span class="font-medium text-white">Apoio Técnico:</span> Ednelza Rocha da Silveira</li>
          </ul>
        </div>
      </div>

      <div class="mt-10 flex flex-col gap-3 border-t border-white/20 pt-5 text-xs text-white/80 md:flex-row md:items-center md:justify-between">
        <p>© 2020 Programa de Pós-graduação em Enfermagem em Saúde Pública (ProEnSP). Todos os direitos reservados.</p>
        <a
          :href="adminLoginUrl"
          class="font-medium text-white hover:underline"
          target="_blank"
          rel="noopener noreferrer"
        >Área Administrativa</a>
      </div>
    </div>
  </footer>
</template>

<script setup lang="ts">
import { getApiBase } from '@/api/noticias';
import logoProensp from '@/assets/proensp-branco.png';
import { Clock, Facebook, Instagram, Mail, MapPin, Phone, Twitter, Youtube } from 'lucide-vue-next';
import { computed } from 'vue';

const adminLoginUrl = computed(() => {
  const base = getApiBase();
  return base ? `${base}/login` : '#';
});

const socialLinks = [
  { label: 'Facebook', href: '#', icon: Facebook },
  { label: 'Instagram', href: '#', icon: Instagram },
  { label: 'Twitter', href: '#', icon: Twitter },
  { label: 'Youtube', href: '#', icon: Youtube },
];

const quickLinks = [
  { label: 'Início', to: '/' },
  { label: 'Notícias', to: '/#noticias' },
  { label: 'Apresentação', to: '/apresentacao' },
  { label: 'Coordenação e Colegiado', to: '/colegiado' },
  { label: 'Legislação', to: '/apresentacao' },
];
</script>
