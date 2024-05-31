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
        <div class="container mx-auto px-4">
            <h1 class="text-4xl mt-6 tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-6xl">Create Post</h1>
            <p class="text-lg mt-2 text-gray-600">Start crafting your new post below.</p>
            <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                <form wire:submit="save" >   
                    <div class="sm:col-span-6">
                        <label for="title" class="block text-sm font-medium text-gray-700">
                        Post Title
                        </label>
                        <div class="mt-1">
                            <input id="title" wire:model="title" name="title" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                            @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="sm:col-span-6">
                        <label for="title" class="block text-sm font-medium text-gray-700">
                        Access:
                        </label>
                        <div class="mt-1 flex items-center">
                            <input wire:model="access" type="radio" id="access-public" value="public" class="mr-2 w-4 h-4 border-gray-300 rounded-sm bg-gray-100 focus:ring-indigo-500 focus:ring-w-2" name="access" checked>
                            <label for="access-public" class="text-sm font-medium text-gray-700">Public</label>
                            <input wire:model="access" type="radio" id="access-private" value="private" class="ml-4 w-4 h-4 border-gray-300 rounded-sm bg-gray-100 focus:ring-indigo-500 focus:ring-w-2" name="access">
                            <label for="access-private" class="text-sm font-medium text-gray-700">Private</label>
                            @error('access') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="sm:col-span-6">
                        <label for="image" class="block text-sm font-medium text-gray-700">
                        Images:
                        </label>
                        <div class="mt-1">
                            <input type="file" wire:model="image">
                            @error('image') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="sm:col-span-6 pt-5">
                        <label for="body" class="block text-sm font-medium text-gray-700">Body</label>
                        <div class="mt-1">
                            <textarea id="body" rows="3" wire:model="body" class="shadow-sm focus:ring-indigo-500 appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                            @error('body') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <p class="mt-2 text-sm text-gray-500">Add the body for your post.</p>
                        </div>
                    </div>
                    <button type="submit" class="inline-flex justify-center px-4 py-2 text-sm font-medium leading-5 text-white transition duration-150 ease-in-out bg-indigo-500 border border-transparent rounded-md hover:bg-indigo-600 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 cursor-pointer">Submit Post</button>
                </form>
            </div>
        </div>
    @endif
</div>
