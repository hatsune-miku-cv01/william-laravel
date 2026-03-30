<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hatsune Miku Cafe — Second Life</title>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Rajdhani:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body{background:#020809;font-family:'Rajdhani',sans-serif;margin:0;}
        .neon-text{color:#00fff5;text-shadow:0 0 10px #00fff5,0 0 30px #00fff5;}
        .neon-btn{background:transparent;border:1px solid #00fff5;color:#00fff5;transition:all 0.3s;padding:12px 32px;font-family:'Orbitron',monospace;font-size:12px;letter-spacing:0.2em;cursor:pointer;text-decoration:none;display:inline-block;}
        .neon-btn:hover{background:#00fff5;color:#020809;box-shadow:0 0 30px #00fff5;}
        .cyber-card{background:#0a1a1c;border:1px solid rgba(0,255,245,0.2);transition:all 0.3s;}
        .cyber-card:hover{border-color:#00fff5;box-shadow:0 0 20px rgba(0,255,245,0.1);}
        .scanline{background:repeating-linear-gradient(0deg,transparent,transparent 2px,rgba(0,255,245,0.01) 2px,rgba(0,255,245,0.01) 4px);pointer-events:none;position:fixed;inset:0;z-index:9999;}
        .hero-bg{background:radial-gradient(ellipse at center,rgba(0,255,245,0.05) 0%,transparent 70%);}
        @keyframes flicker{0%,100%{opacity:1}92%{opacity:1}93%{opacity:0.8}94%{opacity:1}}
        .flicker{animation:flicker 4s infinite;}
        @keyframes float{0%,100%{transform:translateY(0)}50%{transform:translateY(-10px)}}
        .float{animation:float 4s ease-in-out infinite;}
        ::-webkit-scrollbar{width:4px;}
        ::-webkit-scrollbar-track{background:#020809;}
        ::-webkit-scrollbar-thumb{background:#00fff5;border-radius:2px;}
        .video-wrap{position:relative;padding-bottom:56.25%;height:0;overflow:hidden;border-radius:8px;}
        .video-wrap iframe{position:absolute;top:0;left:0;width:100%;height:100%;border:0;}
        .tag{display:inline-block;font-family:'Orbitron',monospace;font-size:10px;padding:2px 10px;border-radius:2px;letter-spacing:0.1em;}
        .miku-banner{width:100%;height:160px;background:#000;border-bottom:2px solid #00fff5;box-shadow:0 0 40px rgba(0,255,245,0.12);overflow:hidden;position:relative;}
        .banner-hex{position:absolute;inset:0;background-image:radial-gradient(circle,rgba(0,255,245,0.07) 1px,transparent 1px);background-size:24px 24px;pointer-events:none;z-index:1;}
        .banner-sweep{position:absolute;top:0;left:-100%;width:60%;height:100%;background:linear-gradient(90deg,transparent,rgba(0,255,245,0.06),transparent);z-index:2;animation:bannerSweep 6s ease-in-out infinite;pointer-events:none;}
        @keyframes bannerSweep{0%,100%{left:-100%}50%{left:150%}}
        .banner-edge{position:absolute;bottom:0;left:0;right:0;height:1px;background:linear-gradient(90deg,transparent 0%,#00fff5 20%,#00e87a 50%,#00fff5 80%,transparent 100%);z-index:6;animation:edgeFlicker 4s ease-in-out infinite;}
        @keyframes edgeFlicker{0%,100%{opacity:0.6}50%{opacity:1}}
        .banner-bracket{position:absolute;width:20px;height:20px;z-index:5;pointer-events:none;}
        .banner-bracket--tl{top:8px;left:8px;border-top:1.5px solid #00fff5;border-left:1.5px solid #00fff5;}
        .banner-bracket--tr{top:8px;right:8px;border-top:1.5px solid #00fff5;border-right:1.5px solid #00fff5;}
        .banner-bracket--bl{bottom:12px;left:8px;border-bottom:1.5px solid #00fff5;border-left:1.5px solid #00fff5;}
        .banner-bracket--br{bottom:12px;right:8px;border-bottom:1.5px solid #00fff5;border-right:1.5px solid #00fff5;}
        .banner-content-wrapper{position:absolute;bottom:14px;left:16px;display:flex;align-items:flex-end;gap:16px;z-index:20;width:calc(100% - 200px);}
        .miku-avatar-wrap{position:relative;width:68px;height:68px;flex-shrink:0;}
        .miku-avatar-circle{display:block;width:68px;height:68px;border-radius:50%;background-size:cover;background-position:center;background-color:#000;border:2px solid rgba(0,255,245,0.6);position:relative;z-index:2;transition:border-color .2s,box-shadow .2s;}
        .miku-avatar-circle:hover{border-color:#00e87a;box-shadow:0 0 20px #00fff5;}
        .avatar-ring{position:absolute;inset:-6px;border-radius:50%;border:1.5px solid transparent;border-top-color:#00fff5;border-right-color:rgba(0,255,245,0.3);animation:avatarSpin 3s linear infinite;pointer-events:none;z-index:3;}
        .avatar-ring--2{inset:-10px;border-top-color:transparent;border-left-color:rgba(0,232,122,0.4);animation-duration:5s;animation-direction:reverse;}
        @keyframes avatarSpin{to{transform:rotate(360deg)}}
        .avatar-status{position:absolute;bottom:3px;right:3px;width:10px;height:10px;border-radius:50%;background:#00e87a;border:2px solid #000;box-shadow:0 0 8px #00e87a;z-index:4;animation:statusPulse 2s ease-in-out infinite;}
        @keyframes statusPulse{0%,100%{box-shadow:0 0 4px #00e87a}50%{box-shadow:0 0 12px #00e87a}}
        .banner-text-info{display:flex;flex-direction:column;justify-content:flex-end;gap:6px;}
        .miku-name-row{display:flex;align-items:center;gap:8px;}
        .miku-name-large{font-family:'Orbitron',monospace;font-size:20px;font-weight:900;color:#fff;text-transform:uppercase;letter-spacing:3px;line-height:1;text-shadow:0 0 12px #00fff5,0 0 30px rgba(0,255,245,0.3);}
        .miku-name-jp{font-size:11px;color:rgba(0,255,245,0.5);letter-spacing:2px;font-weight:300;}
        .miku-meta-info{display:flex;flex-wrap:wrap;align-items:center;gap:6px;}
        .meta-item{display:inline-flex;align-items:center;gap:4px;font-size:10px;color:#aaa;background:rgba(0,20,20,0.8);padding:2px 8px;border-radius:2px;border:1px solid rgba(0,255,245,0.2);white-space:nowrap;transition:border-color .2s,color .2s;}
        .meta-item:hover{border-color:#00fff5;color:#00fff5;}
        .meta-item.meta-handle{color:#00fff5;border-color:rgba(0,255,245,0.4);}
        .miku-hud-bubble{position:absolute;bottom:105px;left:86px;background:rgba(0,12,12,0.95);border:1px solid #00fff5;border-radius:3px;padding:7px 12px;font-family:monospace;font-size:10px;color:#00fff5;line-height:1.6;pointer-events:none;z-index:25;animation:hudFloat 5s ease-in-out infinite;min-width:160px;}
        @keyframes hudFloat{0%,100%{transform:translateY(0)}50%{transform:translateY(-5px)}}
        .hud-label{font-size:7px;letter-spacing:3px;color:rgba(0,255,245,0.5);margin-bottom:3px;display:block;}
        .hud-msg{font-size:10px;color:#fff;letter-spacing:.5px;}
        .msg-jp{display:block;font-size:9px;color:rgba(0,255,245,0.5);margin-top:1px;}
        .banner-nav{position:absolute;top:0;right:0;height:100%;display:flex;align-items:center;gap:6px;z-index:20;padding-right:16px;}
        .banner-nav a{font-family:'Orbitron',monospace;font-size:10px;letter-spacing:2px;color:rgba(0,255,245,0.6);text-decoration:none;padding:8px 14px;border-bottom:2px solid transparent;transition:color .2s,border-color .2s;text-transform:uppercase;}
        .banner-nav a:hover{color:#00fff5;border-bottom-color:#00fff5;}
        .banner-nav .nav-btn{background:transparent;border:1px solid #00fff5;color:#00fff5;padding:6px 16px;font-family:'Orbitron',monospace;font-size:10px;letter-spacing:2px;text-decoration:none;transition:all .2s;margin-left:4px;}
        .banner-nav .nav-btn:hover{background:#00fff5;color:#020809;}
        .nav-search-input{background:#050f10;border:1px solid rgba(0,255,245,0.3);color:#fff;padding:5px 10px;font-family:'Orbitron',monospace;font-size:9px;letter-spacing:0.1em;border-radius:3px;width:130px;outline:none;}
        .nav-search-input:focus{border-color:#00fff5;}
        .nav-search-btn{background:transparent;border:1px solid rgba(0,255,245,0.4);color:#00fff5;padding:5px 10px;font-family:'Orbitron',monospace;font-size:9px;letter-spacing:0.1em;cursor:pointer;border-radius:3px;transition:all .2s;}
        .nav-search-btn:hover{background:#00fff5;color:#020809;}
        @media(max-width:640px){.miku-hud-bubble{display:none}.miku-name-large{font-size:14px}.banner-nav a:not(.nav-btn){display:none}.nav-search-input{width:80px}}
    </style>
</head>
<body>
    <div class="scanline"></div>

    <div class="miku-banner">
        <div class="banner-hex"></div>
        <div class="banner-sweep"></div>
        <div class="banner-edge"></div>
        <div class="banner-bracket banner-bracket--tl"></div>
        <div class="banner-bracket banner-bracket--tr"></div>
        <div class="banner-bracket banner-bracket--bl"></div>
        <div class="banner-bracket banner-bracket--br"></div>
        <div class="miku-hud-bubble">
            <span class="hud-label">// STATUS MSG //</span>
            <span class="hud-msg">WELCOME BACK <span class="msg-jp">おかえりなさい</span></span>
        </div>
        <div class="banner-content-wrapper">
            <div class="miku-avatar-wrap">
                <a href="/dashboard" class="miku-avatar-circle" style="background-image:url('https://yt3.ggpht.com/uID6cx88KTW8H3-TXlYWM3_JTWYEV1LVAQi3CipPEn7SoOQy99NmAJYRXyvENIahdDSgHMPSlQ=s600-c-k-c0x00ffffff-no-rj-rp-mo');"></a>
                <div class="avatar-ring"></div>
                <div class="avatar-ring avatar-ring--2"></div>
                <div class="avatar-status"></div>
            </div>
            <div class="banner-text-info">
                <div class="miku-name-row">
                    <span class="miku-name-large flicker">初音ミク CAFE</span>
                    <span class="miku-name-jp">SECOND LIFE</span>
                </div>
                <div class="miku-meta-info">
                    <span class="meta-item meta-handle">◈ TRINITY REGION</span>
                    <span class="meta-item">◈ 3,000+ MEMBERS</span>
                    <span class="meta-item">◈ SINCE 2022</span>
                    <span class="meta-item">◈ POWERED BY LARAVEL {{ app()->version() }}</span>
                </div>
            </div>
        </div>
        <div class="banner-nav">
            <input class="nav-search-input" id="nav-q" type="text" placeholder="SEARCH..." onkeydown="if(event.key==='Enter'){window.location.href='/searchkit.html?q='+encodeURIComponent(this.value);}">
            <button class="nav-search-btn" onclick="window.location.href='/searchkit.html?q='+encodeURIComponent(document.getElementById('nav-q').value);">GO</button>
            <a href="/posts">News</a>
            <a href="/reviews">Reviews</a>
            @auth
                <a href="/dashboard" class="nav-btn">Dashboard</a>
            @else
                <a href="/login" class="nav-btn">Login</a>
            @endauth
        </div>
    </div>

    <section class="hero-bg min-h-screen flex flex-col items-center justify-center text-center px-6 relative">
        <div class="float mb-8">
            <img src="https://yt3.ggpht.com/uID6cx88KTW8H3-TXlYWM3_JTWYEV1LVAQi3CipPEn7SoOQy99NmAJYRXyvENIahdDSgHMPSlQ=s600-c-k-c0x00ffffff-no-rj-rp-mo"
                 alt="Hatsune Miku"
                 style="width:160px;height:160px;border-radius:50%;border:2px solid #00fff5;box-shadow:0 0 30px rgba(0,255,245,0.4);">
        </div>
        <p style="font-family:'Orbitron',monospace;font-size:11px;letter-spacing:0.4em;color:rgba(0,255,245,0.6);" class="mb-4">◈ SECOND LIFE ANIME SIMULATION ◈</p>
        <p style="font-family:'Orbitron',monospace;font-size:13px;letter-spacing:0.3em;color:rgba(0,255,245,0.8);margin-bottom:8px;">⚡ POWERED BY LARAVEL {{ app()->version() }}</p>
        <h1 style="font-family:'Orbitron',monospace;font-weight:900;line-height:1.1;" class="text-4xl md:text-6xl mb-4">
            <span class="neon-text flicker">HATSUNE MIKU</span><br>
            <span style="color:white;font-size:0.6em;letter-spacing:0.3em;">CAFE</span>
        </h1>
        <p style="font-family:'Rajdhani',sans-serif;font-size:18px;color:#9ca3af;max-width:500px;letter-spacing:0.05em;" class="mb-10">
            A virtual anime café experience in Second Life. Join our community of 3,000+ members in Trinity Region.
        </p>
        <div class="flex gap-4 flex-wrap justify-center mb-10">
            <a href="https://maps.secondlife.com/secondlife/Trinity/43/56/311" target="_blank" class="neon-btn">TELEPORT IN</a>
            <a href="#latest" class="neon-btn" style="border-color:rgba(255,255,255,0.2);color:rgba(255,255,255,0.6);">↓ LATEST POSTS</a>
        </div>
        <p style="font-family:'Orbitron',monospace;font-size:10px;letter-spacing:0.3em;color:rgba(0,255,245,0.3);">
            📍 TRINITY REGION · 43, 56, 311
        </p>
    </section>

    <section style="border-top:1px solid rgba(0,255,245,0.1);border-bottom:1px solid rgba(0,255,245,0.1);background:#050f10;" class="py-12">
        <div class="max-w-4xl mx-auto grid grid-cols-3 gap-8 text-center px-6">
            <div>
                <p style="font-family:'Orbitron',monospace;font-size:32px;font-weight:900;" class="neon-text">3K+</p>
                <p style="font-family:'Rajdhani',sans-serif;font-size:13px;letter-spacing:0.2em;color:#6b7280;" class="mt-1">MEMBERS</p>
            </div>
            <div>
                <p style="font-family:'Orbitron',monospace;font-size:32px;font-weight:900;" class="neon-text">2022</p>
                <p style="font-family:'Rajdhani',sans-serif;font-size:13px;letter-spacing:0.2em;color:#6b7280;" class="mt-1">FOUNDED</p>
            </div>
            <div>
                <p style="font-family:'Orbitron',monospace;font-size:32px;font-weight:900;" class="neon-text">24/7</p>
                <p style="font-family:'Rajdhani',sans-serif;font-size:13px;letter-spacing:0.2em;color:#6b7280;" class="mt-1">ONLINE</p>
            </div>
        </div>
    </section>

    <section id="latest" class="max-w-4xl mx-auto px-6 py-20">
        <div class="flex justify-between items-center mb-10">
            <div>
                <h2 style="font-family:'Orbitron',monospace;font-size:20px;font-weight:700;" class="neon-text">LATEST_POSTS</h2>
                <p style="font-family:'Rajdhani',sans-serif;font-size:13px;letter-spacing:0.2em;color:#6b7280;" class="mt-1">RECENT TRANSMISSIONS</p>
            </div>
            <a href="/posts" style="font-family:'Rajdhani',sans-serif;font-size:12px;letter-spacing:0.2em;color:#00fff5;" class="hover:underline uppercase">View All →</a>
        </div>
        <div class="flex flex-col gap-8">
            @foreach(\App\Models\Post::where('published', true)->latest()->take(6)->get() as $post)
            @php
                $body = $post->body;
                $youtubeId = null;
                if (preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $body, $matches)) {
                    $youtubeId = $matches[1];
                    $body = preg_replace('/https?:\/\/(www\.)?(youtube\.com\/watch\?v=|youtu\.be\/)[^\s]+/', '', $body);
                }
            @endphp
            <div class="cyber-card rounded-lg overflow-hidden">
                @if($youtubeId)
                <div class="video-wrap">
                    <iframe src="https://www.youtube.com/embed/{{ $youtubeId }}"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
                @endif
                <div class="p-6">
                    <div class="flex items-center gap-3 mb-3">
                        <span class="tag" style="background:rgba(0,255,245,0.1);color:#00fff5;border:1px solid rgba(0,255,245,0.3);">{{ strtoupper($post->category) }}</span>
                        <span style="font-family:'Rajdhani',sans-serif;font-size:12px;color:#6b7280;">{{ $post->created_at->diffForHumans() }}</span>
                    </div>
                    <h3 style="font-family:'Rajdhani',sans-serif;font-size:20px;font-weight:600;color:white;" class="mb-3">
                        <a href="/posts/{{ $post->id }}" class="hover:text-cyan-400 transition">{{ $post->title }}</a>
                    </h3>
                    <p style="font-family:'Rajdhani',sans-serif;font-size:14px;color:#6b7280;line-height:1.7;white-space:pre-wrap;">{{ Str::limit(trim($body), 200) }}</p>
                    <a href="/posts/{{ $post->id }}" style="font-family:'Rajdhani',sans-serif;font-size:12px;letter-spacing:0.15em;color:#00fff5;" class="hover:underline uppercase mt-4 inline-block">Read More →</a>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <footer style="border-top:1px solid rgba(0,255,245,0.1);background:#050f10;" class="py-10 text-center">
        <p style="font-family:'Orbitron',monospace;font-size:12px;letter-spacing:0.3em;" class="neon-text">HATSUNE MIKU CAFE © 2026</p>
        <p style="font-family:'Rajdhani',sans-serif;font-size:12px;letter-spacing:0.2em;color:#374151;" class="mt-2">SECOND LIFE ANIME SIMULATION · TRINITY REGION</p>
        <div class="flex justify-center gap-6 mt-4">
            <a href="https://youtube.com/@hatsunemikucafe" target="_blank" style="font-family:'Rajdhani',sans-serif;font-size:12px;letter-spacing:0.15em;color:#6b7280;" class="hover:text-cyan-400 transition uppercase">YouTube</a>
            <a href="https://hatsunemikucv01.com" target="_blank" style="font-family:'Rajdhani',sans-serif;font-size:12px;letter-spacing:0.15em;color:#6b7280;" class="hover:text-cyan-400 transition uppercase">Main Site</a>
            <a href="https://maps.secondlife.com/secondlife/Trinity/43/56/311" target="_blank" style="font-family:'Rajdhani',sans-serif;font-size:12px;letter-spacing:0.15em;color:#6b7280;" class="hover:text-cyan-400 transition uppercase">Second Life</a>
        </div>
    </footer>
</body>
</html>
ENDOFFILEphp ~/animegames.app/artisan route:list

