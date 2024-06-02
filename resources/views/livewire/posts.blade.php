<div>
    @if ($post && $post->exists)
        <div class="max-w-4xl mx-auto py-10 prose lg:prose-xl">
            <h1 class="text-center font-bold text-5xl mb-8">{{ $post->title }}</h1>
            <div class="prose lg:prose-xl">
                <p class="text-l">{!! $post->body !!}</p>
            </div>
            @if ($post->image)
                <div class="flex justify-center mb-8">
                <img id="post-image" src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="w-1/2 cursor-pointer rounded transition-all duration-300">
                </div>
            @endif
        </div>
        <script src="{{ asset('js/image-toggle.js') }}"></script>  

    @else
        <x-auth.form-all title="Create Post" message="Start crafting your post below." action="save">  
            <x-auth.form-input label="Post Title" name="title" placeholder="Enter the title of Blog" />
            <x-auth.form-radio-input label=" Access" name="access" :options="[['label' => 'Public', 'value' => 'public'], ['label' => 'Private', 'value' => 'private']]" />
            <x-auth.form-file-input label="Images" name="image" />
            <x-display.post-area label="Edit Body" name="body" rows="3" placeholder="Enter the content of Blog" />
            <x-auth.form-submit>Submit Post</x-auth.form-submit>
        </x-auth.form-all>
    @endif
</div>
