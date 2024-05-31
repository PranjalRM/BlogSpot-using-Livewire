<div class="container mx-auto p-4">
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
        @if (session()->has('message'))
            <div class="bg-green-500 text-white p-2 rounded mb-4">
                {{ session('message') }}
            </div>
        @endif
        @if ($activeForm == 'profile')
            <h2 class="text-xl font-bold mb-4">Edit Profile</h2>
            <form wire:submit.prevent="updateProfile">
                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Name</label>
                    <input type="text" id="name" wire:model="name" class="w-full p-2 border border-gray-300 rounded">
                    @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Email</label>
                    <input type="email" id="email" wire:model="email" class="w-full p-2 border border-gray-300 rounded">
                    @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded">Update Profile</button>
            </form>
        @endif

        @if ($activeForm == 'password')
            <h2 class="text-xl font-bold mb-4 mt-8">Change Password</h2>
            <form wire:submit.prevent="updatePassword">
                @csrf
                <div class="mb-4">
                    <label for="current_password" class="block text-gray-700">Current Password</label>
                    <input type="password" id="current_password" wire:model="current_password" class="w-full p-2 border border-gray-300 rounded">
                    @error('current_password') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="new_password" class="block text-gray-700">New Password</label>
                    <input type="password" id="new_password" wire:model="new_password" class="w-full p-2 border border-gray-300 rounded">
                    @error('new_password') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label for="new_password_confirmation" class="block text-gray-700">Confirm New Password</label>
                    <input type="password" id="new_password_confirmation" wire:model="new_password_confirmation" class="w-full p-2 border border-gray-300 rounded">
                </div>
                <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded">Change Password</button>
            </form>
        @endif
    </div>
</div>
