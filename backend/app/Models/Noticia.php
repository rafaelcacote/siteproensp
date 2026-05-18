<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    protected $fillable = [
        'titulo',
        'slug',
        'conteudo',
        'imagem_destaque',
        'publicado_em',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'publicado_em' => 'datetime',
        ];
    }

    /**
     * Notícias já publicadas (visíveis no site público).
     */
    public function scopePublicadas(Builder $query): void
    {
        $query->whereNotNull('publicado_em')
            ->where('publicado_em', '<=', now());
    }
}
