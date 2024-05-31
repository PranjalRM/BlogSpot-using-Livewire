<div class="user-blogs mt-10 max-w-xl mx-auto">
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if ($postId)
        <form wire:submit.prevent="updatePost" class="mb-10">   
            <div class="sm:col-span-6">
                <label for="editTitle" class="block text-sm font-medium text-gray-700">Post Title</label>
                <div class="mt-1">
                    <input id="editTitle" wire:model="editTitle" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal sm:text-sm sm:leading-5">
                    @error('editTitle') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="sm:col-span-6 mt-4">
                <label for="editAccess" class="block text-sm font-medium text-gray-700">Access</label>
                <div class="mt-1 flex items-center">
                    <input wire:model="editAccess" type="radio" id="access-public" value="public" class="mr-2 w-4 h-4 border-gray-300 rounded-sm bg-gray-100 focus:ring-indigo-500 focus:ring-w-2 " name="editAccess">
                    <label for="access-public" class="text-sm font-medium text-gray-700">Public</label>
                    <input wire:model="editAccess" type="radio" id="access-private" value="private" class="ml-4 w-4 h-4 border-gray-300 rounded-sm bg-gray-100 focus:ring-indigo-500 focus:ring-w-2" name="editAccess">
                    <label for="access-private" class="text-sm font-medium text-gray-700">Private</label>
                    @error('editAccess') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="sm:col-span-6 mt-4">
                <label for="editImage" class="block text-sm font-medium text-gray-700">Images</label>
                <div class="mt-1">
                    <input type="file" wire:model="editImage">
                    @error('editImage') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="sm:col-span-6 pt-5">
                <label for="editBody" class="block text-sm font-medium text-gray-700">Body</label>
                <div class="mt-1">
                    <textarea id="editBody" rows="3" wire:model="editBody" class="shadow-sm focus:ring-indigo-500 appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out focus:border-indigo-500 block w-full sm:text-sm"></textarea>
                    @error('editBody') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <p class="mt-2 text-sm text-gray-500">Add the body for your post.</p>
            </div>
            <button type="submit" class="inline-flex justify-center px-4 py-2 text-sm font-medium leading-5 text-white transition duration-150 ease-in-out bg-indigo-500 border border-transparent rounded-md hover:bg-indigo-600 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 cursor-pointer mt-4">Update Post</button>
        </form>
    @endif

    @if (is_null($postId))
        @forelse ($posts as $post)

            <div class="blog-post border-b mb-5 pb-5 border-gray-200 flex items-center">
                <a href="/post/{{ $post->id }}" class="text-3xl font-bold mb-0 block">{{ $post->title }}</a>

                <div class="flex ml-auto">
                    <button wire:click="editPost({{ $post->id }})" class="inline-flex justify-center px-4 py-2 text-sm font-medium leading-5 text-white transition duration-150 ease-in-out bg-indigo-500 border border-transparent rounded-md hover:bg-indigo-600 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 cursor-pointer mr-2">Edit</button>
                    <button wire:click="delete({{ $post->id }})" class="inline-flex justify-center px-4 py-2 text-sm font-medium leading-5 text-white transition duration-150 ease-in-out bg-red-500 border border-transparent rounded-md hover:bg-red-600 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-700 cursor-pointer">Delete</button>
                </div>
            </div>
        @empty
        <p>No blog posts found.</p>
        @endforelse
    @endif

</div>
