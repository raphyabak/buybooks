<form wire:submit.prevent='buy' class="mt-8 lg:w-3/4">

    <div class="grid grid-cols-6 gap-6 pt-4">
        <div class="col-span-12 sm:col-span-6">
            <label for="name" class="block text-sm font-medium text-gray-500">
                Full Name</label>
            <input type="text" wire:model='name' name="name" id="name" autocomplete="given-name"
                class="block w-full h-12 px-3 py-2 mt-1 bg-white border border-gray-300 @error('name') border-red-500 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('name')
                <span class="flex items-center mt-1 ml-1 text-xs font-bold tracking-wide text-red-500">
                    {{ $message }}
                </span>
            @enderror
        </div>
        <div class="col-span-12 mt-3 sm:col-span-6">
            <label for="email-address" class="block text-sm font-medium text-gray-500">Email
                Address</label>
            <input type="email" wire:model='email' name="email-address" id="email-address" autocomplete="email"
                class="block w-full h-12 px-3 py-2 mt-1 bg-white border border-gray-300 @error('email') border-red-500 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('email')
                <span class="flex items-center mt-1 ml-1 text-xs font-bold tracking-wide text-red-500">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div class="col-span-12 mt-3 sm:col-span-6">
            <label for="phone" class="block text-sm font-medium text-gray-500">Phone Number </label>
            <input type="number" wire:model='phone' name="phone" id="phone"
                class="block w-full h-12 px-3 py-2 mt-1 bg-white border border-gray-300 @error('phone') border-red-500 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('phone')
                <span class="flex items-center mt-1 ml-1 text-xs font-bold tracking-wide text-red-500">
                    {{ $message }}
                </span>
            @enderror
        </div>


        <div class="col-span-12 mt-3 sm:col-span-6">
            <label for="Address" class="block text-sm font-medium text-gray-500">Shipping Address </label>
            <textarea rows="5" wire:model='address' name="address" id="address"
                class="block w-full h-12 px-3 py-2 mt-1 bg-white border border-gray-300 @error('address') border-red-500 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
            @error('address')
                <span class="flex items-center mt-1 ml-1 text-xs font-bold tracking-wide text-red-500">
                    {{ $message }}
                </span>
            @enderror
        </div>
        @guest
            <div class="col-span-12 mt-3 sm:col-span-6">
                <label for="password" class="block text-sm font-medium text-gray-500">Password</label>
                <input type="password" wire:model='password' name="password" id="password" autocomplete="given-name"
                    class="block w-full h-12 px-3 py-2 mt-1 bg-white border border-gray-300 @error('password') border-red-500 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                @error('password')
                    <span class="flex items-center mt-1 ml-1 text-xs font-bold tracking-wide text-red-500">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        @endguest
    </div>

    <div class="flex items-center justify-between mt-8">
        <a href="{{route('home')}}"
            class="flex items-center text-sm font-medium text-gray-700 rounded hover:underline focus:outline-none">
            <svg class="w-5 h-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                viewBox="0 0 24 24" stroke="currentColor">
                <path d="M7 16l-4-4m0 0l4-4m-4 4h18"></path>
            </svg>
            <span class="mx-2">Back step</span>
        </a>
        <button type="submit"
            class="flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
            <span>Payment</span>
            <svg class="w-5 h-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                viewBox="0 0 24 24" stroke="currentColor">
                <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
            </svg>
        </button>
    </div>


</form>
