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
    <section class="text-gray-600 body-font relative">
        <div class="container px-5 py-10 mx-auto flex sm:flex-nowrap flex-wrap">
            <div class="lg:w-2/3 md:w-1/2 bg-gray-300 rounded-lg overflow-hidden sm:mr-10 p-10 flex items-end justify-start relative">
                <iframe width="100%" height="100%" class="absolute inset-0" frameborder="0" title="map" marginheight="0" marginwidth="0" scrolling="no" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=3.0289722222,%20101.7622777778+(Pertubuhan%20BCakna%20Insan%20Malaysia)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                <div class="bg-white relative flex flex-wrap py-6 rounded shadow-md">
                    <div class="lg:w-1/2 px-6 mt-4 lg:mt-0">
                        <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs">ADDRESS</h2>
                        <a class="leading-relaxed">18 Jalan 9H, Taman Cheras Jaya, Batu 11 Jalan Cheras, Cheras, Selangor</a>
                        <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs mt-4">REGISTRATION NO.</h2>
                        <p class="leading-relaxed">PPM - 029 - 10 - 09102023</p>
                    </div>
                    <div class="lg:w-1/2 px-6 mt-4 lg:mt-0">
                        <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs">EMAIL</h2>
                        <a class="text-indigo-500 leading-relaxed">caknainsanmalaysia@gmail.com</a>
                        <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs mt-4">PHONE</h2>
                        <p class="leading-relaxed">+6012-390 3309</p>
                    </div>
                </div>
            </div>
            <div class="lg:w-1/3 md:w-1/2 bg-white flex flex-col md:ml-auto w-full md:py-8 mt-8 md:mt-0">
                <img alt="sijil" class="border border-black border-4 w-full lg:h-auto object-cover object-center rounded" src="{{ asset('assets/img/sijil.jpg') }}">
            </div>
        </div>
    </section>
@endsection
