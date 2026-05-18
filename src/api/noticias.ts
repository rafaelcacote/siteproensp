import type { NoticiaDetail, PaginatedNoticias } from '@/types/noticia';

function apiBase(): string {
  const raw = import.meta.env.VITE_API_URL as string | undefined;
  if (raw?.trim()) {
    return raw.replace(/\/$/, '');
  }
  if (import.meta.env.DEV) {
    return 'http://127.0.0.1:8000';
  }
  return '';
}

export function getApiBase(): string {
  return apiBase();
}

export async function fetchNoticiasPublicas(perPage = 9): Promise<PaginatedNoticias> {
  const base = apiBase();
  if (!base) {
    return { data: [] };
  }
  const res = await fetch(`${base}/api/v1/noticias?per_page=${perPage}`);
  if (!res.ok) {
    throw new Error(`Erro ao carregar notícias (${res.status})`);
  }
  return res.json() as Promise<PaginatedNoticias>;
}

export async function fetchNoticiaPorSlug(slug: string): Promise<NoticiaDetail> {
  const base = apiBase();
  if (!base) {
    throw new Error('API não configurada');
  }
  const res = await fetch(`${base}/api/v1/noticias/${encodeURIComponent(slug)}`);
  if (res.status === 404) {
    throw new Error('NOT_FOUND');
  }
  if (!res.ok) {
    throw new Error(`Erro ao carregar notícia (${res.status})`);
  }
  const body = (await res.json()) as { data: NoticiaDetail };
  return body.data;
}
