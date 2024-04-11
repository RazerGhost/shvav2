<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Studenten Woning') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-4 justify-evenly sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($homes as $home)
                    <div class="flex flex-col justify-center flex-1 w-full bg-white rounded-md shadow-md">
                        <x-homecard image="{{ $home->image }}" alt="{{ $home->name }}" title="{{ $home->name }}" description="{{ $home->description }}" address="{{ $home->address }}" city="{{ $home->city }}" state="{{ $home->state }}" zip="{{ $home->zip }}" provider="{{ $providersPerHome[$home->id] ?? 'Unknown' }}" />
                        <div class="flex flex-row justify-between flex-1 p-4">
                            <button class="w-full mt-4">
                                <a href="{{ route('studenthomes.home', $home->id) }}">
                                    {{ __('Bekijk') }}
                                </a>
                            </button>
                            <form method="POST" class="flex justify-center w-full mt-4" action="{{ route('employee.assignhome', $user->id) }}">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="home_id" value="{{ $home->id }}">
                                <button>
                                    {{ __('Toewijzen aan huis') }}
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
