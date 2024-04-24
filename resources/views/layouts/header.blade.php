<header class="text-gray-700 body-font border-b border-gray-200">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
        <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0" href="{{ route('welcome') }}">
        <img class="h-14" src="{{ asset('assets/img/logo.png') }}" alt="">
        <span class="ml-3 text-xl">CAKNA INSAN MALAYSIA</span>
        </a>
        <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
            <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center py-2 px-3 mr-5 hover:text-gray-900">
                Projek
                <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </button>
            <div id="dropdownNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-light-700">
                <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownLargeButton">
                    <li>
                        <a href="{{ route('incoming_project') }}" class="block px-4 py-2 mx-2 hover:bg-gray-300">Projek Akan Datang</a>
                    </li>
                    <li>
                        <a href="{{ route('past_project') }}" class="block px-4 py-2 mx-2 hover:bg-gray-300">Projek Lepas</a>
                    </li>
                </ul>
            </div>
            <a href="{{ route('about_us') }}" class="mr-5 hover:text-gray-900">Tentang Kami</a>
            <a href="{{ route('contact_us') }}" class="mr-5 hover:text-gray-900">Hubungi Kami</a>
            <a href="{{ route('join_us') }}" class="mr-5 hover:text-gray-900">Sertai Kami</a>
        </nav>
        <a href="{{ route('general_donation') }}" class="inline-flex items-center bg-gray-200 border-0 py-1 px-3 focus:outline-none hover:bg-gray-300 rounded text-base mt-4 md:mt-0">
            Derma Sekarang
        </a>
    </div>
</header>
