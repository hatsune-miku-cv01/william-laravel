<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Header -->
            <div class="mb-10 flex justify-between items-center">
                <div>
                    <h1 class="font-orbitron text-3xl font-black neon-text tracking-widest">NEWS_FEED</h1>
                    <p class="font-rajdhani text-gray-500 tracking-widest text-sm mt-1">HATSUNE MIKU CAFE · SECOND LIFE</p>
                </div>
                @auth
                    <a href="{{ route('posts.create') }}" class="neon-btn font-rajdhani text-xs tracking-widest uppercase px-4 py-2 rounded">+ NEW POST</a>
                @endauth
            </div>

            @if(session('success'))
                <div class="mb-6 p-4 rounded font-rajdhani text-sm tracking-wide" style="background:rgba(0,255,245,0.1); border:1px solid #00fff5; color:#00fff5;">
                    ✓ {{ session('success') }}
                </div>
            @endif

            <!-- Posts Grid -->
            <div class="grid gap-4">
                @forelse($posts as $post)
                    <div class="cyber-card rounded-lg p-6">
                        <div class="flex justify-between items-start">
                            <div class="flex-1">
                                <div class="flex items-center gap-3 mb-2">
                                    <span class="font-orbitron text-xs px-2 py-1 rounded" style="background:rgba(0,255,245,0.1); color:#00fff5; border:1px solid rgba(0,255,245,0.3);">
                                        {{ strtoupper($post->category) }}
                                    </span>
                                    <span class="font-rajdhani text-xs text-gray-600 tracking-wide">{{ $post->created_at->diffForHumans() }}</span>
                                </div>
                                <h3 class="font-rajdhani text-xl font-semibold text-white mb-2 tracking-wide">
                                    <a href="{{ route('posts.show', $post) }}" class="hover:text-cyan-400 transition">{{ $post->title }}</a>
                                </h3>
                                <p class="font-rajdhani text-gray-500 text-sm leading-relaxed">{{ Str::limit($post->body, 150) }}</p>
                                <p class="font-rajdhani text-xs text-gray-600 mt-3 tracking-widest">BY {{ strtoupper($post->user->name) }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="cyber-card rounded-lg p-12 text-center">
                        <p class="font-orbitron text-gray-600 text-sm tracking-widest">NO_DATA_FOUND</p>
                        <p class="font-rajdhani text-gray-700 text-sm mt-2">Be the first to post!</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-8 font-rajdhani">{{ $posts->links() }}</div>
        </div>
    </div>
</x-app-layout>
