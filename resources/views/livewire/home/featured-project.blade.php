<div class="px-4">
    @if ($featuredProject->isNotEmpty())
        <section class="bg-white rounded-lg shadow-lg p-6 text-gray-700 border border-gray-100 lg:m-6 m-1">
            <div class="container mx-auto flex lg:px-36 py-10 md:flex-row flex-col items-center">
                <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                    <h1 id="featured-project-title" class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">{{ $featuredProject[$currentProjectIndex]->projectable->title }}</h1>
                    <p class="mb-8 leading-relaxed">{{ $featuredProject[$currentProjectIndex]->projectable?->details }}</p>
                    <div class="flex justify-center">
                        @if (isset($featuredProject[$currentProjectIndex]->donationDetail) && !is_null($featuredProject[$currentProjectIndex]->donationDetail?->donation_url))
                            <a href="{{ 'https://toyyibpay.com/'.$featuredProject[$currentProjectIndex]->donationDetail?->donation_url }}" target="__blank" class="mr-4 inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Infaq Now</a>
                        @endif
                        <a href="{{ route('project_detail', $featuredProject[$currentProjectIndex]) }}" class="inline-flex text-gray-700 bg-gray-200 border-0 py-2 px-6 focus:outline-none hover:bg-gray-300 rounded text-lg">Details</a>
                    </div>
                </div>
                @if (!is_null($featuredProject[$currentProjectIndex]->projectable?->poster_image_path))
                    <div class="lg:max-w-sm lg:w-full md:w-1/2 w-1/2">
                        <img class="object-cover object-center rounded" alt="Poster" src="{{ asset('storage/'.$featuredProject[$currentProjectIndex]->projectable?->poster_image_path) }}">
                    </div>
                @endif
            </div>
        </section>

        @push('js-livewire')
            <script>
                $(document).ready(function() {
                    Livewire.on('projectIndexChanged', newIndex => {
                        $('#featured-project-title').text("{{ $featuredProject }}[newIndex].projectable.title");
                    });

                    setInterval(() => {
                        Livewire.dispatch('changeProjectIndex');
                    }, 5000);
                });
            </script>
        @endpush
    @endif
</div>



