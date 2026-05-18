<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin') — {{ config('app.name') }}</title>
    <style>
        :root { --bg: #f4f4f5; --card: #fff; --text: #18181b; --muted: #71717a; --border: #e4e4e7; --accent: #0f766e; --accent-hover: #0d9488; --danger: #b91c1c; }
        * { box-sizing: border-box; }
        body { margin: 0; font-family: system-ui, -apple-system, Segoe UI, Roboto, sans-serif; background: var(--bg); color: var(--text); line-height: 1.5; }
        a { color: var(--accent); }
        a:hover { color: var(--accent-hover); }
        .wrap { max-width: 960px; margin: 0 auto; padding: 1.5rem 1rem 3rem; }
        header.bar { background: var(--card); border-bottom: 1px solid var(--border); padding: 0.75rem 1rem; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 0.75rem; }
        header.bar strong { font-size: 1rem; }
        .card { background: var(--card); border: 1px solid var(--border); border-radius: 8px; padding: 1.25rem 1.5rem; margin-top: 1rem; }
        .muted { color: var(--muted); font-size: 0.875rem; }
        .btn { display: inline-block; padding: 0.45rem 0.9rem; border-radius: 6px; font-size: 0.875rem; font-weight: 600; text-decoration: none; border: 1px solid transparent; cursor: pointer; }
        .btn-primary { background: var(--accent); color: #fff; }
        .btn-primary:hover { background: var(--accent-hover); color: #fff; }
        .btn-ghost { background: transparent; border-color: var(--border); color: var(--text); }
        .btn-danger { background: var(--danger); color: #fff; }
        label { display: block; font-weight: 600; font-size: 0.875rem; margin-bottom: 0.35rem; }
        input[type="text"], input[type="email"], input[type="password"], input[type="datetime-local"], textarea { width: 100%; padding: 0.5rem 0.65rem; border: 1px solid var(--border); border-radius: 6px; font: inherit; }
        textarea { min-height: 200px; resize: vertical; }
        .field { margin-bottom: 1rem; }
        .error { color: var(--danger); font-size: 0.8125rem; margin-top: 0.25rem; }
        .alert { padding: 0.75rem 1rem; border-radius: 6px; margin-bottom: 1rem; font-size: 0.9rem; }
        .alert-success { background: #ecfdf5; border: 1px solid #6ee7b7; color: #065f46; }
        table { width: 100%; border-collapse: collapse; font-size: 0.875rem; }
        th, td { text-align: left; padding: 0.6rem 0.5rem; border-bottom: 1px solid var(--border); vertical-align: top; }
        th { color: var(--muted); font-weight: 600; }
        .row-actions { display: flex; flex-wrap: wrap; gap: 0.5rem; }
        h1 { font-size: 1.35rem; margin: 0 0 0.5rem; }
        .thumb { max-width: 80px; max-height: 48px; object-fit: cover; border-radius: 4px; }
    </style>
    @stack('head')
</head>
<body>
    <header class="bar">
        <div>
            <strong>ProEnSP — Admin</strong>
            <span class="muted" style="margin-left:0.5rem">Notícias</span>
        </div>
        <div style="display:flex;align-items:center;gap:0.75rem">
            @auth
                <span class="muted">{{ Auth::user()->email }}</span>
                <form action="{{ route('logout') }}" method="post" style="margin:0">
                    @csrf
                    <button type="submit" class="btn btn-ghost">Sair</button>
                </form>
            @endauth
        </div>
    </header>
    <div class="wrap">
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        @yield('content')
    </div>
</body>
</html>
