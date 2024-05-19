<div>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-10 mx-auto">
            <form wire:submit.prevent="save">
                <div class="flex flex-col text-left w-full mb-20">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">
                        <div class="p-2 mb-2 w-full">
                            <div class="relative">
                                <label for="title" class="leading-7 text-sm text-gray-600">{{ __('ui_text.title') }} <span class="text-red-600">*</span></label>
                                <input type="text" id="title" wire:model="title" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </h1>
                    <p class="lg:w-2/3 mx-auto leading-relaxed text-base">
                        <div class="p-2 mb-2 w-full">
                            <div class="relative" wire:ignore>
                                <label for="details" class="leading-7 text-sm text-gray-600">{{ __('ui_text.details') }} <span class="text-red-600">*</span></label>
                                <textarea id="summernote" class="summernote" wire:model="details"></textarea>
                                @error('details') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </p>
                </div>
                <div class="flex flex-wrap -m-4 text-center">
                    <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                        <h2 class="title-font font-medium text-3xl text-gray-900">
                            <div class="p-2 mb-2 w-full">
                                <div class="relative">
                                    <label for="statistic_1" class="leading-7 text-sm text-gray-600">{{ __('ui_text.statistics').' 1' }} <span class="text-red-600">*</span></label>
                                    <input type="text" id="statistic_1" wire:model="statistic_1" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    @error('statistic_1') <span class="text-red-500">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </h2>
                        <p class="leading-relaxed">
                            <div class="p-2 mb-2 w-full">
                                <div class="relative">
                                    <label for="statistic_1_value" class="leading-7 text-sm text-gray-600">{{ __('ui_text.statistics_value').' 1' }} <span class="text-red-600">*</span></label>
                                    <input type="text" id="statistic_1_value" wire:model="statistic_1_value" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    @error('statistic_1_value') <span class="text-red-500">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </p>
                    </div>
                    </div>
                    <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                        <h2 class="title-font font-medium text-3xl text-gray-900">
                            <div class="p-2 mb-2 w-full">
                                <div class="relative">
                                    <label for="statistic_2" class="leading-7 text-sm text-gray-600">{{ __('ui_text.statistics').' 2' }} <span class="text-red-600">*</span></label>
                                    <input type="text" id="statistic_2" wire:model="statistic_2" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    @error('statistic_2') <span class="text-red-500">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </h2>
                        <p class="leading-relaxed">
                            <div class="p-2 mb-2 w-full">
                                <div class="relative">
                                    <label for="statistic_2_value" class="leading-7 text-sm text-gray-600">{{ __('ui_text.statistics_value').' 2' }} <span class="text-red-600">*</span></label>
                                    <input type="text" id="statistic_2_value" wire:model="statistic_2_value" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    @error('statistic_2_value') <span class="text-red-500">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </p>
                    </div>
                    </div>
                    <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                        <h2 class="title-font font-medium text-3xl text-gray-900">
                            <div class="p-2 mb-2 w-full">
                                <div class="relative">
                                    <label for="statistic_3" class="leading-7 text-sm text-gray-600">{{ __('ui_text.statistics').' 3' }} <span class="text-red-600">*</span></label>
                                    <input type="text" id="statistic_3" wire:model="statistic_3" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    @error('statistic_3') <span class="text-red-500">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </h2>
                        <p class="leading-relaxed">
                            <div class="p-2 mb-2 w-full">
                                <div class="relative">
                                    <label for="statistic_3_value" class="leading-7 text-sm text-gray-600">{{ __('ui_text.statistics_value').' 3' }} <span class="text-red-600">*</span></label>
                                    <input type="text" id="statistic_3_value" wire:model="statistic_3_value" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    @error('statistic_3_value') <span class="text-red-500">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </p>
                    </div>
                    </div>
                    <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                        <h2 class="title-font font-medium text-3xl text-gray-900">
                            <div class="p-2 mb-2 w-full">
                                <div class="relative">
                                    <label for="statistic_4" class="leading-7 text-sm text-gray-600">{{ __('ui_text.statistics').' 4' }} <span class="text-red-600">*</span></label>
                                    <input type="text" id="statistic_4" wire:model="statistic_4" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    @error('statistic_4') <span class="text-red-500">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </h2>
                        <p class="leading-relaxed">
                            <div class="p-2 mb-2 w-full">
                                <div class="relative">
                                    <label for="statistic_4_value" class="leading-7 text-sm text-gray-600">{{ __('ui_text.statistics_value').' 4' }} <span class="text-red-600">*</span></label>
                                    <input type="text" id="statistic_4_value" wire:model="statistic_4_value" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    @error('statistic_4_value') <span class="text-red-500">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </p>
                    </div>
                    </div>
                </div>
                <div class="p-2 w-full mt-5">
                    <button id="buttonSave" onclick="saveSummernote()" type="submit" class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">{{ __('ui_text.save') }}</button>
                </div>
            </form>
        </div>
    </section>

    @if ($showAlertModal)
        @include('livewire.components.alert-modal', [
            'alertModalType' => $alertModalType,
            'alertModalDescription' => $alertModalDescription,
        ])
    @endif
</div>

@push('js-livewire')
    <script>
        $(document).ready(function() {
            var summerNoteText = {};

            // Initialize Summernote
            $('#summernote').summernote({
                placeholder: 'Enter Here',
                tabsize: 2,
                height: 120,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'strikethrough', 'clear']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['height', ['height']],
                    ['para', ['paragraph']],
                    ['view', ['codeview']]
                ],
                callbacks: {
                    onChange: function(contents, $editable) {
                        summerNoteText = contents;
                        @this.set('details', contents);
                    }
                }
            });
        });
    </script>
@endpush
