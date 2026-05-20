<template>
  <header class="sticky top-0 z-50 border-b border-border/80 bg-white/85 shadow-[0_10px_26px_rgba(14,116,130,0.08)] backdrop-blur-xl">
    <div class="container">
        <div class="flex items-center justify-between py-3">
        <!-- Logos -->
        <div class="flex h-12 items-center gap-2 shrink-0 sm:gap-3">
          <RouterLink
            to="/"
            class="flex h-12 items-center shrink-0"
            aria-label="ProEnSP — Início"
          >
            <img
              :src="proenspLogo"
              alt="ProEnSP"
              class="h-10 w-auto max-h-12 object-contain object-left sm:h-11"
              width="180"
              height="60"
              decoding="async"
            />
          </RouterLink>
          <a
            href="https://www.uea.edu.br/"
            target="_blank"
            rel="noopener noreferrer"
            class="flex h-12 items-center border-l border-border pl-2 sm:pl-3 shrink-0"
            aria-label="UEA — site oficial (abre em nova aba)"
          >
            <img
              :src="logoUea"
              alt="Universidade do Estado do Amazonas (UEA)"
              class="h-9 w-auto max-h-10 object-contain object-left sm:h-10 sm:max-h-11"
              width="120"
              height="48"
              decoding="async"
            />
          </a>
        </div>

        <!-- Desktop Navigation -->
        <nav class="hidden items-center gap-7 lg:flex">
          <div
            v-for="item in navigationItems"
            :key="item.label"
            class="relative group"
          >
            <RouterLink
              :to="item.href"
              class="relative inline-flex items-center gap-1 text-sm font-medium text-foreground/85 transition-colors duration-200 hover:text-primary"
            >
              {{ item.label }}
              <ChevronDown
                v-if="item.children"
                class="w-4 h-4 transition-transform duration-200 group-hover:rotate-180"
              />
              <span class="absolute -bottom-1 left-0 h-0.5 w-0 bg-gradient-to-r from-primary to-cyan-400 transition-all duration-300 group-hover:w-full" />
            </RouterLink>

            <div
              v-if="item.children"
              class="absolute left-0 top-full pt-2 min-w-[240px] opacity-0 pointer-events-none -translate-y-1 group-hover:opacity-100 group-hover:pointer-events-auto group-hover:translate-y-0 group-focus-within:opacity-100 group-focus-within:pointer-events-auto group-focus-within:translate-y-0 transition-all duration-200"
            >
              <div class="rounded-xl border border-border bg-white p-2 shadow-xl">
                <RouterLink
                  v-for="child in item.children"
                  :key="child.label"
                  :to="child.href"
                  class="block rounded-lg px-3 py-2.5 text-sm text-foreground hover:bg-muted hover:text-primary transition-colors duration-200"
                >
                  {{ child.label }}
                </RouterLink>
              </div>
            </div>
          </div>
        </nav>

        <!-- CTA Button - Desktop -->
        <div class="hidden lg:block">
          <button class="rounded-xl bg-gradient-to-r from-[#0f9fb5] to-[#22bec8] px-5 py-2.5 text-sm font-semibold text-white shadow-md shadow-cyan-200/60 transition-all duration-300 hover:-translate-y-0.5 hover:shadow-lg hover:shadow-cyan-300/60">
            Contato
          </button>
        </div>

        <!-- Mobile Menu Button -->
        <button
          @click="isMenuOpen = !isMenuOpen"
          class="rounded-md p-2 transition-colors duration-200 hover:bg-primary/10 lg:hidden"
          aria-label="Toggle menu"
        >
          <X v-if="isMenuOpen" class="w-5 h-5 text-foreground" />
          <Menu v-else class="w-5 h-5 text-foreground" />
        </button>
      </div>

      <!-- Mobile Navigation -->
      <nav v-if="isMenuOpen" class="lg:hidden pb-4 border-t border-border">
        <div class="flex flex-col gap-2 pt-4">
          <div
            v-for="item in navigationItems"
            :key="item.label"
          >
            <button
              v-if="item.children"
              class="w-full px-4 py-2 text-sm font-medium text-foreground hover:bg-muted rounded-md transition-colors duration-200 flex items-center justify-between"
              @click="toggleMobileSubmenu(item.label)"
            >
              {{ item.label }}
              <ChevronDown
                class="w-4 h-4 transition-transform duration-200"
                :class="{ 'rotate-180': isMobileSubmenuOpen(item.label) }"
              />
            </button>

            <RouterLink
              v-else
              :to="item.href"
              class="block px-4 py-2 text-sm font-medium text-foreground hover:bg-muted rounded-md transition-colors duration-200"
              @click="isMenuOpen = false"
            >
              {{ item.label }}
            </RouterLink>

            <div
              v-if="item.children && isMobileSubmenuOpen(item.label)"
              class="ml-4 mt-1 border-l border-border pl-2"
            >
              <RouterLink
                v-for="child in item.children"
                :key="child.label"
                :to="child.href"
                class="block px-4 py-2 text-sm text-muted-foreground hover:text-primary hover:bg-muted rounded-md transition-colors duration-200"
                @click="isMenuOpen = false"
              >
                {{ child.label }}
              </RouterLink>
            </div>
          </div>
          <button class="mt-2 w-full rounded-xl bg-gradient-to-r from-[#0f9fb5] to-[#22bec8] px-5 py-2.5 text-sm font-semibold text-white shadow-md shadow-cyan-200/60 transition-all duration-300 hover:shadow-lg hover:shadow-cyan-300/60">
            Contato
          </button>
        </div>
      </nav>
    </div>
  </header>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import { ChevronDown, Menu, X } from 'lucide-vue-next';
import proenspLogo from '@/assets/proensp-logo.png';
import logoUea from '@/assets/Logo_UEA.avif';

const isMenuOpen = ref(false);
const openMobileSubmenu = ref<string | null>(null);

const navigationItems = [
  { label: 'Início', href: '/' },
  {
    label: 'Institucional',
    href: '/apresentacao',
    children: [
      { label: 'Apresentação', href: '/apresentacao' },
      { label: 'Coordenação e Colegiado', href: '/colegiado' },
      { label: 'Legislação', href: '/legislacao' },
      { label: 'Galeria de Fotos', href: '#' },
    ],
  },
  { label: 'Programa', href: '#' },
  { label: 'Secretaria', href: '#' },
  { label: 'Processos Seletivos', href: '#' },
  { label: 'Eventos', href: '#' },
];

const toggleMobileSubmenu = (label: string) => {
  openMobileSubmenu.value = openMobileSubmenu.value === label ? null : label;
};

const isMobileSubmenuOpen = (label: string) => openMobileSubmenu.value === label;
</script>
