<div>
    @if ($newsDetail->isNotEmpty())
        <section class="bg-white body-font rounded-lg p-6 text-gray-700 lg:m-10 m-5">
            <div class="container px-5 py-10 mx-auto">
                <div class="flex flex-col text-start w-full my-5 mb-10">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">Latest News</h1>
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

                        <a href="{{ $route }}" @if($news->type_of_news != 'cakna_insan') target="_blank" @endif>
                            <div class="lg:w-1/3">
                                <div class="py-8 px-4 shadow-lg mx-3">
                                    <div class="h-full flex items-start">
                                        <div class="w-12 flex-shrink-0 flex flex-col text-center leading-none">
                                            <span class="text-gray-500 pb-2 mb-2 border-b-2 border-gray-200">{{ $monthAbbreviation }}</span>
                                            <span class="font-medium text-lg text-gray-800 title-font leading-none">{{ $dayOfMonth }}</span>
                                        </div>
                                        <div class="flex-grow pl-6">
                                            <h2 class="tracking-widest text-xs title-font font-medium text-indigo-500 mb-1">{{ ucwords(str_replace('_', ' ', $news->type_of_news)) .' '. 'News' }}</h2>
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
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
</div>
