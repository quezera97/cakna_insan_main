<div>
    @if ($pastRandomProjects->isNotEmpty())
        <section class="text-gray-700 body-font">
            <div class="container px-5 py-10 mx-auto">
                <div class="flex flex-wrap w-full mb-5 flex-col items-center text-center">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">PAST PROJECTS</h1>
                    <h2 class="text-xs text-indigo-500 tracking-widest font-medium title-font mb-1">- Mengambil Berat & Peduli Sesama Insan -</h2>
                </div>
                <div class="flex flex-wrap -m-4">
                    @forelse ($pastRandomProjects ?? [] as $project)
                        <div class="xl:w-1/4 md:w-1/2 p-4">
                            <a href="{{ route('project_detail', $project) }}">
                                <div class="bg-gray-100 p-6 rounded-lg text-center">
                                    @if ($project->projectable?->pastProjectImages->isNotEmpty())
                                    <img class="h-40 rounded w-full object-cover object-center mb-6" src="{{ asset('storage/'.$project->projectable?->pastProjectImages[0]->image_path) }}" alt="{{ $project->projectable?->title }}">

                                    @endif
                                    <h2 class="text-lg text-gray-900 font-medium title-font mb-4">{{ $project->projectable?->title }}</h2>
                                    <p class="leading-relaxed text-base">{{ $project->projectable?->subtitle }}</p>
                                </div>
                            </a>
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
