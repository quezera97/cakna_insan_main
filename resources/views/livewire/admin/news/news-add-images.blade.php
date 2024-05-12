<div>
    <section class="text-gray-600 body-font overflow-hidden">
        <div class="container px-5 py-10 mx-auto">
            <div class="w-full mx-auto">
                <div class="w-full lg:py-3 mb-6 lg:mb-0 -m-2">
                    <div class="text-gray-600 body-font">
                        <div class="container px-5 mx-auto">
                            <div class="mx-auto mb-5 text-center">
                                <a wire:click="setActive('{{ $mainImage['links'] }}')" class="{{ $activeLink == $mainImage['links'] ? 'bg-gray-100 border-indigo-500 text-indigo-500' : 'border-gray-200 hover:text-gray-900' }} sm:px-6 py-3 w-1/2 sm:w-auto justify-center sm:justify-start border-b-2 title-font font-medium inline-flex items-center leading-none border-gray-200 hover:text-gray-900 tracking-wider">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5 mr-3" viewBox="0 0 24 24">
                                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                    </svg>Main Image
                                </a>
                                <a wire:click="setActive('{{ $bannerImage['links'] }}')" class="{{ $activeLink == $bannerImage['links'] ? 'bg-gray-100 border-indigo-500 text-indigo-500' : 'border-gray-200 hover:text-gray-900' }} sm:px-6 py-3 w-1/2 sm:w-auto justify-center sm:justify-start border-b-2 title-font font-medium inline-flex items-center leading-none border-gray-200 hover:text-gray-900 tracking-wider">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5 mr-3" viewBox="0 0 24 24">
                                        <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                                    </svg>Banner Image
                                </a>
                                <a wire:click="setActive('{{ $otherImages['links'] }}')" class="{{ $activeLink == $otherImages['links'] ? 'bg-gray-100 border-indigo-500 text-indigo-500' : 'border-gray-200 hover:text-gray-900' }} sm:px-6 py-3 w-1/2 sm:w-auto justify-center sm:justify-start border-b-2 title-font font-medium inline-flex items-center leading-none border-gray-200 hover:text-gray-900 tracking-wider">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5 mr-3" viewBox="0 0 24 24">
                                        <circle cx="12" cy="5" r="3"></circle>
                                        <path d="M12 22V8M5 12H2a10 10 0 0020 0h-3"></path>
                                    </svg>Other Images
                                </a>
                            </div>
                            <div x-data="{ typeOfImage: @entangle('activeLink') }">
                                <div x-show="typeOfImage == '{{ $mainImage['links'] }}'">
                                    <h3 class="xl:w-1/4 lg:w-1/3 md:w-1/2 w-2/3 block mx-auto text-gray-500 text-xs tracking-widest title-font mb-1">{{ ucwords($mainImage['links']).' '.'Image' }}</h3>
                                    <form wire:submit.prevent="save('{{ $selectedNewsDetail->id }}','{{ $activeLink }}')">
                                        @csrf
                                        <div class="xl:w-1/4 lg:w-1/3 md:w-1/2 w-2/3 block mx-auto">
                                            <input id="upload-main-images" type="file" wire:model="mainImage.main_image" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300" required>
                                            @error('mainImage.main_image') <span class="text-red-500">{{ $message }}</span> @enderror
                                            <div wire:loading wire:target="mainImage.main_image">Uploading...</div>
                                        </div>
                                        <div class="p-2 xl:w-1/4 lg:w-1/3 md:w-1/2 w-2/3 block mx-auto object-cover object-center rounded mt-5">
                                            @if ($mainImage['main_image'])
                                                Photo Preview:
                                                <img src="{{ $mainImage['main_image']->temporaryUrl() }}">
                                            @endif
                                        </div>
                                        <div class="lg:w-1/2 md:w-full sm:w-full lg:mx-auto object-center">
                                            <div class="p-2 w-full">
                                                <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Title</label>
                                                <input type="text" id="title" wire:model="mainImage.title" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            </div>
                                            <div class="p-2 w-full">
                                                <label for="caption" class="block mb-2 text-sm font-medium text-gray-900">Caption</label>
                                                <textarea id="caption" wire:model="mainImage.caption" style="height: 123px;" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></textarea>
                                            </div>
                                        </div>
                                        <div class="p-2 w-full mt-5">
                                            <button type="submit" wire:loading.attr="disabled" class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 my-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Save</button>
                                        </div>
                                    </form>
                                </div>
                                <div x-show="typeOfImage == '{{ $bannerImage['links'] }}'">
                                    <h3 class="xl:w-1/4 lg:w-1/3 md:w-1/2 w-2/3 block mx-auto text-gray-500 text-xs tracking-widest title-font mb-1">{{ ucwords($bannerImage['links']).' '.'Image' }}</h3>
                                    <form wire:submit.prevent="save('{{ $selectedNewsDetail->id }}','{{ $activeLink }}')">
                                        @csrf
                                        <div class="xl:w-1/4 lg:w-1/3 md:w-1/2 w-2/3 block mx-auto">
                                            <input id="upload-main-images" type="file" wire:model="bannerImage.banner_image" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300" required>
                                            @error('bannerImage.banner_image') <span class="text-red-500">{{ $message }}</span> @enderror
                                            <div wire:loading wire:target="bannerImage.banner_image">Uploading...</div>
                                        </div>
                                        <div class="p-2 xl:w-1/4 lg:w-1/3 md:w-1/2 w-2/3 block mx-auto object-cover object-center rounded mt-5">
                                            @if ($bannerImage['banner_image'])
                                                Photo Preview:
                                                <img src="{{ $bannerImage['banner_image']->temporaryUrl() }}">
                                            @endif
                                        </div>
                                        <div class="lg:w-1/2 md:w-full sm:w-full lg:mx-auto object-center">
                                            <div class="p-2 w-full">
                                                <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Title</label>
                                                <input type="text" id="title" wire:model="bannerImage.title" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            </div>
                                            <div class="p-2 w-full">
                                                <label for="caption" class="block mb-2 text-sm font-medium text-gray-900">Caption</label>
                                                <textarea id="caption" wire:model="bannerImage.caption" style="height: 123px;" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></textarea>
                                            </div>
                                        </div>
                                        <div class="p-2 w-full mt-5">
                                            <button type="submit" wire:loading.attr="disabled" class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 my-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Save</button>
                                        </div>
                                    </form>
                                </div>
                                <div x-show="typeOfImage == '{{ $otherImages['links'] }}'">
                                    <h3 class="xl:w-1/4 lg:w-1/3 md:w-1/2 w-2/3 block mx-auto text-gray-500 text-xs tracking-widest title-font mb-1">{{ ucwords($otherImages['links']).' '.'Image' }}</h3>
                                    <form wire:submit.prevent="save('{{ $selectedNewsDetail->id }}','{{ $activeLink }}')">
                                        @csrf
                                        <div class="w-1/4 mx-auto">
                                            <input id="upload-main-images" type="file" wire:model="otherImages.other_images" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300" multiple required>
                                            @error('otherImages.other_images.*') <span class="text-red-500">{{ $message }}</span> @enderror
                                            <div wire:loading wire:target="otherImages.other_images">Uploading...</div>
                                        </div>
                                        <div class="p-2 w-3/4 mx-auto flex flex-col block object-cover object-center rounded mt-5">
                                            @foreach($otherImages['other_images'] ?? [] as $key => $image)
                                                @if ($image)
                                                    Photo Preview:
                                                    <div class="flex w-full">
                                                        <div class="w-1/2">
                                                            <img class="mb-3 h-96 w-96" src="{{ $image->temporaryUrl() }}">
                                                        </div>
                                                        <div class="p-2 w-1/2">
                                                            <div class="mb-5">
                                                                <label for="title-{{ $key }}" class="block mb-2 text-sm font-medium text-gray-900">Title</label>
                                                                <input type="text" id="title-{{ $key }}" wire:model="otherImages.title.{{ $key }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                            </div>
                                                            <div>
                                                                <label for="caption-{{ $key }}" class="block mb-2 text-sm font-medium text-gray-900">Caption</label>
                                                                <textarea id="caption-{{ $key }}" wire:model="otherImages.caption.{{ $key }}" style="height: 123px;" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="p-2 w-full mt-5">
                                            <button type="submit" wire:loading.attr="disabled" class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if ($showAlertModal)
        @include('livewire.components.alert-modal', ['alertModalType' => $alertModalType, 'alertModalDescription' => $alertModalDescription])
    @endif
</div>
