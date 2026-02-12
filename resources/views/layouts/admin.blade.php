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
<body class="min-h-screen bg-slate-100 text-slate-900">
    <div class="md:grid md:min-h-screen md:grid-cols-[260px_1fr]">
        <aside class="bg-gradient-to-b from-blue-700 to-blue-900 px-4 py-6 text-white">
            <a href="{{ route('admin.dashboard') }}" class="font-display mb-8 block text-xl font-bold tracking-wide">
                SB ADMIN <span class="text-blue-200">2</span>
            </a>
            <nav class="space-y-2 text-sm font-semibold">
                <a href="{{ route('admin.dashboard') }}"
                   class="flex items-center rounded-lg px-3 py-2 transition {{ request()->routeIs('admin.dashboard') ? 'bg-white/20' : 'hover:bg-white/10' }}">
                    Dashboard
                </a>
                <a href="{{ route('admin.products.index') }}"
                   class="flex items-center rounded-lg px-3 py-2 transition {{ request()->routeIs('admin.products.*') ? 'bg-white/20' : 'hover:bg-white/10' }}">
                    Product
                </a>
                <a href="{{ route('landing.index') }}" class="flex items-center rounded-lg px-3 py-2 transition hover:bg-white/10">
                    Landing Page
                </a>
            </nav>
        </aside>

        <div class="flex min-w-0 flex-col">
            <header class="border-b border-slate-200 bg-white px-4 py-3 shadow-sm md:px-6">
                <div class="flex flex-wrap items-center justify-between gap-3">
                    <form class="w-full max-w-md">
                        <div class="flex overflow-hidden rounded-lg border border-slate-200">
                            <input type="text" placeholder="Search for..." class="w-full bg-white px-3 py-2 text-sm outline-none">
                            <button type="button" class="bg-blue-600 px-4 text-sm font-semibold text-white">Go</button>
                        </div>
                    </form>
                    <div class="rounded-full bg-slate-100 px-3 py-2 text-xs font-semibold text-slate-600">
                        Admin Panel
                    </div>
                </div>
            </header>

            <main class="flex-1 px-4 py-6 md:px-6">
                @if (session('success'))
                    <div class="mb-5 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-5 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
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
        </div>
    </div>
    @stack('scripts')
</body>
</html>
