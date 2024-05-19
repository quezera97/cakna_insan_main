<div>
    @if (!is_null($statistics))
        <section class="text-gray-600 body-font bg-sky-50">
            <div class="container px-5 py-24 mx-auto">
                <div class="flex flex-col text-center w-full mb-20">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">{{ $statistics->title }}</h1>
                    <p class="lg:w-2/3 mx-auto leading-relaxed text-base">{{ $statistics->details }}</p>
                </div>
                <div class="flex flex-wrap -m-4 text-center">
                    <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                            <h2 class="title-font font-medium text-3xl text-gray-900">{{ $statistics->individu_helped }}</h2>
                            <p class="leading-relaxed">{{ __('ui_text.individu_helped') }}</p>
                        </div>
                    </div>
                    <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                            <h2 class="title-font font-medium text-3xl text-gray-900">{{ $statistics->happy_families }}</h2>
                            <p class="leading-relaxed">{{ __('ui_text.happy_families') }}</p>
                        </div>
                    </div>
                    <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                            <h2 class="title-font font-medium text-3xl text-gray-900">{{ $statistics->volunteers }}</h2>
                            <p class="leading-relaxed">{{ __('ui_text.volunteers') }}</p>
                        </div>
                    </div>
                    <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                            <h2 class="title-font font-medium text-3xl text-gray-900">{{ $statistics->no_of_projects }}</h2>
                            <p class="leading-relaxed">{{ __('ui_text.projects') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
</div>
