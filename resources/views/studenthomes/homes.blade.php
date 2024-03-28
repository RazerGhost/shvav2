<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Student Homes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-4 justify-evenly sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($studenthomes as $studenthome)
                    <div class="flex flex-col justify-center flex-1 w-full bg-white rounded-md shadow-md">
                        <x-homecard image="{{ $studenthome->image }}" alt="{{ $studenthome->name }}" title="{{ $studenthome->name }}" description="{{ $studenthome->description }}" address="{{ $studenthome->address }}" city="{{ $studenthome->city }}" state="{{ $studenthome->state }}" zip="{{ $studenthome->zip }}" />
                        <div class="flex flex-row justify-between flex-1 p-4">
                            <button class="w-full mt-4">
                                <a href="{{ route('studenthomes.view', $studenthome->id) }}">
                                    {{ __('View') }}
                                </a>
                            </button>
                            @if (Auth::user()->role == 1 || Auth::user()->role == 0)
                                <button class="w-full mt-4">
                                    <a href="{{ route('studenthomes.edit', $studenthome->id) }}">
                                        {{ __('Edit') }}
                                    </a>
                                </button>
                                <form method="POST" class="flex justify-center w-full mt-4" action="{{ route('studenthomes.destroy', $studenthome->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button>
                                        {{ __('Delete') }}
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
