<div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-white uppercase bg-gray-700">
                <tr>
                    <th scope="col" class="px-12 py-4">
                        {{ __('ui_text.place') }}
                    </th>
                    <th scope="col" class="px-3 py-4">
                        {{ __('ui_text.date') }}
                    </th>
                    <th scope="col" class="px-3 py-4">
                        Latitude/Longitude
                    </th>
                    <th scope="col" class="px-2 py-4">
                        {{ __('ui_text.action') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b border-gray-400">
                    <th scope="row" class="px-12 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ __('ui_text.add') . ' ' . __('ui_text.place') }}
                    </th>
                    <td class="px-3 py-4">
                    </td>
                    <td class="px-3 py-4">
                    </td>
                    <td class="px-2 py-4">
                        <a href="#" wire:click="openHelpedLocationModal"
                            class="font-medium text-indigo-600 hover:underline">{{ __('ui_text.add') }}</a>
                    </td>
                </tr>
                @foreach ($paginatedLocationCoordinate as $location)
                    <tr class="bg-white border-b border-gray-400">
                        <th scope="row" class="px-12 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $location->place_or_country }}
                        </th>
                        <td class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $location->date }}
                        </td>
                        <td class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ 'Lat: '.$location->latitude .' / '. 'Long: '.$location->longitude }}
                        </td>
                        <td class="px-2 py-4 flex flex-col space-y-3">
                            <a href="#" wire:click="openEditHelpedLocationsModal('{{ $location->id }}')"
                                class="font-medium text-green-600 hover:underline">{{ __('ui_text.edit') }}</a>
                            <a href="#"
                                wire:click="openConfirmationModal('deleteHelpedLocation', {{ $location->id }})"
                                class="font-medium text-red-600 hover:underline">{{ __('ui_text.delete') }}</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $paginatedLocationCoordinate->links() }}
        </div>
    </div>

    @if ($addHelpedLocationModal)
        <div class="bg-gray-100 bg-opacity-75 fixed z-10 inset-0 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen">
                <div class="bg-white w-1/2 h-auto rounded shadow-lg p-8">
                    <div class="flex justify-between items-center mb-4">
                        <div></div>
                        <button wire:click="closeHelpedLocationModal"
                            class="text-gray-600 hover:text-gray-800 focus:outline-none">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <form wire:submit.prevent="save">
                        @csrf
                        <div class="p-2 mb-4 w-full">
                            <label for="place_or_country" class="block mb-2 text-sm font-medium text-gray-900">{{ __('ui_text.place') }} <span class="text-red-600">*</span></label>
                            <input type="text" id="place_or_country" wire:model="place_or_country" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            @error('place_or_country')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="p-2 mb-4 w-full">
                            <label for="latitude" class="block mb-2 text-sm font-medium text-gray-900">Latitude <span class="text-red-600">*</span></label>
                            <input type="text" id="latitude" wire:model="latitude" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            @error('latitude')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="p-2 mb-4 w-full">
                            <label for="longitude" class="block mb-2 text-sm font-medium text-gray-900">Longitude <span class="text-red-600">*</span></label>
                            <input type="text" id="longitude" wire:model="longitude" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            @error('longitude')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="p-2 mb-4 w-full">
                            <label for="date" class="block mb-2 text-sm font-medium text-gray-900">{{ __('ui_text.date') }} <span class="text-red-600">*</span></label>
                            <input type="date" id="date" wire:model="date" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            @error('date')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="p-2 w-full mt-5">
                            <button id="buttonSave" type="submit" class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">{{ __('ui_text.save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

    @if ($editHelpedLocationModal)
        <div class="bg-gray-100 bg-opacity-75 fixed z-10 inset-0 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen">
                <div class="bg-white w-1/2 h-auto rounded shadow-lg p-8">
                    <div class="flex justify-between items-center mb-4">
                        <div></div>
                        <button wire:click="closeEditHelpedLocationsModal"
                            class="text-gray-600 hover:text-gray-800 focus:outline-none">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <form wire:submit.prevent="edit">
                        @csrf
                        <div class="p-2 mb-4 w-full">
                            <label for="place_or_country" class="block mb-2 text-sm font-medium text-gray-900">{{ __('ui_text.place') }} <span class="text-red-600">*</span></label>
                            <input type="text" id="place_or_country" wire:model="place_or_country" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            @error('place_or_country')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="p-2 mb-4 w-full">
                            <label for="latitude" class="block mb-2 text-sm font-medium text-gray-900">Latitude <span class="text-red-600">*</span></label>
                            <input type="text" id="latitude" wire:model="latitude" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            @error('latitude')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="p-2 mb-4 w-full">
                            <label for="longitude" class="block mb-2 text-sm font-medium text-gray-900">Longitude <span class="text-red-600">*</span></label>
                            <input type="text" id="longitude" wire:model="longitude" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            @error('longitude')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="p-2 mb-4 w-full">
                            <label for="date" class="block mb-2 text-sm font-medium text-gray-900">{{ __('ui_text.date') }} <span class="text-red-600">*</span></label>
                            <input type="date" id="date" wire:model="date" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            @error('date')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
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
        @include('livewire.components.alert-modal', [
            'alertModalType' => $alertModalType,
            'alertModalDescription' => $alertModalDescription,
        ])
    @endif

    @if ($showConfirmationModal)
        @include('livewire.components.confirmation-modal', [
            'confirmationModalTitle' => $confirmationModalTitle,
        ])
    @endif
</div>
