<header class="text-gray-700 body-font bg-white border-b fixed-top">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
      <nav class="flex lg:w-2/5 flex-wrap items-center text-base md:ml-auto">
        <a href="/" class="mr-5 hover:text-gray-900">Home</a>
        <a href="/blog" class="mr-5 hover:text-gray-900">Blog</a>
        <a href="/contact" class="mr-5 hover:text-gray-900">Contact</a>
        @auth
          <a href="/myblog" class="my-blog-link mr-5">Myblog</a>
        @if (Route::is('myblog'))
            <a href="{{ route('posts.create') }}" class="inline-flex justify-center px-2 py-1 mr-3 text-sm font-medium leading-5 text-white transition duration-150 ease-in-out bg-indigo-500 border border-transparent rounded-md hover:bg-indigo-600 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 cursor-pointer ">Create Blog</a>
        @endif
        @endauth
      </nav>
      <a class="flex order-first lg:order-none lg:w-1/5 title-font font-bold items-center text-gray-900 lg:items-center lg:justify-center mb-4 md:mb-0">
        BLOGSPOT
      </a>
      <div class="lg:w-2/5 inline-flex lg:justify-end ml-5 lg:ml-0">
        @guest
          <a href="{{route('login') }}" class="inline-flex justify-center px-4 py-2 text-sm font-medium leading-5 text-white transition duration-150 ease-in-out bg-indigo-500 border border-transparent rounded-md hover:bg-indigo-600 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 cursor-pointer">Login</a>
        @endguest
        @auth
          @livewire('navbar-dropdown')
        @endauth
      </div>
    </div>
  </header>
  