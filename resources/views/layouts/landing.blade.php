<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Ujikom Elektronik' }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Sora:wght@600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-950 text-slate-100">
    <div class="fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute left-1/2 top-[-180px] h-[420px] w-[720px] -translate-x-1/2 rounded-full bg-blue-500/20 blur-3xl"></div>
        <div class="absolute -left-20 top-[40%] h-[260px] w-[260px] rounded-full bg-emerald-500/15 blur-3xl"></div>
        <div class="absolute -right-24 bottom-10 h-[320px] w-[320px] rounded-full bg-cyan-500/15 blur-3xl"></div>
    </div>

    <header class="sticky top-0 z-30 border-b border-white/10 bg-slate-950/80 backdrop-blur">
        <div class="mx-auto flex w-full max-w-7xl items-center justify-between px-4 py-4 md:px-6">
            <a href="{{ route('landing.index') }}" class="font-display text-lg font-bold tracking-wide text-white md:text-xl">
                UJIKOM<span class="text-blue-400">STORE</span>
            </a>
            <nav class="flex items-center gap-2 text-sm font-semibold md:gap-3">
                <a href="{{ route('landing.index') }}" class="rounded-lg px-3 py-2 text-slate-200 transition hover:bg-white/10">Produk</a>
                <a href="{{ route('admin.dashboard') }}" class="rounded-lg bg-blue-600 px-4 py-2 text-white transition hover:bg-blue-500">Admin</a>
            </nav>
        </div>
    </header>

    <main class="mx-auto w-full max-w-7xl px-4 py-8 md:px-6 md:py-10">
        @yield('content')
    </main>
</body>
</html>
