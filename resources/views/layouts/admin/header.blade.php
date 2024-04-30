<header class="text-gray-600 body-font">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
        <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0" href="{{ route('welcome') }}">
            <img class="h-14" src="{{ asset('assets/img/logo.png') }}" alt="">
            <span class="ml-3 text-xl">CAKNA INSAN MALAYSIA</span>
        </a>
        <nav class="md:mr-auto md:ml-4 md:py-1 md:pl-4 md:border-l md:border-gray-400	flex flex-wrap items-center text-base justify-center">
            <a href="{{ route('dashboard') }}" class="mr-5 hover:text-gray-900">Dashboard</a>
            <a href="{{ route('project.index') }}" class="mr-5 hover:text-gray-900">Projek</a>
            <a href="{{ route('poster.index') }}" class="mr-5 hover:text-gray-900">Poster</a>
            <button id="dropdownScreenLink" data-dropdown-toggle="dropdownScreenNavbar" class="flex items-center py-2 px-3 mr-5 hover:text-gray-900">
                Skrin
                <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </button>
            <div id="dropdownScreenNavbar" class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-light-700">
                <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownLargeButton">
                    <li>
                        <a href="{{ route('incoming_project') }}" class="block px-4 py-2 mx-2 hover:bg-gray-300">Projek Akan Datang</a>
                    </li>
                    <li>
                        <a href="{{ route('past_project') }}" class="block px-4 py-2 mx-2 hover:bg-gray-300">Projek Lepas</a>
                    </li>
                    <li>
                        <a href="{{ route('about_us') }}" class="block px-4 py-2 mx-2 hover:bg-gray-300">Tentang Kami</a>
                    </li>
                    <li>
                        <a href="{{ route('contact_us') }}" class="block px-4 py-2 mx-2 hover:bg-gray-300">Hubungi Kami</a>
                    </li>
                    <li>
                        <a href="{{ route('join_us') }}" class="block px-4 py-2 mx-2 hover:bg-gray-300">Sertai Kami</a>
                    </li>
                    <li>
                        <a href="{{ route('join_us') }}" class="block px-4 py-2 mx-2 hover:bg-gray-300">Infaq Sekarang</a>
                    </li>
                </ul>
            </div>
        </nav>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="inline-flex items-center bg-gray-100 border-0 py-2 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0">
                Logout
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ml-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15m-3 0-3-3m0 0 3-3m-3 3H15" />
                </svg>
            </button>
        </form>
    </div>
</header>
