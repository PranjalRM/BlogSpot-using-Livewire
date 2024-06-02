@props(['title', 'message' => '', 'action', 'method' => 'post'])

<div>
    <div class="container mx-auto px-4">
        <x-format.header>{{ $title }}</x-format.header>
        <x-format.p-tag>{{ $message }}</x-format.p-tag>
        <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
            <form wire:submit.prevent="{{ $action }}" method="{{ $method }}">
                @csrf
                {{ $slot }}
            </form>
        </div>
        <div class="mt-2 text-center text-lg text-gray-600">
            @isset($link)
                    {{ $link }}   
            @endisset
        </div>
    </div>
</div>
