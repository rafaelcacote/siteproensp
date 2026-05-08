<template>
  <header class="sticky top-0 z-50 bg-white border-b border-border shadow-sm">
    <div class="container">
      <div class="flex items-center justify-between py-3">
        <!-- Logo Section -->
        <div class="flex items-center gap-3">
          <div class="h-12 flex items-center">
            <span class="text-xl font-bold text-primary font-display">ProEnSP</span>
          </div>
        </div>

        <!-- Desktop Navigation -->
        <nav class="hidden lg:flex items-center gap-8">
          <div
            v-for="item in navigationItems"
            :key="item.label"
            class="relative group"
          >
            <RouterLink
              :to="item.href"
              class="inline-flex items-center gap-1 text-sm font-medium text-foreground hover:text-primary transition-colors duration-200 relative"
            >
              {{ item.label }}
              <ChevronDown
                v-if="item.children"
                class="w-4 h-4 transition-transform duration-200 group-hover:rotate-180"
              />
              <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-primary group-hover:w-full transition-all duration-300" />
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
          <button class="btn-primary text-sm">
            Contato
          </button>
        </div>

        <!-- Mobile Menu Button -->
        <button
          @click="isMenuOpen = !isMenuOpen"
          class="lg:hidden p-2 hover:bg-muted rounded-md transition-colors duration-200"
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
          <button class="btn-primary w-full mt-2 text-sm">
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

const isMenuOpen = ref(false);
const openMobileSubmenu = ref<string | null>(null);

const navigationItems = [
  { label: 'Início', href: '/' },
  {
    label: 'Institucional',
    href: '/apresentacao',
    children: [
      { label: 'Apresentação', href: '/apresentacao' },
      { label: 'Coordenação e Colegiado', href: '#' },
      { label: 'Legislação', href: '#' },
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
