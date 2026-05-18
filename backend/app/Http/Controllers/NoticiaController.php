<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNoticiaRequest;
use App\Http\Requests\UpdateNoticiaRequest;
use App\Models\Noticia;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class NoticiaController extends Controller
{
    public function index(Request $request): View
    {
        $noticias = Noticia::query()
            ->orderByDesc('publicado_em')
            ->orderByDesc('id')
            ->paginate(15)
            ->withQueryString();

        return view('admin.noticias.index', compact('noticias'));
    }

    public function create(): View
    {
        return view('admin.noticias.create');
    }

    public function store(StoreNoticiaRequest $request): RedirectResponse
    {
        $data = $this->validatedPayload($request->validated(), $request, null);

        Noticia::query()->create($data);

        return redirect()
            ->route('admin.noticias.index')
            ->with('status', 'Notícia criada com sucesso.');
    }

    public function show(Noticia $noticia): View
    {
        return view('admin.noticias.show', compact('noticia'));
    }

    public function edit(Noticia $noticia): View
    {
        return view('admin.noticias.edit', compact('noticia'));
    }

    public function update(UpdateNoticiaRequest $request, Noticia $noticia): RedirectResponse
    {
        $data = $this->validatedPayload($request->validated(), $request, $noticia);

        $noticia->update($data);

        return redirect()
            ->route('admin.noticias.index')
            ->with('status', 'Notícia atualizada com sucesso.');
    }

    public function destroy(Noticia $noticia): RedirectResponse
    {
        if ($noticia->imagem_destaque) {
            Storage::disk('public')->delete($noticia->imagem_destaque);
        }

        $noticia->delete();

        return redirect()
            ->route('admin.noticias.index')
            ->with('status', 'Notícia excluída com sucesso.');
    }

    /**
     * @param  array<string, mixed>  $validated
     * @return array<string, mixed>
     */
    private function validatedPayload(array $validated, Request $request, ?Noticia $existing): array
    {
        $titulo = $validated['titulo'];
        $slugInput = isset($validated['slug']) ? trim((string) $validated['slug']) : '';
        $baseSlug = $slugInput !== '' ? Str::slug($slugInput) : Str::slug($titulo);
        $slug = $this->uniqueSlug($baseSlug, $existing?->id);

        $imagemPath = $existing?->imagem_destaque;
        if ($request->hasFile('imagem_destaque')) {
            if ($existing?->imagem_destaque) {
                Storage::disk('public')->delete($existing->imagem_destaque);
            }
            $imagemPath = $request->file('imagem_destaque')->store('noticias', 'public');
        }

        return [
            'titulo' => $titulo,
            'slug' => $slug,
            'conteudo' => $validated['conteudo'],
            'imagem_destaque' => $imagemPath,
            'publicado_em' => $validated['publicado_em'] ?? null,
        ];
    }

    private function uniqueSlug(string $base, ?int $exceptId = null): string
    {
        $slug = $base !== '' ? $base : 'noticia';
        $suffix = 1;

        while (Noticia::query()
            ->where('slug', $slug)
            ->when($exceptId !== null, fn ($q) => $q->where('id', '!=', $exceptId))
            ->exists()) {
            $slug = $base.'-'.$suffix;
            $suffix++;
        }

        return $slug;
    }
}
