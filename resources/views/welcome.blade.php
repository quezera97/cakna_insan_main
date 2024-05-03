@extends('layouts.app')

@section('content')
    {{-- Jumbotron --}}
    @livewire('home.welcome-banner')

    {{-- Tazkirah/Hadis/Ayat Quran --}}

    {{-- Featured Project --}}
    @livewire('home.featured-projects')

    {{-- Incoming Project --}}
    @livewire('home.incoming-projects')

    {{-- Past Projects --}}
    @livewire('home.past-projects')
@endsection
