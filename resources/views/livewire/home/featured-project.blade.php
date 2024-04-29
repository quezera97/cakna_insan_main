<div>
    @if ($featuredProject->isNotEmpty())
        <section class="text-gray-700 body-font">
            <div class="container mx-auto flex lg:px-36 py-10 md:flex-row flex-col items-center">
                <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                    {{-- <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900 mb-5"></h1> --}}
                    <h1 id="featured-project-title" class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">{{ $featuredProject[$currentProjectIndex]->projectable->title }}</h1>
                    <p class="mb-8 leading-relaxed">{{ $featuredProject[$currentProjectIndex]->projectable?->details }}</p>
                    <div class="flex justify-center">
                        <a href="{{ route('donation', $featuredProject[$currentProjectIndex]) }}" class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Infaq Sekarang</a>
                        <a href="{{ route('project_detail', $featuredProject[$currentProjectIndex]) }}" class="ml-4 inline-flex text-gray-700 bg-gray-200 border-0 py-2 px-6 focus:outline-none hover:bg-gray-300 rounded text-lg">Butiran</a>
                    </div>
                </div>
                <div class="lg:max-w-sm lg:w-full md:w-1/2 w-1/2">
                    <img class="object-cover object-center rounded" alt="Poster" src="{{ asset($featuredProject[$currentProjectIndex]->projectable?->poster_image_path) }}">
                </div>
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



