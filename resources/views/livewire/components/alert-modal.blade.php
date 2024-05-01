@props([
    'alertModalTitle' => '',
    'alertModalDescription' => '',
])

<div x-data="{ showAlertModal: @entangle('showAlertModal') }">
    <div class="bg-gray-100 bg-opacity-75 fixed z-10 inset-0 overflow-y-auto" x-show="showAlertModal">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white w-1/3 rounded shadow-lg p-8">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold">{{ $alertModalTitle }}</h2>
                    <button @click="showAlertModal = false" class="text-gray-600 hover:text-gray-800 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                <p class="text-gray-700 mb-4">{{ $alertModalDescription }}</p>
                <div class="flex justify-end mt-15">
                    <button wire:click="closeAlertModal" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mr-2">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
