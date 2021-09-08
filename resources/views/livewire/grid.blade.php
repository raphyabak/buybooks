{{-- <div class="flex items-end justify-end w-full h-56 bg-cover"
    style="background-image: url('{{ Storage::disk('s3')->url('photos/' . $product->image) }}')">
    <button wire:click="addItem({{ $product->id }})"
        class="p-2 mx-5 -mb-4 text-white bg-blue-600 rounded-full hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
        <svg class="w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            viewBox="0 0 24 24" stroke="currentColor">
            <path
                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
            </path>
        </svg>
    </button>
</div> --}}

<button wire:click="addItem({{ $product->id }})" class="flex w-10 h-10 ml-auto text-white transition duration-300 bg-gray-900 rounded-full hover:bg-white hover:text-purple-900 hover:shadow-xl focus:outline-none">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="m-auto stroke-current">
      <line x1="12" y1="5" x2="12" y2="19"></line>
      <line x1="5" y1="12" x2="19" y2="12"></line>
    </svg>
  </button>
