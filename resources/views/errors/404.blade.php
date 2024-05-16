@extends('layouts.app')

@section('content')
    <section class="bg-white">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-sm text-center">
                <h1 class="mb-4 text-7xl tracking-tight font-extrabold lg:text-9xl text-primary-600">404</h1>
                <p class="mb-4 text-3xl tracking-tight font-bold text-gray-900 md:text-4xl">Something's missing.</p>
                <p class="mb-4 text-lg text-gray-500">Sorry, we can't find that page. You'll find lots to explore on the home page. </p>
                <a href="{{ route('welcome') }}" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-md">Return To Home Page</a>
            </div>
        </div>
    </section>
@endsection
