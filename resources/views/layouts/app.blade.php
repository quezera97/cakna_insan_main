<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" href="{{ asset('assets/img/icon.ico') }}"/>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" />

        @vite('resources/css/app.css')
    </head>
    <body>
        @include('layouts.header')

        <main>
            @yield('content')

            {{-- floating button --}}
            <a id="mybutton" target="__blank" href="https://wa.me/60123456789" class="fixed bottom-0 right-5">
                <button class="flex items-center bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                    <img id="whatsapp-icon" class="h-5 mr-2" alt="hero" src="{{ asset('assets/img/chat_whatsapp.png') }}">
                    <span>Contact Us</span>
                </button>
            </a>
        </main>

        @include('layouts.footer')

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    </body>
</html>
