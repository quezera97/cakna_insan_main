<div>
    <form wire:submit.prevent="save">
        @csrf
        <div class="lg:w-1/2 md:w-2/3 mx-auto">
            <div class="flex flex-wrap -m-2">
                <div class="p-2 mb-2 w-full">
                    <div class="relative">
                        <label for="name" class="leading-7 text-sm text-gray-600">{{ __('ui_text.name') }} <span class="text-red-600">*</span></label>
                        <input type="text" id="name" wire:model="name" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="p-2 mb-2 w-1/2">
                    <div class="relative">
                        <label for="email" class="leading-7 text-sm text-gray-600">{{ __('ui_text.email') }} <span class="text-red-600">*</span></label>
                        <input type="email" id="email" wire:model="email" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="p-2 mb-2 w-1/2">
                    <div class="relative">
                        <label for="phone" class="leading-7 text-sm text-gray-600">{{ __('ui_text.phone_no') }} <span class="text-red-600">*</span></label>
                        <input type="text" id="phone" wire:model="phone" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        @error('phone') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="p-2 mb-2 w-1/2">
                    <label for="phone" class="leading-7 text-sm text-gray-600">{{ __('ui_text.assistance_you_can_provide') }}</label>
                    <div class="flex items-center mb-1">
                        <input id="poster_design" type="checkbox" value="poster_design" wire:model="help_needed.poster_design" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:border-gray-600">
                        <label for="poster_design" class="ms-2 leading-7 text-sm text-gray-600">{{ __('ui_text.poster_design') }}</label>
                    </div>
                    <div class="flex items-center mb-1">
                        <input id="social_media_broadcast" type="checkbox" value="social_media_broadcast" wire:model="help_needed.social_media_broadcast" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:border-gray-600">
                        <label for="social_media_broadcast" class="ms-2 leading-7 text-sm text-gray-600">{{ __('ui_text.social_media_broadcast') }}</label>
                    </div>
                    <div class="flex items-center mb-1">
                        <input id="relief_goods_distribution" type="checkbox" value="relief_goods_distribution" wire:model="help_needed.relief_goods_distribution" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:border-gray-600">
                        <label for="relief_goods_distribution" class="ms-2 leading-7 text-sm text-gray-600">{{ __('ui_text.distributing_relief_goods') }}</label>
                    </div>
                    <div class="flex items-center mb-1">
                        <input id="office_work" type="checkbox" value="office_work" wire:model="help_needed.office_work" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:border-gray-600">
                        <label for="office_work" class="ms-2 leading-7 text-sm text-gray-600">{{ __('ui_text.office_works') }}</label>
                    </div>
                </div>
                <div class="p-2 mb-2 w-1/2">
                    <div class="relative">
                        <label for="expertise" class="leading-7 text-sm text-gray-600">{{ __('ui_text.expertise') }}</label>
                        <textarea id="expertise" wire:model="expertise" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                    </div>
                </div>
                <div class="p-2 w-full">
                    <button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">{{ __('ui_text.send') }}</button>
                </div>
            </div>
        </div>
    </form>

    @if ($showAlertModal)
        @include('livewire.components.alert-modal', ['alertModalType' => $alertModalType, 'alertModalDescription' => $alertModalDescription])
    @endif
</div>
