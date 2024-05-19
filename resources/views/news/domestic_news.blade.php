@extends('layouts.app')

@section('content')
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap -m-4">
                @foreach ($domesticNews as $news)
                    <div class="p-4 md:w-1/3">
                        <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                            @if($news->newsImage->where('type', 'main')->isNotEmpty())
                                @php
                                    $mainImage = $news->newsImage->where('type', 'main')->first();
                                @endphp

                                <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="{{ asset('storage/'.$mainImage->image_path) }}" alt="{{ $news->title }}">
                            @endif
                            <div class="p-6">
                                <h1 class="title-font text-lg font-medium text-gray-900">{{ $news->title }}</h1>
                                <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-3">{{ $news->subtitle }}</h2>
                                @auth
                                    <button
                                        class="w-24 open-modal bg-indigo-500 hover:bg-indigo-600 text-white font-bold p-2 rounded-full mr-2"
                                        data-id="{{ $news->id }}"
                                        data-model="{{ $news::class }}"
                                        data-details="{{ $news->details }}"
                                        data-column="details"
                                        aria-label="Edit">
                                        @include('livewire.components.svg-edit')
                                    </button>
                                @endauth
                                <p class="leading-relaxed mb-3">{!! $news->details !!}</p>
                                <div class="flex items-center flex-wrap ">
                                    <a href="{{ $news->related_url }}" target="_blank" class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0">
                                        {{ __('ui_text.read_more') }}
                                        <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h14"></path>
                                            <path d="M12 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                    <span class="text-gray-400 mr-3 inline-flex items-center lg:ml-auto md:ml-0 ml-auto leading-none text-sm pr-3 py-1 border-r-2 border-gray-200">
                                        {{ \Carbon\Carbon::parse($news->date)->format('d M Y') }}
                                    </span>
                                    <span class="text-gray-400 inline-flex items-center leading-none text-sm">
                                        {{__('ui_text.author').': '. $news->author }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-10">
                {{ $domesticNews->withQueryString()->links('layouts.pagination') }}
            </div>
        </div>
    </section>
    @auth
        @include('livewire.components.rich-text-editor')
    @endauth
@endsection
