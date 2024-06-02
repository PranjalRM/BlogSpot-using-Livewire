<div class="user-blogs mt-10 max-w-xl mx-auto">
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg ">
        @if (session()->has('message'))
            <x-auth.alert type="success">{{ session('message') }}</x-alert>
        @endif
    </div>
    @if ($postId)
        <form wire:submit.prevent="updatePost" class="mb-10">
            <x-display.post-display label="Edit Title" name="editTitle" />
            <x-auth.form-radio-input label=" Edit Access" name="editAccess" :options="[['label' => 'Public', 'value' => 'public'], ['label' => 'Private', 'value' => 'private']]" />
            <x-auth.form-file-input label="Images" name="editImage" />
            <x-display.post-area label="Edit Body" name="editBody" rows="3"/>
            <x-auth.form-submit>Update Post</x-auth.form-submit>
        </form>
    @endif

    @if (is_null($postId))
        @forelse ($posts as $post)
        
            <div class="blog-post border-b mb-5 pb-5 border-gray-200 flex items-center">
                <a href="/post/{{ $post->id }}" class="text-3xl font-bold mb-0 block">{{ $post->title }}</a>

                <div class="flex ml-auto">
                    <button wire:click="editPost({{ $post->id }})" class="inline-flex justify-center px-4 py-2 text-sm font-medium leading-5 text-white transition duration-150 ease-in-out bg-indigo-500 border border-transparent rounded-md hover:bg-indigo-600 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 cursor-pointer mr-2">Edit</button>
                </div>  
                    <button wire:click="delete({{ $post->id }})" class="inline-flex justify-center px-4 py-2 text-sm font-medium leading-5 text-white transition duration-150 ease-in-out bg-red-500 border border-transparent rounded-md hover:bg-red-600 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-700 cursor-pointer">
                    Delete
                    </button>
            </div>  
        @empty
        <div class="flex justify-center">
            <p>No blog posts found.</p>
        </div>
        @endforelse
    @endif
    
        {{-- <script src="{{ asset('js/deletePost.js') }}"></script> --}}
 
</div>

