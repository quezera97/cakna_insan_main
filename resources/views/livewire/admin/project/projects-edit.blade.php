<div>
    <section class="text-gray-600 body-font overflow-hidden">
        <div class="container px-5 py-24 mx-auto">
            <div class="lg:w-4/5 mx-auto flex flex-wrap">
                <div class="lg:w-1/2 w-full lg:pr-10 lg:py-6 mb-6 lg:mb-0">
                    <h1 class="text-gray-900 text-3xl title-font font-medium mb-4">{{ $selectedProject->projectable?->title }}</h1>
                    <h2 class="text-sm title-font text-gray-500 tracking-widest">{{ $selectedProject->projectable?->subtitle }}</h2>
                    <div class="flex flex-wrap -m-2">
                        <div class="p-2 w-1/2">
                            <label for="name" class="leading-7 text-sm text-gray-600">Title</label>
                            <input type="text" id="name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="p-2 w-1/2">
                            <label for="name" class="leading-7 text-sm text-gray-600">Subtitle</label>
                            <input type="text" id="name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                        <div class="p-2 w-full">
                            <div class="relative">
                            <label for="email" class="leading-7 text-sm text-gray-600">Details</label>
                            <textarea id="email" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></textarea>
                            </div>
                        </div>
                        <div class="p-2 w-1/2">
                            <div class="relative">
                            <label for="email" class="leading-7 text-sm text-gray-600">From</label>
                            <input type="text" id="email" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>
                        <div class="p-2 w-1/2">
                            <div class="relative">
                            <label for="email" class="leading-7 text-sm text-gray-600">To</label>
                            <input type="text" id="email" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>
                        <div class="p-2 w-1/2">
                            <div class="relative">
                            <label for="email" class="leading-7 text-sm text-gray-600">Donation Needed</label>
                            <input type="text" id="email" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>
                        <div class="p-2 w-1/2">
                            <div class="relative">
                                Featured
                                <div class="flex items-center ml-1">
                                    <input id="relief_goods_distribution" type="checkbox" value="relief_goods_distribution" wire:model.lazy="help_needed.relief_goods_distribution" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:border-gray-600">
                                    <label for="relief_goods_distribution" class="ms-2 leading-7 text-sm text-gray-600">Distributing Relief Goods</label>
                                </div>
                                <div class="flex items-center ml-1">
                                    <input id="relief_goods_distribution" type="checkbox" value="relief_goods_distribution" wire:model.lazy="help_needed.relief_goods_distribution" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:border-gray-600">
                                    <label for="relief_goods_distribution" class="ms-2 leading-7 text-sm text-gray-600">Distributing Relief Goods</label>
                                </div>
                            </div>
                        </div>
                        <div class="p-2 w-full">
                            <div class="relative">
                            <label for="email" class="leading-7 text-sm text-gray-600">Poster Path</label>
                            <input type="email" id="email" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>
                    </div>
                </div>
                <img alt="ecommerce" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded" src="https://dummyimage.com/400x400">
            </div>
        </div>
      </section>
</div>
