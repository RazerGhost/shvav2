<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Medewerkers Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden text-white bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <x-bladewind::tab-group name="usertypes">
                    <x-slot:headings class="text-black dark:text-white">
                        <x-bladewind::tab-heading name="students" label="Studenten" active="true" />
                        <x-bladewind::tab-heading name="providers" label="Bedrijven" />
                        @if (Auth::user()->role === 0)
                            <x-bladewind::tab-heading name="employees" label="Medewerkers" />
                        @endif
                    </x-slot:headings>
                    <x-bladewind::tab-body>
                        <x-bladewind::tab-content name="students" active="true">
                            <x-primary-button class="p-6 text-gray-900 x-p dark:text-gray-100">
                                <a href="{{ route('employee.createuser', ['role' => 2]) }}">Student Toevoegen</a>
                            </x-primary-button>
                            <div class="p-6 ">
                                <x-bladewind::table>
                                    @foreach ($students as $student)
                                    <div class="grid grid-cols-1 gap-4 justify-evenly sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                                        <div class="flex flex-col justify-center flex-1 w-full bg-white rounded-md shadow-md">
                                        <div class="w-full p-6 bg-white rounded-md">
                                            <div>
                                                <p class="text-gray-600"> Voornaam: {{ $student->first_name }}</p>
                                                <p class="text-gray-600"> Achrternaam: {{ $student->last_name }}</p>
                                                <p class="text-gray-600"> Tel nummer: {{ $student->phone }}</p>
                                                <p class="text-gray-600"> Email: {{ $student->email }}</p>
                                                <p class="text-gray-600"> Adres: {{ $student->address }}</p>
                                                <p class="text-gray-600"> Stad: {{ $student->city }}</p>
                                                <p class="text-gray-600"> Provincie: {{ $student->state }}</p>
                                                <p class="text-gray-600"> Postcode: {{ $student->zip }}</p>
                                                <p class="text-gray-600"> Home Id: {{ $student->homeid }}</p>
                                            </div>
                                        </div>    
                                        <div class="flex flex-row justify-between flex-1 p-4">
                                            <button class="w-full mt-4 text-gray-600">
                                                <a href="{{ route('employee.edituser', $student->id) }}"><x-pen></x-pen></a>
                                            </button>
                                            <form method="POST" action="{{ route('employee.deleteuser', $student->id) }}">
                                                @csrf
                                                    @method('DELETE')
                                                    <button class="w-full mt-4 text-gray-600">
                                                        <x-trash></x-trash>
                                                    </button>
                                            </form>
                                        </div>
                                    </div>
                                    @endforeach
                                </x-bladewind::table>
                            </div>
                        </x-bladewind::tab-content>
                        <x-bladewind::tab-content name="providers">
                            <x-primary-button class="p-6 text-gray-900 x-p dark:text-gray-100">
                                <a href="{{ route('employee.createuser', ['role' => 3]) }}">Bedrijf Toevoegen</a>
                            </x-primary-button>
                            <div class="p-6">
                                <x-bladewind::table>
                                    @foreach ($providers as $provider)
                                    <div class="grid grid-cols-1 gap-4 justify-evenly sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                                        <div class="flex flex-col justify-center flex-1 w-full bg-white rounded-md shadow-md">
                                        <div class="w-full p-6 bg-white rounded-md">
                                            <div>
                                                <p class="text-gray-600"> Naam: {{ $provider->name }}</p>
                                                <p class="text-gray-600"> Tel nummer: {{ $provider->phone }}</p>
                                                <p class="text-gray-600"> Email: {{ $provider->email }}</p>
                                                <p class="text-gray-600"> Adres: {{ $provider->address }}</p>
                                                <p class="text-gray-600"> Stad: {{ $provider->city }}</p>
                                                <p class="text-gray-600"> Provincie: {{ $provider->state }}</p>
                                                <p class="text-gray-600"> Postcode: {{ $provider->zip }}</p>
                                            </div>
                                        </div>    
                                        <div class="flex flex-row justify-between flex-1 p-4">
                                            <button class="w-full mt-4 text-gray-600">
                                                <a href="{{ route('employee.edituser', $provider->id) }}"><x-pen></x-pen></a>
                                            </button>
                                            <form method="POST" action="{{ route('employee.deleteuser', $provider->id) }}">
                                                @csrf
                                                    @method('DELETE')
                                                    <button class="w-full mt-4 text-gray-600">
                                                        <x-trash></x-trash>
                                                    </button>
                                            </form>
                                        </div>
                                    </div>
                                    @endforeach
                                </x-bladewind::table>
                            </div>
                        </x-bladewind::tab-content>
                        @if (Auth::user()->role === 0)
                            <x-bladewind::tab-content name="employees">
                                <x-primary-button class="p-6 text-gray-900 x-p dark:text-gray-100">
                                    <a href="{{ route('employee.createuser', ['role' => 1]) }}">Werknemer Toevoegen</a>
                                </x-primary-button>
                                <div class="p-6">
                                    <x-bladewind::table>
                                        @foreach ($employees as $employee)
                                        <div class="grid grid-cols-1 gap-4 justify-evenly sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                                            <div class="flex flex-col justify-center flex-1 w-full bg-white rounded-md shadow-md">
                                            <div class="w-full p-6 bg-white rounded-md">
                                                <div>
                                                    <p class="text-gray-600"> Voornaam: {{ $employee->first_name }}</p>
                                                    <p class="text-gray-600"> achternaam: {{ $employee->last_name }}</p>
                                                    <p class="text-gray-600"> Telefoon nummer: {{ $employee->phone }}</p>
                                                    <p class="text-gray-600"> Email: {{ $employee->email }}</p>
                                                    <p class="text-gray-600"> Stad: {{ $employee->address }}</p>
                                                    <p class="text-gray-600"> Stad: {{ $employee->city }}</p>
                                                    <p class="text-gray-600"> Provincie: {{ $employee->state }}</p>
                                                    <p class="text-gray-600"> Postcode: {{ $employee->zip }}</p>
                                                </div>
                                            </div>    
                                            <div class="flex flex-row justify-between flex-1 p-4">
                                                <button class="w-full mt-4 text-gray-600">
                                                    <a href="{{ route('employee.edituser', $employee->id) }}"><x-pen></x-pen></a>
                                                </button>
                                                <form method="POST" action="{{ route('employee.deleteuser', $employee->id) }}">
                                                    @csrf
                                                        @method('DELETE')
                                                        <button class="w-full mt-4 text-gray-600">
                                                            <x-trash></x-trash>
                                                        </button>
                                                </form>
                                            </div>
                                        </div>

                                        @endforeach
                                    </x-bladewind::table>
                                </div>
                            </x-bladewind::tab-content>
                        @endif
                    </x-bladewind::tab-body>
                </x-bladewind::tab-group>
            </div>
        </div>
    </div>
</x-app-layout>
