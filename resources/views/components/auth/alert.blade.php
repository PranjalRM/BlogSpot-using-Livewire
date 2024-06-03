@props(['type' => 'success', ])

<div class="{{ $type === 'success' ? 'bg-green-500' : 'bg-red-500' }} text-white p-2 rounded mb-4">
    {{ $slot }}
</div>
