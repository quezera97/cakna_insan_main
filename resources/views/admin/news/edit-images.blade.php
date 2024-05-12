@extends('layouts.app')

@section('content')
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-10 mx-auto">
            <h1 class="text-gray-900 text-2xl title-font font-medium mb-4">{{ $newsDetail->title ?? '' }}</h1>
            <h2 class="text-sm title-font text-gray-500 tracking-widest mb-4">{{ $newsDetail->subtitle ?? '' }}</h2>
            <hr><br>
            <div class="flex flex-col w-full mb-5">
                @livewire('admin.news.news-add-images', ['newsDetail' => $newsDetail])
            </div>
            <hr><br>
            <div class="flex flex-wrap -m-4">
                @if (isset($newsDetail->newsImage))
                    @foreach ($newsDetail->newsImage as $key => $newsImage)
                        @livewire('admin.news.news-edit-images', ['newsImage' => $newsImage])
                    @endforeach
                @endif
            </div>
        </div>
  </section>
@endsection
