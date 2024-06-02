@props(['label', 'name', 'type' => 'text', 'placeholder' => '', 'autofocus' => false])

<div class="sm::col-span-6 mt-4">
    <label for="{{ $name }}">{{ $label }}</label>
    <div class="mt-3 relative rounded-lg shadow-sm">
        <input id="{{ $name }}" name="{{ $name }}" type="{{ $type }}" placeholder="{{ $placeholder }}"
            @if($autofocus) autofocus @endif wire:model="{{ $name }}"
            class="block w-full pr-10 sm:text-sm border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 my-input-class">
        @if($type === 'password')
            <button type="button" onmousedown="togglePasswordVisibility('{{ $name }}')" onmouseup="togglePasswordVisibilityEnd('{{ $name }}')"
                class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 focus:outline-none focus:text-gray-600">
                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path id="closed-eye" d="M10 2c-3.866 0-7 3.134-7 7s3.134 7 7 7 7-3.134 7-7-3.134-7-7-7zm0 12c-2.757 0-5-2.243-5-5s2.243-5 5-5 5 2.243 5 5-2.243 5-5 5zm0-9c-1.654 0-3 1.346-3 3s1.346 3 3 3 3-1.346 3-3-1.346-3-3-3z" />
                    <path id="open-eye" d="M10 12a2 2 0 100-4 2 2 0 000 4z" class="hidden" />
                </svg>
            </button>
        @endif
    </div>
    @error($name) <span class="text-red-500">{{ $message }}</span> @enderror
</div>

<script src="{{ asset('js/pass.js') }}"></script>

