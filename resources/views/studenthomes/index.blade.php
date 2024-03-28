<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Student Homes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="grid grid-rows-2">
                    @foreach ($studenthomes as $studenthome)
                    <x-homecard image="{{ $studenthome->image }}" alt="{{ $studenthome->name }}"
                        title="{{ $studenthome->description }}"
                        content="{{ $studenthome->address }}, {{ $studenthome->city }}, {{ $studenthome->state }}, {{ $studenthome->zip }}" />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
