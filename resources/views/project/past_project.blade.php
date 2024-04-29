@extends('layouts.app')

@section('content')
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-10 mx-auto">
            <div class="flex flex-col text-center w-full mb-20">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Projek Lepas</h1>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Projek-projek yang lepas dianjurkan oleh Cakna Insan Malaysia</p>
            </div>
            <div class="flex flex-wrap -m-2">
                @forelse ($pastProjects as $project)
                    <div class="p-2 lg:w-1/2 md:w-1/2 w-full h-40 relative" id="parentDiv-{{ $project->projectable?->id }}">
                        <a href="{{ route('project_detail', $project) }}">
                            <div class="h-full flex items-center border-gray-200 border rounded-lg relative" style="overflow: hidden;">
                                <div class="overlay absolute top-0 left-0 w-full h-full bg-gray-900 opacity-50 flex items-center justify-center hover:opacity-20 hover:transition-opacity hover:duration-300 z-10"></div>
                                <div id="text-image" class="text-container absolute top-0 left-0 w-full h-full flex items-center justify-center pointer-events-none opacity-100 z-20">
                                    <p class="text-center text-4xl font-black text-white">{{ $project->projectable?->title }}</p>
                                </div>
                                @if ($project->projectable?->pastProjectImages->isNotEmpty())
                                    <img id="image-{{ $project->projectable?->id }}" class="rounded w-full h-full object-cover object-center" src="{{ asset($project->projectable?->pastProjectImages[0]->image_path) }}" alt="content">
                                @endif
                            </div>
                        </a>
                    </div>

                    @push('js')
                        <script>
                            $(document).ready(function(){
                                var divId = '{{ $project->projectable?->id }}';

                                $("#parentDiv-"+divId).hover(
                                    function() {
                                        $("#image-"+divId).addClass("scale-125 transition-transform duration-700");
                                    },
                                    function() {
                                        $("#image-"+divId).removeClass("scale-125");

                                        setTimeout(function() {
                                            $("#image-"+divId).removeClass("transition-transform duration-200");
                                        }, 100);
                                    }
                                );
                            });
                        </script>
                    @endpush
                @empty
                    <div class="p-4 w-full">
                        <div class="flex rounded-lg h-full bg-gray-100 p-8 flex-col items-center">
                            <div class="flex items-center mb-3">
                                <h2 class="text-gray-900 text-lg title-font font-medium">Tiada Projek</h2>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
