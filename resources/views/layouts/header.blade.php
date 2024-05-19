<header class="text-gray-700 body-font border-b border-gray-200 bg-white">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
        <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0" href="{{ route('welcome') }}">
            <img class="h-14" src="{{ asset('assets/img/logo.png') }}" alt="Cakna Insan Malaysia Icon">
            <span class="ml-3 text-xl">CAKNA INSAN MALAYSIA</span>
        </a>
        <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
            <a href="{{ route('welcome') }}" class="mr-5 hover:text-gray-900">{{ __('ui_text.homepage') }}</a>
            <button id="dropdownProjectLink" data-dropdown-toggle="dropdownProjectNavbar" class="flex items-center py-2 mr-5 hover:text-gray-900">
                {{ __('ui_text.projects') }}
                <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </button>
            <div id="dropdownProjectNavbar" class="z-50 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-light-700">
                <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownLargeButton">
                    <li>
                        <a href="{{ route('incoming_project') }}" class="block px-4 py-2 mx-2 hover:bg-gray-300">{{ __('ui_text.current_projects') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('past_project') }}" class="block px-4 py-2 mx-2 hover:bg-gray-300">{{ __('ui_text.past_projects') }}</a>
                    </li>
                </ul>
            </div>
            <button id="dropdownNewsLink" data-dropdown-toggle="dropdownNewsNavbar" class="flex items-center py-2 mr-5 hover:text-gray-900">
                {{ __('ui_text.news') }}
                <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </button>
            <div id="dropdownNewsNavbar" class="z-50 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-56 dark:bg-light-700">
                <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownLargeButton">
                    {{-- <li>
                        <a href="{{ route('news.cakna_insan_malaysia') }}" class="block px-4 py-2 mx-2 hover:bg-gray-300">Cakna Insan Malaysia</a>
                    </li> --}}
                    <li>
                        <a href="{{ route('news.global') }}" class="block px-4 py-2 mx-2 hover:bg-gray-300">{{ __('ui_text.global_news') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('news.domestic') }}" class="block px-4 py-2 mx-2 hover:bg-gray-300">{{ __('ui_text.domestic_news') }}</a>
                    </li>
                </ul>
            </div>
            <a href="{{ route('about_us') }}" class="mr-5 hover:text-gray-900">{{ __('ui_text.about_us') }}</a>
            <a href="{{ route('contact_us') }}" class="mr-5 hover:text-gray-900">{{ __('ui_text.contact_us') }}</a>
            <a href="{{ route('join_us') }}" class="mr-5 hover:text-gray-900">{{ __('ui_text.join_us') }}</a>

            <button id="dropdownLanguageLink" data-dropdown-toggle="dropdownLanguageNavbar" class="flex items-center py-2 mr-5 hover:text-gray-900">
                <img src="{{ asset('assets/img/' . app()->getLocale() . '.png') }}" class="w-6 h-6 rounded-full" alt="{{ session('locale') }}" />
                <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </button>
            <div id="dropdownLanguageNavbar" class="z-50 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-56 dark:bg-light-700">
                <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownLanguageLink">
                    <li>
                        <a href="{{ route('lang.change', ['lang' => 'en']) }}" class="flex items-center px-4 py-2 hover:bg-gray-300">
                            <img src="{{ asset('assets/img/en.png') }}" class="w-6 h-6 rounded-full mr-3" />
                            <span>English</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('lang.change', ['lang' => 'ms']) }}" class="flex items-center px-4 py-2 hover:bg-gray-300">
                            <img src="{{ asset('assets/img/ms.png') }}" class="w-6 h-6 rounded-full mr-3" />
                            <span>Bahasa Malaysia</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
