<div>
    @if (!is_null($featuredPost))
        <section class="text-gray-600 body-font">
            <div class="container px-10 py-10 mx-auto">
                <div class="w-full mx-auto text-center">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900 my-5">{{ $featuredPost->title }}</h1>
                    <p class="leading-relaxed text-sm">{{ $featuredPost->details }}</p>
                    <span class="inline-block h-1 w-10 rounded bg-indigo-500 mt-8 mb-6"></span>
                    <h2 class="text-gray-900 font-medium title-font tracking-wider text-sm">{{ $featuredPost->author }}</h2>
                    <p class="text-gray-500">
                        @if (!is_null($featuredPost->date))
                            {{ \Carbon\Carbon::parse($featuredPost->date)->format('d M Y') }}
                        @else
                            {{ \Carbon\Carbon::parse($featuredPost->created_at)->format('d M Y') }}
                        @endif
                    </p>
                </div>
            </div>
        </section>
    @else
        <section class="text-gray-600 body-font">
            <div class="container px-10 py-10 mx-auto">
                <div class="w-full mx-auto text-center">
                    <div class="flex rounded-lg h-96 bg-gray-100 p-8 flex-col items-center justify-center">
                        <div class="flex items-center mb-3 justify-center">
                            <h2 class="text-gray-900 text-lg title-font font-medium text-center">{{ __('ui_text.no_post') }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
</div>
