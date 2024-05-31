@extends('layouts.app')

@section('content')

<div class="container mx-auto p-5">
    <h1 class="text-4xl mt-10 text-center tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-6xl">
        Welcome to The BlogSpot
    </h1>
    <div class="row gy-4 gy-md-8 pt-9 pt-lg-0">
        <div class="col-lg-6 text-center text-lg-start">
          <h3 class="fs-8 font-bold text-black mb-3 mb-lg-4 lh-lg mt-5">Publish your experience and your stories, your way.</h3>
            <a href="{{ route('posts.create') }}" class="inline-flex justify-center px-4 py-2 text-sm font-medium leading-5 text-white transition duration-150 ease-in-out bg-indigo-500 border border-transparent rounded-md hover:bg-indigo-600 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 cursor-pointer mt-10">Create Blog</a>
        </div>
    </div>
</div>

@endsection
