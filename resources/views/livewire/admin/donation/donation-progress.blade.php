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
                    <a href="{{ route('donation.donation-detail') }}" class="font-medium text-blue-600 hover:underline">Add</a>
                </td>
            </tr>
            @foreach ($donationDetails ?? [] as $donation)
                <tr class="bg-white border-b border-gray-400">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $donation->project?->projectable?->title }}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $donation->project?->donationDetail?->donation_url }}
                    </th>
                    <td class="px-6 py-4 flex flex-col space-y-3 items-center">
                        <a href="#" wire:click="updateDonationProgress('{{ $donation->id }}')" class="font-medium text-blue-600 hover:underline">Update Donation Progress</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if ($showAlertModal)
        @include('livewire.components.alert-modal', ['alertModalType' => $alertModalType, 'alertModalDescription' => $alertModalDescription])
    @endif
</div>
