<div>
    @section('body')
        <main class="my-8">
            {{-- <div class="container px-6 mx-auto">
                <div class="mt-16">
                    <h3 class="text-2xl font-medium text-gray-600">All Products</h3>
                    <div class="grid grid-cols-1 gap-6 mt-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                        @foreach ($products as $product)
                            <div class="w-full max-w-sm mx-auto overflow-hidden rounded-md shadow-md">
                                @livewire('grid', ['product' => $product], key($product->id))
                                <div class="px-5 py-3">
                                    <h3 class="text-gray-700 uppercase">{{ $product->title }}</h3>
                                    <span class="mt-2 text-gray-500">₦{{ number_format($product->price) }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div> --}}
            <div class="container px-6 mx-auto">
                <div class="flex items-center">
                    <div class="container flex flex-wrap items-start ml-auto mr-auto">
                        <div class="w-full pl-5 mt-4 mb-4 lg:pl-2">
                            <h1 class="text-3xl font-extrabold text-gray-700 lg:text-4xl">
                                All Books
                            </h1>
                        </div>
                        @foreach ($products as $product)
                            <div class="w-full pl-5 pr-5 mb-5 md:w-1/2 lg:w-1/4 lg:pl-2 lg:pr-2">

                                <div
                                    class="p-2 transition duration-300 bg-white rounded-lg m-h-64 hover:translate-y-2 hover:shadow-xl">
                                    <a href="{{route('details', $product->slug)}}">
                                         <figure class="mb-2">
                                        <img src="{{ Storage::disk('s3')->url('photos/' . $product->image) }}"
                                            alt="" class="h-64 ml-auto mr-auto" />
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
                        @endforeach

                    </div>
                </div>
            </div>
        </main>
    @endsection
</div>
