@extends('layouts.app')

@section('content')
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-10 mx-auto">
            <div class="flex flex-col text-center w-full mb-5">
                <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">Images</h1>
            </div>
            <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-white">
                        <thead class="text-xs uppercase bg-gray-700">
                            <tr>
                                <th scope="col" class="w-5/6 px-6 py-5">
                                    Title
                                </th>
                                <th scope="col" class="w-1/6 px-6 py-5 text-center">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($projects as $project)
                                <tr class="bg-white border-b border-gray-400">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $project->projectable?->title }}
                                    </th>

                                    @if($project->projectable?->pastProjectImages->isNotEmpty())
                                        <td class="px-6 py-4 flex flex-col space-y-3 items-center">
                                            <a href="{{ route('images.edit', ['edit', $project]) }}" class="font-medium text-blue-600 hover:underline">Edit</a>
                                        </td>
                                    @else
                                        <td class="px-6 py-4 flex flex-col space-y-3 items-center">
                                            <a href="{{ route('images.edit', ['upload', $project]) }}"class="font-medium text-indigo-600 hover:underline">Upload</a>
                                        </td>
                                    @endif
                                </tr>
                            @empty
                                <tr>
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">No Projects</th>
                                    <td class="px-6 py-4 flex flex-col space-y-3 items-center"><a href="{{ route('project.add') }}" class="font-medium text-blue-600 hover:underline">Add</a></td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
