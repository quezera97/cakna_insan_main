@extends('layouts.app')

@section('content')
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-10 mx-auto">
            <div class="flex flex-col text-center w-full mb-5">
                <h1 class="text-2xl font-medium title-font mb-4 text-gray-900">{{ __('ui_text.post') }}</h1>
            </div>
            <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                @livewire('admin.post.post-edit')
            </div>
        </div>
    </section>
@endsection
