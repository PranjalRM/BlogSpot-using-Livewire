<x-auth.form-all title="Log In" message="Log in to view or create blogs." action="login">
    <x-auth.form-input label="Email" name="email" type="email" placeholder="Enter email" autofocus />
    <x-auth.form-input label="Password" name="password" type="password" placeholder="Enter password" />
    <x-auth.form-checkbox label="Remember Me" name="remember" />
    <x-auth.form-submit>Login</x-auth.form-submit>
    <x-slot name="link">
        Don't have an account? <x-format.anchor route="{{ route('register') }}" class="font-medium text-blue-600 hover:text-blue-500">Create one now!!</x-format.anchor>
    </x-slot>
</x-auth.form-all>