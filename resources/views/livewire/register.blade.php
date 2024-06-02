<x-auth.form-all title="Register" message="Register to view or create blogs." action="register">
    <x-auth.form-input label="Name" name="name" placeholder="Enter your name"/>
    <x-auth.form-input label="Email" name="email" type="email" placeholder="Enter your email"/>
    <x-auth.form-input label="Password" name="password" type="password" placeholder="Enter your password"/>
    <x-auth.form-input label="Confirm Password" name="password_confirmation" type="password" placeholder="Confirm Password"/>
    <x-auth.form-submit>Register</x-auth.form-submit>
    <x-slot name="link">
        Already registered? <x-format.anchor route="{{ route('login') }}" class="font-medium text-blue-600 hover:text-blue-500">Log in now!</x-format.anchor>
    </x-slot>
</x-auth.form-all>
