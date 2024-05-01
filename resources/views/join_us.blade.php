@extends('layouts.app')

@section('content')
    <section class="text-gray-600 body-font relative">
        <div class="container px-5 py-10 mx-auto">
            <div class="flex flex-col text-center w-full mb-12">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Join Us</h1>
            </div>

            @livewire('forms.join-us-form')
        </div>
    </section>
@endsection
