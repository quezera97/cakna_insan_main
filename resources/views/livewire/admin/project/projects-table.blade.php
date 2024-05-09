<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-white">
        <thead class="text-xs uppercase bg-gray-700">
            <tr>
                <th scope="col" class="w-4/6 px-6 py-5">
                    Title
                </th>
                <th scope="col" class="w-2/6 px-6 py-5 text-center">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b border-gray-400">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    Add Project
                </th>
                <td class="px-6 py-4 flex flex-col space-y-3 items-center">
                    <a href="#" wire:click="addProject" class="font-medium text-blue-600 hover:underline">Add</a>
                </td>
            </tr>
            @foreach ($listOfProjects ?? [] as $project)
                <tr class="bg-white border-b border-gray-400">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $project->projectable?->title }}
                    </th>
                    <td class="px-6 py-4 flex flex-col space-y-3 items-center">
                        @if ($project->projectable_type == $incomingProject)
                            <a href="#" wire:click="openConfirmationModal('completeProject', {{ $project->id }})" class="font-medium text-pink-600 hover:underline">Ending Project</a>
                        @endif

                        <a href="#" wire:click="editProject({{ $project }})" class="font-medium text-blue-600 hover:underline">Edit Project</a>

                        <a href="#" wire:click="openConfirmationModal('deleteProject', {{ $project->id }})" class="font-medium text-red-600 hover:underline">Delete Project</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if ($showConfirmationModal)
        @include('livewire.components.confirmation-modal', ['confirmationModalTitle' => $confirmationModalTitle])
    @endif
</div>
