<form wire:submit.prevent='editUser'>
    <div class="overflow-hidden shadow sm:rounded-md">
        <div class="px-4 py-5 bg-white sm:p-6">
            @if (session()->has('success'))
            <div x-data="{open : true}">
                <div x-show="open" class="flex p-4 bg-green-200">
                    <div class="mr-4">
                        <div class="flex items-center justify-center w-12 h-12 text-white bg-green-600 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
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
            <div class="grid grid-cols-6 gap-6 pt-4">
                <div class="col-span-12 sm:col-span-6">
                    <label for="name" class="block text-sm font-medium text-gray-700">
                        Full Name</label>
                    <input type="text" wire:model='name' name="name" id="name" autocomplete="given-name"
                        class="block w-full h-12 px-3 py-2 mt-1 bg-white border border-gray-300 @error('name') border-red-500 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('name')
                        <span class="flex items-center mt-1 ml-1 text-xs font-bold tracking-wide text-red-500">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <label for="email-address" class="block text-sm font-medium text-gray-700">Email
                        Address</label>
                    <input type="email" wire:model='email' name="email-address" id="email-address"
                        autocomplete="email"
                        class="block w-full h-12 px-3 py-2 mt-1 bg-white border border-gray-300 @error('email') border-red-500 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('email')
                        <span class="flex items-center mt-1 ml-1 text-xs font-bold tracking-wide text-red-500">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number </label>
                    <input type="number" wire:model='phone' name="phone" id="phone"
                        class="block w-full h-12 px-3 py-2 mt-1 bg-white border border-gray-300 @error('phone') border-red-500 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('phone')
                        <span class="flex items-center mt-1 ml-1 text-xs font-bold tracking-wide text-red-500">
                            {{$message}}
                        </span>
                        @enderror
                </div>

                <div class="col-span-12 sm:col-span-6">
                    <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                    <select id="role" name="role" wire:model='role'
                        class="block w-full h-18 px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md @error('role') border-red-500 @enderror shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        multiple>
                        <option>add a role to user</option>
                        @foreach ($roles as $role)
                            <option value='{{ $role->name }}'>{{ $role->name }}</option>
                        @endforeach

                    </select>
                    @error('role')
                        <span class="flex items-center mt-1 ml-1 text-xs font-bold tracking-wide text-red-500">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" wire:model='password' name="password" id="password"
                        autocomplete="given-name"
                        class="block w-full h-12 px-3 py-2 mt-1 bg-white border border-gray-300 @error('password') border-red-500 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('password')
                        <span class="flex items-center mt-1 ml-1 text-xs font-bold tracking-wide text-red-500">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="px-4 py-3 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse">
        <button type="submit"
            class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
            Save
        </button>
        <button @click="editUser = false" type="button"
            class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
            Cancel
        </button>
    </div>
</form>

