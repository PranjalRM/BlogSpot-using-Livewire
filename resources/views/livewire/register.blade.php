<div>
    <div class="container mx-auto px-4">
        <h1 class="text-4xl mt-6 tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-6xl">Register</h1>
        <p class="text-lg mt-2 text-gray-600">Register to view or create blogs.</p>
            <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">

                @if (session()->has('message'))
                    <div class="alert alert-success">
                     {{ session('message') }}
                    </div>
                 @endif

                <form wire:submit.prevent="register">
                <!-- Name -->
                <div class="sm::col-span-6 mt-4">
                    <label for="name">Name</label>
                        <div class="mt-1">
                            <input type="text" id="name" wire:model="name" class="block mt-1 w-full"  name="name" required autofocus autocomplete="name" />
                            @error('name') <span class="error">{{ $message }}</span> @enderror
                        </div>
                </div>
            
                <!-- Email Address -->
                 <div class="sm:col-span-6 mt-4">
                    <label for="email" >Email</label>
                        <div class="mt-1">
                            <input type="email" id="email" wire:model="email" class="block mt-1 w-full" name="email" required autocomplete="username">
                            @error('email') <span class="error">{{ $message }}</span> @enderror
                        </div>
                </div>
            
                <!-- Password -->
                <div class="sm:col-span-6 mt-4">
                    <label for="password">Password</label>
                        <div class="mt-1">
                             <input wire:model="password" id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
                                    
                        </div>
                </div>
            
                <!-- Confirm Password -->
                <div class="mt-4">
                    <label for="password_confirmation">Confirm Password</label>
                        <div class="mt-1">
                            <input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password" />
                            
                        </div>
                </div>
                
                <div class="sm:col-span-6 pt-10">
                    <button type="submit" class="inline-flex justify-center px-4 py-2 text-sm font-medium leading-5 text-white transition duration-150 ease-in-out bg-indigo-500 border border-transparent rounded-md hover:bg-indigo-600 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 cursor-pointer">Register</button>
                </div>
                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-lg text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}" wire:navigate>
                        {{ __('Already registered?') }}
                    </a>
                </div>
                </form>
        </div>
    </div>
</div>
