@extends('layouts.app')

@section('content')
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap -m-4">
                @foreach ($caknaInsanMalaysiaNews as $newsDetail)
                    <div class="p-4 md:w-1/3">
                        <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                            @if($newsDetail->newsImage->where('type', 'main')->isNotEmpty())
                                @php
                                    $mainImage = $news->newsImage->where('type', 'main')->first();
                                @endphp

                                <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="{{ asset('storage/'.$mainImage->image_path) }}" alt="blog">
                            @endif
                            <div class="p-6">
                                <h1 class="title-font text-lg font-medium text-gray-900">{{ $newsDetail->title }}</h1>
                                <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-3">{{ $newsDetail->subtitle }}</h2>
                                <p class="leading-relaxed mb-3">{{ $newsDetail->details }}</p>
                                <div class="flex items-center flex-wrap ">
                                    <a href="{{ route('news.cakna_insan_malaysia_details', $newsDetail) }}" class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0">
                                        {{ __('ui_text.read_more') }}
                                    <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14"></path>
                                        <path d="M12 5l7 7-7 7"></path>
                                    </svg>
                                    </a>
                                    <span class="text-gray-400 mr-3 inline-flex items-center lg:ml-auto md:ml-0 ml-auto leading-none text-sm pr-3 py-1 border-r-2 border-gray-200">
                                        {{ \Carbon\Carbon::parse($newsDetail->date)->format('d M Y') }}
                                    </span>
                                    <span class="text-gray-400 inline-flex items-center leading-none text-sm">
                                        {{ $newsDetail->author }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-10">
                {{ $caknaInsanMalaysiaNews->withQueryString()->links('layouts.pagination') }}
            </div>
        </div>
    </section>
@endsection
