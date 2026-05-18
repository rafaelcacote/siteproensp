<template>
  <img
    :src="logoSrc"
    alt=""
    class="logo-watermark pointer-events-none select-none"
    :class="imgClass"
    aria-hidden="true"
  />
</template>

<script setup lang="ts">
import { computed } from 'vue';
import defaultLogo from '@/assets/logo.svg';

const props = withDefaults(
  defineProps<{
    imgClass?: string;
    /** Caminho da logo (ex.: logo_hero.svg na Home) */
    src?: string;
  }>(),
  {},
);

const logoSrc = computed(() => props.src ?? defaultLogo);
</script>
