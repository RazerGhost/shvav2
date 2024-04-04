<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ $home->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-4 bg-white rounded-md justify-evenly sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                <div>
                    <img src="{{ $home->image }}" alt="{{ $home->name }}" class="w-full h-auto">
                </div>
                <div>
                    <h1 class="text-xl font-semibold leading-tight text-gray-800">{{ $home->name }}</h1>
                    <p class="mt-2 text-gray-600">{{ $home->description }}</p>
                    <p class="mt-2 text-gray-600"><strong>Address:</strong> {{ $home->address }}</p>
                    <p class="mt-2 text-gray-600"><strong>City:</strong> {{ $home->city }}</p>
                    <p class="mt-2 text-gray-600"><strong>State:</strong> {{ $home->state }}</p>
                    <p class="mt-2 text-gray-600"><strong>Zip Code:</strong> {{ $home->zip }}</p>
                    <p class="mt-2 text-gray-600"><strong>Provided By:</strong> {{ $provider->name }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
