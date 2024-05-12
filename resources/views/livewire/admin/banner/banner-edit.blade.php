<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-white">
        <thead class="text-xs uppercase bg-gray-700">
            <tr>
                <th scope="col" class="w-4/6 px-6 py-5">
                    Title
                </th>
                <th scope="col" class="w-2/6 px-6 py-5 text-center">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b border-gray-400">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    Add Banner
                </th>
                <td class="px-6 py-4 flex flex-col space-y-3 items-center">
                    <a href="#" wire:click="openUploadBannerModal" class="font-medium text-blue-600 hover:underline">Add</a>
                </td>
            </tr>
            @foreach ($bannerJumbotron ?? [] as $banner)
                <tr class="bg-white border-b border-gray-400">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $banner->title }}
                    </th>
                    <td class="px-6 py-4 flex flex-col space-y-3 items-center">
                        <a href="#" wire:click="previewSelectedBanner('{{ $banner->banner_image_path }}')" class="font-medium text-indigo-600 hover:underline">Preview Banner</a>
                        <a href="#" wire:click="openEditBannerModal('{{ $banner->banner_image_path }}', '{{ $banner->banner_file_name }}')" class="font-medium text-blue-600 hover:underline">Edit Banner</a>
                        <a href="#" wire:click="openEditBannerDetailsModal('{{ $banner->id }}')" class="font-medium text-green-600 hover:underline">Edit Banner Details</a>
                        <a href="#" wire:click="openConfirmationModal('deleteBanner', {{ $banner->id }})" class="font-medium text-red-600 hover:underline">Delete Banner</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if ($showUploadBannerModal)
        <div class="bg-gray-100 bg-opacity-75 fixed z-10 inset-0 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen">
                <div class="bg-white w-1/2 h-auto rounded shadow-lg p-8">
                    <div class="flex justify-between items-center mb-4">
                        <div></div>
                        <button wire:click="closeUploadBannerModal" class="text-gray-600 hover:text-gray-800 focus:outline-none">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <form wire:submit.prevent="uploadBanner">
                        @csrf
                        <div class="p-2 mb-4 w-full">
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Title <span class="text-red-600">*</span></label>
                            <input type="text" id="title" wire:model="title" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="p-2 w-full">
                            <label for="subtitle" class="block mb-2 text-sm font-medium text-gray-900">Subtitle</label>
                            <input type="text" id="subtitle" wire:model="subtitle" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="p-2 w-full">
                            <label for="details" class="block mb-2 text-sm font-medium text-gray-900">Details</label>
                            <textarea id="details" wire:model="details" style="height: 123px;" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></textarea>
                        </div>
                        <div class="p-2 w-full">
                            <label for="div-date-range" class="block mb-2 text-sm font-medium text-gray-900">Date</label>
                            <div id="div-date-range" class="flex items-center">
                                <div class="relative">
                                    <div class="relative max-w-sm">
                                        <input id="date-start" datepicker-format="dd/mm/yyyy" type="date" wire:model="date_from" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5">
                                    </div>
                                </div>
                                <span class="mx-4 text-gray-500">to</span>
                                <div class="relative">
                                    <div class="relative max-w-sm">
                                        <input id="date-end" datepicker-format="dd/mm/yyyy" type="date" wire:model="date_to" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5">
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="p-2 w-full">
                            <label for="banner_file_name" class="block mb-2 text-sm font-medium text-gray-900">Banner File Name <span class="text-red-600">*</span></label>
                            <input type="text" id="banner_file_name" wire:model="banner_file_name" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            @error('banner_file_name') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div> --}}
                        <div class="p-2 w-full">
                            <label for="div-donation-needed" class="block mb-2 text-sm font-medium text-gray-900">Featured <span class="text-red-600">*</span></label>
                            <div class="flex" id="div-donation-needed">
                                <div class="flex items-center mx-2 my-0">
                                    <input id="featured_yes" type="radio" value="1" name="radio-featured" wire:model="featured" required class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:border-gray-600">
                                    <label for="featured_yes" class="ms-2 leading-7 text-sm text-gray-600">Yes</label>
                                </div>
                                <div class="flex items-center mx-2 my-0">
                                    <input id="featured_no" type="radio" value="0" name="radio-featured" wire:model="featured" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:border-gray-600">
                                    <label for="featured_no" class="ms-2 leading-7 text-sm text-gray-600">No</label>
                                </div>
                            </div>
                            @error('featured') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="flex justify-between items-center mb-4">
                            <label for="upload-banner" class="text-xl font-bold">Upload Banner <span class="text-red-600">*</span></label>
                        </div>
                        <div>
                            <input id="upload-banner" type="file" wire:model="banner_image_upload" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300" required>
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
                            <button type="submit" wire:loading.attr="disabled" class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded mr-2">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

    @if ($previewBanner)
        <div class="bg-gray-100 bg-opacity-75 fixed z-50 inset-0 overflow-y-auto">
            <div class="flex items-center justify-center h-full">
                <div class="max-w-screen-lg w-full mx-auto p-4">
                    <button wire:click="closeSelectedBanner" class="absolute top-0 right-0 m-4 text-white hover:text-gray-300 focus:outline-none">
                        <svg class="w-6 h-6 bg-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                    <img src="{{ asset('storage/'.$selectedBannerPath) }}" alt="Full Size Banner" class="lg:h-auto md:h-auto h-full lg:w-full md:w-1/2 w-full mx-auto">
                </div>
            </div>
        </div>
    @endif

    @if ($showEditBannerModal)
        <div class="bg-gray-100 bg-opacity-75 fixed z-10 inset-0 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen">
                <div class="bg-white w-1/2 h-auto rounded shadow-lg p-8">
                    <div class="flex justify-between items-center mb-4">
                        <div></div>
                        <button wire:click="closeEditBannerModal" class="text-gray-600 hover:text-gray-800 focus:outline-none">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <form wire:submit.prevent="uploadEditBanner">
                        @csrf

                        <div class="flex justify-between items-center mb-4">
                            <label for="upload-banner" class="text-xl font-bold">Upload Banner <span class="text-red-600">*</span></label>
                        </div>
                        <div>
                            <input id="upload-banner" type="file" wire:model="banner_image_upload" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300" required>
                            @error('banner_image_upload') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="p-2 w-full mt-5" wire:loading wire:target="banner_image_upload">Uploading...</div>
                        <div class="p-2 w-full mt-5">
                            @if ($banner_image_upload)
                                Banner Preview:
                                <img src="{{ $banner_image_upload->temporaryUrl() }}">
                            @else
                                @if (Illuminate\Support\Facades\File::exists('storage/'.$selectedBannerPath))
                                    Banner Uploaded:
                                    <img src="{{ asset('storage/'.$selectedBannerPath) }}">
                                @endif
                            @endif
                        </div>
                        <div class="flex justify-between mt-10">
                            <div></div>
                            <button type="submit" wire:loading.attr="disabled" class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded mr-2">Upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

    @if ($showEditBannerDetailsModal)
        <div class="bg-gray-100 bg-opacity-75 fixed z-10 inset-0 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen">
                <div class="bg-white w-1/2 h-auto rounded shadow-lg p-8">
                    <div class="flex justify-between items-center mb-4">
                        <div></div>
                        <button wire:click="closeEditBannerDetailsModal" class="text-gray-600 hover:text-gray-800 focus:outline-none">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <form wire:submit.prevent="editBannerDetails">
                        @csrf
                        <div class="p-2 mb-4 w-full">
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Title <span class="text-red-600">*</span></label>
                            <input type="text" id="title" wire:model="title" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="p-2 w-full">
                            <label for="subtitle" class="block mb-2 text-sm font-medium text-gray-900">Subtitle</label>
                            <input type="text" id="subtitle" wire:model="subtitle" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="p-2 w-full">
                            <label for="details" class="block mb-2 text-sm font-medium text-gray-900">Details</label>
                            <textarea id="details" wire:model="details" style="height: 123px;" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></textarea>
                        </div>
                        <div class="p-2 w-full">
                            <label for="div-date-range" class="block mb-2 text-sm font-medium text-gray-900">Date</label>
                            <div id="div-date-range" class="flex items-center">
                                <div class="relative">
                                    <div class="relative max-w-sm">
                                        <input id="date-start" datepicker-format="dd/mm/yyyy" type="date" wire:model="date_from" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5">
                                    </div>
                                </div>
                                <span class="mx-4 text-gray-500">to</span>
                                <div class="relative">
                                    <div class="relative max-w-sm">
                                        <input id="date-end" datepicker-format="dd/mm/yyyy" type="date" wire:model="date_to" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-2 w-full">
                            <label for="banner_file_name" class="block mb-2 text-sm font-medium text-gray-900">Banner File Name <span class="text-red-600">*</span></label>
                            <input type="text" id="banner_file_name" wire:model="banner_file_name" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            @error('banner_file_name') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="p-2 w-full">
                            <label for="div-donation-needed" class="block mb-2 text-sm font-medium text-gray-900">Featured <span class="text-red-600">*</span></label>
                            <div class="flex" id="div-donation-needed">
                                <div class="flex items-center mx-2 my-0">
                                    <input id="featured_yes" type="radio" value="1" name="radio-featured" wire:model="featured" required class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:border-gray-600">
                                    <label for="featured_yes" class="ms-2 leading-7 text-sm text-gray-600">Yes</label>
                                </div>
                                <div class="flex items-center mx-2 my-0">
                                    <input id="featured_no" type="radio" value="0" name="radio-featured" wire:model="featured" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:border-gray-600">
                                    <label for="featured_no" class="ms-2 leading-7 text-sm text-gray-600">No</label>
                                </div>
                            </div>
                            @error('featured') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>

                        <div class="flex justify-between mt-10">
                            <div></div>
                            <button type="submit" wire:loading.attr="disabled" class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded mr-2">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

    @if ($showAlertModal)
        @include('livewire.components.alert-modal', ['alertModalType' => $alertModalType, 'alertModalDescription' => $alertModalDescription])
    @endif

    @if ($showConfirmationModal)
        @include('livewire.components.confirmation-modal', ['confirmationModalTitle' => $confirmationModalTitle])
    @endif
</div>
