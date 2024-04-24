@extends('layouts.app')

@section('content')
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-10 mx-auto flex flex-wrap">
            <div class="flex flex-col text-center w-full mb-10">
                <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">PERTUBUHAN CAKNA INSAN MALAYSIA</h1>
                <h2 class="text-xs text-indigo-500 tracking-widest font-medium title-font mb-1">- Mengambil Berat & Peduli Sesama Insan -</h2>
              </div>
            <div class="flex flex-wrap w-full">
                <div class="lg:w-2/5 md:w-1/2 md:pr-10 md:py-6">
                    <h1 class="sm:text-2xl text-2xl font-medium title-font text-gray-900 mb-5">Objektif</h1>
                    <div class="flex relative pb-5">
                        <div class="flex-shrink-0 w-3 h-3 mt-2 rounded-full bg-indigo-500 inline-flex items-center justify-center text-white relative z-10"></div>
                        <div class="flex-grow pl-4">
                            <p class="leading-relaxed">Menjadi platform buat masyarakat saling membantu kesulitan hidup sesama masyarakat</p>
                        </div>
                    </div>
                    <div class="flex relative pb-5">
                        <div class="flex-shrink-0 w-3 h-3 mt-2 rounded-full bg-indigo-500 inline-flex items-center justify-center text-white relative z-10"></div>
                        <div class="flex-grow pl-4">
                            <p class="leading-relaxed">Mengadakan program serta kesedaran dalam membantu sesama insan yang memerlukan</p>
                        </div>
                    </div>
                    <div class="flex relative pb-5">
                        <div class="flex-shrink-0 w-3 h-3 mt-2 rounded-full bg-indigo-500 inline-flex items-center justify-center text-white relative z-10"></div>
                        <div class="flex-grow pl-4">
                            <p class="leading-relaxed">Menjadi sebuah organisasi yang mengambil keprihatinan serta bantuan kepada masyarakat dialnda bencana, kesempitan hidup serta memerlukan bantuan</p>
                        </div>
                    </div>
                </div>
                <div class="flex items-center lg:w-3/5 md:w-1/2 mx-auto m-5 sm:flex-col">
                    {{-- vision --}}
                    <div class="flex flex-col sm:flex-row items-center mb-6">
                        <div class="sm:w-32 sm:h-32 h-20 w-20 sm:mr-10 inline-flex items-center justify-center rounded-full">
                            <img class="object-cover object-center rounded" alt="hero" src="{{ asset('assets/img/vision.png') }}">
                        </div>
                        <div class="flex-grow sm:text-left text-center">
                            <h1 class="sm:text-2xl text-2xl font-medium title-font text-gray-900 mb-2">Visi</h1>
                            <p class="leading-relaxed text-base">Menjadi sebuah badan NGO global yang memberi khidmat untuk masyarakat yang terpinggir dari segala aspek, kemudahan, pendidikan, bantuan serta infrastruktur didalam mahupun di luar negara</p>
                        </div>
                    </div>
                    {{-- mission --}}
                    <div class="flex flex-col sm:flex-row items-center">
                        <div class="sm:w-32 sm:h-32 h-20 w-20 sm:mr-10 inline-flex items-center justify-center rounded-full">
                            <img class="object-cover object-center rounded" alt="hero" src="{{ asset('assets/img/mission.png') }}">
                        </div>
                        <div class="flex-grow sm:text-left text-center">
                            <h1 class="sm:text-2xl text-2xl font-medium title-font text-gray-900 mb-2">Misi</h1>
                            <p class="leading-relaxed text-base">Menjadi salah satu badan kebajikan yang komprehensif, progresif serta cakna kepada masyarakat dimana menjadi contoh yang terbaik dalam kalangan badan bukan kerajaan di peringkat global</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto flex flex-wrap flex-col">
            <div class="flex mx-auto flex-wrap mb-20">
                <a class="sm:px-6 py-3 w-1/2 sm:w-auto justify-center sm:justify-start border-b-2 title-font font-medium bg-gray-100 inline-flex items-center leading-none border-indigo-500 text-indigo-500 tracking-wider rounded-t">
                    2020
                </a>
                <a class="sm:px-6 py-3 w-1/2 sm:w-auto justify-center sm:justify-start border-b-2 title-font font-medium inline-flex items-center leading-none border-gray-200 hover:text-gray-900 tracking-wider">
                    2021
                </a>
                <a class="sm:px-6 py-3 w-1/2 sm:w-auto justify-center sm:justify-start border-b-2 title-font font-medium inline-flex items-center leading-none border-gray-200 hover:text-gray-900 tracking-wider">
                    2022
                </a>
                <a class="sm:px-6 py-3 w-1/2 sm:w-auto justify-center sm:justify-start border-b-2 title-font font-medium inline-flex items-center leading-none border-gray-200 hover:text-gray-900 tracking-wider">
                    2023
                </a>
            </div>
            <img class="xl:w-1/4 lg:w-1/3 md:w-1/2 w-2/3 block mx-auto mb-10 object-cover object-center rounded" alt="hero" src="https://dummyimage.com/720x600">
            <div class="flex flex-col text-center w-full">
                <h1 class="text-xl font-medium title-font mb-4 text-gray-900">Master Cleanse Reliac Heirloom</h1>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Whatever cardigan tote bag tumblr hexagon brooklyn asymmetrical gentrify, subway tile poke farm-to-table. Franzen you probably haven't heard of them man bun deep jianbing selfies heirloom prism food truck ugh squid celiac humblebrag.</p>
            </div>
        </div>
    </section> --}}
@endsection
