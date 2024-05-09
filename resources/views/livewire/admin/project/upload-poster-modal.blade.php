<div class="bg-gray-100 bg-opacity-75 fixed z-10 inset-0 overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white w-1/2 h-auto rounded shadow-lg p-8">
            <div class="flex justify-between items-center mb-4">
                <label for="upload-poster" class="text-xl font-bold">Upload Poster</label>
                <button wire:click="closeUploadPosterModal" class="text-gray-600 hover:text-gray-800 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <div>
                <input id="upload-poster" type="file" wire:model="poster_image_upload" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300" required>
                @error('poster_image_upload') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <div class="p-2 w-full mt-5" wire:loading wire:target="poster_image_upload">Uploading...</div>
            <div class="p-2 w-full mt-5">
                @if ($poster_image_upload)
                    Photo Preview:
                    <img src="{{ $poster_image_upload->temporaryUrl() }}">
                @else
                    @if (Illuminate\Support\Facades\File::exists('storage/poster/'.$folder_path.'.jpg'))
                        Photo Uploaded:
                        <img src="{{ asset('storage/poster/'.$folder_path.'.jpg') }}">
                    @endif
                @endif
            </div>
            <div class="flex justify-between mt-10">
                <div></div>
                <button class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded mr-2" wire:click="uploadPoster">Upload</button>
            </div>
        </div>
    </div>
</div>
