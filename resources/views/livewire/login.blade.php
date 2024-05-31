<div>
    <div class="container mx-auto px-4">
        <h1 class="text-4xl mt-6 tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-6xl">Log In</h1>
        <p class="text-lg mt-2 text-gray-600">Log in to view or create blogs.</p>
            <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                <form wire:submit.prevent="login">
                    @csrf
                    <div class="sm:col-span-6">
                        <label for="email" >Email</label>
                            <div class="mt-1">
                                <input type="email" id="email" wire:model="email" required autofocus>
                                 @error('email') <span class="error">{{ $message }}</span> @enderror
                            </div>
                    </div>

                    <div class="sm:col-span-6 pt-5">
                        <label for="password">Password</label>
                            <div class="mt-1">
                                <input type="password" id="password" wire:model="password" placeholder="Enter password" required>
                                <button id="togglePassword">show</button>
                                @error('password') <span class="error">{{ $message }}</span> @enderror
                            </div>
                            <script src="{{ asset('js/pass.js') }}"></script>
                    </div>

                    <div class="sm:col-span-6 pt-5">
                         <label for="remember">
                            <input type="checkbox" id="remember" wire:model="remember">
                            Remember Me
                         </label>
                     </div>

                    <div class="sm:col-span-6 pt-10">
                        <button type="submit" class="inline-flex justify-center px-4 py-2 text-sm font-medium leading-5 text-white transition duration-150 ease-in-out bg-indigo-500 border border-transparent rounded-md hover:bg-indigo-600 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 cursor-pointer">Login</button>
                    </div>
                </form>
            <div>
        <p class="mt-2 text-center text-lg text-gray-600">
            Don't have an account?  <a href="{{ route('register') }}" class="font-medium text-blue-600 hover:text-blue-500">Create one now!!</a>
    </div>
</div>