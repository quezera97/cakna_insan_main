<div class="flex items-center justify-center min-h-screen">
    <div class="bg-white w-1/4 h-auto rounded shadow-lg p-8">
        <div class="flex justify-between items-center mb-4">
            <label for="upload-images" class="text-xl font-bold">Upload Images</label>
            <button wire:click="closeUploadImagesModal" class="text-gray-600 hover:text-gray-800 focus:outline-none">
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <div>
            <input id="upload-images" type="file" wire:model="images_upload" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300" multiple required>
            @error('images_upload.*') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="p-2 w-full mt-5" wire:loading wire:target="images_upload">Uploading...</div>
        <div class="p-2 w-full mt-5">
            @forelse($images_upload ?? [] as $image)
                @if ($image)
                    Photo Preview:
                    <img class="mb-3" src="{{ $image->temporaryUrl() }}">
                @endif
            @empty
                @forelse ($uploadedImages as $key => $image)
                    @if ($image)
                        Photo Uploaded:
                        <img class="mb-3" src="{{ asset($image) }}">
                    @endif
                @empty
                    No Images
                @endforelse
            @endforelse
        </div>
        <div class="flex justify-between mt-10">
            <div></div>
            <button class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded mr-2" wire:click="uploadImages">Upload</button>
        </div>
    </div>
</div>
