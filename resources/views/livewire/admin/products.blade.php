<div class="container px-6 py-8 mx-auto">
    <div class="flex justify-between" x-data="{newProduct:false}">
        <h3 class="text-3xl font-bold text-gray-700">Products</h3>
        <button @click="newProduct = true"
            class="px-6 py-2 text-xl font-medium text-white transition duration-500 ease-in-out transform bg-gray-600 rounded-lg shadow-md hover:bg-gray-700 focus:ring-gray-500 focus:ring-offset-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 ">Add
            Product
        </button>
        <div class="fixed inset-0 z-10 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true"
            x-show="newProduct" x-cloak>
            <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                <div @click="newProduct = ! newProduct"
                    class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" aria-hidden="true"></div>
                <!-- This element is to trick the browser into centering the modal contents. -->
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                <div
                    class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">

                    <div class="mt-5 md:mt-0 md:col-span-2">
                        @include('addProduct')
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="mt-8">

    </div>

    <div class="flex flex-col mt-8">
        <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div
                class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Product Name
                            </th>
                            <th
                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Price
                            </th>
                             <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Stock
                            </th>

                            <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                        </tr>
                    </thead>

                    <tbody class="bg-white">
                        @forelse ($products as $product)
                            <tr>


                                {{-- <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="text-sm leading-5 text-gray-900">{{ $product->title }}</div>

                                </td> --}}
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 w-10 h-10">
                                            @if ($product->image)
                                                <img class="w-10 h-10 rounded-full"
                                                    {{-- src="{{ asset('photos/' . $product->image) }}" --}}
                                                    src="{{Storage::disk('s3')->url('photos/' . $product->image)}}"
                                                     alt="">
                                            @else
                                                <div
                                                    class="relative flex items-center justify-center w-10 h-10 text-xl text-white uppercase bg-gray-500 rounded-full">
                                                    {{ substr($product->title, 0, 1) }}</div>
                                            @endif

                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $product->title }}
                                            </div>
                                            {{-- <div class="text-sm text-gray-500">
                                                {{ $product->price }}
                                            </div> --}}
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900"> ₦{{ number_format($product->price) }}</div>

                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                        {{ $product->stock }}
                                    </span>
                                </td>


                                <td
                                    class="px-6 py-4 text-sm font-medium leading-5 text-right whitespace-no-wrap border-b border-gray-200">
                                    <span x-data="{editProduct:false}">
                                        <button @click="editProduct = true" class="px-4"><svg
                                                xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-green-500"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </button>
                                        <div class="fixed inset-0 z-10 overflow-y-auto" aria-labelledby="modal-title"
                                            role="dialog" aria-modal="true" x-show="editProduct" x-cloak>
                                            <div
                                                class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                                                <div @click="editProduct = ! editProduct"
                                                    class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75"
                                                    aria-hidden="true"></div>
                                                <!-- This element is to trick the browser into centering the modal contents. -->
                                                <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                                                    aria-hidden="true">&#8203;</span>

                                                <div
                                                    class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">

                                                    <div class="mt-5 md:mt-0 md:col-span-2">

                                                        @livewire('admin.edit-product', ['product' =>
                                                        $product, 'categories'=> $categories], key($product->id))
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </span>
                                    <span x-data="{deleteProduct:false}" @click.away="deleteProduct = false"
                                        @close.stop="deleteProduct = false"
                                        @product-deleted.window="deleteProduct = false">
                                            <button @click="deleteProduct = true" class="px-4"><svg
                                                    xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-500"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                            <div class="fixed inset-0 z-10 overflow-y-auto" aria-labelledby="modal-title"
                                                role="dialog" aria-modal="true" x-show="deleteProduct" x-cloak>
                                                <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0"
                                                    x-cloak>
                                                    <div
                                                        class="w-64 p-4 m-auto bg-white shadow-lg rounded-2xl dark:bg-gray-800">
                                                        <div class="w-full h-full text-center">
                                                            <div class="flex flex-col justify-between h-full">
                                                                <svg width="40" height="40"
                                                                    class="w-12 h-12 m-auto mt-4 text-red-500"
                                                                    fill="currentColor" viewBox="0 0 1792 1792"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M704 1376v-704q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v704q0 14 9 23t23 9h64q14 0 23-9t9-23zm256 0v-704q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v704q0 14 9 23t23 9h64q14 0 23-9t9-23zm256 0v-704q0-14-9-23t-23-9h-64q-14 0-23 9t-9 23v704q0 14 9 23t23 9h64q14 0 23-9t9-23zm-544-992h448l-48-117q-7-9-17-11h-317q-10 2-17 11zm928 32v64q0 14-9 23t-23 9h-96v948q0 83-47 143.5t-113 60.5h-832q-66 0-113-58.5t-47-141.5v-952h-96q-14 0-23-9t-9-23v-64q0-14 9-23t23-9h309l70-167q15-37 54-63t79-26h320q40 0 79 26t54 63l70 167h309q14 0 23 9t9 23z">
                                                                    </path>
                                                                </svg>
                                                                <p
                                                                    class="mt-4 text-xl font-bold text-gray-800 dark:text-gray-200">
                                                                    Delete Product</p>
                                                                <p
                                                                    class="px-6 py-2 text-xs text-gray-600 dark:text-gray-400">
                                                                    Are you sure you want to
                                                                    delete this product {{ $product->title }}?</p>
                                                                <div
                                                                    class="flex items-center justify-between w-full gap-4 mt-8">
                                                                    <button type="button"
                                                                        wire:click='delete({{ $product->id }})'
                                                                        class="w-full px-4 py-2 text-base font-semibold text-center text-white transition duration-200 ease-in bg-red-600 rounded-lg shadow-md hover:bg-red-700 focus:ring-red-500 focus:ring-offset-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2">Delete
                                                                        <svg wire:loading wire:target="delete"
                                                                            class="w-5 h-5 text-white animate-spin"
                                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                            viewBox="0 0 24 24">
                                                                            <circle class="opacity-25" cx="12" cy="12"
                                                                                r="10" stroke="currentColor"
                                                                                stroke-width="4"></circle>
                                                                            <path class="opacity-75" fill="currentColor"
                                                                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                                                            </path>
                                                                        </svg></button>
                                                                    <button type="button" @click="deleteProduct = false"
                                                                        class="w-full px-4 py-2 text-base font-semibold text-center text-red-500 transition duration-200 ease-in bg-white rounded-lg shadow-md hover:bg-gray-100 focus:ring-indigo-500 focus:ring-offset-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2">Cancel</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </span>
                                    </td>
                                </tr>
                                @empty

                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
