<div class="relative" x-data="{ open: false }">
    <button @click="open = !open" class="inline-flex justify-center px-4 py-2 text-sm font-medium leading-5 text-white transition duration-150 ease-in-out bg-indigo-500 border border-transparent rounded-md hover:bg-indigo-600 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 cursor-pointer">
        Hi, {{ Auth::user()->name }}
    </button>

    <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white border border-gray-300 rounded shadow-lg z-10">
        <div class="py-1">
            <x-format.anchor :route="route('profile.edit')" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">
                Edit Profile
            </x-format.anchor>
            <x-format.anchor :route="route('logout')" submit="true" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">
                Logout
            </x-format.anchor>
        </div>
    </div>
</div>
