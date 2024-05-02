@extends('layouts.app')

@section('content')
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-10 mx-auto">
            <div class="flex flex-col text-center w-full mb-10">
                <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">{{ $project->projectable?->title }}</h1>
                @if ($type == 'edit')
                    <button onclick="deleteAllImages({{ $project->id }})" class="mx-auto text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg">Delete All Images</button>
                @elseif ($type == 'upload')
                    @livewire('admin.images.images-upload', ['project' => $project])
                @endif
            </div>
            <div class="flex flex-wrap -m-4">
                @if (isset($project->projectable?->pastProjectImages))
                    @forelse ($project->projectable?->pastProjectImages as $key => $projectImage)
                        @livewire('admin.images.images-edit', ['projectImage' => $projectImage, 'key' => $key])
                    @empty
                        <div class="p-4 w-full">
                            <div class="flex rounded-lg h-full bg-gray-100 p-8 flex-col items-center">
                                <div class="flex items-center mb-3">
                                    <h2 class="text-gray-900 text-lg title-font font-medium">No Images</h2>
                                </div>
                            </div>
                        </div>
                    @endforelse
                @else
                    <div class="p-4 w-full">
                        <div class="flex rounded-lg h-full bg-gray-100 p-8 flex-col items-center">
                            <div class="flex items-center mb-3">
                                <h2 class="text-gray-900 text-lg title-font font-medium">No Images</h2>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
  </section>

  @push('js')
      <script>
        function deleteAllImages(projectId) {
            var confirmation = confirm("Are you sure you want to delete all images?");

            if (confirmation) {
                $.ajax({
                    url: "{{ route('images.deleteAllImages', ['project' => ':projectId']) }}".replace(':projectId', projectId),
                    type: 'GET',
                    success: function(response) {
                        if(response.success){
                            window.location.href = "{{ route('images.index') }}"
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Error deleting images:", error);
                    }
                });
            }
        }

      </script>
  @endpush
@endsection
