<div x-data="{ showUploadImagesModal: @entangle('showUploadImagesModal') }">
    <div class="bg-gray-100 bg-opacity-75 fixed z-10 inset-0 overflow-y-auto" x-show="showUploadImagesModal">
        @include('livewire.admin.project.upload-images-modal')
    </div>
</div>
