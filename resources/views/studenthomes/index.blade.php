<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">

                <div class="grid grid-cols-2 gap-3">
                    <x-homecard
    image="image-url.jpg"
    alt="Education"
    title="Address"
    content="Street, City, Country"
/>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
