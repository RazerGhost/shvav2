<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're in the admin dashboard") }}
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
                <x-bladewind::tab-group name="usertypes">
                    <x-slot:headings>
                        <x-bladewind::tab-heading name="students" label="Students" active="true" />
                        <x-bladewind::tab-heading name="providers" label="Providers" />
                        <x-bladewind::tab-heading name="employees" label="Employees" />
                    </x-slot:headings>
                    <x-bladewind::tab-body>
                        <x-bladewind::tab-content name="students" active="true">
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
                                            <td>{{ $student->homeid }}</td>
                                            <td>
                                                <x-primary-button class="text-gray-900 dark:text-gray-100">
                                                    <a href="{{ route('admin.edituser', $student->id) }}">Edit</a>
                                                </x-primary-button>
                                                <x-primary-button class="text-gray-900 dark:text-gray-100">
                                                    <a href="{{ route('admin.deleteuser', $student->id) }}">Delete</a>
                                                </x-primary-button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </x-bladewind::table>
                            </div>
                        </x-bladewind::tab-content>
                        <x-bladewind::tab-content name="providers">
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
                                                <x-primary-button class="text-gray-900 dark:text-gray-100">
                                                    <a href="{{ route('admin.edituser', $provider->id) }}">Edit</a>
                                                </x-primary-button>
                                                <x-primary-button class="text-gray-900 dark:text-gray-100">
                                                    <a href="{{ route('admin.deleteuser', $provider->id) }}">Delete</a>
                                                </x-primary-button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </x-bladewind::table>
                            </div>
                        </x-bladewind::tab-content>
                        <x-bladewind::tab-content name="employees">
                            <x-primary-button class="p-6 text-gray-900 x-p dark:text-gray-100">
                                <a href="{{ route('admin.createuser') }}">Add Employee</a>
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
                                                <x-primary-button class="text-gray-900 dark:text-gray-100">
                                                    <a href="{{ route('admin.edituser', $employee->id) }}">Edit</a>
                                                </x-primary-button>
                                                <x-primary-button class="text-gray-900 dark:text-gray-100">
                                                    <a href="{{ route('admin.deleteuser', $employee->id) }}">Delete</a>
                                                </x-primary-button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </x-bladewind::table>
                            </div>
                        </x-bladewind::tab-content>
                    </x-bladewind::tab-body>
                </x-bladewind::tab-group>
            </div>
        </div>
    </div>
</x-app-layout>
