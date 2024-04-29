@extends('layouts.app')

@section('content')
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-10 mx-auto">
            <div class="flex flex-col text-center w-full mb-20">
                <h1 class="text-2xl font-medium title-font mb-4 text-gray-900 tracking-widest">Project Akan Datang</h1>
            </div>
            <div class="flex flex-wrap -m-4">
                @forelse ($incomingProjects as $key => $project)
                    <div class="p-4 lg:w-1/2 my-2">
                        <div class="h-full flex sm:flex-row flex-col items-center sm:justify-start justify-center text-center sm:text-left">
                            <img alt="team" class="flex-shrink-0 rounded-lg w-48 h-48 object-cover object-center sm:mb-0 mb-4" src="{{ asset($project->projectable?->poster_image_path) }}">
                            <div class="flex-grow sm:pl-8 mb-2">
                                <h2 class="title-font font-medium text-lg text-gray-900">{{ $project->projectable?->title }}</h2>
                                <p class="mb-4">{{ $project->projectable?->details }}</p>
                                <span class="inline-flex">
                                    <a href="{{ route('donation', $project) }}" class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Infaq Sekarang</a>
                                    <a href="{{ route('project_detail', $project) }}" class="ml-4 inline-flex text-gray-700 bg-gray-200 border-0 py-2 px-6 focus:outline-none hover:bg-gray-300 rounded text-lg">Butiran</a>
                                </span>
                                @if (!empty($project->donation_needed) && $project->donation_needed != 0)
                                    <div class="mt-1">
                                        @livewire('components.donation-progress-bar', ['projectId' => $project->id, 'projectTitle' => $project->projectable?->title, 'projectDonationNeeded' => $project->donation_needed ?? 0.00])
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="p-4 w-full">
                        <div class="flex rounded-lg h-full bg-gray-100 p-8 flex-col items-center">
                            <div class="flex items-center mb-3">
                                <h2 class="text-gray-900 text-lg title-font font-medium">Tiada Projek</h2>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
            <div class="mt-10">
                {{ $incomingProjects->withQueryString()->links('layouts.pagination') }}
            </div>
        </div>
    </section>
@endsection
