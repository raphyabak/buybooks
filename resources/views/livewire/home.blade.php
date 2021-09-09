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
            @livewire('product-grid')
        </main>
    @endsection
</div>
