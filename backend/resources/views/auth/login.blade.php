<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Entrar — {{ config('app.name') }}</title>
    <style>
        :root { --bg: #f4f4f5; --card: #fff; --text: #18181b; --muted: #71717a; --border: #e4e4e7; --accent: #0f766e; --accent-hover: #0d9488; --danger: #b91c1c; }
        * { box-sizing: border-box; }
        body { margin: 0; min-height: 100vh; display: flex; align-items: center; justify-content: center; font-family: system-ui, sans-serif; background: var(--bg); color: var(--text); }
        .card { width: 100%; max-width: 380px; background: var(--card); border: 1px solid var(--border); border-radius: 10px; padding: 1.75rem; margin: 1rem; }
        h1 { font-size: 1.25rem; margin: 0 0 1.25rem; }
        label { display: block; font-weight: 600; font-size: 0.875rem; margin-bottom: 0.35rem; }
        input { width: 100%; padding: 0.55rem 0.65rem; border: 1px solid var(--border); border-radius: 6px; font: inherit; }
        .field { margin-bottom: 1rem; }
        .check { display: flex; align-items: center; gap: 0.5rem; font-size: 0.875rem; }
        .btn { width: 100%; padding: 0.6rem; border: none; border-radius: 6px; background: var(--accent); color: #fff; font-weight: 600; font-size: 0.9rem; cursor: pointer; margin-top: 0.5rem; }
        .btn:hover { background: var(--accent-hover); }
        .error { color: var(--danger); font-size: 0.8125rem; margin-top: 0.25rem; }
        .muted { color: var(--muted); font-size: 0.8rem; margin-top: 1rem; text-align: center; }
    </style>
</head>
<body>
    <div class="card">
        <h1>Área administrativa</h1>
        <form method="post" action="{{ route('login') }}">
            @csrf
            <div class="field">
                <label for="email">E-mail</label>
                <input id="email" type="email" name="email" value="{{ old('email', $email ?? '') }}" required autofocus autocomplete="username">
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="field">
                <label for="password">Senha</label>
                <input id="password" type="password" name="password" required autocomplete="current-password">
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div class="field check">
                <input id="remember" type="checkbox" name="remember" value="1" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember" style="margin:0;font-weight:500">Manter conectado</label>
            </div>
            <button type="submit" class="btn">Entrar</button>
        </form>
        <p class="muted">ProEnSP — gestão de notícias</p>
    </div>
</body>
</html>
