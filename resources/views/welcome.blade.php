@extends('layouts.app')

@section('content')
    {{-- Featured Project (maybe carousel) --}}
    <section class="text-gray-700 body-font">
        <div class="container mx-auto flex px-5 py-10 md:flex-row flex-col items-center">

            <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900 mb-5">Featured Projects</h1>
                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">{{ $featuredProject->projectable?->title }}</h1>
                <p class="mb-8 leading-relaxed">{{ $featuredProject->projectable?->details }}</p>
                <div class="flex justify-center">
                    <a href="{{ route('donation') }}" class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Infaq Sekarang</a>
                    <a href="{{ route('project_detail') }}" class="ml-4 inline-flex text-gray-700 bg-gray-200 border-0 py-2 px-6 focus:outline-none hover:bg-gray-300 rounded text-lg">Details</a>
                </div>
            </div>
            <div class="lg:max-w-sm lg:w-full md:w-1/2 w-1/2 m-5">
                <img class="object-cover object-center rounded" alt="hero" src="{{ asset($featuredProject->projectable?->image_path) }}">
            </div>
            <div class="lg:max-w-sm lg:w-full md:w-1/2 w-1/2">
                <img class="object-cover object-center rounded" alt="hero" src="{{ asset($featuredProject->projectable?->image_path) }}">
            </div>
        </div>
    </section>

    {{-- Incoming Project --}}
    <section class="text-gray-700 body-font border-t border-gray-200">
        <div class="container px-5 py-10 mx-auto">
            <div class="flex flex-col text-center w-full mb-5">
                {{-- <h2 class="text-xs text-indigo-500 tracking-widest font-medium title-font mb-1">ROOF PARTY POLAROID</h2> --}}
                <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">Incoming Projects</h1>
            </div>
            <div class="flex flex-wrap -m-4">
                @foreach ($incomingProjects as $project)
                    <div class="p-4 md:w-1/3">
                        <div class="flex rounded-lg h-full bg-gray-100 p-8 flex-col">
                            <div class="flex items-center mb-3">
                                <h2 class="text-gray-900 text-lg title-font font-medium">{{ $project->projectable?->title }}</h2>
                            </div>
                            <div class="flex-grow">
                                <p class="leading-relaxed text-base">{{ $project->projectable?->details }}</p>
                                <a href="{{ route('project_detail') }}" class="mt-3 text-indigo-500 inline-flex items-center">Butiran
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <a href="{{ route('incoming_project') }}">
                <button  class="flex mx-auto mt-16 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Lebih Lanjut</button>
            </a>
        </div>
    </section>

    {{-- Past Projects --}}
    <section class="text-gray-700 body-font border-t border-gray-200">
        <div class="container px-5 py-10 mx-auto">
            <div class="flex flex-wrap w-full mb-5 flex-col items-center text-center">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Past Projects</h1>
            </div>
            <div class="flex flex-wrap -m-4">
                @foreach ($pastProjects as $project)
                    <div class="xl:w-1/4 md:w-1/2 p-4">
                        <div class="bg-gray-100 p-6 rounded-lg text-center">
                            <img class="h-40 rounded w-full object-cover object-center mb-6" src="{{ asset($project->projectable?->image_path) }}" alt="content">
                            <h2 class="text-lg text-gray-900 font-medium title-font mb-4">{{ $project->projectable?->title }}</h2>
                            <p class="leading-relaxed text-base">{{ $project->projectable?->details }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <a href="{{ route('past_project') }}">
                <button  class="flex mx-auto mt-16 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Lebih Lanjut</button>
            </a>
        </div>
    </section>

    {{-- Our Team --}}
    <section class="text-gray-700 body-font border-t border-gray-200">
        <div class="container px-5 py-10 mx-auto">
            <div class="flex flex-col text-center w-full mb-20">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Ahli Cakna Insan</h1>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Kami merupakan sekumpulan individu yang berdedikasi, penuh semangat untuk membuat perubahan. Bersama-sama, kami menggunakan kemahiran kami untuk menangani cabaran, mencerahkan komuniti, dan memberi inspirasi kepada yang lain. Berikut adalah ahli-ahli inti kami:</p>
            </div>
            <div class="flex flex-wrap -m-2">
                <div class="p-2 lg:w-1/3 md:w-1/3 w-full">
                </div>
                <div class="p-2 lg:w-1/3 md:w-1/3 w-full mb-12">
                    <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                        <img alt="team" class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4" src="https://dummyimage.com/80x80/edf2f7/a5afbd">
                        <div class="flex-grow">
                            <h2 class="text-gray-900 title-font font-medium">Nasir</h2>
                            <p class="text-gray-500">Founder</p>
                        </div>
                    </div>
                </div>
                <div class="p-2 lg:w-1/3 md:w-1/3 w-full">
                </div>
                <div class="p-2 lg:w-1/2 md:w-1/2 w-full">
                    <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                        <img alt="team" class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4" src="https://dummyimage.com/80x80/edf2f7/a5afbd">
                        <div class="flex-grow">
                            <h2 class="text-gray-900 title-font font-medium">Dhia</h2>
                            <p class="text-gray-500">Media</p>
                        </div>
                    </div>
                </div>
                <div class="p-2 lg:w-1/2 md:w-1/2 w-full">
                    <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                        <img alt="team" class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4" src="https://dummyimage.com/84x84/edf2f7/a5afbd">
                        <div class="flex-grow">
                            <h2 class="text-gray-900 title-font font-medium">Sharifah</h2>
                            <p class="text-gray-500">Secretary</p>
                        </div>
                    </div>
                </div>
                <div class="p-2 lg:w-1/2 md:w-1/2 w-full">
                    <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                        <img alt="team" class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4" src="https://dummyimage.com/88x88/edf2f7/a5afbd">
                        <div class="flex-grow">
                            <h2 class="text-gray-900 title-font font-medium">Zahir</h2>
                            <p class="text-gray-500">Development</p>
                        </div>
                    </div>
                </div>
                <div class="p-2 lg:w-1/2 md:w-1/2 w-full">
                    <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                        <img alt="team" class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4" src="https://dummyimage.com/88x88/edf2f7/a5afbd">
                        <div class="flex-grow">
                            <h2 class="text-gray-900 title-font font-medium">Hanah</h2>
                            <p class="text-gray-500">Media</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-center m-0">
                <a href="{{ route('join_us') }}">
                    <img class="h-48 w-auto" src="{{ asset('assets/img/join_us.png') }}" alt="">
                </a>
            </div>
        </div>
    </section>

    {{-- Join Us --}}
@endsection
