@extends('layouts.app')

@section('content')
    <section class="bg-white body-font rounded-lg shadow-lg p-6 text-gray-700 lg:m-10 m-5">
        <div class="container px-5 py-10 mx-auto">
            <div class="flex flex-col text-center w-full mb-12">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Join Us</h1>
            </div>

            @livewire('forms.join-us-form')
        </div>
    </section>
@endsection
