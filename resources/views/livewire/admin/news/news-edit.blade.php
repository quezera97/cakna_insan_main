<div>
    <form wire:submit.prevent="save('{{ $selectedNewsDetail->id }}')">
        @csrf
        <section class="text-gray-600 body-font overflow-hidden">
            <div class="container px-5 py-10 mx-auto">
                <h1 class="text-gray-900 text-2xl title-font font-medium mb-4">{{ $selectedNewsDetail->title ?? '' }}</h1>
                <h2 class="text-sm title-font text-gray-500 tracking-widest mb-4">{{ $selectedNewsDetail->subtitle ?? '' }}</h2>
                <hr><br>
                <div class="lg:w-4/5 mx-auto flex flex-wrap">
                <div class="lg:w-1/2 w-full lg:pr-10 lg:py-6 mb-6 lg:mb-0">
                    <div class="flex flex-wrap -m-2">
                        <div class="p-2 w-full">
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Title <span class="text-red-600">*</span></label>
                            <input type="text" id="title" wire:model="title" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
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
                    </div>
                </div>
                <div class="lg:w-1/2 w-full lg:pr-10 lg:py-6 mb-6 lg:mb-0">
                    <div class="flex flex-wrap -m-2">
                        <div class="p-2 w-full">
                            <label for="div-date" class="block mb-2 text-sm font-medium text-gray-900">Date of News</label>
                            <div id="div-date" class="flex items-center">
                                <input id="date" datepicker-format="dd/mm/yyyy" type="date" wire:model="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5">
                            </div>
                        </div>
                    </div>
                    <div class="p-2 w-full">
                        <label for="author" class="block mb-2 text-sm font-medium text-gray-900">Author</label>
                        <input type="text" id="author" wire:model="author" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                    <div class="p-2 w-full">
                        <label for="related_url" class="block mb-2 text-sm font-medium text-gray-900">Related Link</label>
                        <input type="text" id="related_url" wire:model="related_url" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                    {{-- <div class="p-2 w-full">
                        <label for="folder_path" class="block mb-2 text-sm font-medium text-gray-900">Folder Path</label>
                        <input type="text" id="folder_path" wire:model="folder_path" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div> --}}
                    <div class="p-2 w-full">
                        <label for="type_of_news" class="block mb-2 text-sm font-medium text-gray-900">Type Of News</label>
                        <input type="text" id="type_of_news" wire:model="type_of_news" readonly class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
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
