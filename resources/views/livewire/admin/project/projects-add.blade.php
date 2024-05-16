<div>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-10 mx-auto">
            <h1 class="text-gray-900 text-2xl title-font font-medium mb-4">Please Choose Type of Project</h1>
            <hr><br>
            <div x-data="{ selectedIncoming: @entangle('forIncomingProject'), selectedPast: @entangle('forPastProject') }" class="flex flex-wrap -m-4">
                <button wire:click="selectProject('incoming')" class="lg:w-1/2 p-2" x-bind:class="{ 'border border-indigo-700 border-2 rounded': selectedIncoming === true }">
                    <div class="bg-gray-400 bg-opacity-75 rounded-lg overflow-hidden text-center p-2">
                        <h1 class="title-font sm:text-2xl text-xl font-medium text-gray-900 mb-3">Current Projects</h1>
                    </div>
                </button>

                <button wire:click="selectProject('past')" class="lg:w-1/2 p-2" x-bind:class="{ 'border border-indigo-700 border-2 rounded': selectedPast === true }">
                    <div class="bg-gray-400 bg-opacity-75 rounded-lg overflow-hidden text-center p-2">
                        <h1 class="title-font sm:text-2xl text-xl font-medium text-gray-900 mb-3">Past Projects</h1>
                    </div>
                </button>
            </div>

        </div>
    </section>
    <div class="container px-5 py-10 mx-auto" x-data="{ type_of_project: @entangle('typeOfProject') }">
        <div x-show="type_of_project">
            <form wire:submit.prevent="save">
                @csrf
                <section class="text-gray-600 body-font overflow-hidden">
                    <div class="w-full mx-auto flex flex-wrap">
                        <div class="lg:w-1/2 w-full lg:pr-10 lg:py-6 mb-6 lg:mb-0">
                            <div class="flex flex-wrap -m-2">
                                <div class="p-2 w-full">
                                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Title <span class="text-red-600">*</span></label>
                                    <div class="flex">
                                        <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md">
                                            Projek
                                        </span>
                                        <input type="text" id="title" wire:model="title" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                    @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
                                </div>
                                <div class="p-2 w-full">
                                    <label for="subtitle" class="block mb-2 text-sm font-medium text-gray-900">Subtitle</label>
                                    <input type="text" id="subtitle" wire:model="subtitle" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                <div class="p-2 w-full">
                                    <label for="details" class="block mb-2 text-sm font-medium text-gray-900">{{ __('ui_text.details') }}</label>
                                    <textarea id="details" wire:model="details" style="height: 123px;" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></textarea>
                                </div>
                                {{-- <div class="p-2 w-full">
                                    <label for="folder_path" class="block mb-2 text-sm font-medium text-gray-900">Folder Path <span class="text-red-600">*</span></label>
                                    <input type="text" id="folder_path" wire:model="folder_path" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    @error('folder_path') <span class="text-red-500">{{ $message }}</span> @enderror
                                </div> --}}

                                @if ($typeOfProject == $incomingProject)
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
                                @endif
                            </div>
                        </div>
                        <div class="lg:w-1/2 w-full lg:pr-10 lg:py-6 mb-6 lg:mb-0">
                            <div class="flex flex-wrap -m-2">
                                @if ($typeOfProject == $pastProject)
                                    <div class="p-2 w-full">
                                        <label for="div-date" class="block mb-2 text-sm font-medium text-gray-900">Date</label>
                                        <div id="div-date" class="flex items-center">
                                            <input id="date" datepicker-format="dd/mm/yyyy" type="date" wire:model="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5">
                                        </div>
                                    </div>
                                @endif
                                <div class="p-2 w-full">
                                    <label for="place" class="block mb-2 text-sm font-medium text-gray-900">Place</label>
                                    <input type="text" id="place" wire:model="place" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                <div class="p-2 w-1/2">
                                    <label for="pax" class="block mb-2 text-sm font-medium text-gray-900">Pax</label>
                                    <input type="number" id="pax" wire:model="pax" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                <div class="p-2 w-1/2">
                                    <label for="div-transportation" class="block mb-2 text-sm font-medium text-gray-900">Transportation Provided</label>
                                    <div class="flex" id="div-transportation">
                                        <div class="flex items-center mx-2 my-0">
                                            <input id="transportation_yes" type="radio" value="1" name="radio-transportation" wire:model="transportation" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:border-gray-600">
                                            <label for="transportation_yes" class="ms-2 leading-7 text-sm text-gray-600">Yes</label>
                                        </div>
                                        <div class="flex items-center mx-2 my-0">
                                            <input id="transportation_no" type="radio" value="0" name="radio-transportation" wire:model="transportation" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:border-gray-600">
                                            <label for="transportation_no" class="ms-2 leading-7 text-sm text-gray-600">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-2 {{ $typeOfProject == $incomingProject ? 'w-1/2' : 'w-full' }}">
                                    <label for="donation_needed" class="block mb-2 text-sm font-medium text-gray-900">Donation Needed</label>
                                    <input type="number" id="donation_needed" wire:model="donation_needed" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                @if ($typeOfProject == $incomingProject)
                                    <div class="p-2 w-1/2">
                                        <label for="div-donation-needed" class="block mb-2 text-sm font-medium text-gray-900">Featured</label>
                                        <div class="flex" id="div-donation-needed">
                                            <div class="flex items-center mx-2 my-0">
                                                <input id="featured_yes" type="radio" value="1" name="radio-featured" wire:model="featured" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:border-gray-600">
                                                <label for="featured_yes" class="ms-2 leading-7 text-sm text-gray-600">Yes</label>
                                            </div>
                                            <div class="flex items-center mx-2 my-0">
                                                <input id="featured_no" type="radio" value="0" name="radio-featured" wire:model="featured" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:border-gray-600">
                                                <label for="featured_no" class="ms-2 leading-7 text-sm text-gray-600">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-2 w-full">
                                        <form class="max-w-[16rem] mx-auto grid grid-cols-2 gap-4">
                                            <div class="my-2">
                                                <label for="start-time" class="block mb-2 text-sm font-medium text-gray-900">Start Time:</label>
                                                <div class="relative">
                                                    <input type="time" id="start-time" wire:model="time_from" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="00:00" />
                                                </div>
                                            </div>
                                            <div>
                                                <label for="end-time" class="block mb-2 text-sm font-medium text-gray-900">End Time:</label>
                                                <div class="relative">
                                                    <input type="time" id="end-time" wire:model="time_to" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="00:00" />
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="p-2 w-full mt-5">
                        <button type="submit" wire:loading.attr="disabled" class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">{{ __('ui_text.save') }}</button>
                    </div>
                </section>
            </form>

            @if ($showAlertModal)
                @include('livewire.components.alert-modal', ['alertModalType' => $alertModalType, 'alertModalDescription' => $alertModalDescription])
            @endif
        </div>
    </div>
</div>
