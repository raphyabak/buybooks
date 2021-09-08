<div>
    @forelse($carts as $index=>$cart)

    <div class="flex justify-between mt-6">
        <div class="flex">
            <img class="object-cover w-20 h-20 rounded"
                src="{{ Storage::disk('s3')->url('photos/' . $cart['image']) }}"
                alt="">
            <div class="mx-3">
                <h3 class="text-sm text-gray-600">   {{ $cart['name'] }}</h3>
                <div class="flex items-center mt-2">
                    <button wire:click="decreaseItem('{{ $cart['rowId'] }}')" class="text-gray-500 focus:outline-none focus:text-gray-600">
                        <svg class="w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </button>
                    <span class="mx-2 text-gray-700">{{ $cart['qty'] }}</span>
                    <button wire:click="increaseItem('{{ $cart['rowId'] }}')" class="text-gray-500 focus:outline-none focus:text-gray-600">
                        <svg class="w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <span class="text-gray-600">  ₦{{ number_format($cart['price']) }}</span>
    </div>

    @empty
        <p>Cart is Empty</p>
    @endforelse

    <div class="mt-8 text-right">
        <h5 class="text-xl font-bold"> Total = ₦ {{ number_format($summary['total']) }}</h5>
    </div>
    {{-- <div class="mt-8">
        <form class="flex items-center justify-center">
            <input class="w-48 form-input" type="text" placeholder="Add promocode">
            <button
                class="flex items-center px-3 py-2 ml-3 text-sm font-medium text-white uppercase bg-blue-600 rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                <span>Apply</span>
            </button>
        </form>
    </div> --}}

</div>
