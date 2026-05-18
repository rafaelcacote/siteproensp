<?php

namespace Tests\Feature;

use App\Models\Noticia;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicNoticiaApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_returns_only_published_noticias(): void
    {
        Noticia::query()->create([
            'titulo' => 'Publicada',
            'slug' => 'publicada',
            'conteudo' => 'Corpo',
            'imagem_destaque' => null,
            'publicado_em' => now()->subDay(),
        ]);
        Noticia::query()->create([
            'titulo' => 'Rascunho',
            'slug' => 'rascunho',
            'conteudo' => 'Corpo',
            'imagem_destaque' => null,
            'publicado_em' => null,
        ]);
        Noticia::query()->create([
            'titulo' => 'Futura',
            'slug' => 'futura',
            'conteudo' => 'Corpo',
            'imagem_destaque' => null,
            'publicado_em' => now()->addDay(),
        ]);

        $response = $this->getJson('/api/v1/noticias');

        $response->assertOk();
        $response->assertJsonCount(1, 'data');
        $response->assertJsonPath('data.0.slug', 'publicada');
        $response->assertJsonMissingPath('data.0.conteudo');
    }

    public function test_show_returns_conteudo_for_published_slug(): void
    {
        Noticia::query()->create([
            'titulo' => 'Detalhe',
            'slug' => 'detalhe',
            'conteudo' => 'Texto completo',
            'imagem_destaque' => null,
            'publicado_em' => now()->subHour(),
        ]);

        $response = $this->getJson('/api/v1/noticias/detalhe');

        $response->assertOk();
        $response->assertJsonPath('data.conteudo', 'Texto completo');
        $response->assertJsonPath('data.slug', 'detalhe');
    }

    public function test_show_returns_404_for_unpublished(): void
    {
        Noticia::query()->create([
            'titulo' => 'Oculta',
            'slug' => 'oculta',
            'conteudo' => 'X',
            'imagem_destaque' => null,
            'publicado_em' => null,
        ]);

        $this->getJson('/api/v1/noticias/oculta')->assertNotFound();
    }
}
