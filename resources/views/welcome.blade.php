@extends('layouts.app')

@section('content')
    {{-- Featured Project --}}
    @livewire('components.featured-project')

    {{-- Incoming Project --}}
    <section class="text-gray-700 body-font border-t border-gray-200">
        <div class="container px-5 py-10 mx-auto">
            <div class="flex flex-col text-center w-full mb-5">
                {{-- <h2 class="text-xs text-indigo-500 tracking-widest font-medium title-font mb-1">ROOF PARTY POLAROID</h2> --}}
                <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">Projek Akan Datang</h1>
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
                                <a href="{{ route('project_detail', $project) }}" class="mt-3 text-indigo-500 inline-flex items-center">Butiran
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
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Projek Lepas</h1>
            </div>
            <div class="flex flex-wrap -m-4">
                @foreach ($pastProjects as $project)
                    <div class="xl:w-1/4 md:w-1/2 p-4">
                        <a href="{{ route('project_detail', $project) }}">
                            <div class="bg-gray-100 p-6 rounded-lg text-center">
                                <img class="h-40 rounded w-full object-cover object-center mb-6" src="{{ asset($project->projectable?->pastProjectImages[0]->image_path) }}" alt="{{ $project->projectable?->title }}">
                                <h2 class="text-lg text-gray-900 font-medium title-font mb-4">{{ $project->projectable?->title }}</h2>
                                <p class="leading-relaxed text-base">{{ $project->projectable?->details }}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <a href="{{ route('past_project') }}">
                <button  class="flex mx-auto mt-16 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Lebih Lanjut</button>
            </a>
        </div>
    </section>
@endsection
