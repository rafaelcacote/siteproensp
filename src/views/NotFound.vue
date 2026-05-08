<template>
  <div class="min-h-screen flex flex-col items-center justify-center bg-background text-foreground text-center px-4">
    <h1 class="text-6xl font-bold font-display text-primary mb-4">404</h1>
    <h2 class="text-2xl font-semibold mb-6">Página não encontrada</h2>
    <p class="text-muted-foreground max-w-md mb-8">
      A página que você está procurando não existe ou foi movida.
    </p>
    <router-link to="/" class="btn-primary">
      Voltar para o Início
    </router-link>
  </div>
</template>

<script setup lang="ts">
</script>
