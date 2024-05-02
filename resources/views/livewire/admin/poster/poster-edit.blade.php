<div class="flex flex-wrap -m-4">
    @forelse ($projects as $project)
        <div class="p-4 lg:w-1/4 md:w-1/2">
            <div class="h-full flex flex-col items-center text-center">
                @if ($project->projectable?->poster_image_path)
                    <img alt="Poster {{ $project->projectable?->title }}" class="flex-shrink-0 rounded-lg w-full object-cover object-center mb-4" src="{{ asset('storage/'.$project->projectable?->poster_image_path) }}">
                @else
                    <div class="relative w-full p-4">
                        <div class="flex rounded-lg h-full bg-gray-100 p-8 flex-col items-center">
                            <div class="flex items-center mb-3">
                                <h2 class="text-gray-900 text-lg title-font font-medium">No Images</h2>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="w-full">
                    <h1 class="title-font font-medium text-lg text-gray-900">{{ $project->projectable?->title }}</h1>
                    <div class="p-2 mt-5 justice-between">
                        <button wire:click="openUploadPosterModal({{ $project }})" class="mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Upload</button>
                        <button wire:click="openConfirmationModal('deletePoster', {{ $project->id }})" class="mx-auto text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="p-4 w-full">
            <div class="flex rounded-lg h-full bg-gray-100 p-8 flex-col items-center">
                <div class="flex items-center mb-3">
                    <h2 class="text-gray-900 text-lg title-font font-medium">No Poster</h2>
                </div>
                <a href="{{ route('project.add') }}" class="font-medium text-blue-600 hover:underline">Add Project</a>
            </div>
        </div>
    @endforelse

    @if ($showUploadPosterModal)
        @include('livewire.admin.project.upload-poster-modal')
    @endif

    @if ($showConfirmationModal)
        @include('livewire.components.confirmation-modal', ['confirmationModalTitle' => $confirmationModalTitle, 'confirmationModalDescription' => $confirmationModalDescription])
    @endif
</div>
