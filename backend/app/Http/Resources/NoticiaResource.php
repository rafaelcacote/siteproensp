<?php

namespace App\Http\Resources;

use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Noticia
 */
class NoticiaResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'titulo' => $this->titulo,
            'slug' => $this->slug,
            'publicado_em' => $this->publicado_em?->toIso8601String(),
            'imagem_destaque_url' => $this->imagem_destaque
                ? asset('storage/'.$this->imagem_destaque)
                : null,
            'conteudo' => $this->when(
                $request->route()?->named('api.v1.noticias.show'),
                $this->conteudo
            ),
        ];
    }
}
