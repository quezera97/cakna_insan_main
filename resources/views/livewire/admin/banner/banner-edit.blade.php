<div>
    <button wire:click="openUploadBannerModal" class="mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Upload</button>


    @if ($showUploadBannerModal)
        <div class="bg-gray-100 bg-opacity-75 fixed z-10 inset-0 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen">
                <div class="bg-white w-1/4 h-auto rounded shadow-lg p-8">
                    <div class="flex justify-between items-center mb-4">
                        <div></div>
                        <button wire:click="closeUploadBannerModal" class="text-gray-600 hover:text-gray-800 focus:outline-none">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="p-2 mb-4 w-full">
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Title</label>
                        <input type="text" id="title" wire:model.live="title" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                    <div class="p-2 mb-4 w-full">
                        <label for="banner_file_name" class="block mb-2 text-sm font-medium text-gray-900">Banner File Name <span class="text-red-600">*</span></label>
                        <input type="text" id="banner_file_name" wire:model.live="banner_file_name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        @error('banner_file_name') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="flex justify-between items-center mb-4">
                        <label for="upload-banner" class="text-xl font-bold">Upload Banner <span class="text-red-600">*</span></label>
                    </div>
                    <div>
                        <input id="upload-banner" type="file" wire:model="banner_image_upload" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300" required>
                        @error('banner_image_upload') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="p-2 w-full mt-5" wire:loading wire:target="banner_image_upload">Uploading...</div>
                    <div class="p-2 w-full mt-5">
                        @if ($banner_image_upload)
                            Banner Preview:
                            <img src="{{ $banner_image_upload->temporaryUrl() }}">
                        @else
                            @if (Illuminate\Support\Facades\File::exists('storage/banner/'.$banner_file_name.'.jpg'))
                                Banner Uploaded:
                                <img src="{{ asset('storage/banner/'.$banner_file_name.'.jpg') }}">
                            @endif
                        @endif
                    </div>
                    <div class="flex justify-between mt-10">
                        <div></div>
                        <button class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded mr-2" wire:click="uploadBanner">Upload</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
