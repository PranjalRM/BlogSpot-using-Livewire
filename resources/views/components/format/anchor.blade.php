@props(['route', 'class' => '', 'submit' => false])

@if($submit)
    <form id="logout-form" action="{{ $route }}" method="POST" style="display: none;">
        @csrf
    </form>
    <a href="{{ $route }}" class="text-lg text-gray-600 hover:text-blue-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 {{ $class }}" 
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        {{ $slot }}
    </a>
@else
    <a href="{{ $route }}" class="text-lg text-gray-600 hover:text-blue-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 {{ $class }}" {{ $attributes }}>
        {{ $slot }}
    </a>
@endif

