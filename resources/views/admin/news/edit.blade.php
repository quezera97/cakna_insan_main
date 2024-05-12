@extends('layouts.app')

@section('content')
    @livewire('admin.news.news-edit', ['newsDetail' => $newsDetail])
@endsection
