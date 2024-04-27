<div>
    <form wire:submit.prevent="save">
        <div class="relative mb-4">
            <label for="email" class="leading-7 text-sm text-gray-600">Emel</label>
            <input type="text" id="email" wire:model.lazy="email" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="relative mb-4">
            <label for="password" class="leading-7 text-sm text-gray-600">Password</label>
            <input type="password" id="password" wire:model.lazy="password" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
            @error('password') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="text-right">
            <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg mt-5">Login</button>
        </div>
    </form>

    @include('livewire.components.alert-modal', ['modalTitle' => $modalTitle, 'modalDescription' => $modalDescription])
</div>
