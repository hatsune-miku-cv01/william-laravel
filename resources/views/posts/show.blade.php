<x-app-layout>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="cyber-card rounded-lg p-8">
                <div class="flex items-center gap-3 mb-4">
                    <span class="font-orbitron text-xs px-2 py-1 rounded" style="background:rgba(0,255,245,0.1); color:#00fff5; border:1px solid rgba(0,255,245,0.3);">
                        {{ strtoupper($post->category) }}
                    </span>
                    <span class="font-rajdhani text-xs text-gray-600 tracking-wide">{{ $post->created_at->diffForHumans() }}</span>
                </div>
                <h1 class="font-rajdhani text-3xl font-bold text-white mb-2 tracking-wide">{{ $post->title }}</h1>
                <p class="font-rajdhani text-xs text-gray-600 tracking-widest mb-8">BY {{ strtoupper($post->user->name) }}</p>

                @php
                    $body = $post->body;
                    $youtubeId = null;
                    if (preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $body, $matches)) {
                        $youtubeId = $matches[1];
                        $body = preg_replace('/https?:\/\/(www\.)?(youtube\.com\/watch\?v=|youtu\.be\/)[^\s]+/', '', $body);
                    }
                @endphp

                @if($youtubeId)
                <div class="mb-8 rounded-lg overflow-hidden" style="border:1px solid rgba(0,255,245,0.2);">
                    <div style="position:relative; padding-bottom:56.25%; height:0;">
                        <iframe
                            src="https://www.youtube.com/embed/{{ $youtubeId }}"
                            style="position:absolute; top:0; left:0; width:100%; height:100%;"
                            frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>
                @endif

                <div class="font-rajdhani text-gray-300 leading-relaxed text-base whitespace-pre-wrap border-t border-gray-800 pt-8">{{ trim($body) }}</div>

                @auth
                    @if(auth()->id() === $post->user_id)
                        <div class="mt-8 flex gap-4 border-t border-gray-800 pt-6">
                            <a href="{{ route('posts.edit', $post) }}" class="neon-btn font-rajdhani text-xs tracking-widest uppercase px-4 py-2 rounded">Edit</a>
                            <form method="POST" action="{{ route('posts.destroy', $post) }}">
                                @csrf @method('DELETE')
                                <button type="submit" class="font-rajdhani text-xs tracking-widest uppercase px-4 py-2 rounded transition" style="border:1px solid rgba(248,113,113,0.4); color:#f87171;" onclick="return confirm('Delete this post?')">Delete</button>
                            </form>
                        </div>
                    @endif
                @endauth

                <div class="mt-6">
                    <a href="{{ route('posts.index') }}" class="font-rajdhani text-xs text-gray-600 hover:text-cyan-400 tracking-widest uppercase transition">← BACK TO NEWS</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
