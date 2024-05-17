@push('css')
    <style>
        @media (min-width: 1024px) {
            .custom-screen-size {
                height: 80vh;
            }
        }
        @media (max-width: 1023px) {
            .custom-screen-size {
                height: 55vh;
            }
        }
        @media (max-width: 767px) {
            .custom-screen-size {
                height: 35vh;
            }
        }
    </style>
@endpush

<div>
    <section class="text-gray-600 body-font">
        <div class="pb-10">
            @if($bannerJumbotrons->isNotEmpty())
                <div id="default-carousel" class="relative w-full overflow-hidden custom-screen-size" data-carousel="slide">
                    <div class="relative flex justify-center items-center h-full overflow-hidden">
                        @foreach ($bannerJumbotrons as $banner)
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                @if ($banner->details_button_url)
                                    <a href="{{ route('project_detail', $banner->details_button_url) }}">
                                        <img src="{{ asset('storage/'.$banner->banner_image_path) }}" class="absolute inset-0 w-full h-full" alt="...">
                                    </a>
                                @else
                                    <img src="{{ asset('storage/'.$banner->banner_image_path) }}" class="absolute inset-0 w-full h-full" alt="...">
                                @endif
                                <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-30 flex space-x-4">
                                    @if ($banner->donation_button_url)
                                        <a href="{{ 'https://toyyibpay.com/'.$banner->donation_button_url }}" target="__blank" class="flex items-center justify-center text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">{{ __('ui_text.infaq_now') }}</a>
                                    @endif
                                    @if ($banner->details_button_url && (is_int($banner->details_button_url) || is_numeric($details_button_url)))
                                        <a href="{{ route('project_detail', $banner->project) }}" class="flex items-center justify-center text-gray-700 bg-gray-200 border-0 py-2 px-6 focus:outline-none hover:bg-gray-300 rounded text-lg">{{ __('ui_text.details') }}</a>
                                    @else
                                        <a href="{{ route('project_detail', $banner->details_button_url) }}" class="flex items-center justify-center text-gray-700 bg-gray-200 border-0 py-2 px-6 focus:outline-none hover:bg-gray-300 rounded text-lg">{{ __('ui_text.details') }}</a>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="absolute z-30 bottom-5 left-1/2 transform -translate-x-1/2 flex space-x-3 rtl:space-x-reverse">
                        @foreach ($bannerJumbotrons as $key => $banner)
                            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide {{ $loop->iteration }}" data-carousel-slide-to="{{ $key }}"></button>
                        @endforeach
                    </div>

                    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                            </svg>
                            <span class="sr-only">{{ __('ui_text.previous') }}</span>
                        </span>
                    </button>
                    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <span class="sr-only">{{ __('ui_text.next') }}</span>
                        </span>
                    </button>
                </div>
            @endif
        </div>
    </section>
</div>
