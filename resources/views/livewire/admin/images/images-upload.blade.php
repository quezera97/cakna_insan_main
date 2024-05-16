<div class="w-full mx-auto">
    <div class="w-full lg:py-3 mb-6 lg:mb-0 -m-2">
        <div class="text-gray-600 body-font">
            <div class="container px-5 mx-auto">
                <form wire:submit.prevent="uploadImages('{{ $project->id }}')">
                    @csrf
                    <div class="w-1/4 mx-auto">
                        <input id="upload-main-images" type="file" wire:model="imagesUpload.uploaded_images" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300" multiple required>
                        @error('imagesUpload.uploaded_images.*') <span class="text-red-500">{{ $message }}</span> @enderror
                        <div wire:loading wire:target="imagesUpload.uploaded_images">Uploading...</div>
                    </div>
                    <div class="p-2 w-3/4 mx-auto flex flex-col block object-cover object-center rounded mt-5">
                        @foreach($imagesUpload['uploaded_images'] ?? [] as $key => $image)
                            @if ($image)
                                Photo Preview:
                                <div class="flex w-full">
                                    <div class="w-1/2">
                                        <img class="mb-3 h-96 w-96" src="{{ $image->temporaryUrl() }}">
                                    </div>
                                    <div class="p-2 w-1/2">
                                        <div class="mb-5">
                                            <label for="title-{{ $key }}" class="block mb-2 text-sm font-medium text-gray-900">Title</label>
                                            <input type="text" id="title-{{ $key }}" wire:model="imagesUpload.title.{{ $key }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        </div>
                                        <div>
                                            <label for="caption-{{ $key }}" class="block mb-2 text-sm font-medium text-gray-900">Caption</label>
                                            <textarea id="caption-{{ $key }}" wire:model="imagesUpload.caption.{{ $key }}" style="height: 123px;" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></textarea>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="p-2 w-full mt-5">
                        <button type="submit" wire:loading.attr="disabled" class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">{{ __('ui_text.save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if ($showAlertModal)
        @include('livewire.components.alert-modal', ['alertModalType' => $alertModalType, 'alertModalDescription' => $alertModalDescription])
    @endif
</div>
