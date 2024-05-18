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
                                <h2 class="text-gray-900 text-lg title-font font-medium">{{ __('ui_text.no_images') }}</h2>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="w-full">
                    <h1 class="title-font font-medium text-lg text-gray-900">{{ $project->projectable?->title }}</h1>
                    <div class="p-2 mt-5 justice-between">
                        <button wire:click="openUploadPosterModal({{ $project }})" class="mx-auto text-white bg-indigo-500 border-0 py-2 px-3 focus:outline-none hover:bg-indigo-600 rounded text-sm">{{ __('ui_text.upload') }}</button>
                        <button wire:click="openConfirmationModal('deletePoster', {{ $project->id }})" class="mx-auto text-white bg-red-500 border-0 py-2 px-3 focus:outline-none hover:bg-red-600 rounded text-sm">{{ __('ui_text.delete') }}</button>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="p-4 w-full">
            <div class="flex rounded-lg h-full bg-gray-100 p-8 flex-col items-center">
                <div class="flex items-center mb-3">
                    <h2 class="text-gray-900 text-lg title-font font-medium">{{ __('ui_text.no_images') }}</h2>
                </div>
                <a href="{{ route('project.add') }}" class="font-medium text-blue-600 hover:underline">{{ __('ui_text.add').' '.__('ui_text.projects') }}</a>
            </div>
        </div>
    @endforelse

    @if ($showUploadPosterModal)
        <div class="bg-gray-100 bg-opacity-75 fixed z-10 inset-0 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen">
                <div class="bg-white w-1/2 h-auto rounded shadow-lg p-8">
                    <div class="flex justify-between items-center mb-4">
                        <label for="upload-poster" class="text-xl font-bold">{{ __('ui_text.upload') }}</label>
                        <button wire:click="closeUploadPosterModal" class="text-gray-600 hover:text-gray-800 focus:outline-none">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <form wire:submit.prevent="uploadPoster">
                        @csrf
                        <div>
                            <input id="upload-poster" type="file" wire:model="poster_image_upload" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300" required>
                            @error('poster_image_upload') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="p-2 w-full mt-5" wire:loading wire:target="poster_image_upload">{{ __('ui_text.uploading') }}...</div>
                        <div class="p-2 w-full mt-5">
                            @if ($poster_image_upload)
                                {{ __('ui_text.preview') }}:
                                <img src="{{ $poster_image_upload->temporaryUrl() }}">
                            @else
                                @if (Illuminate\Support\Facades\File::exists('storage/poster/'.$folder_path.'.jpg'))
                                    {{ __('ui_text.uploaded') }}:
                                    <img src="{{ asset('storage/poster/'.$folder_path.'.jpg') }}">
                                @endif
                            @endif
                        </div>
                        <div class="flex justify-between mt-10">
                            <div></div>
                            <button type="submit" class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded mr-2">{{ __('ui_text.upload') }}</button>
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
