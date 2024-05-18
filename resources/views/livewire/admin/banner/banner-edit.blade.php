<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-white">
        <thead class="text-xs uppercase bg-gray-700">
            <tr>
                <th scope="col" class="w-2/6 px-6 py-5">
                    {{ __('ui_text.title') }}
                </th>
                <th scope="col" class="w-2/6 px-6 py-5">
                    {{ __('ui_text.donation_link') }}
                </th>
                <th scope="col" class="w-2/6 px-6 py-5 text-center">
                    {{ __('ui_text.action') }}
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b border-gray-400">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    {{ __('ui_text.add').' '.__('ui_text.banner') }}
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"></th>
                <td class="px-6 py-4 flex flex-col space-y-3 items-center">
                    <a href="#" wire:click="openUploadBannerModal" class="font-medium text-blue-600 hover:underline">{{ __('ui_text.add') }}</a>
                </td>
            </tr>
            @foreach ($paginatedBannerJumbotron ?? [] as $banner)
                <tr class="bg-white border-b border-gray-400">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $banner->title }}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $banner->donation_button_url }}
                    </th>
                    <td class="px-6 py-4 flex flex-col space-y-3 items-center">
                        <a href="#" wire:click="previewSelectedBanner('{{ $banner->banner_image_path }}')" class="font-medium text-indigo-600 hover:underline"{{ __('ui_text.preview') }}</a>
                        <a href="#" wire:click="openEditBannerModal('{{ $banner->banner_image_path }}', '{{ $banner->banner_file_name }}')" class="font-medium text-blue-600 hover:underline">{{ __('ui_text.edit').' '.__('ui_text.banner') }}</a>
                        <a href="#" wire:click="openEditBannerDetailsModal('{{ $banner->id }}')" class="font-medium text-green-600 hover:underline">{{ __('ui_text.edit').' '.__('ui_text.banner_details') }}</a>
                        <a href="#" wire:click="openConfirmationModal('deleteBanner', {{ $banner->id }})" class="font-medium text-red-600 hover:underline">{{ __('ui_text.delete') }}</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">
        {{ $paginatedBannerJumbotron->links() }}
    </div>

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
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900">{{ __('ui_text.title') }} <span class="text-red-600">*</span></label>
                            <input type="text" id="title" wire:model="title" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="p-2 w-full">
                            <label for="subtitle" class="block mb-2 text-sm font-medium text-gray-900">{{ __('ui_text.subtitle') }}</label>
                            <input type="text" id="subtitle" wire:model="subtitle" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="p-2 w-full">
                            <label for="details" class="block mb-2 text-sm font-medium text-gray-900">{{ __('ui_text.details') }}</label>
                            <textarea id="details" wire:model="details" style="height: 123px;" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></textarea>
                        </div>

                        <div class="p-2 w-full">
                            <label for="details_button_url" class="block mb-2 text-sm font-medium text-gray-900">{{ __('ui_text.select_an_option') }}</label>
                            <select id="details_button_url" wire:model="details_button_url" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option selected value="" >{{ __('ui_text.choose_a_project') }}</option>
                                @foreach ($projects as $project)
                                    <option value="{{ $project->id }}">
                                        {{ $project->projectable?->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="p-2 w-full">
                            <label for="donation_button_url" class="block mb-2 text-sm font-medium text-gray-900">{{ __('ui_text.donation_link') }}</label>
                            <div class="flex">
                                <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md">
                                    {{ "https://toyyibpay.com/" }}
                                </span>
                                <input type="text" id="donation_button_url" wire:model="donation_button_url" lowercase class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
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
                                    <label for="featured_yes" class="ms-2 leading-7 text-sm text-gray-600">{{ __('ui_text.yes') }}</label>
                                </div>
                                <div class="flex items-center mx-2 my-0">
                                    <input id="featured_no" type="radio" value="0" name="radio-featured" wire:model="featured" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:border-gray-600">
                                    <label for="featured_no" class="ms-2 leading-7 text-sm text-gray-600">{{ __('ui_text.no') }}</label>
                                </div>
                            </div>
                            @error('featured') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="flex justify-between items-center mb-4">
                            <label for="upload-banner" class="text-xl font-bold">{{ __('ui_text.upload') }} <span class="text-red-600">*</span></label>
                        </div>
                        <div>
                            <input id="upload-banner" type="file" wire:model="banner_image_upload" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300" required>
                            @error('banner_image_upload') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="p-2 w-full mt-5" wire:loading wire:target="banner_image_upload">{{ __('ui_text.uploading') }}...</div>
                        <div class="p-2 w-full mt-5">
                            @if ($banner_image_upload)
                                {{ __('ui_text.preview') }}:
                                <img src="{{ $banner_image_upload->temporaryUrl() }}">
                            @else
                                @if (Illuminate\Support\Facades\File::exists('storage/banner/'.$banner_file_name.'.jpg'))
                                    {{ __('ui_text.uploaded') }}:
                                    <img src="{{ asset('storage/banner/'.$banner_file_name.'.jpg') }}">
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
                            <label for="upload-banner" class="text-xl font-bold">{{ __('ui_text.upload') }}<span class="text-red-600">*</span></label>
                        </div>
                        <div>
                            <input id="upload-banner" type="file" wire:model="banner_image_upload" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300" required>
                            @error('banner_image_upload') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="p-2 w-full mt-5" wire:loading wire:target="banner_image_upload">{{ __('ui_text.uploading') }}...</div>
                        <div class="p-2 w-full mt-5">
                            @if ($banner_image_upload)
                                {{ __('ui_text.preview') }}:
                                <img src="{{ $banner_image_upload->temporaryUrl() }}">
                            @else
                                @if (Illuminate\Support\Facades\File::exists('storage/'.$selectedBannerPath))
                                    {{ __('ui_text.uploaded') }}:
                                    <img src="{{ asset('storage/'.$selectedBannerPath) }}">
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
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900">{{ __('ui_text.title') }} <span class="text-red-600">*</span></label>
                            <input type="text" id="title" wire:model="title" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="p-2 w-full">
                            <label for="subtitle" class="block mb-2 text-sm font-medium text-gray-900">{{ __('ui_text.subtitle') }}</label>
                            <input type="text" id="subtitle" wire:model="subtitle" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="p-2 w-full">
                            <label for="details" class="block mb-2 text-sm font-medium text-gray-900">{{ __('ui_text.details') }}</label>
                            <textarea id="details" wire:model="details" style="height: 123px;" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></textarea>
                        </div>
                        <div class="p-2 w-full">
                            <label for="details_button_url" class="block mb-2 text-sm font-medium text-gray-900">{{ __('ui_text.select_an_option') }}</label>
                            <select id="details_button_url" wire:model="details_button_url" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option selected value="" >{{ __('ui_text.choose_a_project') }}</option>
                                @foreach ($projects as $project)
                                    <option value="{{ $project->id }}">
                                        {{ $project->projectable?->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="p-2 w-full">
                            <label for="donation_button_url" class="block mb-2 text-sm font-medium text-gray-900">{{ __('ui_text.donation_link') }}</label>
                            <div class="flex">
                                <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md">
                                    {{ "https://toyyibpay.com/" }}
                                </span>
                                <input type="text" id="donation_button_url" wire:model="donation_button_url" lowercase class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>
                        <div class="p-2 w-full">
                            <label for="div-donation-needed" class="block mb-2 text-sm font-medium text-gray-900">Featured <span class="text-red-600">*</span></label>
                            <div class="flex" id="div-donation-needed">
                                <div class="flex items-center mx-2 my-0">
                                    <input id="featured_yes" type="radio" value="1" name="radio-featured" wire:model="featured" required class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:border-gray-600">
                                    <label for="featured_yes" class="ms-2 leading-7 text-sm text-gray-600">{{ __('ui_text.yes') }}</label>
                                </div>
                                <div class="flex items-center mx-2 my-0">
                                    <input id="featured_no" type="radio" value="0" name="radio-featured" wire:model="featured" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:border-gray-600">
                                    <label for="featured_no" class="ms-2 leading-7 text-sm text-gray-600">{{ __('ui_text.no') }}</label>
                                </div>
                            </div>
                            @error('featured') <span class="text-red-500">{{ $message }}</span> @enderror
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

    @if ($showAlertModal)
        @include('livewire.components.alert-modal', ['alertModalType' => $alertModalType, 'alertModalDescription' => $alertModalDescription])
    @endif

    @if ($showConfirmationModal)
        @include('livewire.components.confirmation-modal', ['confirmationModalTitle' => $confirmationModalTitle])
    @endif
</div>
