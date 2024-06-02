@props(['label', 'name', 'options'])

<div class="sm:col-span-6 mt-4">
    <label class="block text-sm font-medium text-gray-700">{{ $label }}</label>
    <div class="mt-1 flex items-center">
        @foreach($options as $option)
            <input wire:model="{{ $name }}" type="radio" id="{{ $name }}-{{ $option['value'] }}" value="{{ $option['value'] }}" class="mr-2 w-4 h-4 border-gray-300 rounded-sm bg-gray-100 focus:ring-indigo-500 focus:ring-w-2 ml-4" name="{{ $name }}">
            <label for="{{ $name }}-{{ $option['value'] }}" class="text-sm font-medium text-gray-700">{{ $option['label'] }}</label>
        @endforeach
        @error($name) <span class="text-red-500">{{ $message }}</span> @enderror
    </div>
</div>
