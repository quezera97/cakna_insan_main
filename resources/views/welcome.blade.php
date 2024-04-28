@extends('layouts.app')

@section('content')
    {{-- Featured Project --}}
    @livewire('home.featured-projects')

    {{-- Incoming Project --}}
    @livewire('home.incoming-projects')

    {{-- Past Projects --}}
    @livewire('home.past-projects')
@endsection
