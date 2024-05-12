<div>
    @if ($incomingRandomProjects->isNotEmpty())
        <section class="text-gray-700 body-font">
            <div class="container px-5 py-10 mx-auto">
                <div class="flex flex-col text-center w-full my-5 mb-10">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">CURRENT PROJECTS</h1>
                    <h2 class="text-xs text-indigo-500 tracking-widest font-medium title-font mb-1">- Mengambil Berat & Peduli Sesama Insan -</h2>
                </div>
                <div class="flex flex-wrap -m-4">
                    @forelse ($incomingRandomProjects ?? [] as $project)
                        <div class="p-4 md:w-1/3">
                            <div class="flex rounded-lg h-full bg-gray-100 p-8 flex-col">
                                <div class="flex items-center mb-3">
                                    <h2 class="text-gray-900 text-lg title-font font-medium">{{ $project->projectable?->title }}</h2>
                                </div>
                                <div class="flex-grow">
                                    <p class="leading-relaxed text-base">{{ $project->projectable?->subtitle }}</p>
                                    <a href="{{ route('project_detail', $project) }}" class="mt-3 text-indigo-500 inline-flex items-center">Details
                                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
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
                <a href="{{ route('incoming_project') }}">
                    <button  class="flex mx-auto mt-16 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Explore More</button>
                </a>
            </div>
        </section>

        @push('js-livewire')
            <script>
                $(document).ready(function() {
                    setInterval(() => {
                        Livewire.dispatch('getIncomingRandomProjects');
                    }, 5000);
                });
            </script>
        @endpush
    @endif
</div>
