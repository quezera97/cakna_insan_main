@extends('layouts.app')

@section('content')
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-10 mx-auto">
            <div class="flex flex-col text-center w-full mb-5">
                <h1 class="text-2xl font-medium title-font mb-4 text-gray-900">{{ __('ui_text.posters') }}</h1>
            </div>

            @livewire('admin.poster.poster-edit', ['projects' => $projects])
        </div>
    </section>
@endsection
