export interface NoticiaListItem {
  id: number;
  titulo: string;
  slug: string;
  publicado_em: string | null;
  imagem_destaque_url: string | null;
}

export interface NoticiaDetail extends NoticiaListItem {
  conteudo: string;
}

export interface PaginatedNoticias {
  data: NoticiaListItem[];
  links?: Record<string, string | null>;
  meta?: {
    current_page: number;
    last_page: number;
    per_page: number;
    total: number;
  };
}
