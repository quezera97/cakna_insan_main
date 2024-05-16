@extends('layouts.app')

@section('content')
    @if (!is_null($project->banner?->image_path))
        <section class="text-gray-600 body-font">
            <div class="container px-5 py-10 mx-auto flex flex-col">
                <div class="lg:w-5/6 mx-auto">
                    <div class="rounded-lg w-full h-auto overflow-hidden">
                        <img alt="{{ $project->projectable?->title }}" class="inset-0 w-full h-full object-cover object-center" src="{{ asset('storage/'.$project->banner?->image_path) }}">
                    </div>
                    <div class="flex flex-col sm:flex-row mt-10">
                        <div class="sm:pl-8 sm:py-8 mt-2 pt-4 sm:mt-0 text-center sm:text-left">
                            <p class="leading-relaxed text-lg mb-4">{{ $project->banner?->caption }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    @endif
    <section class="bg-white body-font rounded-lg shadow-lg p-6 text-gray-700 border border-gray-100 lg:m-10 m-5">
        <div class="container px-5 py-10 mx-auto">
            <div class="flex flex-wrap -m-4">
                @if (!is_null($project->projectable?->poster_image_path))
                    <div class="lg:w-1/3 p-4">
                        <div class="flex relative">
                            <img alt="{{ $project->projectable?->title }}" class="inset-0 w-full h-full object-cover object-center" src="{{ asset('storage/'.$project->projectable?->poster_image_path) }}">
                        </div>
                    </div>
                    <div class="lg:w-2/3 p-4">
                        <div class="container px-5 py-10 mx-auto">
                            <div class="text-center mb-10">
                                <h1 class="text-gray-900 text-2xl title-font font-medium mb-4">{{ $project->projectable?->title ?? '' }}</h1>
                                <h2 class="text-sm title-font text-gray-500 tracking-widest mb-4">{{ $project->projectable?->subtitle ?? '' }}</h2>
                                <hr><br>
                                <p class="text-base leading-relaxed w-full mx-auto">{{ $project->projectable?->details }}</p>
                            </div>
                            <br>
                            @if (!empty($project->donation_needed) && $project->donation_needed != 0)
                                <div class="my-10">
                                    @livewire('components.donation-progress-bar', ['projectId' => $project->id, 'projectTitle' => $project->projectable?->title, 'projectDonationNeeded' => $project->donation_needed ?? 0.00])
                                </div>
                            @endif
                            <div class="flex flex-wrap w-full text-center sm:mx-auto sm:mb-2 -mx-2">
                                <div class="p-2 w-full">
                                    <a href="{{ 'https://toyyibpay.com/'.$project->donationDetail?->donation_url }}" target="__blank" class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">{{ __('ui_text.infaq_now') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="w-full p-4">
                        <div class="container px-5 py-10 mx-auto">
                            <div class="text-center mb-10">
                                <h1 class="text-gray-900 text-2xl title-font font-medium mb-4">{{ $project->projectable?->title ?? '' }}</h1>
                                <h2 class="text-sm title-font text-gray-500 tracking-widest mb-4">{{ $project->projectable?->subtitle ?? '' }}</h2>
                                <hr><br>
                                <p class="text-base leading-relaxed w-full mx-auto">{{ $project->projectable?->details }}</p>
                            </div>
                            <br>
                            @if (!empty($project->donation_needed) && $project->donation_needed != 0)
                                <div class="my-10">
                                    @livewire('components.donation-progress-bar', ['projectId' => $project->id, 'projectTitle' => $project->projectable?->title, 'projectDonationNeeded' => $project->donation_needed ?? 0.00])
                                </div>
                            @endif
                            <div class="flex flex-wrap w-full text-center sm:mx-auto sm:mb-2 -mx-2">
                                <div class="p-2 w-full">
                                    <a href="{{ 'https://toyyibpay.com/'.$project->donationDetail?->donation_url }}" target="__blank" class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">{{ __('ui_text.infaq_now') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <div class="lg:hidden md:hidden">
        @if (isset($project->projectable?->pastProjectImages))
            @foreach ($project->projectable->pastProjectImages as $key => $image)
                <section class="bg-white body-font rounded-lg shadow-lg p-6 text-gray-700 border border-gray-100 lg:m-10 m-5">
                    <div class="container mx-auto flex px-5 py-5 md:flex-row flex-col items-center">
                        <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
                            <img class="object-cover object-center rounded h-96" alt="{{ $project->projectable?->title }}" src="{{ asset('storage/'.$image->image_path) }}">
                        </div>
                            <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
                                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">{{ $image->title }}</h1>
                                <p class="mb-8 leading-relaxed">{{ $image->caption }}</p>
                            </div>
                        </div>
                </section>
            @endforeach
        @elseif (isset($project->projectable?->incomingProjectImages))
            @foreach ($project->projectable->incomingProjectImages as $key => $image)
                <section class="bg-white body-font rounded-lg shadow-lg p-6 text-gray-700 border border-gray-100 lg:m-10 m-5">
                    <div class="container mx-auto flex px-5 py-5 md:flex-row flex-col items-center">
                        <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
                            <img class="object-cover object-center rounded h-96" alt="{{ $project->projectable?->title }}" src="{{ asset('storage/'.$image->image_path) }}">
                        </div>
                            <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
                                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">{{ $image->title }}</h1>
                                <p class="mb-8 leading-relaxed">{{ $image->caption }}</p>
                            </div>
                        </div>
                </section>
            @endforeach
        @endif
    </div>

    <div class="hidden lg:block md:block">
        @if (isset($project->projectable?->pastProjectImages))
            @foreach ($project->projectable->pastProjectImages as $key => $image)
                    @if ($key % 2 == 0)
                <section class="bg-white body-font rounded-lg shadow-lg p-6 text-gray-700 border border-gray-100 lg:m-10 m-5">
                        <div class="container mx-auto flex px-5 py-5 md:flex-row flex-col items-center">
                        <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                            <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">{{ $image->title }}</h1>
                            <p class="mb-8 leading-relaxed">{{ $image->caption }}</p>
                        </div>
                        <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
                            <img class="object-cover object-center rounded h-96" alt="{{ $project->projectable?->title }}" src="{{ asset('storage/'.$image->image_path) }}">
                        </div>
                        </div>
                    </section>
                @else
                    <section class="bg-white body-font rounded-lg shadow-lg p-6 text-gray-700 border border-gray-100 lg:m-10 m-5">
                        <div class="container mx-auto flex px-5 py-5 md:flex-row flex-col items-center">
                            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
                                <img class="object-cover object-center rounded h-96" alt="{{ $project->projectable?->title }}" src="{{ asset('storage/'.$image->image_path) }}">
                            </div>
                                <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
                                    <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">{{ $image->title }}</h1>
                                    <p class="mb-8 leading-relaxed">{{ $image->caption }}</p>
                                </div>
                            </div>
                    </section>
                @endif
            @endforeach
        @elseif (isset($project->projectable?->incomingProjectImages))
            @foreach ($project->projectable->incomingProjectImages as $key => $image)
                @if ($key % 2 == 0)
                    <section class="bg-white body-font rounded-lg shadow-lg p-6 text-gray-700 border border-gray-100 lg:m-10 m-5">
                        <div class="container mx-auto flex px-5 py-5 md:flex-row flex-col items-center">
                        <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                            <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">{{ $image->title }}</h1>
                            <p class="mb-8 leading-relaxed">{{ $image->caption }}</p>
                        </div>
                        <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
                            <img class="object-cover object-center rounded h-96" alt="{{ $project->projectable?->title }}" src="{{ asset('storage/'.$image->image_path) }}">
                        </div>
                        </div>
                    </section>
                @else
                    <section class="bg-white body-font rounded-lg shadow-lg p-6 text-gray-700 border border-gray-100 lg:m-10 m-5">
                        <div class="container mx-auto flex px-5 py-5 md:flex-row flex-col items-center">
                            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
                                <img class="object-cover object-center rounded h-96" alt="{{ $project->projectable?->title }}" src="{{ asset('storage/'.$image->image_path) }}">
                            </div>
                                <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
                                    <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">{{ $image->title }}</h1>
                                    <p class="mb-8 leading-relaxed">{{ $image->caption }}</p>
                                </div>
                            </div>
                    </section>
                @endif
            @endforeach
        @endif
    </div>

    <div class="flex flex-wrap w-full text-center sm:mx-auto sm:mb-2 -mx-2 my-10">
        <div class="p-2 w-full">
            <a href="#" class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">{{ __('ui_text.infaq_now') }}</a>
        </div>
    </div>
@endsection
