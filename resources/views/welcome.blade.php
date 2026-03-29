<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hatsune Miku Cafe — Second Life</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Rajdhani:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background: #020809; font-family: 'Rajdhani', sans-serif; margin: 0; }
        .neon-text { color: #00fff5; text-shadow: 0 0 10px #00fff5, 0 0 30px #00fff5; }
        .neon-btn { background: transparent; border: 1px solid #00fff5; color: #00fff5; transition: all 0.3s; padding: 12px 32px; font-family: 'Orbitron', monospace; font-size: 12px; letter-spacing: 0.2em; cursor: pointer; text-decoration: none; display: inline-block; }
        .neon-btn:hover { background: #00fff5; color: #020809; box-shadow: 0 0 30px #00fff5; }
        .cyber-card { background: #0a1a1c; border: 1px solid rgba(0,255,245,0.2); transition: all 0.3s; }
        .cyber-card:hover { border-color: #00fff5; box-shadow: 0 0 20px rgba(0,255,245,0.1); }
        .scanline { background: repeating-linear-gradient(0deg, transparent, transparent 2px, rgba(0,255,245,0.01) 2px, rgba(0,255,245,0.01) 4px); pointer-events: none; position: fixed; inset: 0; z-index: 9999; }
        .hero-bg { background: radial-gradient(ellipse at center, rgba(0,255,245,0.05) 0%, transparent 70%); }
        @keyframes flicker { 0%,100%{opacity:1} 92%{opacity:1} 93%{opacity:0.8} 94%{opacity:1} }
        .flicker { animation: flicker 4s infinite; }
        @keyframes float { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-10px)} }
        .float { animation: float 4s ease-in-out infinite; }
        ::-webkit-scrollbar { width: 4px; }
        ::-webkit-scrollbar-track { background: #020809; }
        ::-webkit-scrollbar-thumb { background: #00fff5; border-radius: 2px; }
    </style>
</head>
<body>
    <div class="scanline"></div>

    <!-- Nav -->
    <nav style="background:#050f10; border-bottom:1px solid rgba(0,255,245,0.15); position:sticky; top:0; z-index:100;">
        <div class="max-w-7xl mx-auto px-6 flex justify-between items-center h-16">
            <span style="font-family:'Orbitron',monospace; font-size:16px; font-weight:900;" class="neon-text flicker">初音ミク CAFE</span>
            <div class="flex items-center gap-6">
                <a href="/posts" style="font-family:'Rajdhani',sans-serif; font-size:13px; letter-spacing:0.15em; color:#9ca3af;" class="hover:text-cyan-400 transition uppercase">News</a>
                <a href="/reviews" style="font-family:'Rajdhani',sans-serif; font-size:13px; letter-spacing:0.15em; color:#9ca3af;" class="hover:text-cyan-400 transition uppercase">Reviews</a>
                @auth
                    <a href="/dashboard" class="neon-btn" style="padding:8px 20px;">Dashboard</a>
                @else
                    <a href="/login" class="neon-btn" style="padding:8px 20px;">Login</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <section class="hero-bg min-h-screen flex flex-col items-center justify-center text-center px-6 relative">
        <div class="float mb-8">
            <img src="https://yt3.ggpht.com/uID6cx88KTW8H3-TXlYWM3_JTWYEV1LVAQi3CipPEn7SoOQy99NmAJYRXyvENIahdDSgHMPSlQ=s600-c-k-c0x00ffffff-no-rj-rp-mo"
                 alt="Hatsune Miku"
                 style="width:160px; height:160px; border-radius:50%; border:2px solid #00fff5; box-shadow:0 0 30px rgba(0,255,245,0.4);">
        </div>
        <p style="font-family:'Orbitron',monospace; font-size:11px; letter-spacing:0.4em; color:rgba(0,255,245,0.6);" class="mb-4">◈ SECOND LIFE ANIME SIMULATION ◈</p>
        <p style="font-family:'Orbitron',monospace; font-size:16px; letter-spacing:0.3em; color:rgba(0,255,245,0.8);" class="mb-2">POWERED BY LARAVEL {{ app()->version() }}</p>
        <h1 style="font-family:'Orbitron',monospace; font-weight:900; line-height:1.1;" class="text-4xl md:text-6xl mb-4">
            <span class="neon-text flicker">HATSUNE MIKU</span><br>
            <span style="color:white; font-size:0.6em; letter-spacing:0.3em;">CAFE</span>
        </h1>
        <p style="font-family:'Rajdhani',sans-serif; font-size:18px; color:#9ca3af; max-width:500px; letter-spacing:0.05em;" class="mb-10">
            A virtual anime café experience in Second Life. Join our community of 3,000+ members in Trinity Region.
        </p>
        <div class="flex gap-4 flex-wrap justify-center">
            <a href="https://maps.secondlife.com/secondlife/Trinity/43/56/311" target="_blank" class="neon-btn">TELEPORT IN</a>
            <a href="/posts" class="neon-btn" style="border-color:rgba(255,255,255,0.2); color:rgba(255,255,255,0.6);">READ NEWS</a>
        </div>
        <p style="font-family:'Orbitron',monospace; font-size:10px; letter-spacing:0.3em; color:rgba(0,255,245,0.3);" class="mt-16">
            📍 TRINITY REGION · 43, 56, 311
        </p>
    </section>

    <!-- Stats -->
    <section style="border-top:1px solid rgba(0,255,245,0.1); border-bottom:1px solid rgba(0,255,245,0.1); background:#050f10;" class="py-12">
        <div class="max-w-4xl mx-auto grid grid-cols-3 gap-8 text-center px-6">
            <div>
                <p style="font-family:'Orbitron',monospace; font-size:32px; font-weight:900;" class="neon-text">3K+</p>
                <p style="font-family:'Rajdhani',sans-serif; font-size:13px; letter-spacing:0.2em; color:#6b7280;" class="mt-1">MEMBERS</p>
            </div>
            <div>
                <p style="font-family:'Orbitron',monospace; font-size:32px; font-weight:900;" class="neon-text">2022</p>
                <p style="font-family:'Rajdhani',sans-serif; font-size:13px; letter-spacing:0.2em; color:#6b7280;" class="mt-1">FOUNDED</p>
            </div>
            <div>
                <p style="font-family:'Orbitron',monospace; font-size:32px; font-weight:900;" class="neon-text">24/7</p>
                <p style="font-family:'Rajdhani',sans-serif; font-size:13px; letter-spacing:0.2em; color:#6b7280;" class="mt-1">ONLINE</p>
            </div>
        </div>
    </section>

    <!-- Latest Posts -->
    <section class="max-w-7xl mx-auto px-6 py-20">
        <div class="flex justify-between items-center mb-10">
            <div>
                <h2 style="font-family:'Orbitron',monospace; font-size:20px; font-weight:700;" class="neon-text">LATEST_NEWS</h2>
                <p style="font-family:'Rajdhani',sans-serif; font-size:13px; letter-spacing:0.2em; color:#6b7280;" class="mt-1">RECENT TRANSMISSIONS</p>
            </div>
            <a href="/posts" style="font-family:'Rajdhani',sans-serif; font-size:12px; letter-spacing:0.2em; color:#00fff5;" class="hover:underline uppercase">View All →</a>
        </div>
        <div class="grid md:grid-cols-3 gap-6">
            @foreach(\App\Models\Post::where('published', true)->latest()->take(3)->get() as $post)
            <div class="cyber-card rounded-lg p-6">
                <span style="font-family:'Orbitron',monospace; font-size:10px; color:#00fff5; letter-spacing:0.15em;">{{ strtoupper($post->category) }}</span>
                <h3 style="font-family:'Rajdhani',sans-serif; font-size:18px; font-weight:600; color:white;" class="mt-2 mb-3">
                    <a href="/posts/{{ $post->id }}" class="hover:text-cyan-400 transition">{{ $post->title }}</a>
                </h3>
                <p style="font-family:'Rajdhani',sans-serif; font-size:14px; color:#6b7280; line-height:1.6;">{{ Str::limit($post->body, 100) }}</p>
                <p style="font-family:'Rajdhani',sans-serif; font-size:11px; letter-spacing:0.15em; color:#374151;" class="mt-4">{{ $post->created_at->diffForHumans() }}</p>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Footer -->
    <footer style="border-top:1px solid rgba(0,255,245,0.1); background:#050f10;" class="py-10 text-center">
        <p style="font-family:'Orbitron',monospace; font-size:12px; letter-spacing:0.3em;" class="neon-text">HATSUNE MIKU CAFE © 2026</p>
        <p style="font-family:'Rajdhani',sans-serif; font-size:12px; letter-spacing:0.2em; color:#374151;" class="mt-2">SECOND LIFE ANIME SIMULATION · TRINITY REGION</p>
        <div class="flex justify-center gap-6 mt-4">
            <a href="https://youtube.com/@hatsunemikucafe" target="_blank" style="font-family:'Rajdhani',sans-serif; font-size:12px; letter-spacing:0.15em; color:#6b7280;" class="hover:text-cyan-400 transition uppercase">YouTube</a>
            <a href="https://hatsunemikucv01.com" target="_blank" style="font-family:'Rajdhani',sans-serif; font-size:12px; letter-spacing:0.15em; color:#6b7280;" class="hover:text-cyan-400 transition uppercase">Main Site</a>
            <a href="https://maps.secondlife.com/secondlife/Trinity/43/56/311" target="_blank" style="font-family:'Rajdhani',sans-serif; font-size:12px; letter-spacing:0.15em; color:#6b7280;" class="hover:text-cyan-400 transition uppercase">Second Life</a>
        </div>
    </footer>
</body>
</html>
