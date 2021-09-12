<div class="container px-6 mx-auto">
    <div class="flex items-center">
        <div class="container flex flex-wrap items-start ml-auto mr-auto">
            <div class="w-full pl-5 mt-4 mb-4 lg:pl-2">
                <h1 class="text-3xl font-extrabold text-gray-700 lg:text-4xl">
                    All Books
                </h1>
                <div class="pb-7">
                    <div class="justify-end max-w-lg mx-auto mt-6">
                        {{-- <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg class="w-5 h-5 text-gray-500" viewBox="0 0 24 24" fill="none">
                                <path
                                    d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </span> --}}

                        <input wire:model='search'
                            class="w-full py-2 pl-10 pr-4 border rounded-md focus:border-blue-500 focus:outline-none focus:shadow-outline"
                            type="text" placeholder="Search ...">
                    </div>
                </div>
            </div>
            @forelse ($products as $product)
                <div class="w-full pl-5 pr-5 mb-5 md:w-1/2 lg:w-1/4 lg:pl-2 lg:pr-2">

                    <div
                        class="p-2 transition duration-300 bg-white rounded-lg m-h-64 hover:translate-y-2 hover:shadow-xl">
                        <a href="{{ route('details', $product->slug) }}">
                            <figure class="mb-2">
                                <img src="{{ Storage::disk('s3')->url('photos/' . $product->image) }}" alt=""
                                    class="h-64 ml-auto mr-auto" />
                            </figure>
                        </a>
                        <div class="flex flex-col p-4 bg-gray-700 rounded-lg">
                            <div>
                                <h5 class="text-2xl font-bold leading-none text-white">
                                    {{ $product->title }}
                                </h5>
                                {{-- <span class="text-xs leading-none text-gray-400">And then there was Pro.</span> --}}
                            </div>
                            <div class="flex items-center">
                                <div class="text-lg font-light text-white">
                                    ₦ {{ number_format($product->price) }}
                                </div>
                                @livewire('grid', ['product' => $product], key($product->id))
                            </div>
                        </div>
                    </div>

                </div>
            @empty
            <div class="justify-center mx-auto text-center">
                @include('sorry')
                <h2 class="text-4xl font-bold text-gray-800"> Product not found </h2>
            </div>
            @endforelse

        </div>
    </div>
</div>
