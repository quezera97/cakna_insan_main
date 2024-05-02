@extends('layouts.app')

@section('content')
    {{-- Jumbotron --}}

    {{-- Tazkirah/Hadis/Ayat Quran --}}

    {{-- Featured Project --}}
    @livewire('home.featured-projects')

    {{-- Incoming Project --}}
    @livewire('home.incoming-projects')

    {{-- Past Projects --}}
    @livewire('home.past-projects')
@endsection
