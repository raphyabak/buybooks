<form wire:submit.prevent='editRole'>
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
                        Role Name</label>
                    <input type="text" wire:model='name' name="name" id="name" autocomplete="given-name"
                        class="block w-full h-12 px-3 py-2 mt-1 bg-white border border-gray-300 @error('name') border-red-500 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('name')
                        <span class="flex items-center mt-1 ml-1 text-xs font-bold tracking-wide text-red-500">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <label for="permission" class="block text-sm font-medium text-gray-700">Permission</label>
                    <select id="permission" name="permission" wire:model='permission'
                        class="block w-full h-18 px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md @error('permission') border-red-500 @enderror shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" multiple>
                        <option>add a permission to role</option>
                        @foreach ($permissions as $permission)
                        <option value='{{$permission->id}}'>{{$permission->name}}</option>
                        @endforeach

                    </select>
                    @error('permission')
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
        <button @click="editRole = false" type="button"
            class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
            Cancel
        </button>
    </div>
</form>

