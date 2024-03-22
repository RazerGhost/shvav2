<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                {{-- Input form --}}

                <div class="p-6">
                    <form action="{{ route('studenthomes.store') }}" method="POST">
                        @csrf
                        {{-- image --}}

                        <div>
                            <label for="image" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Image</label>
                            <input type="file" name="image" id="image" accept="image/png, image/jpeg" class="w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300" required>
                        </div>
                        {{-- description --}}
                        <div class="mb-4">
                            <label for="description" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Description</label>
                            <input type="text" name="description" id="description" class="w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300" required>
                        </div>
                        {{-- address --}}
                        <div class="mb-4">
                            <label for="address" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Address</label>
                            <input type="text" name="address" id="address" class="w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300" required>
                        </div>
                        {{-- city --}}
                        <div class="mb-4">
                            <label for="city" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">City</label>
                            <input type="text" name="city" id="city" class="w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300" required>
                        </div>
                        {{-- state --}}
                        <div class="mb-4">
                            <label for="state" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">state</label>
                            <input type="text" name="state" id="state" class="w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300" required>
                        </div>
                        {{-- zip --}}
                        <div class="mb-4">
                            <label for="zip" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Zip</label>
                            <input type="text" name="zip" id="zip" class="w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300" required>
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="w-full p-2 text-white bg-blue-500 rounded-md">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
