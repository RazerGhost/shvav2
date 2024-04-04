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
                <h1 class="text-2xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                    {{ __('Students') }}
                </h1>
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
                        </tr>
                    @endforeach
                </x-bladewind::table>
            </div>
        </div>
    </div>
</x-app-layout>
