<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Medewerkers Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            @if (session('status') === 'no-homes')
                <script>
                    showNotification('Geen huizen', 'Er kunnen geen huizen gevonden worden', 'error');
                </script>
            @endif
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
                            <div class="p-6 overflow-scroll">
                                <x-bladewind::table>
                                    <x-slot name="header">
                                        <th>Voornaam</th>
                                        <th>achternaam</th>
                                        <th>Telefoon nummer</th>
                                        <th>Email</th>
                                        <th>adres</th>
                                        <th>stad</th>
                                        <th>provincie</th>
                                        <th>postcode</th>
                                        <th>homeid</th>
                                        <th>Actions</th>
                                    </x-slot>
                                    @foreach ($students as $student)
                                        <tr>
                                            <td>{{ $student->first_name }}</td>
                                            <td>{{ $student->last_name }}</td>
                                            <td>{{ $student->phone }}</td>
                                            <td>{{ $student->email }}</td>
                                            <td>{{ $student->address }}</td>
                                            <td>{{ $student->city }}</td>
                                            <td>{{ $student->state }}</td>
                                            <td>{{ $student->zip }}</td>
                                            @if ($student->home_id != null)
                                                <td>{{ $homeTitles[$student->home_id] }}</td>
                                            @else
                                                <td><a href="{{ route('employee.showhomes', $student->id) }}">Huis toewijzen</a></td>
                                            @endif
                                            <td>
                                                <div class="flex flex-row justify-center flex-1">
                                                    <a href="{{ route('employee.edituser', $student->id) }}"><x-pen></x-pen></a>
                                                    <form method="POST" action="{{ route('employee.deleteuser', $student->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button>
                                                            <x-trash></x-trash>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </x-bladewind::table>
                            </div>
                        </x-bladewind::tab-content>
                        <x-bladewind::tab-content name="providers">
                            <x-primary-button class="p-6 text-gray-900 x-p dark:text-gray-100">
                                <a href="{{ route('employee.createuser', ['role' => 3]) }}">Bedrijf Toevoegen</a>
                            </x-primary-button>
                            <div class="p-6 overflow-scroll">
                                <x-bladewind::table>
                                    <x-slot name="header">
                                        <th>Bedrijf</th>
                                        <th>Telefoon nummer</th>
                                        <th>Email</th>
                                        <th>adres</th>
                                        <th>stad</th>
                                        <th>provincie</th>
                                        <th>postcode</th>
                                        <th>Actions</th>
                                    </x-slot>
                                    @foreach ($providers as $provider)
                                        <tr>
                                            <td>{{ $provider->name }}</td>
                                            <td>{{ $provider->phone }}</td>
                                            <td>{{ $provider->email }}</td>
                                            <td>{{ $provider->address }}</td>
                                            <td>{{ $provider->city }}</td>
                                            <td>{{ $provider->state }}</td>
                                            <td>{{ $provider->zip }}</td>
                                            <td>
                                                <div class="flex flex-row justify-center flex-1">
                                                    <a href="{{ route('employee.edituser', $provider->id) }}"><x-pen></x-pen></a>
                                                    <form method="POST" action="{{ route('employee.deleteuser', $provider->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button>
                                                            <x-trash></x-trash>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </x-bladewind::table>
                            </div>
                        </x-bladewind::tab-content>
                        @if (Auth::user()->role === 0)
                            <x-bladewind::tab-content name="employees">
                                <x-primary-button class="p-6 text-gray-900 x-p dark:text-gray-100">
                                    <a href="{{ route('employee.createuser', ['role' => 1]) }}">Werknemer Toevoegen</a>
                                </x-primary-button>
                                <div class="p-6 overflow-scroll">
                                    <x-bladewind::table>
                                        <x-slot name="header">
                                            <th>Voornaam</th>
                                            <th>achternaam</th>
                                            <th>Telefoon nummer</th>
                                            <th>Email</th>
                                            <th>adres</th>
                                            <th>stad</th>
                                            <th>provincie</th>
                                            <th>postcode</th>
                                            <th>Actions</th>
                                        </x-slot>
                                        @foreach ($employees as $employee)
                                            <tr>
                                                <td>{{ $employee->first_name }}</td>
                                                <td>{{ $employee->last_name }}</td>
                                                <td>{{ $employee->phone }}</td>
                                                <td>{{ $employee->email }}</td>
                                                <td>{{ $employee->address }}</td>
                                                <td>{{ $employee->city }}</td>
                                                <td>{{ $employee->state }}</td>
                                                <td>{{ $employee->zip }}</td>
                                                <td>
                                                    <div class="flex flex-row justify-center flex-1">
                                                        <a href="{{ route('employee.edituser', $employee->id) }}"><x-pen></x-pen></a>
                                                        <form method="POST" action="{{ route('employee.deleteuser', $employee->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button>
                                                                <x-trash></x-trash>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
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
