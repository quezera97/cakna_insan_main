<div>
    @if (!is_null($statistics))
        <section class="bg-white body-font rounded-lg shadow-lg p-2 text-gray-700 border border-gray-100 lg:m-10 m-5">
            <div class="container px-5 py-24 mx-auto">
                @auth
                    <a href="{{ route('statistics-settings') }}">
                        <button class="w-24 bg-indigo-500 hover:bg-indigo-600 text-white font-bold p-2 rounded-full mr-2">
                            @include('livewire.components.svg-edit')
                        </button>
                    </a>
                @endauth
                <div class="flex flex-col text-center w-full mb-20">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">{{ $statistics->title }}</h1>
                    <p class="lg:w-2/3 mx-auto leading-relaxed text-base">{{ $statistics->details }}</p>
                </div>
                <div class="flex flex-wrap -m-4 text-center">
                    <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                            <h2 class="title-font font-medium text-3xl text-gray-900">{{ $statistics->statistic_1_value }}</h2>
                            <p class="leading-relaxed">{{ $statistics->statistic_1 }}</p>
                        </div>
                    </div>
                    <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                            <h2 class="title-font font-medium text-3xl text-gray-900">{{ $statistics->statistic_2_value }}</h2>
                            <p class="leading-relaxed">{{ $statistics->statistic_2 }}</p>
                        </div>
                    </div>
                    <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                            <h2 class="title-font font-medium text-3xl text-gray-900">{{ $statistics->statistic_3_value }}</h2>
                            <p class="leading-relaxed">{{ $statistics->statistic_3 }}</p>
                        </div>
                    </div>
                    <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                        <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                            <h2 class="title-font font-medium text-3xl text-gray-900">{{ $statistics->statistic_4_value }}</h2>
                            <p class="leading-relaxed">{{ $statistics->statistic_4 }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
</div>
