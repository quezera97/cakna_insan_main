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
                    Add Post
                </th>
                <td class="px-6 py-4 flex flex-col space-y-3 items-center">
                    <a href="#" wire:click="openUploadPostModal" class="font-medium text-blue-600 hover:underline">{{ __('ui_text.add') }}</a>
                </td>
            </tr>
            @foreach ($posts ?? [] as $post)
                <tr class="bg-white border-b border-gray-400">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $post->title }}
                    </th>
                    <td class="px-6 py-4 flex flex-col space-y-3 items-center">
                        <a href="#" wire:click="openEditPostDetailsModal('{{ $post->id }}')" class="font-medium text-green-600 hover:underline">{{ __('ui_text.edit') }}</a>
                        <a href="#" wire:click="openConfirmationModal('deletePost', {{ $post->id }})" class="font-medium text-red-600 hover:underline">{{ __('ui_text.delete') }}</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if ($showPostModal)
        <div class="bg-gray-100 bg-opacity-75 fixed z-10 inset-0 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen">
                <div class="bg-white w-1/2 h-auto rounded shadow-lg p-8">
                    <div class="flex justify-between items-center mb-4">
                        <div></div>
                        <button wire:click="closeUploadPostModal" class="text-gray-600 hover:text-gray-800 focus:outline-none">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <form wire:submit.prevent="save">
                        @csrf
                        <div class="p-2 mb-4 w-full">
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Title <span class="text-red-600">*</span></label>
                            <input type="text" id="title" wire:model="title" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="p-2 w-full">
                            <label for="details" class="block mb-2 text-sm font-medium text-gray-900">{{ __('ui_text.details') }}</label>
                            <textarea id="details" wire:model="details" style="height: 123px;" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></textarea>
                        </div>
                        <div class="p-2 w-full">
                            <label for="author" class="block mb-2 text-sm font-medium text-gray-900">Author</label>
                            <input type="text" id="author" wire:model="author" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="flex flex-row">
                            <div class="p-2 w-1/2">
                                <label for="div-date" class="block mb-2 text-sm font-medium text-gray-900">Date</label>
                                <div id="div-date" class="flex items-center">
                                    <input id="date" datepicker-format="dd/mm/yyyy" type="date" wire:model="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5">
                                </div>
                            </div>
                            <div class="p-2 w-1/2">
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
                        </div>
                        <div class="p-2 w-full mt-5">
                            <button id="buttonSave" type="submit" class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">{{ __('ui_text.save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

    @if ($showEditPostDetailsModal)
        <div class="bg-gray-100 bg-opacity-75 fixed z-10 inset-0 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen">
                <div class="bg-white w-1/2 h-auto rounded shadow-lg p-8">
                    <div class="flex justify-between items-center mb-4">
                        <div></div>
                        <button wire:click="closeEditPostDetailsModal" class="text-gray-600 hover:text-gray-800 focus:outline-none">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <form wire:submit.prevent="editPostDetail">
                        @csrf
                        <div class="p-2 mb-4 w-full">
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Title <span class="text-red-600">*</span></label>
                            <input type="text" id="title" wire:model="title" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="p-2 w-full">
                            <label for="details" class="block mb-2 text-sm font-medium text-gray-900">{{ __('ui_text.details') }}</label>
                            <textarea id="details" wire:model="details" style="height: 123px;" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></textarea>
                        </div>
                        <div class="p-2 w-full">
                            <label for="author" class="block mb-2 text-sm font-medium text-gray-900">Author</label>
                            <input type="text" id="author" wire:model="author" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="flex flex-row">
                            <div class="p-2 w-1/2">
                                <label for="div-date" class="block mb-2 text-sm font-medium text-gray-900">Date</label>
                                <div id="div-date" class="flex items-center">
                                    <input id="date" datepicker-format="dd/mm/yyyy" type="date" wire:model="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5">
                                </div>
                            </div>
                            <div class="p-2 w-1/2">
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
                        </div>
                        <div class="p-2 w-full mt-5">
                            <button id="buttonSave" type="submit" class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">{{ __('ui_text.save') }}</button>
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
