<div class="flex flex-wrap -m-4">
    @foreach ($projects as $project)
        <div class="p-4 lg:w-1/4 md:w-1/2">
            <div class="h-full flex flex-col items-center text-center">
                <img alt="Poster {{ $project->projectable?->title }}" class="flex-shrink-0 rounded-lg w-full object-cover object-center mb-4" src="{{ asset($project->projectable?->poster_image_path) }}">
                <div class="w-full">
                    <h1 class="title-font font-medium text-lg text-gray-900">{{ $project->projectable?->title }}</h1>
                    <div class="p-2 mt-5 justice-between">
                        <button wire:click="editPoster({{ $project }})" class="mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Kemaskini</button>
                        <button wire:click="deletePoster({{ $project }})" class="mx-auto text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg">Hapus</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @include('livewire.components.alert-modal', ['modalTitle' => $modalTitle, 'modalDescription' => $modalDescription])
</div>
