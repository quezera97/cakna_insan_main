<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-white">
        <thead class="text-xs uppercase bg-gray-700">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Title
                </th>
                <th scope="col" class="w-32 px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($listOfProjects as $project)
                <tr class="bg-white border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ $project->projectable?->title }}
                    </th>
                    <td class="px-6 py-4 flex space-x-4 items-center">
                        <a href="#" wire:click="editProject({{ $project }})" class="font-medium text-blue-600 hover:underline">Edit</a>
                        <a href="#" class="font-medium text-red-600 hover:underline">Delete</a>
                    </td>
                </tr>
            @empty
                <tr class="bg-white border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        Tiada Projek
                    </th>
                    <td class="px-6 py-4 flex space-x-4 items-center">
                        <a href="#" wire:click="addProject" class="font-medium text-blue-600 hover:underline">Add</a>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
