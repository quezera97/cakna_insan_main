@extends('layouts.app')

@section('content')
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-10 mx-auto">
            <div class="flex flex-col text-center w-full mb-20">
                <h1 class="text-2xl font-medium title-font mb-4 text-gray-900 tracking-widest">Project Akan Datang</h1>
            </div>
            <div class="flex flex-wrap -m-4">
                <div class="p-4 lg:w-1/2">
                    <div class="h-full flex sm:flex-row flex-col items-center sm:justify-start justify-center text-center sm:text-left">
                        <img alt="team" class="flex-shrink-0 rounded-lg w-48 h-48 object-cover object-center sm:mb-0 mb-4" src="{{ asset('assets/img/stray_cat.jpg') }}">
                        <div class="flex-grow sm:pl-8">
                            <h2 class="title-font font-medium text-lg text-gray-900">Stray Cats & Dogs Feeding</h2>
                            <p class="mb-4">Street feeding will be a continuous effort by our organization to provide nutritious food for stray dogs and cats around Klang Valley</p>
                            <span class="inline-flex">
                                <a href="{{ route('donation') }}" class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Donate Now</a>
                                <a href="{{ route('project_detail') }}" class="ml-4 inline-flex text-gray-700 bg-gray-200 border-0 py-2 px-6 focus:outline-none hover:bg-gray-300 rounded text-lg">Details</a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="p-4 lg:w-1/2">
                    <div class="h-full flex sm:flex-row flex-col items-center sm:justify-start justify-center text-center sm:text-left">
                        <img alt="team" class="flex-shrink-0 rounded-lg w-48 h-48 object-cover object-center sm:mb-0 mb-4" src="{{ asset('assets/img/charity_run.jpg') }}">
                        <div class="flex-grow sm:pl-8">
                            <h2 class="title-font font-medium text-lg text-gray-900">Run for Charity</h2>
                            <p class="mb-4">Your Steps Make a Difference! Join us in a race for a cause, raising funds to support those in need. Lace up and be part of the change!</p>
                            <span class="inline-flex">
                                <a href="{{ route('donation') }}" class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Donate Now</a>
                                <a href="{{ route('project_detail') }}" class="ml-4 inline-flex text-gray-700 bg-gray-200 border-0 py-2 px-6 focus:outline-none hover:bg-gray-300 rounded text-lg">Details</a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="p-4 lg:w-1/2">
                    <div class="h-full flex sm:flex-row flex-col items-center sm:justify-start justify-center text-center sm:text-left">
                        <img alt="team" class="flex-shrink-0 rounded-lg w-48 h-48 object-cover object-center sm:mb-0 mb-4" src="{{ asset('assets/img/plant_tree.jpg') }}">
                        <div class="flex-grow sm:pl-8">
                            <h2 class="title-font font-medium text-lg text-gray-900">Planting Trees</h2>
                            <p class="mb-4">Growing a Greener World! Join us in planting trees to help our planet thrive. Together, we can make our environment healthier and more beautiful.</p>
                            <span class="inline-flex">
                                <a href="{{ route('donation') }}" class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Donate Now</a>
                                <a href="{{ route('project_detail') }}" class="ml-4 inline-flex text-gray-700 bg-gray-200 border-0 py-2 px-6 focus:outline-none hover:bg-gray-300 rounded text-lg">Details</a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="p-4 lg:w-1/2">
                    <div class="h-full flex sm:flex-row flex-col items-center sm:justify-start justify-center text-center sm:text-left">
                        <img alt="team" class="flex-shrink-0 rounded-lg w-48 h-48 object-cover object-center sm:mb-0 mb-4" src="{{ asset('assets/img/trash_collect.jpg') }}">
                        <div class="flex-grow sm:pl-8">
                            <h2 class="title-font font-medium text-lg text-gray-900">Trash Collecting</h2>
                            <p class="mb-4">Let's Clean Up Together! Join us in picking up litter and keeping our community tidy. Together, we can make a difference, one piece of trash at a time</p>
                            <span class="inline-flex">
                                <a href="{{ route('donation') }}" class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Donate Now</a>
                                <a href="{{ route('project_detail') }}" class="ml-4 inline-flex text-gray-700 bg-gray-200 border-0 py-2 px-6 focus:outline-none hover:bg-gray-300 rounded text-lg">Details</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
