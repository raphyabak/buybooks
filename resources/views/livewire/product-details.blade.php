{{-- <button wire:click='addItem({{ $product->id }})' class="flex px-6 py-2 ml-auto text-xl text-white bg-red-500 border-0 rounded focus:outline-none hover:bg-red-600">Add to Cart</button> --}}

<section class="overflow-hidden text-gray-700 bg-white body-font">
    <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-wrap mx-auto lg:w-4/5">
            <img alt="ProductImage"
                class="object-cover object-center w-full border border-gray-200 rounded h-1/2 lg:w-1/2"
                src="{{ Storage::disk('s3')->url('photos/' . $product->image) }}">
            <div class="w-full mt-6 lg:w-1/2 lg:pl-10 lg:py-6 lg:mt-0">
                {{-- <h2 class="text-sm tracking-widest text-gray-500 title-font">BRAND NAME</h2> --}}
              
                    <h1 class="mb-1 text-3xl font-medium text-gray-900 title-font">{{ $product->title }}</h1>
                    <a href="#review">
                    <div class="flex mb-4">
                        <span class="flex items-center">
                            @if ($product->averageRating()['0'] == 5)
                                @include('fivestar')
                            @elseif($product->averageRating()['0'] >= 4.1)
                                @include('fourstarhalf')
                            @elseif($product->averageRating()['0'] == 4)
                                @include('fourstar')
                            @elseif($product->averageRating()['0'] >= 3.1)
                                @include('threestarhalf')
                            @elseif($product->averageRating()['0'] == 3)
                                @include('threestar')
                            @elseif($product->averageRating()['0'] >= 2.1)
                                @include('twostarhalf')
                            @elseif($product->averageRating()['0'] == 2)
                                @include('twostar')
                            @elseif($product->averageRating()['0'] >= 1.1)
                                @include('onestarhalf')
                            @elseif($product->averageRating()['0'] == 1)
                                @include('onestar')
                            @elseif($product->averageRating()['0'] >= 0.1)
                                @include('halfstar')
                            @elseif($product->averageRating()['0'] == 0)
                                @include('zerostar')
                            @endif

                            {{-- <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
      </svg>
      <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-red-500" viewBox="0 0 24 24">
        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
      </svg> --}}
                            <span class="ml-3 text-gray-600">{{ $product->countRating(true)['0'] }} Reviews</span>
                        </span>
                        {{-- <span class="flex py-2 pl-3 ml-3 border-l-2 border-gray-200">
      <a class="text-gray-500">
        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
          <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
        </svg>
      </a>
      <a class="ml-2 text-gray-500">
        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
          <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
        </svg>
      </a>
      <a class="ml-2 text-gray-500">
        <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
          <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
        </svg>
      </a>
    </span> --}}
                    </div>
                </a>
                <p class="leading-relaxed">{{ $product->description }}</p>
                <div class="flex items-center pb-5 mt-6 mb-5 lg:border-b-2 lg:border-gray-200">
                    {{-- <div class="flex">
      <span class="mr-3">Color</span>
      <button class="w-6 h-6 border-2 border-gray-300 rounded-full focus:outline-none"></button>
      <button class="w-6 h-6 ml-1 bg-gray-700 border-2 border-gray-300 rounded-full focus:outline-none"></button>
      <button class="w-6 h-6 ml-1 bg-red-500 border-2 border-gray-300 rounded-full focus:outline-none"></button>
    </div> --}}

                </div>
                <div class="flex">
                    <span
                        class="text-2xl font-medium text-gray-900 title-font">₦{{ number_format($product->price) }}</span>
                    {{-- @livewire('product-details', ['product' => $product], key($product->id)) --}}
                    <button wire:click='addItem({{ $product->id }})'
                        class="flex px-6 py-2 ml-auto text-xl text-white bg-red-500 border-0 rounded focus:outline-none hover:bg-red-600">Add
                        to Cart</button>
                    {{-- <button class="inline-flex items-center justify-center w-10 h-10 p-0 ml-4 text-gray-500 bg-gray-200 border-0 rounded-full">
      <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
        <path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"></path>
      </svg>
    </button> --}}
                </div>


            </div>

        </div>
        <div class="flex items-center pb-5 mt-6 mb-5 border-b-2 border-gray-200">
        </div>
        <div id="review" class="justify-center mx-auto my-3 lg:px-12">
            <div class="flex justify-between py-5" x-data="{review:false}">
                <h2 class="text-3xl font-bold "> Reviews</h2>
                <button @click="review = true"
                    class="flex items-center px-3 py-2 font-medium text-white bg-gray-600 rounded-md lg:text-xl md:text-sm hover:bg-gray-500 focus:outline-none focus:bg-gray-500">
                    <span>Add a Review</span>
                    {{-- <svg class="w-5 h-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg> --}}
                    <svg class="w-4 h-4 mx-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path
                            d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                    </svg>
                </button>
                <div class="fixed inset-0 z-10 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
                    aria-modal="true" x-show="review" x-cloak>
                    <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                        <div @click="review = ! review"
                            class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" aria-hidden="true">
                        </div>
                        <!-- This element is to trick the browser into centering the modal contents. -->
                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"
                            aria-hidden="true">&#8203;</span>

                        <div
                            class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">

                            <div class="mt-5 md:mt-0 md:col-span-2">
                                @livewire('review', ['product' => $product], key($product->id))
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @forelse ($ratings as $rating)
                <!-- component -->
                <div class="flex items-start py-4 mx-auto lg:px-12">
                    <div class="flex-shrink-0">
                        <div class="relative inline-block">
                            <div class="relative w-16 h-16 overflow-hidden rounded-full">
                                {{-- <img class="absolute top-0 left-0 object-cover w-full h-full bg-cover object-fit"
                                src="https://picsum.photos/id/646/200/200" alt="Profile picture"> --}}
                                {{-- <div class="absolute top-0 left-0 object-cover w-full h-full bg-cover object-fit">{{substr($rating->author->name, 0, 1)}} </div> --}}
                                <div
                                    class="relative flex items-center justify-center w-full h-full text-xl text-white uppercase bg-gray-500 rounded-full">
                                    {{ substr($rating->author->name, 0, 1) }}</div>
                                <div class="absolute top-0 left-0 w-full h-full rounded-full shadow-inner">
                                </div>
                            </div>
                            {{-- <svg class="absolute bottom-0 right-0 w-6 h-6 p-1 -mx-1 -my-1 text-white bg-green-600 rounded-full fill-current"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path
                                d="M19 11a7.5 7.5 0 0 1-3.5 5.94L10 20l-5.5-3.06A7.5 7.5 0 0 1 1 11V3c3.38 0 6.5-1.12 9-3 2.5 1.89 5.62 3 9 3v8zm-9 1.08l2.92 2.04-1.03-3.41 2.84-2.15-3.56-.08L10 5.12 8.83 8.48l-3.56.08L8.1 10.7l-1.03 3.4L10 12.09z" />
                        </svg> --}}
                        </div>
                    </div>
                    <div class="ml-6">
                        <p class="flex items-baseline">
                            <span class="font-bold text-gray-600">{{ $rating->author->name }}</span>
                            {{-- <span class="ml-2 text-xs text-green-600">Verified Buyer</span> --}}
                        </p>
                        <div class="flex items-center mt-1">

                            @if ($rating->rating == 5)
                                @include('fivestar')
                            @elseif($rating->rating == 4)
                                @include('fourstar')
                            @elseif($rating->rating == 3)
                                @include('threestar')
                            @elseif($rating->rating == 2)
                                @include('twostar')
                            @elseif($rating->rating == 1)
                                @include('onestar')
                            @endif
                        </div>

                        <div class="mt-3">
                            <span class="font-bold">{{ $rating->title }}
                            </span>
                            <p class="mt-1">{{ $rating->body }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="justify-center mx-auto text-center">
                    @include('sorry')
                    <h2 class="text-3xl font-bold text-gray-800"> No review added yet </h2>
                </div>
            @endforelse
            {{ $ratings->links() }}
        </div>
    </div>

</section>
