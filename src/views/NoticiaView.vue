<template>
  <div class="min-h-screen bg-background">
    <Header />

    <main v-if="loading" class="container py-24">
      <div class="mx-auto max-w-3xl space-y-6 animate-pulse">
        <div class="h-4 w-40 rounded bg-muted" />
        <div class="h-10 w-full max-w-xl rounded bg-muted" />
        <div class="aspect-[21/9] rounded-2xl bg-muted" />
        <div class="space-y-3 pt-4">
          <div class="h-4 w-full rounded bg-muted" />
          <div class="h-4 w-full rounded bg-muted" />
          <div class="h-4 w-3/4 rounded bg-muted" />
        </div>
      </div>
    </main>

    <main v-else-if="notFound" class="container py-24 text-center">
      <h1 class="font-display text-2xl font-bold text-foreground">Notícia não encontrada</h1>
      <p class="mt-3 text-muted-foreground">O link pode estar incorreto ou a notícia ainda não foi publicada.</p>
      <RouterLink to="/" class="btn-primary mt-8 inline-flex">Voltar ao início</RouterLink>
    </main>

    <main v-else-if="errorMsg" class="container py-24 text-center" role="alert">
      <p class="text-destructive">{{ errorMsg }}</p>
      <button type="button" class="btn-outline mt-6" @click="load">Tentar novamente</button>
    </main>

    <article v-else-if="noticia" class="pb-16">
      <div class="border-b border-border bg-muted/30">
        <div class="container py-6">
          <nav class="text-sm text-muted-foreground" aria-label="Trilha">
            <RouterLink to="/" class="transition hover:text-primary">Início</RouterLink>
            <span class="mx-2 text-border" aria-hidden="true">/</span>
            <RouterLink :to="{ path: '/', hash: '#noticias' }" class="transition hover:text-primary">Notícias</RouterLink>
            <span class="mx-2 text-border" aria-hidden="true">/</span>
            <span class="text-foreground">{{ noticia.titulo }}</span>
          </nav>
        </div>
      </div>

      <header class="container pt-10 md:pt-14">
        <div class="mx-auto max-w-3xl text-center">
          <time
            v-if="noticia.publicado_em"
            :datetime="noticia.publicado_em"
            class="font-accent text-xs font-semibold uppercase tracking-[0.2em] text-primary"
          >
            {{ formatDate(noticia.publicado_em) }}
          </time>
          <h1 class="font-display mt-4 text-3xl font-bold leading-tight tracking-tight text-foreground md:text-4xl lg:text-[2.5rem]">
            {{ noticia.titulo }}
          </h1>
        </div>
      </header>

      <div v-if="noticia.imagem_destaque_url" class="container mt-10">
        <figure class="mx-auto max-w-4xl overflow-hidden rounded-2xl border border-border shadow-md">
          <img
            :src="noticia.imagem_destaque_url"
            :alt="`Ilustração: ${noticia.titulo}`"
            class="aspect-[21/9] w-full object-cover md:aspect-[2.4/1]"
            loading="eager"
          >
        </figure>
      </div>

      <div class="container mt-12 md:mt-16">
        <div
          class="prose-noticia mx-auto max-w-3xl rounded-2xl border border-border/60 bg-card px-6 py-10 shadow-sm md:px-10 md:py-12"
        >
          <div class="whitespace-pre-wrap text-base leading-[1.75] text-foreground/90 md:text-lg">
            {{ noticia.conteudo }}
          </div>
        </div>

        <div class="mx-auto mt-12 max-w-3xl text-center">
          <RouterLink
            :to="{ path: '/', hash: '#noticias' }"
            class="inline-flex items-center gap-2 text-sm font-semibold text-primary transition hover:gap-3"
          >
            <ArrowLeft class="h-4 w-4" aria-hidden="true" />
            Voltar para notícias
          </RouterLink>
        </div>
      </div>
    </article>

    <Footer />
  </div>
</template>

<script setup lang="ts">
import { fetchNoticiaPorSlug } from '@/api/noticias';
import type { NoticiaDetail } from '@/types/noticia';
import Footer from '@/components/Footer.vue';
import Header from '@/components/Header.vue';
import { ArrowLeft } from 'lucide-vue-next';
import { onMounted, ref, watch } from 'vue';
import { useRoute } from 'vue-router';

const route = useRoute();
const noticia = ref<NoticiaDetail | null>(null);
const loading = ref(true);
const notFound = ref(false);
const errorMsg = ref('');

function formatDate(iso: string): string {
  try {
    return new Intl.DateTimeFormat('pt-BR', {
      weekday: 'long',
      day: '2-digit',
      month: 'long',
      year: 'numeric',
    }).format(new Date(iso));
  } catch {
    return '';
  }
}

async function load(): Promise<void> {
  const slug = route.params.slug as string;
  if (!slug) {
    notFound.value = true;
    loading.value = false;
    return;
  }
  loading.value = true;
  notFound.value = false;
  errorMsg.value = '';
  noticia.value = null;
  try {
    noticia.value = await fetchNoticiaPorSlug(slug);
  } catch (e) {
    if (e instanceof Error && e.message === 'NOT_FOUND') {
      notFound.value = true;
    } else {
      errorMsg.value = e instanceof Error ? e.message : 'Erro ao carregar.';
    }
  } finally {
    loading.value = false;
  }
}

onMounted(() => {
  void load();
});

watch(
  () => route.params.slug,
  () => {
    void load();
  },
);
</script>

<style scoped>
.prose-noticia {
  box-shadow: 0 1px 2px rgb(0 0 0 / 0.04);
}
</style>
