<div>
    <form wire:submit.prevent='editProduct'>
        <div class="overflow-hidden shadow sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
                @if (session()->has('success'))
                <div x-data="{open : true}">
                    <div x-show="open" class="flex p-4 bg-green-200">
                        <div class="mr-4">
                            <div class="flex items-center justify-center w-12 h-12 text-white bg-green-600 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                        </div>
                        <div class="flex justify-between w-full">
                            <div class="text-green-600">
                                <p class="mb-2 text-lg font-bold">
                                    Success
                                </p>
                                <p class="text-sm">
                                    {{ session('success') }}

                                </p>
                            </div>
                            <button @click="open = false">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 hover:bg-green-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                @endif
                <div class="grid grid-cols-6 gap-6 pt-4">


                    <div class="col-span-12 sm:col-span-6">
                        <label for="name" class="block text-sm font-medium text-gray-700">
                            Product Name</label>
                        <input type="text" wire:model='title' name="name" id="name" autocomplete="given-name"
                            class="block w-full h-12 px-3 py-2 mt-1 bg-white border border-gray-300 @error('title') border-red-500 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('title')
                            <span class="flex items-center mt-1 ml-1 text-xs font-bold tracking-wide text-red-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="col-span-12 sm:col-span-6">
                        <label for="code" class="block text-sm font-medium text-gray-700">
                            Product Code</label>
                        <input type="text" wire:model='code' name="code" id="code" autocomplete="given-name"
                            class="block w-full h-12 px-3 py-2 mt-1 bg-white border border-gray-300 @error('code') border-red-500 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('code')
                            <span class="flex items-center mt-1 ml-1 text-xs font-bold tracking-wide text-red-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label for="category" class="block text-sm font-medium text-gray-700">Product Category</label>
                        <select id="category" name="category" wire:model='category'
                            class="block w-full h-18 px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md @error('category') border-red-500 @enderror shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            multiple>
                            {{-- <option>Select a product category</option> --}}
                            @foreach ($categories as $category)
                                <option value='{{ $category->id }}'>{{ $category->name }}</option>
                            @endforeach

                        </select>
                        @error('category')
                            <span class="flex items-center mt-1 ml-1 text-xs font-bold tracking-wide text-red-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="col-span-12 sm:col-span-6">
                        <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                        <input type="number" wire:model='price' name="price" id="price"
                            class="block w-full h-12 px-3 py-2 mt-1 bg-white border border-gray-300 @error('price') border-red-500 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('price')
                            <span class="flex items-center mt-1 ml-1 text-xs font-bold tracking-wide text-red-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label for="stock" class="block text-sm font-medium text-gray-700">Stock Quantity </label>
                        <input type="number" wire:model='stock' name="stock" id="stock"
                            class="block w-full h-12 px-3 py-2 mt-1 bg-white border border-gray-300 @error('stock') border-red-500 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('stock')
                            <span class="flex items-center mt-1 ml-1 text-xs font-bold tracking-wide text-red-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    {{-- <div class="col-span-12 sm:col-span-6">
                        <div class="pt-3">
                            <label class="block text-sm font-medium text-gray-700">
                                Product Image
                            </label>
                            <div
                                class="flex justify-center px-6 pt-5 pb-6 mt-1 border-2 border-gray-300 border-dashed rounded-md">
                                <div class="space-y-1 text-center">
                                    <div>
                                        @if($image)

                                            <img class="mx-auto w-52 h-52" src="{{ $image->temporaryUrl() }}">


                                        @else

                                            <svg class="w-12 h-12 mx-auto text-gray-400" stroke="currentColor"
                                                fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                <path
                                                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        @endif
                                    </div>
                                    <div class="flex text-sm text-gray-600">
                                        <label for="file-upload"
                                            class="relative font-medium text-indigo-600 bg-white rounded-md cursor-pointer hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                            <span>Upload a file</span>
                                            <input wire:model='image' id="file-upload" name="file-upload" type="file"
                                                class="sr-only">
                                        </label>
                                        <p class="pl-1">click to upload</p>
                                    </div>
                                    <p class="text-xs text-gray-500">
                                        PNG, JPG, GIF up to 10MB
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    <div class="col-span-12 sm:col-span-6">
                        <label for="description" class="block text-sm font-medium text-gray-700">
                            Product Description</label>
                        <textarea rows="7" wire:model='description' name="description" id="description"
                            class="block w-full h-12 px-3 py-2 mt-1 bg-white border border-gray-300 @error('description') border-red-500 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                        @error('description')
                            <span class="flex items-center mt-1 ml-1 text-xs font-bold tracking-wide text-red-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="col-span-12 sm:col-span-6">
                        <label for="Product_id" class="block text-sm font-medium text-gray-700">Product
                            Image
                        </label>
                        <input type="file" name="pic" id="pic" wire:model='image' autocomplete="given-name"
                            class="block w-full h-12 px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                    @if ($image)
                    <div class="col-span-12 sm:col-span-6">
                        <div class="pt-3">
                            <div
                                class="flex justify-center px-6 pt-5 pb-6 mt-1 border-2 border-gray-300 border-dashed rounded-md">
                                <div class="space-y-1 text-center">
                                    <div>
                                        <img class="mx-auto w-52 h-52" src="{{ $image->temporaryUrl() }}">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                </div>
            </div>
        </div>
        <div class="px-4 py-3 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse">
            <button type="submit"
                class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                Update Product <svg wire:loading wire:target="editProduct"
                class="w-5 h-5 text-white animate-spin"
                xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12"
                    r="10" stroke="currentColor"
                    stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor"
                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                </path>
            </svg>
            </button>
            <button @click="editProduct = false" type="button"
                class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                Cancel
            </button>
        </div>
    </form>


</div>
