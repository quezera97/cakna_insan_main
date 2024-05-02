<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" href="{{ asset('assets/img/icon.ico') }}"/>

        <title>Cakna Insan Malaysia</title>

        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>

        {{-- buat sementara pakai ni utk production --}}
        {{-- <script src="https://cdn.tailwindcss.com"></script> --}}

        @vite('resources/css/app.css')

        @stack('css')

        @livewireStyles
    </head>
    <body>
        @auth
            @include('layouts.admin.header')
        @endauth

        @guest
            @include('layouts.header')
        @endguest

        <div class="flex flex-col min-h-screen">
            <main class="flex-grow">
                @yield('content')

                {{-- floating button --}}
                <a id="floating-button" target="__blank" href="https://wa.me/60123903309" class="fixed bottom-0 right-5">
                    <button class="flex items-center bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                        <img id="whatsapp-icon" class="h-5 mr-2" alt="hero" src="{{ asset('assets/img/chat_whatsapp.png') }}">
                        <span>Contact Us</span>
                    </button>
                </a>
            </main>

            <div class="mt-10">
                @include('layouts.footer')
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
        {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}

        {{-- <script>
            $(document).ready(function() {
                $('.select2').select2();
            });
        </script> --}}

        @stack('js')

        @livewireScripts

        @stack('js-livewire')
    </body>
</html>
