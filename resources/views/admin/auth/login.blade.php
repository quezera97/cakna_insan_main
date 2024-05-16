@extends('layouts.app')

@section('content')
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="xl:w-1/3 lg:w-1/3 w-full mx-auto">
                <h2 class="text-gray-900 text-lg font-medium title-font mb-5">{{ __('ui_text.login') }}</h2>

                @livewire('admin.auth.login-form')
            </div>
        </div>
    </section>
@endsection
