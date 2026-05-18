<template>
  <div
    class="group flex items-start gap-4 rounded-2xl border border-l-4 bg-white px-5 py-4 shadow-sm transition-all duration-200"
    :class="[
      borderLeftClass,
      hasFile
        ? 'cursor-default hover:-translate-y-px hover:shadow-[0_8px_24px_rgba(15,108,119,0.10)]'
        : 'opacity-70',
    ]"
  >
    <!-- Ícone -->
    <span
      class="mt-0.5 flex h-10 w-10 shrink-0 items-center justify-center rounded-xl transition-colors"
      :class="iconBgClass"
      aria-hidden="true"
    >
      <FileText class="h-5 w-5" />
    </span>

    <!-- Conteúdo -->
    <div class="min-w-0 flex-1">
      <div class="flex flex-wrap items-center gap-2">
        <span
          class="inline-flex rounded-full border px-2.5 py-0.5 text-[10px] font-bold uppercase tracking-wider"
          :class="badgeClass"
        >
          {{ doc.category }}
        </span>
        <span class="text-[11px] font-medium text-slate-400">{{ doc.year }}</span>
        <span
          v-if="!hasFile"
          class="inline-flex items-center gap-1 rounded-full bg-slate-100 px-2 py-0.5 text-[10px] font-medium text-slate-400"
        >
          <Clock class="h-2.5 w-2.5" aria-hidden="true" />
          Em breve
        </span>
      </div>
      <h4
        class="mt-1.5 text-sm font-semibold leading-snug text-slate-800 line-clamp-2 transition-colors"
        :class="hasFile ? 'group-hover:text-primary' : ''"
      >
        {{ doc.title }}
      </h4>
    </div>

    <!-- Ações -->
    <div class="flex shrink-0 items-center gap-0.5 pt-0.5">
      <a
        :href="fileHref"
        :target="isExternal ? '_blank' : undefined"
        :rel="isExternal ? 'noopener noreferrer' : undefined"
        :aria-label="`Visualizar PDF: ${doc.title}`"
        :tabindex="hasFile ? 0 : -1"
        class="rounded-lg p-2 transition"
        :class="
          hasFile
            ? 'text-slate-400 hover:bg-primary/10 hover:text-primary'
            : 'pointer-events-none text-slate-300'
        "
      >
        <Eye class="h-4 w-4" />
      </a>
      <a
        :href="fileHref"
        :download="isExternal ? true : undefined"
        :aria-label="`Download: ${doc.title}`"
        :tabindex="hasFile ? 0 : -1"
        class="rounded-lg p-2 transition"
        :class="
          hasFile
            ? 'text-slate-400 hover:bg-primary/10 hover:text-primary'
            : 'pointer-events-none text-slate-300'
        "
      >
        <Download class="h-4 w-4" />
      </a>
    </div>
  </div>
</template>

<script setup lang="ts">
import { computed } from 'vue';
import { Clock, Download, Eye, FileText } from 'lucide-vue-next';
import type { LegislationCategory, LegislationDocument } from '@/types/legislacao';

const props = defineProps<{
  doc: LegislationDocument;
}>();

const fileHref = computed(() => {
  const url = props.doc.fileUrl;
  return url && url !== '#' ? url : '#';
});

const isExternal = computed(() => fileHref.value !== '#');
const hasFile = computed(() => isExternal.value);

const borderLeftClass = computed((): string => {
  const map: Record<LegislationCategory, string> = {
    Portaria: 'border-l-cyan-300 border-y-primary/10 border-r-primary/10',
    Resolução: 'border-l-violet-300 border-y-primary/10 border-r-primary/10',
    Norma: 'border-l-amber-300 border-y-primary/10 border-r-primary/10',
    Documento: 'border-l-slate-300 border-y-primary/10 border-r-primary/10',
  };
  return map[props.doc.category];
});

const iconBgClass = computed((): string => {
  const map: Record<LegislationCategory, string> = {
    Portaria: 'bg-cyan-50 text-cyan-700 group-hover:bg-cyan-100',
    Resolução: 'bg-violet-50 text-violet-700 group-hover:bg-violet-100',
    Norma: 'bg-amber-50 text-amber-700 group-hover:bg-amber-100',
    Documento: 'bg-slate-100 text-slate-600 group-hover:bg-slate-200',
  };
  return map[props.doc.category];
});

const badgeClass = computed((): string => {
  const map: Record<LegislationCategory, string> = {
    Portaria: 'bg-cyan-50 text-cyan-800 border-cyan-200',
    Resolução: 'bg-violet-50 text-violet-800 border-violet-200',
    Norma: 'bg-amber-50 text-amber-800 border-amber-200',
    Documento: 'bg-slate-100 text-slate-700 border-slate-200',
  };
  return map[props.doc.category];
});
</script>
