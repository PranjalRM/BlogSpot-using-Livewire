@props(['label', 'name', 'type' => 'text'])

<div class="sm:col-span-6 mb-4">
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
    <div class="mt-1">
        <input type="{{ $type }}" id="{{ $name }}" wire:model="{{ $name }}" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal sm:text-sm sm:leading-5">
        @error($name) <span class="text-red-500">{{ $message }}</span> @enderror
    </div>
</div>
