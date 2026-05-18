<?php

namespace Tests\Feature;

use App\Models\Noticia;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminNoticiasAuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_from_admin_noticias(): void
    {
        $response = $this->get(route('admin.noticias.index'));

        $response->assertRedirect(route('login'));
    }

    public function test_authenticated_user_can_view_noticias_index(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('admin.noticias.index'));

        $response->assertOk();
    }

    public function test_authenticated_user_can_create_noticia(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('admin.noticias.store'), [
            'titulo' => 'Título de teste',
            'conteudo' => 'Corpo da notícia.',
            'publicado_em' => null,
        ]);

        $response->assertRedirect(route('admin.noticias.index'));
        $this->assertDatabaseHas('noticias', [
            'titulo' => 'Título de teste',
            'slug' => 'titulo-de-teste',
        ]);
    }

    public function test_authenticated_user_can_delete_noticia(): void
    {
        $user = User::factory()->create();
        $noticia = Noticia::query()->create([
            'titulo' => 'Para excluir',
            'slug' => 'para-excluir',
            'conteudo' => 'Texto',
            'imagem_destaque' => null,
            'publicado_em' => null,
        ]);

        $response = $this->actingAs($user)->delete(route('admin.noticias.destroy', $noticia));

        $response->assertRedirect(route('admin.noticias.index'));
        $this->assertDatabaseMissing('noticias', ['id' => $noticia->id]);
    }
}
