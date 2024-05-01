@extends('layouts.app')

@section('content')
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-10 mx-auto">
            <div class="flex flex-col text-center w-full mb-5">
                <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">Project</h1>
            </div>
            <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                @livewire('admin.project.projects-table', ['projects' => $projects])
            </div>
        </div>
    </section>
@endsection
