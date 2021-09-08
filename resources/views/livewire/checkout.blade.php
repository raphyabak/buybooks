@section('body')
<main class="my-8">
    <div class="container px-6 mx-auto">
        <h3 class="text-2xl font-medium text-gray-700">Checkout</h3>
        <div class="flex flex-col mt-2 lg:flex-row">
            <div class="order-2 w-full lg:w-1/2">
                {{-- <div class="flex items-center">
                    <button class="flex text-sm text-blue-500 focus:outline-none"><span class="flex items-center justify-center w-5 h-5 mr-2 text-white bg-blue-500 rounded-full">1</span> Contacts</button>
                    <button class="flex ml-8 text-sm text-gray-700 focus:outline-none"><span class="flex items-center justify-center w-5 h-5 mr-2 border-2 border-blue-500 rounded-full">2</span> Shipping</button>
                    <button class="flex ml-8 text-sm text-gray-500 focus:outline-none" disabled><span class="flex items-center justify-center w-5 h-5 mr-2 border-2 border-gray-500 rounded-full">3</span> Payments</button>
                </div> --}}
                @livewire('checkout-form')
            </div>
            <div class="flex-shrink-0 order-1 w-full mb-8 lg:w-1/2 lg:mb-0 lg:order-2">
                <div class="flex justify-center lg:justify-end">
                    <div class="w-full max-w-md px-4 py-3 border rounded-md">
                        <div class="flex items-center justify-between">
                            <h3 class="font-medium text-gray-700">Order total </h3>
                            {{-- <span class="text-sm text-gray-600">Edit</span> --}}
                        </div>
                        @livewire('carty')
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
