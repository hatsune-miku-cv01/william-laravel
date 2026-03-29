<x-app-layout>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8">
                <h1 class="font-orbitron text-2xl font-black neon-text tracking-widest">NEW_POST</h1>
                <p class="font-rajdhani text-gray-500 text-sm tracking-widest mt-1">CREATE TRANSMISSION</p>
            </div>
            <div class="cyber-card rounded-lg p-8">
                <form method="POST" action="{{ route('posts.store') }}">
                    @csrf
                    <div class="mb-6">
                        <label class="font-rajdhani text-xs tracking-widest uppercase text-gray-500 block mb-2">Title</label>
                        <input type="text" name="title" value="{{ old('title') }}" class="w-full rounded font-rajdhani text-white p-3 text-sm tracking-wide" style="background:#050f10; border:1px solid rgba(0,255,245,0.2); outline:none;" required>
                        @error('title')<p class="text-red-400 text-xs mt-1 font-rajdhani">{{ $message }}</p>@enderror
                    </div>
                    <div class="mb-6">
                        <label class="font-rajdhani text-xs tracking-widest uppercase text-gray-500 block mb-2">Category</label>
                        <select name="category" class="w-full rounded font-rajdhani text-white p-3 text-sm" style="background:#050f10; border:1px solid rgba(0,255,245,0.2);">
                            <option value="news">News</option>
                            <option value="event">Event</option>
                            <option value="update">Update</option>
                            <option value="community">Community</option>
                        </select>
                    </div>
                    <div class="mb-6">
                        <label class="font-rajdhani text-xs tracking-widest uppercase text-gray-500 block mb-2">Content</label>
                        <textarea name="body" rows="10" class="w-full rounded font-rajdhani text-white p-3 text-sm leading-relaxed" style="background:#050f10; border:1px solid rgba(0,255,245,0.2); outline:none;" required>{{ old('body') }}</textarea>
                        @error('body')<p class="text-red-400 text-xs mt-1 font-rajdhani">{{ $message }}</p>@enderror
                    </div>
                    <div class="mb-6 flex items-center gap-3">
                        <input type="checkbox" name="published" id="published" value="1" class="accent-cyan-400">
                        <label for="published" class="font-rajdhani text-sm text-gray-400 tracking-wide">Publish immediately</label>
                    </div>
                    <div class="flex items-center gap-4">
                        <button type="submit" class="neon-btn font-rajdhani text-xs tracking-widest uppercase px-6 py-3 rounded">TRANSMIT POST</button>
                        <a href="{{ route('posts.index') }}" class="font-rajdhani text-xs text-gray-600 hover:text-gray-400 tracking-widest uppercase">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
