<div>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-10 mx-auto">
            <h1 class="text-gray-900 text-2xl title-font font-medium mb-4">Please Choose Type of Project</h1>
            <hr><br>
            <div x-data="{ selectedIncoming: @entangle('forIncomingProject'), selectedPast: @entangle('forPastProject') }" class="flex flex-wrap -m-4">
                <button wire:click="selectProject('incoming')" class="lg:w-1/2 p-2" x-bind:class="{ 'border border-indigo-700 border-2 rounded': selectedIncoming === true }">
                    <div class="bg-gray-400 bg-opacity-75 rounded-lg overflow-hidden text-center p-2">
                        <h1 class="title-font sm:text-2xl text-xl font-medium text-gray-900 mb-3">Incoming Project</h1>
                    </div>
                </button>

                <button wire:click="selectProject('past')" class="lg:w-1/2 p-2" x-bind:class="{ 'border border-indigo-700 border-2 rounded': selectedPast === true }">
                    <div class="bg-gray-400 bg-opacity-75 rounded-lg overflow-hidden text-center p-2">
                        <h1 class="title-font sm:text-2xl text-xl font-medium text-gray-900 mb-3">Past Project</h1>
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
                    <div class="lg:w-4/5 mx-auto flex flex-wrap" x-data="{ openIncoming: @entangle('forIncomingProject') }">
                        <div x-show="openIncoming" class="lg:w-1/2 w-full lg:pr-10 lg:py-6 mb-6 lg:mb-0">
                            <div class="flex flex-wrap -m-2">
                                <div class="p-2 w-full">
                                    <label for="title-incoming" class="block mb-2 text-sm font-medium text-gray-900">Title <span class="text-red-700">*</span></label>
                                    <div class="flex">
                                        <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md">
                                            Projek
                                        </span>
                                        <input type="text" id="title-incoming" wire:model.lazy="title" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                </div>
                                <div class="p-2 w-full">
                                    <label for="subtitle-incoming" class="block mb-2 text-sm font-medium text-gray-900">Subtitle <span class="text-red-700">*</span></label>
                                    <input type="text" id="subtitle-incoming" wire:model.lazy="subtitle" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                <div class="p-2 w-full">
                                    <label for="details-incoming" class="block mb-2 text-sm font-medium text-gray-900">Details <span class="text-red-700">*</span></label>
                                    <textarea id="details-incoming" wire:model.lazy="details" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></textarea>
                                </div>
                                <div class="p-2 w-full">
                                    <label for="div-date-range-incoming" class="block mb-2 text-sm font-medium text-gray-900">Date <span class="text-red-700">*</span></label>
                                    <div id="div-date-range-incoming" class="flex items-center">
                                        <div class="relative">
                                            <div class="relative max-w-sm">
                                                <input id="date-start-incoming" datepicker-format="dd/mm/yyyy" type="date" wire:model.lazy="date_from" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5">
                                            </div>
                                        </div>
                                        <span class="mx-4 text-gray-500">to</span>
                                        <div class="relative">
                                            <div class="relative max-w-sm">
                                                <input id="date-end-incoming" datepicker-format="dd/mm/yyyy" type="date" wire:model.lazy="date_to" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-2 w-full">
                                    <form class="max-w-[16rem] mx-auto grid grid-cols-2 gap-4">
                                        <div class="my-2">
                                            <label for="start-time-incoming" class="block mb-2 text-sm font-medium text-gray-900">Start Time:</label>
                                            <div class="relative">
                                                <input type="time" id="start-time-incoming" wire:model.lazy="time_from" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="00:00" />
                                            </div>
                                        </div>
                                        <div>
                                            <label for="end-time-incoming" class="block mb-2 text-sm font-medium text-gray-900">End Time:</label>
                                            <div class="relative">
                                                <input type="time" id="end-time-incoming" wire:model.lazy="time_to" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="00:00" />
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="p-2 w-1/2">
                                    <label for="donation_needed-incoming" class="block mb-2 text-sm font-medium text-gray-900">Donation Needed</label>
                                    <input type="number" id="donation_needed-incoming" wire:model.lazy="donation_needed" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                <div class="p-2 w-1/2">
                                    <label for="div-featured-incoming" class="block mb-2 text-sm font-medium text-gray-900">Featured <span class="text-red-700">*</span></label>
                                    <div class="flex" id="div-featured-incoming">
                                        <div class="flex items-center mx-2 my-0">
                                            <input id="featured_yes-incoming" type="radio" value="1" name="radio-featured-incoming" wire:model.lazy="featured" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:border-gray-600">
                                            <label for="featured_yes-incoming" class="ms-2 leading-7 text-sm text-gray-600">Yes</label>
                                        </div>
                                        <div class="flex items-center mx-2 my-0">
                                            <input id="featured_no-incoming" type="radio" value="0" name="radio-featured-incoming" wire:model.lazy="featured" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:border-gray-600">
                                            <label for="featured_no-incoming" class="ms-2 leading-7 text-sm text-gray-600">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div x-show="openIncoming" class="lg:w-1/2 w-full lg:pr-10 lg:py-6 mb-6 lg:mb-0">
                            <div class="flex flex-wrap -m-2">
                                <div class="p-2 w-full">
                                    <label for="place-incoming" class="block mb-2 text-sm font-medium text-gray-900">Place <span class="text-red-700">*</span></label>
                                    <input type="text" id="place-incoming" wire:model.lazy="place" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                <div class="p-2 w-1/2">
                                    <label for="pax-incoming" class="block mb-2 text-sm font-medium text-gray-900">Pax <span class="text-red-700">*</span></label>
                                    <input type="number" id="pax-incoming" wire:model.lazy="pax" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                <div class="p-2 w-1/2">
                                    <label for="div-transportation-incoming" class="block mb-2 text-sm font-medium text-gray-900">Transportation Provided <span class="text-red-700">*</span></label>
                                    <div class="flex" id="div-transportation-incoming">
                                        <div class="flex items-center mx-2 my-0">
                                            <input id="transportation_yes-incoming" type="radio" value="1" name="radio-transportation-incoming" wire:model.lazy="transportation" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:border-gray-600">
                                            <label for="transportation_yes-incoming" class="ms-2 leading-7 text-sm text-gray-600">Yes</label>
                                        </div>
                                        <div class="flex items-center mx-2 my-0">
                                            <input id="transportation_no-incoming" type="radio" value="0" name="radio-transportation-incoming" wire:model.lazy="transportation" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:border-gray-600">
                                            <label for="transportation_no-incoming" class="ms-2 leading-7 text-sm text-gray-600">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-2 w-1/2 mt-10">
                                    <button type="button" class="text-white bg-indigo-500 border-0 py-2 px-7 focus:outline-none hover:bg-indigo-600 rounded text-lg" wire:click="openUploadPosterModal">Upload Poster</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="lg:w-4/5 mx-auto flex flex-wrap" x-data="{ openPast: @entangle('forPastProject') }">
                        <div x-show="openPast" class="lg:w-1/2 w-full lg:pr-10 lg:py-6 mb-6 lg:mb-0">
                            <div class="flex flex-wrap -m-2">
                                <div class="p-2 w-full">
                                    <label for="title-past" class="block mb-2 text-sm font-medium text-gray-900">Title <span class="text-red-700">*</span></label>
                                    <div class="flex">
                                        <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md">
                                            Projek
                                        </span>
                                        <input type="text" id="title-past" wire:model.lazy="title" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                </div>
                                <div class="p-2 w-full">
                                    <label for="subtitle-past" class="block mb-2 text-sm font-medium text-gray-900">Subtitle <span class="text-red-700">*</span></label>
                                    <input type="text" id="subtitle-past" wire:model.lazy="subtitle" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                <div class="p-2 w-full">
                                    <label for="details-past" class="block mb-2 text-sm font-medium text-gray-900">Details <span class="text-red-700">*</span></label>
                                    <textarea id="details-past" wire:model.lazy="details" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></textarea>
                                </div>
                                <div class="p-2 w-1/2">
                                    <label for="div-date-past" class="block mb-2 text-sm font-medium text-gray-900">Tarikh</label>
                                    <div id="div-date-past" class="flex items-center">
                                        <input id="date-past" datepicker-format="dd/mm/yyyy" type="date" wire:model.lazy="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5">
                                    </div>
                                </div>
                                <div class="p-2 w-1/2">
                                    <label for="donation_needed-past" class="block mb-2 text-sm font-medium text-gray-900">Donation Needed</label>
                                    <input type="number" id="donation_needed-past" wire:model.lazy="donation_needed" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                <div class="p-2 w-1/2">
                                    <label for="div-featured-past" class="block mb-2 text-sm font-medium text-gray-900">Featured <span class="text-red-700">*</span></label>
                                    <div class="flex" id="div-featured-past">
                                        <div class="flex items-center mx-2 my-0">
                                            <input id="featured_yes-past" type="radio" value="1" name="radio-featured-past" wire:model.lazy="featured" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:border-gray-600">
                                            <label for="featured_yes-past" class="ms-2 leading-7 text-sm text-gray-600">Yes</label>
                                        </div>
                                        <div class="flex items-center mx-2 my-0">
                                            <input id="featured_no-past" type="radio" value="0" name="radio-featured-past" wire:model.lazy="featured" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:border-gray-600">
                                            <label for="featured_no-past" class="ms-2 leading-7 text-sm text-gray-600">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div x-show="openPast" class="lg:w-1/2 w-full lg:pr-10 lg:py-6 mb-6 lg:mb-0">
                            <div class="flex flex-wrap -m-2">
                                <div class="p-2 w-full">
                                    <label for="place-past" class="block mb-2 text-sm font-medium text-gray-900">Place <span class="text-red-700">*</span></label>
                                    <input type="text-past" id="place" wire:model.lazy="place" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                <div class="p-2 w-1/2">
                                    <label for="pax-past" class="block mb-2 text-sm font-medium text-gray-900">Pax <span class="text-red-700">*</span></label>
                                    <input type="number" id="pax-past" wire:model.lazy="pax" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                <div class="p-2 w-1/2">
                                    <label for="div-transportation-past" class="block mb-2 text-sm font-medium text-gray-900">Transportation Provided <span class="text-red-700">*</span></label>
                                    <div class="flex" id="div-transportation-past">
                                        <div class="flex items-center mx-2 my-0">
                                            <input id="transportation_yes-past" type="radio" value="1" name="radio-transportation-past" wire:model.lazy="transportation" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:border-gray-600">
                                            <label for="transportation_yes-past" class="ms-2 leading-7 text-sm text-gray-600">Yes</label>
                                        </div>
                                        <div class="flex items-center mx-2 my-0">
                                            <input id="transportation_no-past" type="radio" value="0" name="radio-transportation-past" wire:model.lazy="transportation" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:border-gray-600">
                                            <label for="transportation_no-past" class="ms-2 leading-7 text-sm text-gray-600">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-2 w-1/2 mt-10">
                                    <button type="button" class="text-white bg-indigo-500 border-0 py-2 px-7 focus:outline-none hover:bg-indigo-600 rounded text-lg" wire:click="openUploadPosterModal">Upload Poster</button>
                                </div>
                                <div class="p-2 w-1/2 mt-10">
                                    <button type="button" class="text-white bg-indigo-500 border-0 py-2 px-7 focus:outline-none hover:bg-indigo-600 rounded text-lg" wire:click="openUploadImagesModal">Upload Images</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-2 w-full mt-5">
                        <button type="submit" wire:loading.attr="disabled" class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Save</button>
                    </div>
                </section>
            </form>

            @include('livewire.admin.project.upload-poster-modal')

            <div x-data="{ showUploadImagesModal: @entangle('showUploadImagesModal') }">
                <div class="bg-gray-100 bg-opacity-75 fixed z-10 inset-0 overflow-y-auto" x-show="showUploadImagesModal">
                    @include('livewire.admin.project.upload-images-modal')
                </div>
            </div>

            @include('livewire.components.alert-modal', ['alertModalTitle' => $alertModalTitle, 'alertModalDescription' => $alertModalDescription])
        </div>
    </div>
</div>
