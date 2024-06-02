@props(['label', 'name'])

<div class="sm:col-span-6 pt-5">
    <label for="{{ $name }}">
        <input type="checkbox" id="{{ $name }}" wire:model="{{ $name }}">
        {{ $label }}
    </label>
</div>