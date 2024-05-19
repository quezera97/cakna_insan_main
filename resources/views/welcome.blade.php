@extends('layouts.app')

@section('content')
    {{-- Jumbotron --}}
    <div>
        @livewire('home.welcome-banner')

        @livewire('home.featured-projects')

        <div class="flex flex-wrap p-10">
            <div class="lg:w-2/3 w-full">
                @livewire('home.news-letter')
            </div>
            <div class="lg:w-1/3 w-full">
                @livewire('home.home-post')
            </div>
        </div>

        @livewire('home.statistics-details')

        @livewire('home.incoming-projects')

        @livewire('home.where-we-helped')

        @livewire('home.past-projects')
    </div>
@endsection
