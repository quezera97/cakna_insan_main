@extends('layouts.app')

@section('content')
    @php
        $incomingProjectDetail = false;

        if($project->projectable_type == \App\Models\IncomingProject::class){
            $incomingProjectDetail = true;
        }

    @endphp
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-10 mx-auto">

            @include('layouts.breadcrumb')

            <div class="flex flex-wrap -m-4">
                @if ($incomingProjectDetail)
                    <div class="lg:w-1/3 p-4">
                        <div class="flex relative">
                            <img alt="{{ $project->projectable?->title }}" class="inset-0 w-full h-full object-cover object-center" src="{{ asset($project->projectable?->poster_image_path) }}">
                        </div>
                    </div>
                @else
                    <div id="default-carousel" class="relative lg:w-1/3 w-full" data-carousel="slide">
                        <div class="relative lg:h-full h-96 overflow-hidden rounded-lg">
                            @foreach ($project->projectable?->pastProjectImages as $projectDetail)
                                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                    <img src="{{ asset($projectDetail->image_path) }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                                </div>
                            @endforeach
                        </div>
                        <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                            @foreach ($project->projectable?->pastProjectImages as $key => $projectDetail)
                                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide {{ $loop->iteration }}" data-carousel-slide-to="{{ $key }}"></button>
                            @endforeach
                        </div>
                        <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                                </svg>
                                <span class="sr-only">Previous</span>
                            </span>
                        </button>
                        <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                </svg>
                                <span class="sr-only">Next</span>
                            </span>
                        </button>
                    </div>
                @endif

                <div class="lg:w-2/3 p-4">
                    <div class="container px-5 py-10 mx-auto">
                        <div class="text-center mb-10">
                            <h1 class="sm:text-3xl text-2xl font-medium text-center title-font text-gray-900 mb-4">Project {{ $project->projectable?->title }}</h1>
                            <p class="text-base leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto">{{ $project->projectable?->details }}</p>
                        </div>
                        <div class="container px-5 mb-10 mx-auto">
                            <div class="w-full mx-auto text-center">
                              <p class="leading-relaxed text-lg">Ayat Quran/Hadis</p>
                                <span class="inline-block h-1 w-10 rounded bg-indigo-500 mt-8 mb-6"></span>
                                <h2 class="text-gray-900 font-medium title-font tracking-wider text-sm">Quran/Hadis</h2>
                            </div>
                        </div>
                        <div class="flex flex-wrap lg:w-4/5 sm:mx-auto sm:mb-2 -mx-2">
                            <div class="p-2 sm:w-1/2 w-full">
                                <div class="bg-gray-100 rounded flex p-4 h-full items-center">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="text-indigo-500 w-6 h-6 flex-shrink-0 mr-4" viewBox="0 0 24 24">
                                        <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                                        <path d="M22 4L12 14.01l-3-3"></path>
                                    </svg>
                                    <span class="title-font font-medium">Tempat</span>
                                </div>
                            </div>
                            <div class="p-2 sm:w-1/2 w-full">
                                <div class="bg-gray-100 rounded flex p-4 h-full items-center">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="text-indigo-500 w-6 h-6 flex-shrink-0 mr-4" viewBox="0 0 24 24">
                                        <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                                        <path d="M22 4L12 14.01l-3-3"></path>
                                    </svg>
                                    <span class="title-font font-medium">Tarikh</span>
                                </div>
                            </div>
                            <div class="p-2 sm:w-1/2 w-full">
                                <div class="bg-gray-100 rounded flex p-4 h-full items-center">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="text-indigo-500 w-6 h-6 flex-shrink-0 mr-4" viewBox="0 0 24 24">
                                        <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                                        <path d="M22 4L12 14.01l-3-3"></path>
                                    </svg>
                                    <span class="title-font font-medium">Pax</span>
                                </div>
                            </div>
                            <div class="p-2 sm:w-1/2 w-full">
                                <div class="bg-gray-100 rounded flex p-4 h-full items-center">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="text-indigo-500 w-6 h-6 flex-shrink-0 mr-4" viewBox="0 0 24 24">
                                        <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                                        <path d="M22 4L12 14.01l-3-3"></path>
                                    </svg>
                                    <span class="title-font font-medium">Pengankutan Sendiri</span>
                                </div>
                            </div>
                        </div>
                        @if ($incomingProjectDetail)
                            <button class="flex mx-auto mt-16 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Sertai Kami</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
