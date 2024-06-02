@props(['label', 'name'])

<div class="sm:col-span-6 mt-4">
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
    <div class="mt-1">
        <input type="file" wire:model="{{ $name }}">
        @error($name) <span class="text-red-500">{{ $message }}</span> @enderror
    </div>
</div>
