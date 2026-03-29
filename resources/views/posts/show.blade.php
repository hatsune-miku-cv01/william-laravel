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
                <div class="font-rajdhani text-gray-300 leading-relaxed text-base whitespace-pre-wrap border-t border-gray-800 pt-8">{{ $post->body }}</div>

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
