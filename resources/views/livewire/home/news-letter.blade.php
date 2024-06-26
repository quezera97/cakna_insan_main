<div>
    @if ($newsDetail->isNotEmpty())
        <section class="text-gray-600 body-font">
            <div class="container px-10 py-10 mx-auto">
                <div class="ftext-start w-full mb-10">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">{{ __('ui_text.latest_news') }}</h1>
                </div>
                <div class="flex flex-wrap -m-4">
                    @foreach ($newsDetail as $news)
                        @php
                            $date = $news->date;
                            $dateTime = new DateTime($date);
                            $monthAbbreviation = $dateTime->format('M');
                            $dayOfMonth = $dateTime->format('d');

                            $firstLetter = strtoupper(substr($news->author, 0, 1));

                            if($news->type_of_news == 'cakna_insan' && Route::has($news->related_url)){
                                $route = route($news->related_url);
                            }
                            else{
                                $route = $news->related_url;
                            }
                        @endphp
                        <div class="lg:w-1/2 w-full">
                            <div class="py-8 px-4 shadow-lg mx-3">
                                <div class="h-full flex items-start">
                                    <div class="w-12 flex-shrink-0 flex flex-col text-center leading-none">
                                        <span class="text-gray-500 pb-2 mb-2 border-b-2 border-gray-200">{{ $monthAbbreviation }}</span>
                                        <span class="font-medium text-lg text-gray-800 title-font leading-none">{{ $dayOfMonth }}</span>
                                    </div>
                                    <div class="flex-grow pl-6">
                                        <h2 class="tracking-widest text-xs title-font font-medium text-indigo-500 mb-1">{{ ucwords(str_replace('_', ' ', $news->type_of_news)) }}</h2>
                                        <h1 class="title-font text-xl font-medium text-gray-900 mb-3">{{ $news->title }}</h1>
                                        <p class="leading-relaxed mb-5">{{ $news->subtitle }}</p>
                                        <a class="inline-flex items-center">
                                            <span class="w-8 h-8 rounded-full flex-shrink-0 object-cover object-center bg-indigo-300 text-white text-center inline-flex justify-center items-center">{{ $firstLetter }}</span>
                                            <span class="flex-grow flex flex-col pl-3">
                                                <span class="title-font font-medium text-gray-900">{{ $news->author }}</span>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                                <div class="flex items-center flex-wrap justify-between mt-5">
                                    <div></div>
                                    <a href="{{ $route }}" @if($news->type_of_news != 'cakna_insan') target="_blank" @endif target="_blank" class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0">
                                        {{ __('ui_text.read_more') }}
                                        <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h14"></path>
                                            <path d="M12 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        @auth
            @include('livewire.components.rich-text-editor')
        @endauth
    @endif
</div>
