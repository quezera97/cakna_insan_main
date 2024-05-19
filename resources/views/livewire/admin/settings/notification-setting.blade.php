<div>
    <div class="flex justify-end">
        <button wire:click="openSendNotificationModal"
            class="flex text-white bg-indigo-500 border-0 py-2 px-8 my-4 focus:outline-none hover:bg-indigo-600 rounded text-sm">{{ __('ui_text.send_notification') }}</button>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-white uppercase bg-gray-700">
                <tr>
                    <th scope="col" class="px-12 py-4">
                        {{ __('ui_text.name') }}
                    </th>
                    <th scope="col" class="px-3 py-4">
                        {{ __('ui_text.email') }}
                    </th>
                    <th scope="col" class="px-3 py-4">
                        {{ __('ui_text.phone_no') }}
                    </th>
                    <th scope="col" class="px-2 py-4">
                        {{ __('ui_text.action') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-white border-b border-gray-400">
                    <th scope="row" class="px-12 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ __('ui_text.add') . ' ' . __('ui_text.donor') }}
                    </th>
                    <td class="px-3 py-4">
                    </td>
                    <td class="px-3 py-4">
                    </td>
                    <td class="px-2 py-4">
                        <a href="#" wire:click="openDonorDetailModal"
                            class="font-medium text-indigo-600 hover:underline">{{ __('ui_text.add') }}</a>
                    </td>
                </tr>
                @foreach ($paginatedDonorDetail as $donor)
                    <tr class="bg-white border-b border-gray-400">
                        <th scope="row" class="px-12 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $donor->name }}
                        </th>
                        <td class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $donor->email }}
                        </td>
                        <td class="px-3 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $donor->phone_no }}
                        </td>
                        <td class="px-2 py-4 flex flex-col space-y-3">
                            <a href="#" wire:click="openEditDonorDetailsModal('{{ $donor->id }}')"
                                class="font-medium text-green-600 hover:underline">{{ __('ui_text.edit') }}</a>
                            <a href="#"
                                wire:click="openConfirmationModal('deleteDonorDetail', {{ $donor->id }})"
                                class="font-medium text-red-600 hover:underline">{{ __('ui_text.delete') }}</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $paginatedDonorDetail->links() }}
        </div>
    </div>

    @if ($sendNotificationModal)
        <div class="bg-gray-100 bg-opacity-75 fixed z-10 inset-0 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen">
                <div class="bg-white w-1/2 h-auto rounded shadow-lg p-8">
                    <div class="flex justify-between items-center mb-4">
                        <div></div>
                        <button wire:click="closeSendNotificationModal"
                            class="text-gray-600 hover:text-gray-800 focus:outline-none">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <form wire:submit.prevent="sendNotification">
                        @csrf
                        <div>
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                                <thead class="text-xs text-white uppercase bg-gray-700">
                                    <tr>
                                        <th scope="col" class="pl-10 pr-56 py-4">
                                            {{ __('ui_text.name') }}
                                        </th>
                                        <th scope="col" class="px-1 py-4 text-center">
                                            {{ __('ui_text.email') }}
                                        </th>
                                        <th scope="col" class="px-1 py-4 text-center">
                                            {{ __('ui_text.phone_no') }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($donorDetail as $index => $donor)
                                        <tr class="bg-white border-b border-gray-400">
                                            <td class="pl-10 pr-56 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                {{ $donor->name }}
                                            </td>
                                            <td class="px-1 py-4 text-center">
                                                <input type="checkbox" wire:model="donors.{{ $donor->id }}.email" />
                                            </td>
                                            <td class="px-1 py-4 text-center">
                                                <input type="checkbox" wire:model="donors.{{ $donor->id }}.phone_no" />
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="p-2 w-full mt-5">
                            <button id="buttonSend" type="submit"
                                class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                                {{ __('ui_text.send') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

    @if ($addDonorDetailModal)
        <div class="bg-gray-100 bg-opacity-75 fixed z-10 inset-0 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen">
                <div class="bg-white w-1/2 h-auto rounded shadow-lg p-8">
                    <div class="flex justify-between items-center mb-4">
                        <div></div>
                        <button wire:click="closeDonorDetailModal"
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
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900">{{ __('ui_text.name') }} <span
                                    class="text-red-600">*</span></label>
                            <input type="text" id="name" wire:model="name" required
                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            @error('name')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="p-2 mb-4 w-full">
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900">{{ __('ui_text.email') }}</label>
                            <input type="email" id="email" wire:model="email" required
                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="p-2 mb-4 w-full">
                            <label for="phone_no"
                                class="block mb-2 text-sm font-medium text-gray-900">{{ __('ui_text.phone_no') }}</label>
                            <input type="text" id="phone_no" wire:model="phone_no" required
                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="p-2 w-full mt-5">
                            <button id="buttonSave" type="submit"
                                class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">{{ __('ui_text.save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

    @if ($editDonorDetailModal)
        <div class="bg-gray-100 bg-opacity-75 fixed z-10 inset-0 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen">
                <div class="bg-white w-1/2 h-auto rounded shadow-lg p-8">
                    <div class="flex justify-between items-center mb-4">
                        <div></div>
                        <button wire:click="closeEditDonorDetailsModal"
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
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900">{{ __('ui_text.name') }} <span
                                    class="text-red-600">*</span></label>
                            <input type="text" id="name" wire:model="name" required
                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            @error('name')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="p-2 mb-4 w-full">
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900">{{ __('ui_text.email') }}</label>
                            <input type="email" id="email" wire:model="email" required
                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="p-2 mb-4 w-full">
                            <label for="phone_no"
                                class="block mb-2 text-sm font-medium text-gray-900">{{ __('ui_text.phone_no') }}</label>
                            <input type="text" id="phone_no" wire:model="phone_no" required
                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="p-2 w-full mt-5">
                            <button id="buttonSave" type="submit"
                                class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">{{ __('ui_text.save') }}</button>
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
