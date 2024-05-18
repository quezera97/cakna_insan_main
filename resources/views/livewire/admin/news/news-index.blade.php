<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-white">
        <thead class="text-xs uppercase bg-gray-700">
            <tr>
                <th scope="col" class="w-3/6 px-6 py-5">
                    {{ __('ui_text.title') }}
                </th>
                <th scope="col" class="w-1/6 px-6 py-5">
                    {{ __('ui_text.type_of_news') }}
                </th>
                <th scope="col" class="w-2/6 px-6 py-5 text-center">
                    {{ __('ui_text.action') }}
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b border-gray-400">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    {{ __('ui_text.add').' '.__('ui_text.news') }}
                </th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"></th>
                <td class="px-6 py-4 flex flex-col space-y-3 items-center">
                    <a href="#" wire:click="addNews" class="font-medium text-blue-600 hover:underline">{{ __('ui_text.add') }}</a>
                </td>
            </tr>
            @foreach ($paginatedNewsDetail ?? [] as $newsDetail)
                <tr class="bg-white border-b border-gray-400">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $newsDetail->title }}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $newsDetail->type_of_news }}
                    </th>
                    <td class="px-6 py-4 flex flex-col space-y-3 items-center">
                        <a href="#" wire:click="editNews({{ $newsDetail }})" class="font-medium text-blue-600 hover:underline">{{ __('ui_text.edit').' '.__('ui_text.news') }}</a>
                        <a href="#" wire:click="editNewsImages({{ $newsDetail }})" class="font-medium text-indigo-600 hover:underline">{{ __('ui_text.edit').' '.__('ui_text.images') }}</a>
                        <a href="#" wire:click="openConfirmationModal('deleteNews', {{ $newsDetail->id }})" class="font-medium text-red-600 hover:underline">{{ __('ui_text.delete') }}</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4">
        {{ $paginatedNewsDetail->links() }}
    </div>

    @if ($showConfirmationModal)
        @include('livewire.components.confirmation-modal', ['confirmationModalTitle' => $confirmationModalTitle])
    @endif
</div>
