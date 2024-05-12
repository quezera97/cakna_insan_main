@extends('layouts.app')

@section('content')
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-10 mx-auto">
            <h1 class="text-gray-900 text-2xl title-font font-medium mb-4">{{ $project->projectable?->title ?? '' }}</h1>
            <h2 class="text-sm title-font text-gray-500 tracking-widest mb-4">{{ $project->projectable?->subtitle ?? '' }}</h2>
            <hr><br>
            <div class="flex flex-col text-center w-full mb-5">
                @livewire('admin.images.images-upload', ['project' => $project])
            </div>
            <hr><br>
            <div class="flex flex-wrap -m-4">
                @if (isset($project->projectable?->pastProjectImages))
                    @foreach ($project->projectable?->pastProjectImages as $key => $projectImage)
                        @livewire('admin.images.images-edit', ['projectImage' => $projectImage])
                    @endforeach
                @elseif (isset($project->projectable?->incomingProjectImages))
                    @foreach ($project->projectable?->incomingProjectImages as $key => $projectImage)
                        @livewire('admin.images.images-edit', ['projectImage' => $projectImage])
                    @endforeach
                @endif
            </div>
        </div>
  </section>
@endsection
