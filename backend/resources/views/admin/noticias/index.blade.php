@extends('layouts.admin')

@section('title', 'Notícias')

@section('content')
    <div style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:1rem">
        <h1>Notícias</h1>
        <a href="{{ route('admin.noticias.create') }}" class="btn btn-primary">Nova notícia</a>
    </div>
    <p class="muted">Listagem e edição das notícias do site.</p>

    <div class="card" style="padding:0;overflow:auto">
        <table>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Slug</th>
                    <th>Publicação</th>
                    <th style="width:1%">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($noticias as $noticia)
                    <tr>
                        <td>
                            @if ($noticia->imagem_destaque)
                                <img class="thumb" src="{{ asset('storage/'.$noticia->imagem_destaque) }}" alt="" style="vertical-align:middle;margin-right:0.5rem">
                            @endif
                            {{ \Illuminate\Support\Str::limit($noticia->titulo, 60) }}
                        </td>
                        <td class="muted">{{ $noticia->slug }}</td>
                        <td class="muted">{{ $noticia->publicado_em?->format('d/m/Y H:i') ?? '—' }}</td>
                        <td>
                            <div class="row-actions">
                                <a href="{{ route('admin.noticias.show', $noticia) }}">Ver</a>
                                <a href="{{ route('admin.noticias.edit', $noticia) }}">Editar</a>
                                <form action="{{ route('admin.noticias.destroy', $noticia) }}" method="post" onsubmit="return confirm('Excluir esta notícia?');" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" style="padding:0.25rem 0.5rem;font-size:0.8rem">Excluir</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="muted">Nenhuma notícia cadastrada.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($noticias->hasPages())
        <div class="card" style="padding:0.75rem 1rem">
            {{ $noticias->links() }}
        </div>
    @endif
@endsection
