<!-- resources/views/profile.blade.php -->
<div class="container mx-auto p-4">
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
        @if (session()->has('message'))
            <x-auth.alert type="success">{{ session('message') }}</x-alert>
        @elseif (session()->has('error'))
            <x-auth.alert type="error">{{ session('error') }}</x-alert>
        @endif

        <h2 class="text-xl font-bold mb-4">Edit Profile</h2>
        <form wire:submit.prevent="updateProfileAndPassword">
            <x-auth.profile-form id="name" type="text" model="name" label="Name"></x-auth.profile-form>
            <x-auth.profile-form id="email" type="email" model="email" label="Email"></x-auth.profile-form>

            <h2 class="text-xl font-bold mb-4 mt-8">Change Password</h2>
            <x-auth.profile-form id="current_password" name="password" type="password" model="current_password" label="Current Password"></x-auth.profile-form>
            <x-auth.profile-form id="new_password" name="password" type="password" model="new_password" label="New Password"></x-auth.profile-form>
            <x-auth.profile-form id="new_password_confirmation" name="password" type="password" model="new_password_confirmation" label="Confirm New Password"></x-auth.profile-form>
            <x-auth.form-submit>Update Profile and Change Password</x-auth.form-submit>
        </form>
    </div>
</div>

<script>
    window.addEventListener('logout', () => {
        setTimeout(() => {
            @this.call('logoutUser');
        }, 3000); // 3-second delay before logging out
    });
</script>
