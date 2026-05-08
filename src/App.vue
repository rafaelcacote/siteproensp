<template>
  <div class="min-h-screen flex flex-col">
    <div class="flex-1">
      <router-view />
    </div>
    <Footer />
  </div>
</template>

<script setup lang="ts">
import Footer from '@/components/Footer.vue';
</script>
