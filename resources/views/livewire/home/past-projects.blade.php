<div>
    @if ($pastRandomProjects->isNotEmpty())
        <section class="bg-white body-font rounded-lg shadow-lg p-6 text-gray-700 border border-gray-100 lg:m-10 m-5">
            <div class="container px-5 py-10 mx-auto">
                <div class="flex flex-wrap w-full mb-5 flex-col items-center text-center">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">PAST PROJECTS</h1>
                    <h2 class="text-xs text-indigo-500 tracking-widest font-medium title-font mb-1">- Mengambil Berat & Peduli Sesama Insan -</h2>
                </div>
                <div class="flex flex-wrap -m-4">
                    @forelse ($pastRandomProjects ?? [] as $project)
                        <div class="p-4 lg:w-1/3 md:w-1/2">
                            <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                                <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="{{ asset('storage/'.$project->projectable?->poster_image_path) }}" alt="blog">
                                <div class="p-6">
                                    <h1 class="title-font text-lg font-medium text-gray-900">{{ $project->projectable?->title }}</h1>
                                    <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-3">{{ $project->projectable?->subtitle }}</h2>
                                    <p class="leading-relaxed mb-3">{{ $project->projectable?->details }}</p>
                                    <div class="flex items-center flex-wrap justify-between">
                                        <div></div>
                                        <a href="{{ route('project_detail', $project) }}" target="_blank" class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0">Read More
                                            <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M5 12h14"></path>
                                                <path d="M12 5l7 7-7 7"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="p-4 w-full">
                            <div class="flex rounded-lg h-full bg-gray-100 p-8 flex-col items-center">
                                <div class="flex items-center mb-3">
                                    <h2 class="text-gray-900 text-lg title-font font-medium">No Projects</h2>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>
                <a href="{{ route('past_project') }}">
                    <button  class="flex mx-auto mt-16 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Explore More</button>
                </a>
            </div>
        </section>

        @push('js-livewire')
            <script>
                $(document).ready(function() {
                    setInterval(() => {
                        Livewire.dispatch('getPastRandomProjects');
                    }, 5000);
                });
            </script>
        @endpush
    @endif
</div>
