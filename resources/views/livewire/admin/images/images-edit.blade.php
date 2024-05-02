<div class="lg:w-1/4 md:w-1/2 p-4 w-full">
    <a class="block relative h-48 rounded overflow-hidden">
        <img alt="{{ $projectImage->title }}" class="object-cover object-center w-full h-full block" src="{{ asset('storage/'.$projectImage->image_path) }}">
    </a>
    <div class="mt-4">
        <h2 class="text-gray-900 title-font text-lg font-medium">{{ $projectImage->title }}</h2>
        <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">{{ $projectImage->caption }}</h3>
    </div>
    <div class="p-2 mt-2 justice-between text-center">
        <button wire:click="previewSelectedImage" class="mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Preview</button>
        <button wire:click="openConfirmationModal('deleteImages', {{ $projectImage->id, $key }})" class="mx-auto text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg">Delete</button>
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

    @if ($showConfirmationModal)
        @include('livewire.components.confirmation-modal', ['confirmationModalTitle' => $confirmationModalTitle, 'confirmationModalDescription' => $confirmationModalDescription])
    @endif
</div>
