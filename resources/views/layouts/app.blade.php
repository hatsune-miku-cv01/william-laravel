<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'AnimeGames') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Rajdhani:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
    tailwind.config = {
        darkMode: 'class',
        theme: {
            extend: {
                colors: {
                    neon: { teal: '#00fff5', dark: '#00b3ab', dim: '#007a75' },
                    cyber: { black: '#020809', dark: '#050f10', mid: '#0a1a1c', light: '#0d2326' }
                },
                fontFamily: {
                    orbitron: ['Orbitron', 'monospace'],
                    rajdhani: ['Rajdhani', 'sans-serif'],
                }
            }
        }
    }
    </script>
    <style>
        body { background: #020809; font-family: 'Rajdhani', sans-serif; }
        .neon-text { color: #00fff5; text-shadow: 0 0 10px #00fff5, 0 0 20px #00fff5; }
        .neon-border { border-color: #00fff5; box-shadow: 0 0 8px #00fff5, inset 0 0 8px rgba(0,255,245,0.05); }
        .neon-btn { background: transparent; border: 1px solid #00fff5; color: #00fff5; transition: all 0.3s; }
        .neon-btn:hover { background: #00fff5; color: #020809; box-shadow: 0 0 20px #00fff5; }
        .cyber-card { background: #0a1a1c; border: 1px solid rgba(0,255,245,0.2); transition: all 0.3s; }
        .cyber-card:hover { border-color: #00fff5; box-shadow: 0 0 15px rgba(0,255,245,0.15); }
        .scanline { background: repeating-linear-gradient(0deg, transparent, transparent 2px, rgba(0,255,245,0.01) 2px, rgba(0,255,245,0.01) 4px); pointer-events: none; position: fixed; inset: 0; z-index: 9999; }
        ::-webkit-scrollbar { width: 4px; }
        ::-webkit-scrollbar-track { background: #020809; }
        ::-webkit-scrollbar-thumb { background: #00fff5; border-radius: 2px; }
    </style>
</head>
<body class="min-h-screen text-gray-300">
    <div class="scanline"></div>

    <!-- Navigation -->
    <nav style="background:#050f10; border-bottom: 1px solid rgba(0,255,245,0.2);">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <a href="/" class="font-orbitron text-xl font-black neon-text tracking-widest">
                    HATSUNE MIKU CAFE<span style="color:rgba(0,255,245,0.4)"> · SECOND LIFE</span>
                </a>
                <div class="flex items-center gap-6">
                    <a href="{{ route('posts.index') }}" class="font-rajdhani text-sm tracking-widest uppercase hover:text-cyan-400 transition">News</a>
                    <a href="{{ route('reviews.index') }}" class="font-rajdhani text-sm tracking-widest uppercase hover:text-cyan-400 transition">Reviews</a>
                    @auth
                        <a href="{{ route('dashboard') }}" class="font-rajdhani text-sm tracking-widest uppercase hover:text-cyan-400 transition">Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="neon-btn font-rajdhani text-xs tracking-widest uppercase px-4 py-2 rounded">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="neon-btn font-rajdhani text-xs tracking-widest uppercase px-4 py-2 rounded">Login</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer style="border-top: 1px solid rgba(0,255,245,0.1); background:#050f10;" class="mt-20 py-8 text-center">
        <p class="font-orbitron text-xs neon-text tracking-widest">HATSUNE MIKU CAFE © 2026</p>
        <p class="font-rajdhani text-xs text-gray-600 mt-1">SECOND LIFE ANIME SIMULATION · TRINITY REGION</p>
    </footer>
</body>
</html>
