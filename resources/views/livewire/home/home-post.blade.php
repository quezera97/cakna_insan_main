<div>
    @if (!is_null($featuredPost))
        <section class="text-gray-600 body-font bg-sky-50">
            <div class="container px-10 py-10 mx-auto">
                <div class="w-full mx-auto text-center">
                    <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900 my-5">{{ $featuredPost->title }}</h1>
                    @auth
                        <button
                            class="w-24 open-modal bg-indigo-500 hover:bg-indigo-600 text-white font-bold p-2 rounded-full mr-2"
                            data-id="{{ $featuredPost->id }}"
                            data-model="{{ $featuredPost::class }}"
                            data-details="{{ $featuredPost->details }}"
                            data-column="details"
                            aria-label="Edit">
                            @include('livewire.components.svg-edit')
                        </button>

                        @include('livewire.components.rich-text-editor')
                    @endauth
                    <p class="leading-relaxed text-sm">{!! $featuredPost->details !!}</p>
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
    @endif
</div>
