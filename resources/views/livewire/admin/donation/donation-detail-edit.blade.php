<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-white">
        <thead class="text-xs uppercase bg-gray-700">
            <tr>
                <th scope="col" class="w-2/6 px-6 py-5">
                    Project
                </th>
                <th scope="col" class="w-2/6 px-6 py-5">
                    Url
                </th>
                <th scope="col" class="w-2/6 px-6 py-5 text-center">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b border-gray-400">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    Add Donation Detail
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"></th>
                <td class="px-6 py-4 flex flex-col space-y-3 items-center">
                    <a href="#" wire:click="openDonationDetailModal('', 'create')" class="font-medium text-blue-600 hover:underline">Add</a>
                </td>
            </tr>
            @foreach ($projects ?? [] as $project)
                @if (isset($project->donationDetail))
                    <tr class="bg-white border-b border-gray-400">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $project->projectable?->title }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $project->donationDetail?->donation_url }}
                        </th>
                        <td class="px-6 py-4 flex flex-col space-y-3 items-center">
                            <a href="#" wire:click="openDonationDetailModal('{{ $project->id }}', 'edit')" class="font-medium text-blue-600 hover:underline">Edit</a>
                            <a href="#" wire:click="openConfirmationModal('deleteUrl', {{ $project->id }})" class="font-medium text-red-600 hover:underline">Delete</a>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>

    @if ($showDonationDetailModal)
        <div class="bg-gray-100 bg-opacity-75 fixed z-10 inset-0 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen">
                <div class="bg-white w-1/2 h-auto rounded shadow-lg p-8">
                    <div class="flex justify-between items-center mb-4">
                        <div></div>
                        <button wire:click="closeDonationDetailModal" class="text-gray-600 hover:text-gray-800 focus:outline-none">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <form wire:submit.prevent="saveDonationDetail">
                        @csrf
                        <div class="p-2 w-full">
                            <label for="project" class="block mb-2 text-sm font-medium text-gray-900">Select an option <span class="text-red-600">*</span></label>
                            <select id="project" wire:model="project" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option selected value="" >Choose a project</option>
                                @foreach ($projects as $project)
                                    <option value="{{ $project->id }}">
                                        {{ $project->projectable?->title }}
                                    </option>
                                @endforeach
                            </select>
                            @error('project') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="p-2 w-full">
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Donation URL <span class="text-red-600">*</span></label>
                            <div class="flex">
                                <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md">
                                    {{ "https://toyyibpay.com/" }}
                                </span>
                                <input type="text" id="donation_url" wire:model="donation_url" required lowercase class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                            @error('donation_url') <span class="text-red-500">{{ $message }}</span> @enderror
                        </div>
                        <div class="flex justify-between mt-10">
                            <div></div>
                            <button type="submit" wire:loading.attr="disabled" class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded mr-2">{{ __('ui_text.save') }}</button>
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
