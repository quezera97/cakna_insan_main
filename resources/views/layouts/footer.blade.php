<footer class="text-gray-600 body-font bg-sky-400 mt-auto border-t border-white-700">
    <div class="container px-5 py-10 mx-auto flex md:items-center lg:items-start md:flex-row md:flex-nowrap flex-wrap flex-col">
        <div class="w-80 flex-shrink-0 md:mx-0 mx-auto text-center md:text-left">
            <a href="#" class="mb-3 flex title-font font-medium items-center md:justify-start justify-center text-white">
                <div class="bg-white rounded-full p-2">
                    <img class="h-12 w-12 rounded-full" src="{{ asset('assets/img/logo.png') }}" alt="Cakna Insan Malaysia Icon">
                </div>
                <div class="flex flex-col">
                  <span class="ml-3 text-xl">CAKNA INSAN MALAYSIA</span>
                  <p class="ml-3 text-sm text-white sm:py-2 sm:mt-0 mt-4">© {{ now()->format('Y') }} Cakna Insan</p>
                </div>
              </a>
            <span class="inline-flex sm:ml-auto sm:mt-0 mt-2 justify-center sm:justify-start">
                <a href="https://www.facebook.com/imancareglobal/" target="_blank" class="text-white">
                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                        <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                    </svg>
                </a>
                {{-- <a class="ml-3 text-white">
                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                    <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
                </svg>
                </a> --}}
                <a href="https://www.instagram.com/caknainsanmalaysia/" target="_blank" class="ml-3 text-white">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                        <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                        <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                    </svg>
                </a>
            </span>
        </div>
        <div class="flex-grow flex flex-wrap md:pl-20 -mb-10 md:mt-0 mt-10 md:text-left text-center">
            <div class="lg:w-1/2 md:w-1/2 w-full px-4">
                {{-- <h2 class="title-font font-medium text-white tracking-widest text-sm mb-3">Privacy Policy</h2>
                <h2 class="title-font font-medium text-white tracking-widest text-sm mb-3">Terms & Conditions</h2> --}}
            </div>
            <div class="lg:w-1/2 md:w-1/2 w-full px-4">
                <a href="{{ route('about_us') }}">
                    <h2 class="title-font font-medium text-white tracking-widest text-xl mb-3">{{ strtoupper(__('ui_text.office')) }}</h2>
                    <p class="text-white">18 Jalan 9H, Taman Cheras Jaya,</p>
                    <p class="text-white">Batu 11 Jalan Cheras, Cheras, Selangor</p>
                </a>
            </div>
        </div>
    </div>
  </footer>
