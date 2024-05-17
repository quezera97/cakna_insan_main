<div class="lg:w-1/4 md:w-1/2 p-4 w-full">
    <a class="block relative h-48 rounded overflow-hidden">
        <img alt="{{ $projectImage->title }}" class="object-cover object-center w-full h-full block" src="{{ asset('storage/'.$projectImage->image_path) }}">
    </a>
    <div class="mt-4">
        <h2 class="text-gray-900 title-font text-lg font-medium">{{ $projectImage->title }}</h2>
        <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">{{ $projectImage->caption }}</h3>
    </div>
    <div class="flex justify-between my-5 text-center">
        <button wire:click="previewSelectedImage" class="mx-auto text-white bg-sky-500 border-0 py-2 px-8 focus:outline-none hover:bg-sky-600 rounded text-lg">{{ __('ui_text.preview') }}</button>
        <button wire:click="editSelectedImage('{{ $projectImage->id }}')" class="mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">{{ __('ui_text.edit') }}</button>
        <button wire:click="openConfirmationModal('deleteImages', {{ $projectImage->id }})" class="mx-auto text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg">{{ __('ui_text.delete') }}</button>
    </div>

    @if ($previewImage)
        <div class="bg-gray-100 bg-opacity-75 fixed z-50 inset-0 overflow-y-auto">
            <div class="flex items-center justify-center h-full">
                <div class="max-w-screen-lg w-full mx-auto p-4">
                    <button wire:click="closeSelectedImage" class="absolute top-0 right-0 m-4 text-white hover:text-gray-300 focus:outline-none">
                        <svg class="w-6 h-6 bg-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                    <img src="{{ asset('storage/'.$projectImage->image_path) }}" alt="Full Size Image" class="lg:h-auto md:h-auto h-full lg:w-1/2 md:w-1/2 w-full mx-auto">
                </div>
            </div>
        </div>
    @endif

    @if ($editImage)
        <div class="bg-gray-100 bg-opacity-75 fixed z-10 inset-0 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen">
                <div class="bg-white w-1/2 h-auto rounded shadow-lg p-8">
                    <div class="flex justify-between items-center mb-4">
                        <label for="edit-image-details" class="text-xl font-bold">Edit Image Details</label>
                        <button wire:click="closeEditSelectedImage" class="text-gray-600 hover:text-gray-800 focus:outline-none">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <form wire:submit.prevent="edit('{{ $projectImage->id }}')">
                        @csrf
                        <div class="mb-5">
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Title</label>
                            <input type="text" id="title" wire:model="title" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div>
                            <label for="caption" class="block mb-2 text-sm font-medium text-gray-900">Caption</label>
                            <textarea id="caption" wire:model="caption" style="height: 123px;" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></textarea>
                        </div>
                        <div class="flex justify-between mt-10">
                            <div></div>
                            <button type="submit" class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded mr-2">{{ __('ui_text.save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

    @if ($showConfirmationModal)
        @include('livewire.components.confirmation-modal', ['confirmationModalTitle' => $confirmationModalTitle])
    @endif
</div>
