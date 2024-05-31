<div class="mt-10 max-w-xl mx-auto">
    @foreach($posts as $post)
        <div class="border-b mb-5 pb-5 border-gray-200 flex items-start">
            @if($post->image)
                <div class="mr-4">
                    <a href="/post/{{ $post->id }}">
                        <img src="{{ asset($post->image) }}" alt="{{ $post->image }}" class="w-16 h-16 object-cover rounded-full">
                    </a>
                    </div>
            @endif
            <div>
                <a href="/post/{{ $post->id }}" class="text-3xl font-bold mb-4 block">{{ $post->title }}</a>
                <p class="text-lg">{{ Str::limit($post->body, 100) }}</p>
            </div>
        </div>
    @endforeach
    <div class="mt-10">
        {{ $posts->links() }}
    </div>
</div>
