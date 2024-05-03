@extends('layouts.app')

@section('content')
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-10 mx-auto">
            <div class="flex flex-col text-center w-full mb-10">
                <h1 class="text-2xl font-medium title-font mb-4 text-gray-900">Banner</h1>
            </div>

            @livewire('admin.banner.banner-edit', ['bannerJumbotron' => $bannerJumbotron])
        </div>
    </section>
@endsection
