@extends('layouts.app')

@section('content')

<section class="text-gray-600 body-font relative">
    <div class="container px-5 py-10 mx-auto">
        <div class="flex flex-col text-center w-full mb-12">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Sertai Kami</h1>
        </div>
        <div class="lg:w-1/2 md:w-2/3 mx-auto">
            <div class="flex flex-wrap -m-2">
                <div class="p-2 mb-2 w-full">
                    <div class="relative">
                        <label for="name" class="leading-7 text-sm text-gray-600">Nama</label>
                        <input type="text" id="name" name="name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                </div>
                <div class="p-2 mb-2 w-1/2">
                    <div class="relative">
                        <label for="email" class="leading-7 text-sm text-gray-600">Emel</label>
                        <input type="email" id="email" name="email" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                </div>
                <div class="p-2 mb-2 w-1/2">
                    <div class="relative">
                        <label for="phone" class="leading-7 text-sm text-gray-600">No. Phone</label>
                        <input type="text" id="phone" name="phone" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                </div>
                <div class="p-2 mb-2 w-1/2">
                    <label for="phone" class="leading-7 text-sm text-gray-600">Bantuan Yang Boleh Anda Lakukan</label>
                    <div class="flex items-center mb-1">
                        <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:border-gray-600">
                        <label for="default-checkbox" class="ms-2 leading-7 text-sm text-gray-600">Poster Design</label>
                    </div>
                    <div class="flex items-center mb-1">
                        <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:border-gray-600">
                        <label for="default-checkbox" class="ms-2 leading-7 text-sm text-gray-600">Social Media Broadcast</label>
                    </div>
                    <div class="flex items-center mb-1">
                        <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:border-gray-600">
                        <label for="default-checkbox" class="ms-2 leading-7 text-sm text-gray-600">Distributing Relief Goods</label>
                    </div>
                    <div class="flex items-center mb-1">
                        <input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:border-gray-600">
                        <label for="default-checkbox" class="ms-2 leading-7 text-sm text-gray-600">Office Work</label>
                    </div>
                </div>
                <div class="p-2 mb-2 w-1/2">
                    <div class="relative">
                        <label for="message" class="leading-7 text-sm text-gray-600">Kepakaran</label>
                        <textarea id="message" name="message" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                    </div>
                </div>
                <div class="p-2 w-full">
                    <button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Hantar</button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
