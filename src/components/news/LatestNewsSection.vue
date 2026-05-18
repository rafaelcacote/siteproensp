<template>
  <section
    id="noticias"
    class="scroll-mt-20 border-t border-border/80 bg-gradient-to-b from-muted/40 via-background to-background"
    aria-labelledby="noticias-heading"
  >
    <div class="container py-16 md:py-24">
      <header class="mx-auto max-w-2xl text-center">
        <p class="font-accent text-xs font-semibold uppercase tracking-[0.2em] text-primary">
          Comunicação
        </p>
        <h2
          id="noticias-heading"
          class="font-display mt-3 text-3xl font-bold tracking-tight text-foreground md:text-4xl"
        >
          Últimas notícias
        </h2>
        <p class="mt-4 text-base leading-relaxed text-muted-foreground">
          Acompanhe avisos, eventos e novidades do Programa de Pós-graduação em Enfermagem em Saúde Pública.
        </p>
      </header>

      <!-- Loading -->
      <div
        v-if="loading"
        class="mt-14 grid gap-6 sm:grid-cols-2 lg:grid-cols-3"
        aria-busy="true"
        aria-label="Carregando notícias"
      >
        <div v-for="n in 3" :key="n" class="overflow-hidden rounded-2xl border border-border bg-card shadow-sm">
          <div class="aspect-[16/10] animate-pulse bg-muted" />
          <div class="space-y-3 p-5">
            <div class="h-3 w-24 animate-pulse rounded bg-muted" />
            <div class="h-4 w-full animate-pulse rounded bg-muted" />
            <div class="h-4 w-[85%] animate-pulse rounded bg-muted" />
          </div>
        </div>
      </div>

      <!-- Erro -->
      <div
        v-else-if="errorMsg"
        class="mx-auto mt-14 max-w-lg rounded-2xl border border-destructive/25 bg-destructive/5 px-6 py-8 text-center"
        role="alert"
      >
        <p class="text-sm font-medium text-destructive">{{ errorMsg }}</p>
        <p class="mt-2 text-xs text-muted-foreground">
          Confirme se o Laravel está rodando (<code class="rounded bg-muted px-1 py-0.5 text-foreground">php artisan serve</code>) e se a notícia tem data de publicação preenchida no admin.
        </p>
        <button
          type="button"
          class="btn-outline mt-6 text-sm"
          @click="load"
        >
          Tentar novamente
        </button>
      </div>

      <!-- Vazio -->
      <div
        v-else-if="items.length === 0"
        class="mx-auto mt-14 max-w-md rounded-2xl border border-dashed border-border bg-card/50 px-8 py-12 text-center"
      >
        <Newspaper class="mx-auto h-10 w-10 text-primary/70" aria-hidden="true" />
        <p class="mt-4 font-medium text-foreground">Nenhuma notícia publicada no momento</p>
        <p class="mt-2 text-sm text-muted-foreground">
          Quando houver notícias com data de publicação definida no painel administrativo, elas aparecerão aqui.
        </p>
      </div>

      <!-- Grid -->
      <ul
        v-else
        class="mt-14 grid list-none gap-6 p-0 sm:grid-cols-2 lg:grid-cols-3"
      >
        <li v-for="item in items" :key="item.id">
          <article
            class="group flex h-full flex-col overflow-hidden rounded-2xl border border-border bg-card shadow-sm transition-all duration-300 hover:-translate-y-1 hover:border-primary/30 hover:shadow-lg"
          >
            <RouterLink
              :to="{ name: 'noticia', params: { slug: item.slug } }"
              class="relative block aspect-[16/10] overflow-hidden bg-muted"
            >
              <img
                v-if="item.imagem_destaque_url"
                :src="item.imagem_destaque_url"
                :alt="`Imagem de destaque: ${item.titulo}`"
                class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-[1.03]"
                loading="lazy"
              >
              <div
                v-else
                class="flex h-full w-full items-center justify-center bg-gradient-to-br from-primary/15 to-primary/5"
              >
                <Newspaper class="h-12 w-12 text-primary/40" aria-hidden="true" />
              </div>
              <span class="absolute inset-0 ring-2 ring-transparent ring-inset transition group-focus-visible:ring-primary/50" />
            </RouterLink>

            <div class="flex flex-1 flex-col p-5 pt-4">
              <time
                v-if="item.publicado_em"
                :datetime="item.publicado_em"
                class="font-accent text-[11px] font-semibold uppercase tracking-wider text-muted-foreground"
              >
                {{ formatDate(item.publicado_em) }}
              </time>
              <h3 class="font-display mt-2 text-lg font-bold leading-snug text-foreground line-clamp-2">
                <RouterLink
                  :to="{ name: 'noticia', params: { slug: item.slug } }"
                  class="transition-colors hover:text-primary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 rounded-sm"
                >
                  {{ item.titulo }}
                </RouterLink>
              </h3>
              <div class="mt-auto pt-5">
                <RouterLink
                  :to="{ name: 'noticia', params: { slug: item.slug } }"
                  class="inline-flex items-center gap-1.5 text-sm font-semibold text-primary transition group/link"
                >
                  Ler notícia
                  <ArrowRight class="h-4 w-4 transition-transform group-hover/link:translate-x-0.5" />
                </RouterLink>
              </div>
            </div>
          </article>
        </li>
      </ul>
    </div>
  </section>
</template>

<script setup lang="ts">
import { fetchNoticiasPublicas } from '@/api/noticias';
import type { NoticiaListItem } from '@/types/noticia';
import { ArrowRight, Newspaper } from 'lucide-vue-next';
import { onMounted, ref } from 'vue';

const items = ref<NoticiaListItem[]>([]);
const loading = ref(true);
const errorMsg = ref('');

function formatDate(iso: string): string {
  try {
    const d = new Date(iso);
    return new Intl.DateTimeFormat('pt-BR', {
      day: '2-digit',
      month: 'long',
      year: 'numeric',
    }).format(d);
  } catch {
    return '';
  }
}

async function load(): Promise<void> {
  loading.value = true;
  errorMsg.value = '';
  try {
    const json = await fetchNoticiasPublicas(9);
    items.value = json.data ?? [];
  } catch (e) {
    errorMsg.value = e instanceof Error ? e.message : 'Não foi possível carregar as notícias.';
    items.value = [];
  } finally {
    loading.value = false;
  }
}

onMounted(() => {
  void load();
});
</script>
