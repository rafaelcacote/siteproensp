<template>
  <nav
    class="colegiado-section-nav sticky top-[4.25rem] z-40 mb-8 rounded-2xl border border-primary/10 bg-white/95 p-1.5 shadow-[0_8px_24px_rgba(15,108,119,0.08)] backdrop-blur-md sm:top-20"
    aria-label="Navegação por seções"
  >
    <TabMenu
      :model="menuItems"
      :activeIndex="activeIndex"
      scrollable
      @tab-change="onTabChange"
    />
  </nav>
</template>

<script setup lang="ts">
import TabMenu from 'primevue/tabmenu';
import type { MenuItem } from 'primevue/menuitem';
import type { TabMenuChangeEvent } from 'primevue/tabmenu';
import { computed, onMounted, onUnmounted, ref, watch } from 'vue';
import { useRoute } from 'vue-router';

export interface PageSection {
  id: string;
  label: string;
  short: string;
}

const props = defineProps<{
  sections: readonly PageSection[];
}>();

const route = useRoute();
const activeIndex = ref(0);

/** Header fixo + barra de abas */
const SCROLL_OFFSET = 132;

const menuItems = computed<MenuItem[]>(() =>
  props.sections.map((section, index) => ({
    label: section.label,
    title: section.short,
    command: () => goToSection(index, section.id),
  })),
);

function goToSection(index: number, id: string, smooth = true): void {
  activeIndex.value = index;
  const el = document.getElementById(id);
  if (!el) return;

  const top = el.getBoundingClientRect().top + window.scrollY - SCROLL_OFFSET;
  window.scrollTo({ top: Math.max(0, top), behavior: smooth ? 'smooth' : 'auto' });
  history.replaceState(null, '', `#${id}`);
}

function onTabChange(event: TabMenuChangeEvent): void {
  const section = props.sections[event.index];
  if (section) goToSection(event.index, section.id);
}

let observer: IntersectionObserver | null = null;

function observeSections(): void {
  observer?.disconnect();
  observer = new IntersectionObserver(
    (entries) => {
      const visible = entries
        .filter((entry) => entry.isIntersecting)
        .sort((a, b) => b.intersectionRatio - a.intersectionRatio);

      if (!visible.length) return;

      const index = props.sections.findIndex((s) => s.id === visible[0].target.id);
      if (index >= 0) activeIndex.value = index;
    },
    {
      rootMargin: '-140px 0px -50% 0px',
      threshold: [0, 0.15, 0.35, 0.55],
    },
  );

  for (const section of props.sections) {
    const el = document.getElementById(section.id);
    if (el) observer.observe(el);
  }
}

onMounted(() => {
  const hashId = route.hash.replace('#', '');
  const hashIndex = props.sections.findIndex((s) => s.id === hashId);
  if (hashIndex >= 0) {
    requestAnimationFrame(() => goToSection(hashIndex, hashId, false));
  }

  observeSections();
});

onUnmounted(() => {
  observer?.disconnect();
});

watch(
  () => route.hash,
  (hash) => {
    const id = hash.replace('#', '');
    const index = props.sections.findIndex((s) => s.id === id);
    if (index >= 0) goToSection(index, id);
  },
);
</script>
