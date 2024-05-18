<div>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-10 mx-auto">
            <h1 class="text-gray-900 text-2xl title-font font-medium mb-4">{{ __('ui_text.choose_type_of_news') }}</h1>
            <hr><br>
            <div x-data="{ selectedGlobal: @entangle('forGlobalNews'), selectedDomestic: @entangle('forDomesticNews'), selectedCaknaInsan: @entangle('forCaknaInsanNews') }" class="flex flex-wrap -m-4">
                <button wire:click="selectNews('global')" class="lg:w-1/3 p-2" x-bind:class="{ 'border border-indigo-700 border-2 rounded': selectedGlobal === true }">
                    <div class="bg-gray-400 bg-opacity-75 rounded-lg overflow-hidden text-center p-2">
                        <h1 class="title-font sm:text-2xl text-xl font-medium text-gray-900 mb-3">{{ __('ui_text.global_news') }}</h1>
                    </div>
                </button>
                <button wire:click="selectNews('cakna_insan')" class="lg:w-1/3 p-2" x-bind:class="{ 'border border-indigo-700 border-2 rounded': selectedCaknaInsan === true }">
                    <div class="bg-gray-400 bg-opacity-75 rounded-lg overflow-hidden text-center p-2">
                        <h1 class="title-font sm:text-2xl text-xl font-medium text-gray-900 mb-3">Cakna Insan Malaysia</h1>
                    </div>
                </button>

                <button wire:click="selectNews('domestic')" class="lg:w-1/3 p-2" x-bind:class="{ 'border border-indigo-700 border-2 rounded': selectedDomestic === true }">
                    <div class="bg-gray-400 bg-opacity-75 rounded-lg overflow-hidden text-center p-2">
                        <h1 class="title-font sm:text-2xl text-xl font-medium text-gray-900 mb-3">{{ __('ui_text.domestic_news') }}</h1>
                    </div>
                </button>
            </div>

        </div>
    </section>
    <div class="container px-5 py-10 mx-auto" x-data="{ type_of_news: @entangle('typeOfNews') }">
        <div x-show="type_of_news">
            <form wire:submit.prevent="save">
                @csrf
                <section class="text-gray-600 body-font overflow-hidden">
                    <div class="w-full mx-auto flex flex-wrap">
                        <div class="lg:w-1/2 w-full lg:pr-10 lg:py-6 mb-6 lg:mb-0">
                            <div class="flex flex-wrap -m-2">
                                <div class="p-2 w-full">
                                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900">{{ __('ui_text.title') }} <span class="text-red-600">*</span></label>
                                    <input type="text" id="title" wire:model="title" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
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
                            </div>
                        </div>
                        <div class="lg:w-1/2 w-full lg:pr-10 lg:py-6 mb-6 lg:mb-0">
                            <div class="flex flex-wrap -m-2">
                                <div class="p-2 w-full">
                                    <label for="div-date" class="block mb-2 text-sm font-medium text-gray-900">{{ __('ui_text.date_of_news') }}</label>
                                    <div id="div-date" class="flex items-center">
                                        <input id="date" datepicker-format="dd/mm/yyyy" type="date" wire:model="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5">
                                    </div>
                                </div>
                            </div>
                            <div class="p-2 w-full">
                                <label for="author" class="block mb-2 text-sm font-medium text-gray-900">{{ __('ui_text.author') }}</label>
                                <input type="text" id="author" wire:model="author" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                            <div class="p-2 w-full">
                                <label for="related_url" class="block mb-2 text-sm font-medium text-gray-900">{{ __('ui_text.related_link') }}</label>
                                <input type="text" id="related_url" wire:model="related_url" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                            {{-- <div class="p-2 w-full">
                                <label for="folder_path" class="block mb-2 text-sm font-medium text-gray-900">Folder Path</label>
                                <input type="text" id="folder_path" wire:model="folder_path" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div> --}}
                            <div class="p-2 w-full">
                                <label for="type_of_news" class="block mb-2 text-sm font-medium text-gray-900">{{ __('ui_text.type_of_news') }}</label>
                                <input type="text" id="type_of_news" wire:model="type_of_news" readonly class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>
                    </div>
                    <div class="p-2 w-full mt-5">
                        <button type="submit" class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">{{ __('ui_text.save') }}</button>
                    </div>
                </section>
            </form>

            {{-- @if ($showAlertModal)
                @include('livewire.components.alert-modal', ['alertModalType' => $alertModalType, 'alertModalDescription' => $alertModalDescription])
            @endif --}}
        </div>
    </div>
</div>
