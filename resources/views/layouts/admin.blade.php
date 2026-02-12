<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin Ujikom' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Sora:wght@600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
<body class="min-h-screen bg-slate-950 text-slate-100">
    <div class="fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute -top-24 left-1/4 h-72 w-72 rounded-full bg-cyan-500/15 blur-3xl"></div>
        <div class="absolute bottom-0 right-0 h-80 w-80 rounded-full bg-blue-600/20 blur-3xl"></div>
    </div>

    <header class="border-b border-white/10 bg-slate-900/90 backdrop-blur">
        <div class="mx-auto flex w-full max-w-7xl flex-wrap items-center justify-between gap-3 px-4 py-4 md:px-6">
            <a href="{{ route('admin.dashboard') }}" class="font-display text-xl font-bold text-white">
                Pulse<span class="text-cyan-400">Panel</span>
            </a>
            <nav class="flex items-center gap-2 text-sm font-semibold">
                <a href="{{ route('admin.dashboard') }}"
                   class="rounded-full px-4 py-2 transition {{ request()->routeIs('admin.dashboard') ? 'bg-cyan-500 text-slate-950' : 'bg-white/10 text-slate-200 hover:bg-white/20' }}">
                    Dashboard
                </a>
                <a href="{{ route('admin.products.index') }}"
                   class="rounded-full px-4 py-2 transition {{ request()->routeIs('admin.products.*') ? 'bg-cyan-500 text-slate-950' : 'bg-white/10 text-slate-200 hover:bg-white/20' }}">
                    Produk
                </a>
                <a href="{{ route('landing.index') }}" class="rounded-full bg-white/10 px-4 py-2 text-slate-200 transition hover:bg-white/20">
                    Landing
                </a>
            </nav>
        </div>
    </header>

    <main class="mx-auto w-full max-w-7xl px-4 py-7 md:px-6 md:py-8">
        @if (session('success'))
            <div class="mb-5 rounded-xl border border-emerald-300/30 bg-emerald-500/15 px-4 py-3 text-sm text-emerald-100">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-5 rounded-xl border border-red-300/30 bg-red-500/15 px-4 py-3 text-sm text-red-100">
                <p class="mb-1 font-semibold">Terjadi kesalahan validasi:</p>
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>
    @stack('scripts')
</body>
</html>
