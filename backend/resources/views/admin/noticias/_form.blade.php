@php
    $n = $noticia ?? null;
@endphp

<div class="field">
    <label for="titulo">Título</label>
    <input id="titulo" type="text" name="titulo" value="{{ old('titulo', optional($n)->titulo) }}" required maxlength="255">
    @error('titulo')
        <div class="error">{{ $message }}</div>
    @enderror
</div>

<div class="field">
    <label for="slug">Slug <span class="muted" style="font-weight:400">(opcional; gerado a partir do título se vazio)</span></label>
    <input id="slug" type="text" name="slug" value="{{ old('slug', optional($n)->slug) }}" maxlength="255" placeholder="ex.: minha-noticia">
    @error('slug')
        <div class="error">{{ $message }}</div>
    @enderror
</div>

<div class="field">
    <label for="conteudo">Conteúdo</label>
    <textarea id="conteudo" name="conteudo" required>{{ old('conteudo', optional($n)->conteudo) }}</textarea>
    @error('conteudo')
        <div class="error">{{ $message }}</div>
    @enderror
</div>

<div class="field">
    <label for="imagem_destaque">Imagem de destaque</label>
    <input id="imagem_destaque" type="file" name="imagem_destaque" accept="image/*">
    @error('imagem_destaque')
        <div class="error">{{ $message }}</div>
    @enderror
    @if ($n && $n->imagem_destaque)
        <p class="muted" style="margin-top:0.5rem">
            Atual: <img class="thumb" src="{{ asset('storage/'.$n->imagem_destaque) }}" alt="">
        </p>
    @endif
</div>

<div class="field">
    <label for="publicado_em">Data de publicação <span class="muted" style="font-weight:400">(opcional)</span></label>
    <input id="publicado_em" type="datetime-local" name="publicado_em"
        value="{{ old('publicado_em', $n && $n->publicado_em ? $n->publicado_em->format('Y-m-d\TH:i') : '') }}">
    @error('publicado_em')
        <div class="error">{{ $message }}</div>
    @enderror
</div>
