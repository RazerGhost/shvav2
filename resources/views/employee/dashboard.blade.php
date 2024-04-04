<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Employee Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're in the Employee dashboard") }}
                </div>
                @if (Auth::user()->role == 0)
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        You are an admin
                    </div>
                @elseif (Auth::user()->role == 1)
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        You are an employee
                    </div>
                @elseif (Auth::user()->role == 2)
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        You are a customer
                    </div>
                @else
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        You are a House provider
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
