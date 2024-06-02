@props(['label', 'name','placeholder' => '', 'rows' => 3])

<div class="sm:col-span-6 pt-5">
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
    <div class="mt-1">
        <textarea id="{{ $name }}" rows="{{ $rows }}" wire:model="{{ $name }}" placeholder="{{ $placeholder }}" class="shadow-sm focus:ring-indigo-500 appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out focus:border-indigo-500 block w-full sm:text-sm" ></textarea>
        @error($name) <span class="text-red-500">{{ $message }}</span> @enderror
    </div>
</div>
