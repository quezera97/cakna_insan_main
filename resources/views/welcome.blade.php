@extends('layouts.app')

@section('content')
    {{-- Jumbotron --}}
    @livewire('home.welcome-banner')

    <div>
        @livewire('home.featured-projects')
    </div>

    <div>
        @livewire('home.news-letter')
    </div>

    <div>
        @livewire('home.incoming-projects')
    </div>

    <div>
        @livewire('home.past-projects')
    </div>

@endsection
