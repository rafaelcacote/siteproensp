@extends('layouts.admin')

@section('title', 'Editar notícia')

@section('content')
    <h1>Editar notícia</h1>
    <p class="muted"><a href="{{ route('admin.noticias.index') }}">← Voltar à lista</a></p>

    <div class="card">
        <form action="{{ route('admin.noticias.update', $noticia) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.noticias._form', ['noticia' => $noticia])
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
@endsection
