@extends('layouts.app')

@section('content')
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-10 mx-auto">
            <div class="flex flex-col text-center w-full mb-20">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Projek Lepas</h1>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Projek-projek yang lepas dianjurkan oleh Cakna Insan Malaysia</p>
            </div>
            <div class="flex flex-wrap -m-2">
                <div class="p-2 lg:w-1/3 md:w-1/2 w-full h-40 relative" id="parentDiv-1">
                    <a href="{{ route('project_detail') }}">
                        <div class="h-full flex items-center border-gray-200 border rounded-lg relative" style="overflow: hidden;">
                            <div class="overlay absolute top-0 left-0 w-full h-full bg-gray-900 opacity-50 flex items-center justify-center hover:opacity-20 hover:transition-opacity hover:duration-300 z-10"></div>
                            <div id="text-image" class="text-container absolute top-0 left-0 w-full h-full flex items-center justify-center pointer-events-none opacity-100 z-20">
                                <p class="text-center text-4xl font-black text-white">Kotak Kasih Sayang</p>
                            </div>
                            <img id="image-1" class="rounded w-full h-full object-cover object-center" src="{{ asset('assets/img/kotak_kasih_sayang.jpg') }}" alt="content">
                        </div>
                    </a>
                </div>
                <div class="p-2 lg:w-1/3 md:w-1/2 w-full h-40 relative" id="parentDiv-2">
                    <a href="{{ route('project_detail') }}">
                        <div class="h-full flex items-center border-gray-200 border rounded-lg relative" style="overflow: hidden;">
                            <div class="overlay absolute top-0 left-0 w-full h-full bg-gray-900 opacity-50 flex items-center justify-center hover:opacity-20 hover:transition-opacity hover:duration-300 z-10"></div>
                            <div id="text-image" class="text-container absolute top-0 left-0 w-full h-full flex items-center justify-center pointer-events-none opacity-100 z-20">
                                <p class="text-center text-4xl font-black text-white">Edaran Daging Korban</p>
                            </div>
                            <img id="image-2" class="rounded w-full h-full object-cover object-center" src="{{ asset('assets/img/edaran_daging_korban.jpg') }}" alt="content">
                        </div>
                    </a>
                </div>
                <div class="p-2 lg:w-1/3 md:w-1/2 w-full h-40 relative" id="parentDiv-3">
                    <a href="{{ route('project_detail') }}">
                        <div class="h-full flex items-center border-gray-200 border rounded-lg relative" style="overflow: hidden;">
                            <div class="overlay absolute top-0 left-0 w-full h-full bg-gray-900 opacity-50 flex items-center justify-center hover:opacity-20 hover:transition-opacity hover:duration-300 z-10"></div>
                            <div id="text-image" class="text-container absolute top-0 left-0 w-full h-full flex items-center justify-center pointer-events-none opacity-100 z-20">
                                <p class="text-center text-4xl font-black text-white">Waqaf Al-Quran</p>
                            </div>
                            <img id="image-3" class="rounded w-full h-full object-cover object-center" src="{{ asset('assets/img/waqaf_al_quran.jpg') }}" alt="content">
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    @push('js')
        <script>
            $(document).ready(function(){
                $("#parentDiv-1").hover(
                    function() {
                        $("#image-1").addClass("scale-125 transition-transform duration-700");
                    },
                    function() {
                        $("#image-1").removeClass("scale-125");

                        setTimeout(function() {
                            $("#image-1").removeClass("transition-transform duration-200");
                        }, 100);
                    }
                );
                $("#parentDiv-2").hover(
                    function() {
                        $("#image-2").addClass("scale-125 transition-transform duration-700");
                    },
                    function() {
                        $("#image-2").removeClass("scale-125");

                        setTimeout(function() {
                            $("#image-2").removeClass("transition-transform duration-200");
                        }, 100);
                    }
                );
                $("#parentDiv-3").hover(
                    function() {
                        $("#image-3").addClass("scale-125 transition-transform duration-700");
                    },
                    function() {
                        $("#image-3").removeClass("scale-125");

                        setTimeout(function() {
                            $("#image-3").removeClass("transition-transform duration-200");
                        }, 100);
                    }
                );
            });
        </script>
    @endpush
@endsection
