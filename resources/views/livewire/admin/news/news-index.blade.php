<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-white">
        <thead class="text-xs uppercase bg-gray-700">
            <tr>
                <th scope="col" class="w-3/6 px-6 py-5">
                    Title
                </th>
                <th scope="col" class="w-1/6 px-6 py-5">
                    News Type
                </th>
                <th scope="col" class="w-2/6 px-6 py-5 text-center">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b border-gray-400">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    Add News
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"></th>
                <td class="px-6 py-4 flex flex-col space-y-3 items-center">
                    <a href="#" wire:click="addNews" class="font-medium text-blue-600 hover:underline">Add</a>
                </td>
            </tr>
            @foreach ($newsDetails ?? [] as $newsDetail)
                <tr class="bg-white border-b border-gray-400">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $newsDetail->title }}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $newsDetail->type_of_news }}
                    </th>
                    <td class="px-6 py-4 flex flex-col space-y-3 items-center">
                        <a href="#" wire:click="editNews({{ $newsDetail }})" class="font-medium text-blue-600 hover:underline">Edit News</a>
                        <a href="#" wire:click="editNewsImages({{ $newsDetail }})" class="font-medium text-indigo-600 hover:underline">Edit Images</a>
                        <a href="#" wire:click="openConfirmationModal('deleteNews', {{ $newsDetail->id }})" class="font-medium text-red-600 hover:underline">Delete News</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if ($showConfirmationModal)
        @include('livewire.components.confirmation-modal', ['confirmationModalTitle' => $confirmationModalTitle])
    @endif
</div>
