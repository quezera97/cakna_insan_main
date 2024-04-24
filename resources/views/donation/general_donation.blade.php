@extends('layouts.app')

@section('content')
    <section class="text-gray-600 body-font">

        <div class="container px-5 py-10 mx-auto">
            <div class="flex flex-col text-center w-full mb-20">
                <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">Sumbangan</h1>
            </div>
            <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                <h1 class="sm:text-2xl text-2xl font-medium title-font text-gray-900 mb-5">Pilihan Sumbangan</h1>
                <table class="table-auto w-full text-left whitespace-no-wrap">
                    <thead>
                        <tr>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">Pilihan</th>
                        <th class="w-10 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="px-4 py-3">RM50</td>
                            <td class="w-10 text-center">
                                <input name="plan" type="radio">
                            </td>
                        </tr>
                        <tr>
                            <td class="border-t-2 border-gray-200 px-4 py-3">RM100</td>
                            <td class="border-t-2 border-gray-200 w-10 text-center">
                                <input name="plan" type="radio">
                            </td>
                        </tr>
                        <tr>
                            <td class="border-t-2 border-gray-200 px-4 py-3">RM200</td>
                            <td class="border-t-2 border-gray-200 w-10 text-center">
                                <input name="plan" type="radio">
                            </td>
                        </tr>
                        <tr>
                            <td class="border-t-2 border-b-2 border-gray-200 px-4 py-3">Seikhlas Hati</td>
                            <td class="border-t-2 border-b-2 border-gray-200 w-10 text-center">
                                <input name="plan" type="radio">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="lg:w-1/2 md:w-2/3 mx-auto">
            <div class="flex flex-wrap -m-2">
                <h1 class="sm:text-2xl text-2xl font-medium title-font text-gray-900 mb-5">Butiran Penyumbang</h1>
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
                <div class="p-2 w-full">
                    <button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Hantar</button>
                </div>
            </div>
        </div>
    </section>
@endsection
