@extends('layouts.admin')

@section('title', 'Nova notícia')

@section('content')
    <h1>Nova notícia</h1>
    <p class="muted"><a href="{{ route('admin.noticias.index') }}">← Voltar à lista</a></p>

    <div class="card">
        <form action="{{ route('admin.noticias.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('admin.noticias._form', ['noticia' => null])
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
@endsection
