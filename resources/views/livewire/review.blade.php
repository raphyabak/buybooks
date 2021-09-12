<form wire:submit.prevent='rate' class="max-w-md p-10 mx-4 mx-auto my-8 bg-white card md:rounded-lg">
    <div class="title">
        <h1 class="text-4xl font-bold text-center">Review Product</h1>
    </div>
    <div class="my-4">
        @if (session()->has('failed'))
            <div x-data="{open : true}">
                <div x-show="open" class="flex p-4 bg-red-200">
                    <div class="mr-4">
                        <div class="flex items-center justify-center w-12 h-12 text-white bg-red-600 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </div>
                    </div>
                    <div class="flex justify-between w-full">
                        <div class="text-red-600">
                            <p class="mb-2 text-lg font-bold">
                                Error
                            </p>
                            <p class="text-sm">
                                {{ session('failed') }}

                            </p>
                        </div>
                        <button type="button" @click="open = false">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 hover:bg-red-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <div class="my-4">
        @if (session()->has('success'))
            <div x-data="{open : true}">
                <div x-show="open" class="flex p-4 bg-green-200">
                    <div class="mr-4">
                        <div class="flex items-center justify-center w-12 h-12 text-white bg-green-600 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7" />
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
                        <button type="button" @click="open = false">
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
    </div>



    <div class="items-center mt-4 text-sm text-gray-700 options md:flex md:space-x-6">
        <p class="w-1/2 mb-2 font-bold md:mb-0">Your Rating </p>
        <select wire:model='rating'
            class="w-full p-2 @error('rating') border-red-500 @enderror border border-gray-200 focus:outline-none focus:border-gray-500">
            <option selected>Select an option</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        @error('rating')
            <span class="flex items-center mt-1 ml-1 text-xs font-bold tracking-wide text-red-500">
                {{ $message }}
            </span>
        @enderror
    </div>

    <div class="mt-4 form">

        @guest
            <div class="flex flex-col text-sm">
                <label for="name" class="mb-2 font-bold">Full Name</label>
                <input wire:model="name" type="text"
                    class="p-2 border border-gray-200 @error('name') border-red-500 @enderror appearance-none focus:outline-none focus:border-gray-500"
                    type="text">
                @error('name')
                    <span class="flex items-center mt-1 ml-1 text-xs font-bold tracking-wide text-red-500">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="flex flex-col text-sm">
                <label for="email" class="mt-4 mb-2 font-bold">Email</label>
                <input wire:model='email' type="email"
                    class="p-2 border border-gray-200 appearance-none @error('name') border-red-500 @enderror focus:outline-none focus:border-gray-500"
                    type="text">
                @error('email')
                    <span class="flex items-center mt-1 ml-1 text-xs font-bold tracking-wide text-red-500">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="flex flex-col text-sm">
                <label for="password" class="mt-4 mb-2 font-bold">Password</label>
                <input wire:model='password' type="password"
                    class="p-2 border border-gray-200 @error('password') border-red-500 @enderror appearance-none focus:outline-none focus:border-gray-500"
                    type="text">
                @error('password')
                    <span class="flex items-center mt-1 ml-1 text-xs font-bold tracking-wide text-red-500">
                        {{ $message }}
                    </span>
                @enderror
            </div>
        @endguest



        <div class="flex flex-col text-sm">
            <label for="title" class="mt-4 mb-2 font-bold">Review Title</label>
            <input wire:model='title'
                class="p-2 border border-gray-200 @error('title') border-red-500 @enderror appearance-none focus:outline-none focus:border-gray-500"
                type="text">
            @error('title')
                <span class="flex items-center mt-1 ml-1 text-xs font-bold tracking-wide text-red-500">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div class="flex flex-col text-sm">
            <label for="description" class="mt-4 mb-2 font-bold">Your
                Review</label>
            <textarea wire:model='body'
                class="w-full h-40 p-2 border border-gray-200 @error('body') border-red-500 @enderror appearance-none focus:outline-none focus:border-gray-500"></textarea>
            @error('body')
                <span class="flex items-center mt-1 ml-1 text-xs font-bold tracking-wide text-red-500">
                    {{ $message }}
                </span>
            @enderror
        </div>
    </div>

    <div class="submit">
        <button type="submit"
            class="w-full px-4 py-2 mt-8 font-semibold text-center text-white bg-gray-600 shadow-lg hover:bg-gray-700 focus:outline-none">Submit</button>
    </div>
    <div class="px-4 py-3 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse">
        <button @click="review = false" type="button"
            class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
            Cancel
        </button>
    </div>
</form>
