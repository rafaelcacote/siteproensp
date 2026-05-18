@extends('layouts.admin')

@section('title', $noticia->titulo)

@section('content')
    <p class="muted"><a href="{{ route('admin.noticias.index') }}">← Voltar à lista</a></p>
    <h1>{{ $noticia->titulo }}</h1>
    <p class="muted">Slug: {{ $noticia->slug }} · Publicação: {{ $noticia->publicado_em?->format('d/m/Y H:i') ?? 'não definida' }}</p>

    @if ($noticia->imagem_destaque)
        <p><img src="{{ asset('storage/'.$noticia->imagem_destaque) }}" alt="" style="max-width:100%;border-radius:8px;border:1px solid var(--border)"></p>
    @endif

    <div class="card">
        {!! nl2br(e($noticia->conteudo)) !!}
    </div>

    <p style="margin-top:1rem">
        <a href="{{ route('admin.noticias.edit', $noticia) }}" class="btn btn-primary">Editar</a>
    </p>
@endsection
